<?php
ob_start("ob_gzhandler");
?>
<?php include 'includes/header.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<br><br><br><br>

<main class="calculator-container">
    <div class="calc-card">
        <h2 class="title">SIP <span>Calculator</span></h2>

        <div class="calc-content">
            <div class="inputs-section">
                <div class="input-group">
                    <div class="label-row">
                        <label>Monthly Investment</label>
                        <div class="input-wrapper">
                            ₹ <input type="number" id="monthly-amt" value="10000" style="text-align: left; padding-left: 5px;">
                        </div>
                    </div>
                    <input type="range" id="monthly-slider" min="500" max="100000" step="500" value="10000">
                </div>

                <div class="input-group">
                    <div class="label-row">
                        <label>Expected Return Rate (p.a)</label>
                        <div class="input-wrapper">
                            <input type="number" id="return-rate" value="12" style="text-align: left; padding-left: 5px;"> %
                        </div>
                    </div>
                    <input type="range" id="return-slider" min="1" max="30" step="0.5" value="12">
                </div>

                <div class="input-group">
                    <div class="label-row">
                        <label>Time Period</label>
                        <div class="input-wrapper">
                            <input type="number" id="years" value="10" style="text-align: left; padding-left: 5px;"> Yr
                        </div>
                    </div>
                    <input type="range" id="years-slider" min="1" max="40" step="1" value="10">
                </div>

                <div class="results-box">
                    <div class="res-row">
                        <span>Invested Amount</span>
                        <span id="display-invested">₹ 12,00,000</span>
                    </div>
                    <div class="res-row">
                        <span>Est. Returns</span>
                        <span id="display-returns" class="light-blue">₹ 11,23,391</span>
                    </div>
                    <hr>
                    <div class="res-row total">
                        <span>Total Value</span>
                        <span id="display-total">₹ 23,23,391</span>
                    </div>
                </div>
            </div>

            <div class="chart-section">
                <canvas id="sipChart"></canvas>
                <div class="chart-legend">
                    <span class="legend-item"><span class="dot invested"></span> Invested</span>
                    <span class="legend-item"><span class="dot returns"></span> Returns</span>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    const monthlyInput = document.getElementById('monthly-amt');
    const monthlySlider = document.getElementById('monthly-slider');
    const rateInput = document.getElementById('return-rate');
    const rateSlider = document.getElementById('return-slider');
    const yearInput = document.getElementById('years');
    const yearSlider = document.getElementById('years-slider');

    const displayInvested = document.getElementById('display-invested');
    const displayReturns = document.getElementById('display-returns');
    const displayTotal = document.getElementById('display-total');

    // Initialize Chart
    const ctx = document.getElementById('sipChart').getContext('2d');
    let sipChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Invested', 'Returns'],
            datasets: [{
                data: [1200000, 1123391],
                backgroundColor: ['#0e213b', '#4fc3dc'],
                borderWidth: 0
            }]
        },
        options: {
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    function calculateSIP() {
        let P = parseFloat(monthlyInput.value) || 0;
        let r = (parseFloat(rateInput.value) || 0) / 12 / 100;
        let n = (parseFloat(yearInput.value) || 0) * 12;

        if (r === 0) {
            // Simple calculation if interest rate is 0
            let investedAmt = P * n;
            updateUI(investedAmt, 0, investedAmt);
            return;
        }

        // SIP Formula: M = P × ({[1 + r]^n – 1} / r) × (1 + r)
        let totalValue = P * (((Math.pow(1 + r, n)) - 1) / r) * (1 + r);
        let investedAmt = P * n;
        let estReturns = totalValue - investedAmt;

        updateUI(investedAmt, estReturns, totalValue);
    }

    function updateUI(invested, returns, total) {
        // Update UI Text
        displayInvested.innerText = "₹ " + Math.round(invested).toLocaleString('en-IN');
        displayReturns.innerText = "₹ " + Math.round(returns).toLocaleString('en-IN');
        displayTotal.innerText = "₹ " + Math.round(total).toLocaleString('en-IN');

        // Update Chart
        sipChart.data.datasets[0].data = [invested, returns];
        sipChart.update();
    }

    function syncValues(e, target) {
        target.value = e.target.value;
        calculateSIP();
    }

    // Event Listeners for sync and calculation
    monthlyInput.addEventListener('input', (e) => syncValues(e, monthlySlider));
    monthlySlider.addEventListener('input', (e) => syncValues(e, monthlyInput));
    rateInput.addEventListener('input', (e) => syncValues(e, rateSlider));
    rateSlider.addEventListener('input', (e) => syncValues(e, rateInput));
    yearInput.addEventListener('input', (e) => syncValues(e, yearSlider));
    yearSlider.addEventListener('input', (e) => syncValues(e, yearInput));

    // Run calculation on load
    calculateSIP();
</script>

<?php include 'includes/footer.php'; ?>
<?php
ob_end_flush(); // Send the buffered output to the browser
?>