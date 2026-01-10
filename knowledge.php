<?php
ob_start(); // Start output buffering
?>
<?php 
// Include header
include 'includes/header.php';

// Load configuration and PHPMailer
require_once 'config.php';
require 'vendor/phpmailer/Exception.php';
require 'vendor/phpmailer/PHPMailer.php';
require 'vendor/phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message_status = "";

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // SMTP Settings
        $mail->isSMTP();
        $mail->Host       = MAIL_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = MAIL_USERNAME;
        $mail->Password   = MAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = MAIL_PORT;

        // Email Configuration
        $mail->setFrom(MAIL_FROM_EMAIL, MAIL_FROM_NAME);
        $mail->addAddress(MAIL_FROM_EMAIL);  

        $mail->isHTML(true);
        $mail->Subject = "New Knowledge Center Inquiry: " . $_POST['name'];
        $mail->Body    = "<h3>New Inquiry Received</h3>
                          <p><b>Name:</b> " . htmlspecialchars($_POST['name']) . "</p>
                          <p><b>Phone:</b> " . htmlspecialchars($_POST['phone']) . "</p>
                          <p><b>Email:</b> " . htmlspecialchars($_POST['email']) . "</p>
                          <p><b>Message:</b><br>" . nl2br(htmlspecialchars($_POST['message'])) . "</p>";

        $mail->send();
        $message_status = "success";
    } catch (Exception $e) {
        $message_status = "error";
    }
}
?>


    <br><br><br><br>
    <header class="know-hero">
        <div class="know-container">
            <h1>Knowledge Center</h1>
            <p>Empowering your financial journey with expert insights.</p>
            <br>
            <div class="know-search-wrapper">
                <i class="fa-solid fa-magnifying-glass know-search-icon"></i>
                <input type="text" id="faqSearch" class="know-search-input" placeholder="Search SIP, SWP, Taxation..."
                    onkeyup="filterFAQs()">
            </div>
        </div>
    </header>

    <div class="know-container">
         <section class="know-faq-section">
            <div id="faqContainer">
                <div class="know-faq-item">
                    <div class="know-faq-q" onclick="toggleFAQ(this)">
                        <span>1. What is a Mutual Fund and how does it benefit me?</span>
                        <i class="fa-solid fa-chevron-down know-faq-icon"></i>
                    </div>
                    <div class="know-faq-a">
                        <p>A Mutual Fund is a pool of money managed by a professional fund manager. It invests in a
                            diversified portfolio of stocks, bonds, or other securities. The primary benefit is
                            professional management and diversification, which reduces risk compared to investing in a
                            single stock. It allows small investors access to professionally managed, large-scale
                            portfolios.</p>
                    </div>
                </div>

                <div class="know-faq-item">
                    <div class="know-faq-q" onclick="toggleFAQ(this)">
                        <span>2. What is an SIP and why is it better than lump sum?</span>
                        <i class="fa-solid fa-chevron-down know-faq-icon"></i>
                    </div>
                    <div class="know-faq-a">
                        <p>A Systematic Investment Plan (SIP) allows you to invest a fixed amount regularly
                            (monthly/quarterly). It is better for most investors because it utilizes "Rupee Cost
                            Averaging," where you buy more units when markets are low and fewer when markets are high.
                            This removes the need to time the market and builds a disciplined savings habit.</p>
                    </div>
                </div>

                <div class="know-faq-item">
                    <div class="know-faq-q" onclick="toggleFAQ(this)">
                        <span>3. Is PAN and KYC mandatory for investing?</span>
                        <i class="fa-solid fa-chevron-down know-faq-icon"></i>
                    </div>
                    <div class="know-faq-a">
                        <p>Yes, per SEBI regulations, a PAN card is mandatory. KYC (Know Your Customer) is a one-time
                            process to verify your identity. You need to provide your PAN, Aadhaar (or other OVD), and
                            address proof. Once your KYC is "Verified" or "Registered," you can invest across any mutual
                            fund house in India without repeating the process.</p>
                    </div>
                </div>

                <div class="know-faq-item">
                    <div class="know-faq-q" onclick="toggleFAQ(this)">
                        <span>4. What exactly is NAV (Net Asset Value)?</span>
                        <i class="fa-solid fa-chevron-down know-faq-icon"></i>
                    </div>
                    <div class="know-faq-a">
                        <p>NAV represents the market value of one unit of a mutual fund scheme. It is calculated at the
                            end of every business day by taking the total value of the fund's assets, subtracting its
                            liabilities, and dividing by the number of units. It’s the price at which you buy or sell
                            units of a fund.</p>
                    </div>
                </div>

                <div class="know-faq-item">
                    <div class="know-faq-q" onclick="toggleFAQ(this)">
                        <span>5. Can I withdraw my money from Mutual Funds at any time?</span>
                        <i class="fa-solid fa-chevron-down know-faq-icon"></i>
                    </div>
                    <div class="know-faq-a">
                        <p>For open-ended funds, yes, you can withdraw (redeem) your money on any business day. Most
                            equity and debt funds credit the money to your bank account within 1 to 3 working days.
                            However, certain funds like ELSS have a 3-year lock-in period, and some may have a small
                            "Exit Load" if you withdraw very early.</p>
                    </div>
                </div>

                <div id="extraFaqs" style="display: none;">

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>6. What is the difference between Direct
                                and Regular plans?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>A Direct plan has a lower expense ratio because no commission is paid to a distributor,
                                leading to slightly higher returns. A Regular plan includes a commission for the
                                advisor/distributor who provides guidance, tracking, and manual support for your
                                investments.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>7. What is a Systematic Withdrawal Plan
                                (SWP)?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>SWP allows you to withdraw a fixed amount of money from your mutual fund at regular
                                intervals (usually monthly). It is the opposite of an SIP and is ideal for retirees who
                                need a regular "salary" from their accumulated wealth while the rest of the corpus
                                continues to grow.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>8. How does an STP (Systematic Transfer
                                Plan) help?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>STP is used when you have a large amount of cash. You invest it in a safe Debt/Liquid
                                fund and transfer a fixed portion into an Equity fund every month. This protects your
                                capital while gradually moving it into the stock market to manage volatility.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>9. What is an ELSS fund?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>ELSS (Equity Linked Savings Scheme) is a type of mutual fund that qualifies for tax
                                deduction under Section 80C. It has a mandatory lock-in period of 3 years and primarily
                                invests in equity markets, offering both tax savings and capital growth.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>10. What is an Exit Load?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Exit load is a fee charged by the fund house if you redeem your units before a specific
                                period (usually 1 year). It is meant to discourage short-term withdrawals and protect
                                long-term investors. Not all funds have an exit load.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>11. What is LTCG in Mutual
                                Funds?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Long Term Capital Gains (LTCG) apply to profits made after holding equity funds for more
                                than 1 year. Gains above ₹1.25 lakh per year are taxed at 12.5%. For debt funds, LTCG is
                                now taxed as per your income tax slab.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>12. What is STCG in Mutual
                                Funds?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Short Term Capital Gains (STCG) apply to profits from equity funds held for less than 1
                                year, taxed at 20%. For debt funds, STCG applies to holdings less than 3 years and is
                                taxed at your income slab rate.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>13. Can I pause my SIP instead of
                                stopping it?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Yes, many fund houses offer an "SIP Pause" facility for 1 to 3 months. This is helpful if
                                you are facing a temporary cash crunch and don't want to cancel your long-term
                                investment plan.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>14. What is a Liquid Fund?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Liquid funds invest in very short-term debt instruments like treasury bills. They are
                                very low risk and offer higher returns than a standard savings account, making them
                                perfect for parking emergency funds.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>15. What are the different types of
                                Equity Funds?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Equity funds include Large Cap (top 100 companies), Mid Cap (101-250), Small Cap (251+),
                                Flexi Cap (mix of all sizes), and Sectoral Funds (focused on one industry like Banking
                                or IT).</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>16. What is a Hybrid Fund?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Hybrid funds invest in a mix of both Equity and Debt. They provide a balance between
                                growth and safety, making them suitable for conservative investors or those with a
                                medium-term horizon (3-5 years).</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>17. What is an Index Fund?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>An Index Fund is a passive fund that tracks a specific market index like the Nifty 50 or
                                Sensex. It doesn't try to beat the market but mirrors its performance, usually with much
                                lower management fees.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>18. What is the role of an Asset
                                Management Company (AMC)?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>The AMC is the company (like SBI, HDFC, or ICICI) that manages the mutual fund. They
                                launch various schemes, hire fund managers, and handle the legal and operational aspects
                                of your investment.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>19. How much return can I expect from
                                Equity Mutual Funds?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>While returns are not guaranteed, equity funds historically provide 12-15% CAGR over long
                                periods (7-10+ years). Short-term returns can be volatile and even negative, which is
                                why long-term holding is key.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>20. What is "Diversification"?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Diversification means spreading your money across different sectors (Tech, Pharma,
                                Finance) and asset classes (Equity, Debt, Gold). This ensures that if one sector
                                performs poorly, the others can protect your overall portfolio.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>21. What is an Expense Ratio?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>The expense ratio is the annual fee charged by the AMC to cover the cost of managing the
                                fund (manager salary, administration, marketing). It is deducted from the NAV daily.
                                Lower expense ratios are generally better for long-term returns.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>22. Can I invest in Mutual Funds if I am
                                an NRI?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Yes, NRIs can invest in Indian Mutual Funds through NRE or NRO accounts. However, certain
                                rules apply under FEMA, and some AMCs may have restrictions on investors based in the
                                USA or Canada due to compliance laws.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>23. What is a "Lock-in Period"?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>A lock-in period is a duration during which you cannot withdraw your money. The most
                                common example is ELSS funds, which have a 3-year lock-in. Most other open-ended funds
                                do not have a lock-in period.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>24. What happens if I miss an SIP
                                installment?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>The AMC does not charge a penalty for a missed SIP. However, your bank might charge a
                                "mandate failure" fee (similar to a bounced cheque fee). If you miss 3 consecutive
                                installments, the AMC may automatically cancel your SIP.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>25. What is an "Arbitrage
                                Fund"?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Arbitrage funds profit from the price difference of a stock between the cash market and
                                the futures market. They are low-risk and are taxed as equity funds, making them a great
                                tax-efficient alternative to debt funds.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>26. What is a "Gilt Fund"?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Gilt funds invest only in Government Securities (G-Secs). Since the government is the
                                borrower, there is no default risk. However, they are highly sensitive to interest rate
                                changes in the economy.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>27. What is "Asset Allocation"?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Asset allocation is the strategy of dividing your portfolio among different asset
                                categories like stocks, bonds, and cash. It is widely considered the most important
                                factor in determining your long-term investment success.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>28. What is a "Portfolio
                                Review"?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>A portfolio review is a periodic check (usually once or twice a year) to see if your
                                funds are performing well compared to their peers and if they are still aligned with
                                your financial goals.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>29. What is a "Dividend" (IDCW) in
                                Mutual Funds?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>IDCW stands for Income Distribution cum Capital Withdrawal. It is when the fund pays out
                                part of its profits to investors. Unlike the "Growth" option where profits are
                                reinvested, IDCW provides periodic cash flow, but the NAV drops by the dividend amount.
                            </p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>30. What is "Compounding"?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Compounding is when the returns you earn on your investment start earning returns of
                                their own. Over long periods, this creates a snowball effect, turning small regular
                                investments into a massive wealth corpus.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>31. Can I change my nominee in Mutual
                                Funds?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Yes, you can add or change your nominee at any time. It is highly recommended to have a
                                nominee to ensure a smooth transfer of funds to your family in case of an unfortunate
                                event.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>32. What is a "Balanced Advantage
                                Fund"?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Also known as Dynamic Asset Allocation funds, they automatically shift money between
                                equity and debt based on market conditions. They buy more equity when markets are cheap
                                and sell when markets are expensive.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>33. How do I track my Mutual Fund
                                investments?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>You can track them through AMC websites, mobile apps, or a Consolidated Account Statement
                                (CAS) sent monthly to your email. You can also use third-party tracking apps or consult
                                your advisor.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>34. What is a "Sectoral Fund"?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Sectoral funds invest in only one specific industry, like Pharma, Technology, or
                                Infrastructure. They carry higher risk because if that specific sector performs poorly,
                                the entire fund will suffer.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>35. What is "XIRR" and how is it
                                different from CAGR?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>CAGR is used for one-time investments. XIRR is the correct way to measure returns for
                                SIPs, as it accounts for multiple cash flows occurring at different dates.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>36. What is a "Flexi Cap Fund"?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Flexi Cap funds allow the manager to invest in companies of any size (Large, Mid, or
                                Small cap) based on where they see the best opportunity. They offer great
                                diversification and flexibility.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>37. What is an "Emergency
                                Fund"?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>An emergency fund is a safety net of 6 to 12 months of living expenses. It should be kept
                                in a highly liquid and safe place (like a savings account or liquid fund) to be used
                                only for unplanned crises like job loss or medical emergencies.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>38. What is the "Rule of 72"?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>The Rule of 72 is a quick way to estimate how long it will take for your money to double.
                                Simply divide 72 by your expected annual return. For example, at 12% return, your money
                                doubles in 6 years (72/12=6).</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>39. What is a "Top-up SIP"?</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>A Top-up SIP allows you to increase your SIP amount by a fixed percentage or amount every
                                year. This helps you reach your financial goals much faster as your income increases
                                over time.</p>
                        </div>
                    </div>

                    <div class="know-faq-item">
                        <div class="know-faq-q" onclick="toggleFAQ(this)"><span>40. How do I start my investment journey
                                with Krishnna FinServe?</span><i class="fa-solid fa-chevron-down"></i></div>
                        <div class="know-faq-a">
                            <p>Starting is easy! Simply fill out the inquiry form below or call us. We will analyze your
                                risk profile, discuss your financial goals, and create a customized investment roadmap
                                for you.</p>
                        </div>
                    </div>
                </div>

                <div class="know-more-container">
                    <button id="loadMoreBtn" class="know-view-btn" onclick="showAllFaqs()">
                        View All Questions <i class="fa-solid fa-circle-chevron-down" style="margin-left: 8px;"></i>
                    </button>
                </div>
            </div>
        </section>

        <section class="know-form-card">
            <div class="know-info-side">
                <h2>Direct Inquiry</h2><br>
                <p>Can't find your answer? Reach out to our certified advisors.</p>
                <div class="know-contact-links">
                    <p><i class="fa-solid fa-phone"></i> +91 8378090369</p>
                    <p><i class="fa-solid fa-envelope"></i> krishna.invest2012@gmail.com</p>
                </div>
            </div>
            <div class="know-form-side">
                <form class="know-grid" method="post" action="knowledge.php">
                    <div class="know-input-box">
                        <label>Full Name</label>
                        <input type="text" class="know-input" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="know-input-box">
                        <label>Phone</label>
                        <input type="tel" class="know-input" name="phone" placeholder="Phone Number" required>
                    </div>
                    <div class="know-input-box know-full-span">
                        <label>Email</label>
                        <input type="email" class="know-input" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="know-input-box know-full-span">
                        <label>Your Message</label>
                        <textarea class="know-input" name="message" rows="3" placeholder="How can we help?"></textarea>
                    </div>
                    <div class="know-full-span">
                        <button type="submit" class="know-btn">Send Message</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    
<div class="ticker-wrap">
    <div class="ticker" id="market-ticker">
        Loading market data...
    </div>
</div>


<script>
// Fetch market data asynchronously
fetch('fetch_tickers.php')
    .then(res => res.json())
    .then(data => {
        const tickerContainer = document.getElementById('market-ticker');
        tickerContainer.innerHTML = '';
        data.forEach(item => {
            const div = document.createElement('div');
            div.classList.add('ticker__item');
            div.innerHTML = `
                <span class="ticker__name">${item.name}</span>
                <span class="ticker__price">${item.price}</span>
                <span class="ticker__pct ${item.class}">${item.pct}</span>
            `;
            tickerContainer.appendChild(div);
        });
    })
    .catch(err => {
        console.error('Error fetching tickers:', err);
        document.getElementById('market-ticker').innerHTML = 'Market data unavailable';
    });
</script>

    <br><br>

    <section class="edu-scroll-lock">
        <div style="margin-bottom: -70px;">
            <h1 class="serv-section-title">Market <span class="serv-cyan-text">Education</span></h1>
            <p class="serve-lead" style="margin-top: -45px; text-align: center;">Learn smart investing, grow your wealth wisely.</p> 
        </div>
       
        <div class="scroll-animation-zone">
            <div class="zoom-layer" id="layer-1">
                <div class="layer-inner">
                    <div class="layer-left">
                        <img src="static/img/BSE.png" alt="BSE" class="brand-img-large">
                    </div>
                    <div class="layer-right">
                        <h3>The Heritage of Indian Capital</h3>
                        <p>The BSE (formerly known as the Bombay Stock Exchange Ltd.) is Asia's oldest stock exchange and a cornerstone of the Indian financial market, headquartered in Mumbai. It provides a transparent and efficient platform for trading various financial instruments and is regulated by the Securities and Exchange Board of India (SEBI). 
Key Information
Founded: Established on July 9, 1875, it was the first stock exchange in India to be recognized by the government under the Securities Contracts Regulation Act in 1956. <br>
Location: Its headquarters are on Dalal Street in Mumbai, India, a location often compared to Wall Street in the US.<br>
Function: The BSE facilitates the raising of capital for companies by offering a platform for new listings (IPOs) and allows investors to buy and sell existing securities like equities, debt instruments, mutual funds, and derivatives.<br>
Technology: It transitioned from an open outcry system to an electronic trading platform called the BSE On-Line Trading (BOLT) system in 1995, enhancing efficiency and transparency.<br>
Regulation: All operations of the BSE are overseen and regulated by the Securities and Exchange Board of India (SEBI), which ensures fair trading practices and investor protection. <br>
The S&P BSE SENSEX:
The SENSEX (a portmanteau of Sensitive and Index) is the BSE's flagship and most widely tracked benchmark index. <br>
Composition: It comprises 30 of the largest, most actively traded, and financially sound companies across various sectors of the Indian economy.<br>
Role: The SENSEX is considered a barometer of India's economic health and overall market sentiment. Its movements provide analysts and investors with a snapshot of the market's performance.</p>
                    </div>
                </div>
            </div>

            <div class="zoom-layer" id="layer-2">
                <div class="layer-inner">
                    <div class="layer-left">
                        <img src="static/img/NSE.png" alt="NSE" class="brand-img-large">
                    </div>
                    <div class="layer-right">
                        <h3>The Hub of Digital Trading</h3>
                        <p>The National Stock Exchange of India (NSE) is the leading financial exchange in India, headquartered in Mumbai. It is the world's largest derivatives exchange by the number of contracts traded and the fifth-largest stock exchange globally by market capitalization. 
Key Information<br>
Establishment: Incorporated in 1992, the NSE began operations in 1994, pioneering fully automated, screen-based electronic trading in India.
<br>Function: It provides a transparent and efficient nationwide platform for investors to trade various financial instruments.
Regulation & Ownership: The NSE is a private corporation owned by a consortium of major Indian financial institutions (such as LIC and SBI) and is regulated by the Securities and Exchange Board of India (SEBI).
<br> Technology: It utilizes a robust, high-speed electronic limit order book system (known as NEAT) that ensures anonymity for buyers and sellers and prioritizes orders based on price and time. 
Products and Segments
The NSE offers trading across a wide range of asset classes: 
Equity Market: Includes stocks, mutual funds, IPOs, ETFs, and a dedicated platform for Small and Medium Enterprises (SMEs) called NSE EMERGE.
Derivatives Market: Offers futures and options contracts on indices (like the Nifty 50), single stocks, currency, interest rates, and commodities.
<br>Debt Market: Provides a liquid and transparent platform for trading government securities (G-Secs) and corporate bonds. 
Key Indices
The flagship index of the NSE is the Nifty 50, which is a benchmark index comprising 50 actively traded stocks across various sectors of the Indian economy. Other major indices include: 
<br>Nifty Bank<br>
Nifty Next 50<br>
Nifty Midcap 50<br>
Nifty Smallcap 250</p>
                    </div>
                </div>
            </div>

            <div class="zoom-layer" id="layer-3">
                <div class="layer-inner">
                    <div class="layer-left">
                        <img src="static/img/SEBI.png" alt="SEBI" class="brand-img-large">
                    </div>
                    <div class="layer-right">
                        <h3>Protecting Your Investments</h3>
                        <p>The Securities and Exchange Board of India (SEBI) is the statutory regulatory body for the securities and commodity markets in India. Its primary purpose is to protect the interests of investors and to promote and regulate the development of the Indian securities market. 
Key Information about SEBI <br>
Establishment: SEBI was initially established as a non-statutory body on April 12, 1988, and granted statutory powers through the SEBI Act, 1992, on January 30, 1992.
<br>Headquarters: Its headquarters are located in the Bandra Kurla Complex, Mumbai, and it has regional offices in New Delhi, Kolkata, Chennai, and Ahmedabad.
<br>Structure: SEBI is managed by a nine-member board, which includes a Chairman nominated by the Union Government of India, two members from the Union Finance Ministry, one from the Reserve Bank of India (RBI), and five other members nominated by the government (at least three of whom must be whole-time members). The current chairperson is Tuhin Kanta Pandey. 
Core Objectives & Functions
SEBI performs quasi-legislative, quasi-executive, and quasi-judicial functions to ensure market integrity. 
<br>Protective Functions: Safeguarding investors from malpractices, prohibiting insider trading, checking price rigging, and promoting investor education.
<br>Regulatory Functions: Establishing rules and a code of conduct for financial intermediaries, regulating the process of company takeovers, and auditing stock exchanges.
<br>Developmental Functions: Promoting electronic trading (e.g., T+2 settlement cycles), training intermediaries, and conducting research for an efficient market. 
Investor Assistance
<br>SEBI provides various services for investors: 
Online Portal: The SEBI Investor website offers tools, calculators, and educational resources to help individuals make informed financial decisions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function toggleFAQ(element) {
            const item = element.parentElement;
            const wasActive = item.classList.contains('active');
            document.querySelectorAll('.know-faq-item').forEach(el => el.classList.remove('active'));
            if (!wasActive) item.classList.add('active');
        }

        function showAllFaqs() {
            document.getElementById('extraFaqs').style.display = 'block';
            document.getElementById('loadMoreBtn').style.display = 'none';
        }

        function filterFAQs() {
            let val = document.getElementById('faqSearch').value.toLowerCase();
            const extra = document.getElementById('extraFaqs');
            const btn = document.getElementById('loadMoreBtn');

            if (val.length > 0) {
                extra.style.display = 'block';
                btn.style.display = 'none';
            }

            document.querySelectorAll('.know-faq-item').forEach(item => {
                const match = item.innerText.toLowerCase().includes(val);
                item.style.display = match ? "block" : "none";
            });
        }
    </script>

<?php 
// Include the footer
include 'includes/footer.php'; 
?>
<?php
ob_end_flush(); // Send the buffered output to the browser
?>