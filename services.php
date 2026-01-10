<?php
ob_start("ob_gzhandler");
?>
<?php include 'includes/header.php'; ?>

    <br><br><br><br>

    <div class="serv-hero-slider">
        <div class="serv-slider-inner" id="serv-slider-inner">
            <div class="serv-slide-item">
                <picture>
                    <source media="(max-width: 768px)" srcset="static/img/mbanner1.png">
                    <img src="static/img/banner1.png" alt="SIP Planning Desktop">
                </picture>
            </div>
            <div class="serv-slide-item">
                <picture>
                    <source media="(max-width: 768px)" srcset="static/img/mbanner2.png">
                    <img src="static/img/banner2.png" alt="SWP Solutions Desktop">
                </picture>
            </div>
            <div class="serv-slide-item">
                <picture>
                    <source media="(max-width: 768px)" srcset="static/img/mbanner3.png">
                    <img src="static/img/banner3.png" alt="STP Strategies Desktop">
                </picture>
            </div>
            <div class="serv-slide-item">
                <picture>
                    <source media="(max-width: 768px)" srcset="static/img/mbanner4.png">
                    <img src="static/img/banner4.png" alt="Retirement Planning Desktop">
                </picture>
            </div>
        </div>

        <div class="dot-nav" id="dot-nav">
            <span class="nav-dot active" onclick="jumpToSlide(0)"></span>
            <span class="nav-dot" onclick="jumpToSlide(1)"></span>
            <span class="nav-dot" onclick="jumpToSlide(2)"></span>
            <span class="nav-dot" onclick="jumpToSlide(3)"></span>
        </div>
    </div>

    <section class="services-section">
        <div class="serv-container">
            <h1 class="serv-section-title">Our Expert <span class="serv-cyan-text">Services</span></h1>
            <p class="serve-lead" style="margin-top: -45px; text-align: center;">
                Your investments are structured as per your risk appetite and time horizon.
            </p>

            <br>

            <div class="serv-services-grid">
                <div class="serv-service-card" onclick="openService('MUTUALFUND')">
                    <div class="serv-icon-box"><i class="fa-solid fa-chart-line"></i></div>
                    <h3>Mutual Fund Investments</h3>
                    <p>Access professionally managed portfolios designed to match your specific risk appetite and wealth goals.</p>
                    <span class="serv-learn-more">Explore Details <i class="fa-solid fa-arrow-right"></i></span>
                </div>

                <div class="serv-service-card" onclick="openService('SIP')">
                    <div class="serv-icon-box"><i class="fa-solid fa-piggy-bank"></i></div>
                    <h3>SIP Planning</h3>
                    <p>Build wealth systematically with disciplined monthly contributions and the power of compounding.</p>
                    <span class="serv-learn-more">Start Investing <i class="fa-solid fa-arrow-right"></i></span>
                </div>

                <div class="serv-service-card" onclick="openService('SWP')">
                    <div class="serv-icon-box"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                    <h3>SWP Solutions</h3>
                    <p>Transform your accumulated corpus into a steady, tax-efficient monthly cash flow for your lifestyle needs.</p>
                    <span class="serv-learn-more">View Income Plans <i class="fa-solid fa-arrow-right"></i></span>
                </div>

                <div class="serv-service-card" onclick="openService('STP')">
                    <div class="serv-icon-box"><i class="fa-solid fa-shuffle"></i></div>
                    <h3>STP Strategies</h3>
                    <p>Mitigate market entry risk by systematically transferring capital from debt to equity or vice-versa for stable growth.</p>
                    <span class="serv-learn-more">Explore Strategies <i class="fa-solid fa-arrow-right"></i></span>
                </div>

                <div class="serv-service-card" onclick="openService('GOAL')">
                    <div class="serv-icon-box"><i class="fa-solid fa-bullseye"></i></div>
                    <h3>Goal-Based Planning</h3>
                    <p>Align your finances with life milestones like child education, dream home, or global travel.</p>
                    <span class="serv-learn-more">Plan Your Goals <i class="fa-solid fa-arrow-right"></i></span>
                </div>

                <div class="serv-service-card" onclick="openService('ELSS')">
                    <div class="serv-icon-box"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3>ELSS (Tax Saving)</h3>
                    <p>Maximize your Section 80C benefits while participating in the wealth-creation potential of the stock market.</p>
                    <span class="serv-learn-more">Save Tax Now <i class="fa-solid fa-arrow-right"></i></span>
                </div>

                <div class="serv-service-card" onclick="openService('TAX')">
                    <div class="serv-icon-box"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                    <h3>Tax Planning</h3>
                    <p>Optimize your tax liability across various regimes to ensure your net-in-hand income is maximized legally.</p>
                    <span class="serv-learn-more">View Tax Guide <i class="fa-solid fa-arrow-right"></i></span>
                </div>

                <div class="serv-service-card" onclick="openService('REVIEW')">
                    <div class="serv-icon-box"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
                    <h3>Portfolio Review</h3>
                    <p>Identify underperforming assets and rebalance your portfolio to stay resilient against market volatility.</p>
                    <span class="serv-learn-more">Analyze Portfolio <i class="fa-solid fa-arrow-right"></i></span>
                </div>

                <div class="serv-service-card" onclick="openService('FD_ALT')">
                    <div class="serv-icon-box"><i class="fa-solid fa-building-columns"></i></div>
                    <h3>FD Alternatives</h3>
                    <p>Achieve better post-tax returns and higher liquidity compared to traditional fixed deposits using debt funds.</p>
                    <span class="serv-learn-more">Compare Options <i class="fa-solid fa-arrow-right"></i></span>
                </div>

                <div class="serv-service-card" onclick="openService('LAS')">
                    <div class="serv-icon-box"><i class="fa-solid fa-vault"></i></div>
                    <h3>Loan Against Securities</h3>
                    <p>Access instant liquidity for emergencies or business needs without liquidating your long-term investments.</p>
                    <span class="serv-learn-more">Get Liquidity <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </div>
        </div>
    </section>

    <div id="fullPagePopup" class="serv-full-page-overlay">
        <button class="serv-exit-btn" onclick="closeFullPage()">&times;</button>
        <div class="serv-popup-scroll-area">
            <div class="serv-popup-inner">
                <h2 id="pTitle"></h2>
                <div class="serv-divider"></div>
                <p id="pIntro" class="serv-lead-text"></p>
                <div class="serv-info-details-grid" id="dynamicInfoGrid"></div>
                <div class="serv-popup-actions">
                    <button class="serv-btn-calc" onclick="window.location.href='contact.php'">Inquiry</button>
                    <button class="serv-btn-back" onclick="closeFullPage()">Back to Services</button>
                </div>
            </div>
        </div>
    </div>

<?php include 'includes/footer.php'; ?>
<?php
ob_end_flush(); // Send the buffered output to the browser
?>