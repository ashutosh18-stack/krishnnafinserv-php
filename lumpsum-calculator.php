<?php include 'includes/header.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<br><br><br>

<div class="main-container">
    <div class="calc-card">
        <h1 class="calc-title">Lumpsum <span>Calculator</span></h1>
        
        <div class="grid-layout">
            <div class="controls">
                <div class="input-row">
                    <label>Total Investment</label>
                    <div class="input-field">
                        <span>₹</span>
                        <input type="number" id="amt-input" value="100000" style="text-align: left; padding-left: 5px;">
                    </div>
                </div>
                <input type="range" id="amt-range" min="5000" max="10000000" step="5000" value="100000" class="slider">

                <div class="input-row">
                    <label>Expected Return Rate (p.a)</label>
                    <div class="input-field">
                        <input type="number" id="rate-input" value="12" style="text-align: left; padding-left: 5px;">
                        <span>%</span>
                    </div>
                </div>
                <input type="range" id="rate-range" min="1" max="30" step="0.5" value="12" class="slider">

                <div class="input-row">
                    <label>Time Period</label>
                    <div class="input-field">
                        <input type="number" id="year-input" value="10" style="text-align: left; padding-left: 5px;">
                        <span>Yr</span>
                    </div>
                </div>
                <input type="range" id="year-range" min="1" max="40" value="10" class="slider">

                <div class="result-box">
                    <div class="res-item">
                        <span>Invested Amount</span>
                        <span id="res-invested">₹ 1,00,000</span>
                    </div>
                    <div class="res-item">
                        <span>Est. Returns</span>
                        <span id="res-returns" class="cyan-text">₹ 2,10,585</span>
                    </div>
                    <div class="res-total">
                        <span>Total Value</span>
                        <span id="res-total">₹ 3,10,585</span>
                    </div>
                </div>
            </div>

            <div class="chart-container">
                <div class="canvas-wrapper">
                    <canvas id="lumpsumChart"></canvas>
                </div>
                <div class="legend">
                    <div class="legend-item"><span class="dot invested"></span> Invested</div>
                    <div class="legend-item"><span class="dot returns"></span> Returns</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const amtInput = document.getElementById('amt-input');
const amtRange = document.getElementById('amt-range');
const rateInput = document.getElementById('rate-input');
const rateRange = document.getElementById('rate-range');
const yearInput = document.getElementById('year-input');
const yearRange = document.getElementById('year-range');

const resInvested = document.getElementById('res-invested');
const resReturns = document.getElementById('res-returns');
const resTotal = document.getElementById('res-total');

const ctx = document.getElementById('lumpsumChart').getContext('2d');
let lumpsumChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Invested', 'Returns'],
        datasets: [{
            data: [100000, 210585],
            backgroundColor: ['#0e213b', '#4dc3db'],
            borderWidth: 0,
            hoverOffset: 4
        }]
    },
    options: {
        cutout: '75%',
        plugins: { legend: { display: false } }
    }
});

function calculateLumpsum() {
    const P = parseFloat(amtInput.value) || 0;
    const r = (parseFloat(rateInput.value) || 0) / 100;
    const n = parseFloat(yearInput.value) || 0;

    // Lumpsum Formula: A = P(1 + r)^n
    const totalValue = P * Math.pow((1 + r), n);
    const estReturns = totalValue - P;

    const format = (v) => "₹ " + Math.round(v).toLocaleString('en-IN');

    resInvested.innerText = format(P);
    resReturns.innerText = format(Math.max(0, estReturns));
    resTotal.innerText = format(Math.max(P, totalValue));

    lumpsumChart.data.datasets[0].data = [P, Math.max(0, estReturns)];
    lumpsumChart.update();
}

function sync(a, b) {
    a.addEventListener('input', () => { b.value = a.value; calculateLumpsum(); });
    b.addEventListener('input', () => { a.value = b.value; calculateLumpsum(); });
}

sync(amtInput, amtRange);
sync(rateInput, rateRange);
sync(yearInput, yearRange);

// Initial Calculation
calculateLumpsum();
</script>

<?php include 'includes/footer.php'; ?>