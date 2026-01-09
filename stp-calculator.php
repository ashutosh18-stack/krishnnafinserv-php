<?php include 'includes/header.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<br><br><br>

<section class="stp-section">
    <div class="stp-card">
        <h2 style="text-align:center;color:#112847">
            STP <span style="color:#3fc0d9">Calculator</span>
        </h2>
        <br><br>

        <div class="grid">
            <div>
                <div class="group">
                    <div class="label-row">
                        <label>Lumpsum</label>
                        <div class="input-wrap">₹ <input id="lump" value="500000" style="text-align: left; padding-left: 5px;"></div>
                    </div>
                    <input type="range" id="lumpS" min="10000" max="50000000" step="5000" value="500000">
                </div>

                <div class="group">
                    <div class="label-row">
                        <label>Tenure</label>
                        <div class="input-wrap"><input id="years" value="5" style="text-align: left; padding-left: 5px;"> Yr</div>
                    </div>
                    <input type="range" id="yearsS" min="1" max="30" value="5">
                </div>

                <div class="group">
                    <div class="label-row">
                        <label>Monthly STP</label>
                        <div class="input-wrap">₹ <input id="stp" value="10000" style="text-align: left; padding-left: 5px;"></div>
                    </div>
                    <input type="range" id="stpS" min="500" max="500000" step="500" value="10000">
                </div>

                <div class="group">
                    <div class="label-row">
                        <label>Target Return</label>
                        <div class="input-wrap"><input id="rt" value="12" style="text-align: left; padding-left: 5px;"> %</div>
                    </div>
                    <input type="range" id="rtS" min="1" max="20" step="0.1" value="12">
                </div>

                <div class="group">
                    <div class="label-row">
                        <label>Source Return</label>
                        <div class="input-wrap"><input id="rs" value="6" style="text-align: left; padding-left: 5px;"> %</div>
                    </div>
                    <input type="range" id="rsS" min="1" max="12" step="0.1" value="6">
                </div>
            </div>

            <div>
                <div class="stats">
                    <div class="stat"><small>Remaining Source</small><h4 id="srcVal">₹0</h4></div>
                    <div class="stat"><small>Target Value</small><h4 id="tarVal">₹0</h4></div>
                </div>

                <div class="chart-box"><canvas id="chart"></canvas></div>

                <div class="earn">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <div>
                        <small>Total Earnings</small>
                        <h3 id="earnVal">₹0</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const g = id => document.getElementById(id);

    // Initialize the Chart
    const chart = new Chart(g("chart"), {
        type: "doughnut",
        data: {
            labels: ["Source", "Target"],
            datasets: [{
                data: [0, 0],
                backgroundColor: ["#112847", "#3fc0d9"]
            }]
        },
        options: {
            cutout: "65%",
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    function calcSTP() {
        const P = parseFloat(g("lump").value) || 0;
        const W = parseFloat(g("stp").value) || 0;
        const years = parseFloat(g("years").value) || 0;
        const n = years * 12;

        const rs = (parseFloat(g("rs").value) || 0) / 100 / 12;
        const rt = (parseFloat(g("rt").value) || 0) / 100 / 12;

        // Number of months STP can run based on balance vs tenure
        const m = Math.min(n, Math.floor(P / W));

        // Source Fund Calculation (Reducing balance)
        let source = rs > 0 ? 
            P * Math.pow(1 + rs, m) - W * ((Math.pow(1 + rs, m) - 1) / rs) : 
            P - W * m;
        
        source = Math.max(source, 0);

        // Target Fund Calculation (Accumulating via SIP formula)
        let target = rt > 0 ? 
            W * ((Math.pow(1 + rt, m) - 1) / rt) * (1 + rt) : 
            W * m;

        const total = source + target;
        const earn = total - P;

        // Update UI Text
        g("srcVal").innerText = "₹ " + Math.round(source).toLocaleString("en-IN");
        g("tarVal").innerText = "₹ " + Math.round(target).toLocaleString("en-IN");
        g("earnVal").innerText = "₹ " + Math.round(earn).toLocaleString("en-IN");

        // Update Chart
        chart.data.datasets[0].data = [source, target];
        chart.update();
    }

    // Event listeners for inputs and sliders
    ["lump", "years", "stp", "rs", "rt"].forEach(id => {
        const input = g(id);
        const slider = g(id + "S");

        input.addEventListener("input", calcSTP);
        if (slider) {
            slider.addEventListener("input", e => {
                input.value = e.target.value;
                calcSTP();
            });
        }
    });

    // Initial Calculation
    calcSTP();
</script>

<?php include 'includes/footer.php'; ?>