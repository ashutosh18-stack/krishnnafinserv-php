<?php
// Include header and config
include 'includes/header.php';
include 'config.php'; // This will load $market_indices
?>
<?php include 'includes/header.php'; ?>

<section class="hero-section">
        <div class="hero-content">
            <h1 class="main-title" style="color: #ffffff;">
                Smart investments start with the <br>
                right <span class="type-wrap"><span id="dynamic-text" class="purple-text">guidance.</span><span class="cursor">|</span></span>
            </h1>
            <p class="hero-subtext">Goal-based investing- Risk aware advice- Long-term focus.</p>
        </div>
    </section>

    <section class="trust-section">
        <div class="split-container">
            <div class="video-block scroll-reveal-left">
                <div class="video-wrapper">
                    <video autoplay muted loop playsinline class="vertical-vid">
                        <source src="static/img/video.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="video-overlay"></div>
                </div>
            </div>

            <div class="content-block scroll-reveal-right">
                <h2 class="sub-title">Krishnna FinServe</h2>
                <h2 class="main-title">Legacy of <span class="accent">Trust</span>, Driven by <span class="accent">Data</span></h2>
                <p class="description">
                    At Krishnna FinServe, we combine decades of financial wisdom with modern algorithmic precision. 
                    Our credentials aren't just numbers on a page, they are the success stories of multiple families 
                    who secured their future through our strategic planning.
                </p>

                <div class="credentials-grid">
                    <div class="stat-item">
                        <h3>13+</h3>
                        <p>Years Experience</p>
                    </div>

                    <div class="stat-item">
                        <h3>350+</h3>
                        <p>Happy Families</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="offer-section">
        <div class="offer-container">
            <div class="offer-header">
                <h2 class="offer-title">What We <span class="purple-text">Offer</span></h2>
                <p class="offer-subtitle">Strategic financial planning tailored for your long-term growth.</p>
            </div>

            <div class="offer-grid">
                <div class="offer-box reveal-left">
                    <div class="img-square"><img src="static/img/mutualfund.png" alt="Mutual Funds"></div>
                    <h3>Mutual Funds</h3>
                </div>
                <div class="offer-box reveal-left">
                    <div class="img-square"><img src="static/img/lifeinsurence.png" alt="Insurance"></div>
                    <h3>Health Insurance</h3>
                </div>
                <div class="offer-box reveal-left">
                    <div class="img-square"><img src="static/img/market.png" alt="Stocks"></div>
                    <h3>Stocks</h3>
                </div>

                <div class="offer-box reveal-right">
                    <div class="img-square"><img src="static/img/retirement.png" alt="Retirement"></div>
                    <h3>Retirement Planning</h3>
                </div>
                <div class="offer-box reveal-right">
                    <div class="img-square"><img src="static/img/tax.png" alt="Tax"></div>
                    <h3>Tax Savings</h3>
                </div>
                <div class="offer-box reveal-right">
                    <div class="img-square"><img src="static/img/child.png" alt="Estate"></div>
                    <h3>Secure Child Future </h3>
                </div>
            </div>
        </div>
    </section>

    <div class="slogan-container">
        <h2 class="premium-slogan">
            <span class="top-line">Growing Your <span class="accent">Assets,</span> <br>Guarding Your <span class="accent">Future.</span></span>
        </h2>
    </div>

<!-- Ticker Section -->
<div class="ticker-wrap">
    <div class="ticker">
        <?php if (!empty($market_indices)): ?>
            <?php foreach ($market_indices as $item): ?>
                <div class="ticker__item">
                    <span class="ticker__name"><?php echo htmlspecialchars($item['name']); ?></span>
                    <span class="ticker__price"><?php echo htmlspecialchars($item['price']); ?></span>
                    <span class="ticker__pct <?php echo htmlspecialchars($item['class']); ?>">
                        <?php echo htmlspecialchars($item['pct']); ?>
                    </span>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="ticker__item text-muted">Market data loading...</div>
        <?php endif; ?>
    </div>
</div>


    <section class="logo-slider-section">
        <div class="slider-container">
            <div class="logo-track">
                <div class="logo-slide"><img src="static/img/kotak.png" alt="Partner 1"></div>
                <div class="logo-slide"><img src="static/img/aditya.png" alt="Partner 2"></div>
                <div class="logo-slide"><img src="static/img/nippon.png" alt="Partner 3"></div>
                <div class="logo-slide"><img src="static/img/sbimf.png" alt="Partner 4"></div>
                <div class="logo-slide"><img src="static/img/baroda.png" alt="Partner 5"></div>
                <div class="logo-slide"><img src="static/img/tatamf.png" alt="Partner 6"></div>
                <div class="logo-slide"><img src="static/img/bajaj.png" alt="Partner 7"></div>
                <div class="logo-slide"><img src="static/img/union.png" alt="Partner 8"></div>
                <div class="logo-slide"><img src="static/img/icic.png" alt="Partner 9"></div>
                <div class="logo-slide"><img src="static/img/hdfc.png" alt="Partner 10"></div>
                <div class="logo-slide"><img src="static/img/edelweiss.png" alt="Partner 11"></div>
                <div class="logo-slide"><img src="static/img/sundaram.png" alt="Partner 12"></div>
                <div class="logo-slide"><img src="static/img/dsp.png" alt="Partner 13"></div>
                <div class="logo-slide"><img src="static/img/AMC.png" alt="Partner 14"></div>
            </div>
        </div>
        <p class="offer-subtitle" style="margin-top:30px; color: #4B5563; font-size: 20px; text-align: center; margin-bottom: -30px;">Including & Across All AMCs</p>
    </section>

<?php include 'includes/footer.php'; ?>