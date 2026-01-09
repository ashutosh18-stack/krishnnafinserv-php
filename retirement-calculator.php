<?php include 'includes/header.php'; ?>
<style>
    :root {
    --navy: #112847;
    --cyan: #3fc0d9;
    --white: #ffffff;
    --bg-light: #f4f7fa;
}

.ret-planner-section { padding: 60px 20px; background: #f1f5f9; display: flex; justify-content: center; }
.ret-planner-card { background: var(--white); max-width: 1100px; width: 100%; border-radius: 20px; padding: 40px; box-shadow: 0 20px 40px rgba(17, 40, 71, 0.08); }
.ret-planner-header { text-align: center; margin-bottom: 40px; }
.ret-planner-header h2 { color: var(--navy); font-size: 2.2rem; }
.cyan-text { color: var(--cyan); }

.ret-planner-grid { display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 60px; }

/* Input Styling */
.ret-planner-input-group { margin-bottom: 25px; }
.ret-planner-label-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
.ret-planner-label-row label { font-weight: 600; color: var(--navy); font-size: 0.95rem; }

.ret-planner-manual-box { background: var(--bg-light); padding: 6px 12px; border-radius: 6px; border: 1.5px solid #e2e8f0; display: flex; align-items: center; }
.active-border { border-color: var(--navy); } /* Replicating reference image focus */

.ret-planner-manual-box input { border: none; background: transparent; width: 85px; text-align: right; font-weight: 700; color: var(--navy); outline: none; }
.ret-planner-manual-box span { color: #64748b; font-weight: 600; margin-left: 5px; font-size: 0.85rem; }

input[type="range"] { width: 100%; accent-color: var(--cyan); cursor: pointer; }

/* Result Panel Styling */
.ret-planner-stats { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 30px; }
.ret-stat-item { background: var(--bg-light); padding: 15px; border-radius: 12px; text-align: left; }
.ret-stat-item small { color: #64748b; font-size: 0.8rem; display: block; margin-bottom: 5px; }
.ret-stat-item h4 { color: var(--navy); font-size: 1.1rem; font-weight: 800; }
.highlight-box { border-bottom: 3px solid var(--cyan); }

.ret-investment-summary { background: var(--navy); color: white; padding: 25px; border-radius: 12px; text-align: center; margin-top: 25px; }
.ret-investment-summary span { display: block; font-size: 0.85rem; opacity: 0.8; margin-bottom: 5px; }
.ret-investment-summary h3 { color: var(--cyan); font-size: 1.8rem; font-weight: 800; }

.ret-action-btn { width: 100%; background: var(--cyan); color: white; border: none; padding: 16px; border-radius: 8px; font-weight: 700; margin-top: 20px; cursor: pointer; transition: 0.3s; }
.ret-action-btn:hover { background: var(--navy); }

.ret-chart-area { max-width: 250px; margin: 0 auto; }

/* Responsive */
@media (max-width: 992px) {
    .ret-planner-grid { grid-template-columns: 1fr; }
    .ret-chart-area { display: none; } /* Pie chart hides on mobile as requested */
}
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<br><br><br>

<section class="ret-planner-section">
    <div class="ret-planner-card">
        <div class="ret-planner-header">
            <h2>Retirement <span class="cyan-text">Planner</span></h2>
            <p>Plan your future security with mathematical precision.</p>
        </div>

        <div class="ret-planner-grid">
            <div class="ret-planner-inputs">
                
                <div class="ret-planner-input-group">
                    <div class="ret-planner-label-row">
                        <label>Current Age</label>
                        <div class="ret-planner-manual-box">
                            <input type="number" id="current-age-num" value="30" style="text-align: left; padding-left: 5px;">
                            <span>Year</span>
                        </div>
                    </div>
                    <input type="range" id="current-age-slide" min="18" max="60" value="30">
                </div>

                <div class="ret-planner-input-group">
                    <div class="ret-planner-label-row">
                        <label>Retirement Age</label>
                        <div class="ret-planner-manual-box">
                            <input type="number" id="ret-age-num" value="60" style="text-align: left; padding-left: 5px;">
                            <span>Year</span>
                        </div>
                    </div>
                    <input type="range" id="ret-age-slide" min="40" max="75" value="60">
                </div>

                <div class="ret-planner-input-group">
                    <div class="ret-planner-label-row">
                        <label>Expected Lifespan</label>
                        <div class="ret-planner-manual-box">
                            <input type="number" id="lifespan-num" value="85" style="text-align: left; padding-left: 5px;">
                            <span>Year</span>
                        </div>
                    </div>
                    <input type="range" id="lifespan-slide" min="70" max="100" value="85">
                </div>

                <div class="ret-planner-input-group">
                    <div class="ret-planner-label-row">
                        <label>Current Monthly Expenses</label>
                        <div class="ret-planner-manual-box">
                            <span>₹</span>
                            <input type="number" id="expenses-num" value="50000" style="text-align: left; padding-left: 5px;">
                        </div>
                    </div>
                    <input type="range" id="expenses-slide" min="5000" max="500000" step="1000" value="50000">
                </div>

                <div class="ret-planner-input-group">
                    <div class="ret-planner-label-row">
                        <label>Expected Inflation</label>
                        <div class="ret-planner-manual-box">
                            <input type="number" id="inflation-num" value="6" step="0.1" style="text-align: left; padding-left: 5px;">
                            <span>%</span>
                        </div>
                    </div>
                    <input type="range" id="inflation-slide" min="1" max="15" step="0.1" value="6">
                </div>

                <div class="ret-planner-input-group">
                    <div class="ret-planner-label-row">
                        <label>Post-retirement investment return</label>
                        <div class="ret-planner-manual-box active-border">
                            <input type="number" id="post-ret-num" value="8" step="0.1" style="text-align: left; padding-left: 5px;">
                            <span>%</span>
                        </div>
                    </div>
                    <input type="range" id="post-ret-slide" min="1" max="15" step="0.1" value="8">
                </div>

                <div class="ret-planner-input-group">
                    <div class="ret-planner-label-row">
                        <label>Pre-retirement investment return</label>
                        <div class="ret-planner-manual-box">
                            <input type="number" id="pre-ret-num" value="12" step="0.1" style="text-align: left; padding-left: 5px;">
                            <span>%</span>
                        </div>
                    </div>
                    <input type="range" id="pre-ret-slide" min="1" max="25" step="0.1" value="12">
                </div>
            </div>

            <div class="ret-planner-results">
                <div class="ret-planner-stats">
                    <div class="ret-stat-item">
                        <small>Monthly expense at retirement</small>
                        <h4 id="res-monthly-exp">₹ 0</h4>
                    </div>
                    <div class="ret-stat-item highlight-box">
                        <small>Retirement corpus</small>
                        <h4 id="res-corpus">₹ 0</h4>
                    </div>
                </div>

                <div class="ret-chart-area">
                    <canvas id="retPlannerChart"></canvas>
                </div>

                <div class="ret-investment-summary">
                    <span>Required monthly investment</span>
                    <h3 id="res-monthly-inv">₹ 0</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
    // UI Elements
    const ui = {
        curAgeS: document.getElementById('current-age-slide'), curAgeN: document.getElementById('current-age-num'),
        retAgeS: document.getElementById('ret-age-slide'), retAgeN: document.getElementById('ret-age-num'),
        lifeS: document.getElementById('lifespan-slide'), lifeN: document.getElementById('lifespan-num'),
        expS: document.getElementById('expenses-slide'), expN: document.getElementById('expenses-num'),
        infS: document.getElementById('inflation-slide'), infN: document.getElementById('inflation-num'),
        postS: document.getElementById('post-ret-slide'), postN: document.getElementById('post-ret-num'),
        preS: document.getElementById('pre-ret-slide'), preN: document.getElementById('pre-ret-num')
    };

    // Doughnut Chart Initialization
    const ctx = document.getElementById('retPlannerChart').getContext('2d');
    let retChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Corpus Required', 'Current Gap'],
            datasets: [{
                data: [0, 100],
                backgroundColor: ['#3fc0d9', '#112847'],
                borderWidth: 0
            }]
        },
        options: { cutout: '55%', plugins: { legend: { display: false } } }
    });

    function calculateRetirement() {
        const curAge = parseInt(ui.curAgeN.value) || 0;
        const retAge = parseInt(ui.retAgeN.value) || 0;
        const lifeExp = parseInt(ui.lifeN.value) || 0;
        const monthlyExp = parseFloat(ui.expN.value) || 0;
        const inflation = (parseFloat(ui.infN.value) || 0) / 100;
        const preReturn = (parseFloat(ui.preN.value) || 0) / 100;
        const postReturn = (parseFloat(ui.postN.value) || 0) / 100;

        const yrsToRet = retAge - curAge;
        const yrsPostRet = lifeExp - retAge;

        if (yrsToRet <= 0 || yrsPostRet <= 0) {
            updateUI(0, 0, 0);
            return;
        }

        // 1. Inflated Monthly Expense at retirement start
        const futMonthlyExp = monthlyExp * Math.pow(1 + inflation, yrsToRet);
        
        // 2. Real Rate of Return (Post-retirement)
        const realRate = ((1 + postReturn) / (1 + inflation)) - 1;

        // 3. Retirement Corpus (Annuity Calculation - PV of monthly expenses)
        const corpus = futMonthlyExp * 12 * ((1 - Math.pow(1 + realRate, -yrsPostRet)) / realRate);

        // 4. Monthly SIP needed today to reach that corpus (FV of Annuity)
        const monthlyRate = preReturn / 12;
        const totalMonths = yrsToRet * 12;
        const monthlyInv = corpus * (monthlyRate / (Math.pow(1 + monthlyRate, totalMonths) - 1));

        updateUI(futMonthlyExp, corpus, monthlyInv);
    }

    function updateUI(futExp, corpus, sip) {
        document.getElementById('res-monthly-exp').innerText = "₹ " + Math.round(futExp).toLocaleString('en-IN');
        document.getElementById('res-corpus').innerText = "₹ " + Math.round(corpus).toLocaleString('en-IN');
        document.getElementById('res-monthly-inv').innerText = "₹ " + Math.round(sip).toLocaleString('en-IN');

        // Update Chart visualization
        retChart.data.datasets[0].data = [corpus, Math.max(corpus / 2, 1000000)]; 
        retChart.update();
    }

    // Two-way Sync setup
    function setupSync(slide, num) {
        slide.addEventListener('input', () => { num.value = slide.value; calculateRetirement(); });
        num.addEventListener('input', () => { slide.value = num.value; calculateRetirement(); });
    }

    Object.keys(ui).forEach(key => {
        if (key.endsWith('S')) {
            const prefix = key.slice(0, -1);
            setupSync(ui[key], ui[prefix + 'N']);
        }
    });

    calculateRetirement();
});
</script>

<?php include 'includes/footer.php'; ?>