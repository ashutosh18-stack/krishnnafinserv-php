<?php
ob_start("ob_gzhandler");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms & Conditions | Krishnna FinServe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-purple: #6f42c1;
            --hover-purple: #5a32a3;
            --bg-light: #f8f9fa;
        }

        body { 
            background-color: var(--bg-light); 
            font-family: 'Inter', sans-serif; 
            color: #333; 
            line-height: 1.6;
        }

        .terms-container { 
            background: white; 
            padding: 50px; 
            border-radius: 15px; 
            margin-top: 80px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
        }

        .back-btn { 
            position: fixed; 
            top: 20px; 
            left: 20px; 
            background: var(--primary-purple); 
            color: white; 
            border: none; 
            padding: 12px 25px; 
            border-radius: 50px; 
            text-decoration: none; 
            display: flex; 
            align-items: center; 
            gap: 10px; 
            transition: 0.3s all ease; 
            z-index: 1000; 
            box-shadow: 0 4px 15px rgba(111, 66, 193, 0.3); 
            font-weight: 500;
        }

        .back-btn:hover { 
            background: var(--hover-purple); 
            color: white; 
            transform: translateX(-5px); 
        }

        h1 { color: var(--primary-purple); font-weight: 800; margin-bottom: 10px; }
        h3 { 
            font-size: 1.3rem; 
            font-weight: 700; 
            margin-top: 35px; 
            color: #222; 
            border-left: 5px solid var(--primary-purple); 
            padding-left: 15px; 
            margin-bottom: 20px;
        }

        .risk-box { 
            background: #fff3cd; 
            border: 1px solid #ffeeba; 
            padding: 25px; 
            border-radius: 12px; 
            margin: 30px 0; 
        }

        .risk-box h4 { color: #856404; font-weight: 700; margin-bottom: 10px; }
        
        ul li { margin-bottom: 10px; }
        
        .footer-note {
            background: #eef2ff;
            padding: 20px;
            border-radius: 10px;
            border-left: 5px solid #4f46e5;
            margin-top: 40px;
        }
    </style>
</head>
<body>

    <a href="javascript:history.back()" class="back-btn">
        <i class="fas fa-arrow-left"></i> Back
    </a>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 terms-container">
                <div class="text-center mb-5">
                    <h1>Terms & Conditions</h1>
                    <p class="text-muted">Effective Date: January 07, 2026</p>
                    <div style="width: 60px; height: 4px; background: var(--primary-purple); margin: 0 auto;"></div>
                </div>

                <div class="risk-box">
                    <h4><i class="fas fa-triangle-exclamation me-2"></i> Market Risks & Disclaimers</h4>
                    <p class="mb-2"><strong>Market Risks:</strong> All Mutual Fund (MF) investments are subject to market risks. Past performance is not a guarantee of future returns. The principal amount invested may be lost.</p>
                    <p class="mb-0 small">Investors should always read the specific Scheme Information Document (SID) and Statement of Additional Information (SAI) carefully before investing.</p>
                </div>

                <h3>1. General Disclaimers</h3>
                <ul>
                    <li><strong>No Investment Advice:</strong> The information provided on this website is for informational purposes only and does not constitute investment, legal, accounting, or tax advice. Users are responsible for their own investment decisions.</li>
                    <li><strong>Accuracy of Information:</strong> While AMCs and Krishnna FinServe take due care to ensure accuracy, we are not liable for any errors, omissions, or interruptions of data on the website.</li>
                    <li><strong>Website Availability:</strong> Access is not guaranteed to be uninterrupted or error-free due to technical issues, system maintenance, or external factors like network failures or hacking.</li>
                </ul>

                <h3>2. User Obligations and Eligibility</h3>
                <ul>
                    <li><strong>Eligibility:</strong> Users must be 18 years of age or older and legally competent to enter into contracts.</li>
                    <li><strong>Accurate Information:</strong> Users must provide accurate, current, and complete information during registration and keep it updated.</li>
                    <li><strong>Account Security:</strong> Users are responsible for maintaining the confidentiality of their login credentials and are liable for any activity through their account.</li>
                    <li><strong>No Third-Party Payments:</strong> Investments must be made only from the user's own registered bank account. Third-party payments are strictly prohibited and will be rejected/refunded.</li>
                </ul>

                <h3>3. Transaction Processing</h3>
                <p><strong>NAV Applicability:</strong> The Net Asset Value (NAV) applicable for transactions (purchase, redemption, switch) is based on the time the application and clear funds are received under respective schemes by the AMC, subject to cut-off timings specified in the scheme-related documents.</p>

                <h3>4. Intellectual Property & Indemnity</h3>
                <ul>
                    <li><strong>Intellectual Property:</strong> All content, including trademarks, logos, and information, is the property of the AMC or related entities and cannot be copied, distributed, or modified without explicit written consent.</li>
                    <li><strong>Indemnification:</strong> Users agree to indemnify and hold Krishnna FinServe, AMCs, sponsors, and employees harmless from any claims, damages, or expenses arising from their use of the website or breach of these terms.</li>
                </ul>

                <div class="footer-note">
                    <p class="mb-0"><strong>Note:</strong> These documents contain the definitive terms of the investment. By continuing to use this website, you acknowledge that you have read and understood these terms in their entirety.</p>
                </div>

                <footer class="mt-5 pt-4 border-top text-center text-muted">
                    <p>For legal inquiries, contact us at: <strong>krishna.invest2012@gmail.com</strong></p>
                    <p class="small">&copy; 2026 Krishnna FinServe. All Rights Reserved.</p>
                </footer>
            </div>
        </div>
    </div>

</body>
</html>
<?php
ob_end_flush(); // Send the buffered output to the browser
?>