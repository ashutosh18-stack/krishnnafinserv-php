<?php include 'includes/header.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<br><br><br>

<div class="swp-calculator-panel">
    <div class="swp-card">
        <h2 class="swp-title">SWP <span>Calculator</span></h2>

        <div class="swp-grid">
            <div class="swp-inputs">
                <div class="swp-group">
                    <div class="swp-label-row">
                        <label>Total Investment</label>
                        <div class="swp-num-box">₹ <input type="number" id="total-inv" value="1000000" style="text-align: left; padding-left: 5px;"></div>
                    </div>
                    <input type="range" id="total-inv-s" min="10000" max="10000000" step="10000" value="1000000">
                </div>

                <div class="swp-group">
                    <div class="swp-label-row">
                        <label>Withdrawal per month</label>
                        <div class="swp-num-box">₹ <input type="number" id="withdraw" value="10000" style="text-align: left; padding-left: 5px;"></div>
                    </div>
                    <input type="range" id="withdraw-s" min="500" max="100000" step="500" value="10000">
                </div>

                <div class="swp-group">
                    <div class="swp-label-row">
                        <label>Expected Return Rate (p.a)</label>
                        <div class="swp-num-box"><input type="number" id="rate" value="12" style="text-align: left; padding-left: 5px;"> %</div>
                    </div>
                    <input type="range" id="rate-s" min="1" max="30" step="0.5" value="12">
                </div>

                <div class="swp-group">
                    <div class="swp-label-row">
                        <label>Time Period</label>
                        <div class="swp-num-box"><input type="number" id="years" value="10" style="text-align: left; padding-left: 5px;"> Yr</div>
                    </div>
                    <input type="range" id="years-s" min="1" max="40" value="10">
                </div>

                <div class="swp-result-card">
                    <div class="res-line">
                        <span>Invested Amount</span>
                        <span id="disp-inv">₹ 10,00,000</span>
                    </div>
                    <div class="res-line">
                        <span>Total Withdrawal</span>
                        <span id="disp-withdraw">₹ 12,00,000</span>
                    </div>
                    <div class="res-line total">
                        <strong>Final Value</strong>
                        <strong id="disp-final">₹ 11,04,605</strong>
                    </div>
                </div>
            </div>

            <div class="swp-visual">
                <canvas id="swpChart"></canvas>
                <div class="chart-legend">
                    <div class="leg-item"><span class="dot navy"></span> Invested</div>
                    <div class="leg-item"><span class="dot cyan"></span> Withdrawal</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const g = id => document.getElementById(id);

    // Initialize Chart
    const ctx = g('swpChart').getContext('2d');
    let swpChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Final Value', 'Withdrawal'],
            datasets: [{
                data: [0, 0],
                backgroundColor: ['#112847', '#3fc0d9'],
                borderWidth: 0
            }]
        },
        options: { 
            cutout: '70%', 
            plugins: { legend: { display: false } } 
        }
    });

    function calculate() {
        const principal = parseFloat(g('total-inv').value) || 0;
        const withdrawal = parseFloat(g('withdraw').value) || 0;
        const rate = (parseFloat(g('rate').value) / 100) / 12;
        const months = parseInt(g('years').value) * 12;

        let balance = principal;
        let totalWithdrawn = 0;

        for (let i = 0; i < months; i++) {
            balance += (balance * rate);
            let actualWithdraw = Math.min(balance, withdrawal);
            balance -= actualWithdraw;
            totalWithdrawn += actualWithdraw;
            if (balance <= 0) break;
        }

        const fmt = new Intl.NumberFormat('en-IN', { 
            style: 'currency', 
            currency: 'INR', 
            maximumFractionDigits: 0 
        });

        g('disp-inv').innerText = fmt.format(principal);
        g('disp-withdraw').innerText = fmt.format(totalWithdrawn);
        g('disp-final').innerText = fmt.format(Math.max(0, balance));

        swpChart.data.datasets[0].data = [Math.max(0, balance), totalWithdrawn];
        swpChart.update();
    }

    // Sync Sliders and Inputs
    ['total-inv', 'withdraw', 'rate', 'years'].forEach(id => {
        const input = g(id);
        const slider = g(id + '-s');
        input.addEventListener('input', () => { 
            slider.value = input.value; 
            calculate(); 
        });
        slider.addEventListener('input', () => { 
            input.value = slider.value; 
            calculate(); 
        });
    });

    calculate();
});
</script>

<?php include 'includes/footer.php'; ?>