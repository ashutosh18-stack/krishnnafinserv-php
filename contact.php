<?php

require 'vendor/phpmailer/Exception.php';
require 'vendor/phpmailer/PHPMailer.php';
require 'vendor/phpmailer/SMTP.php';
require_once 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message_status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = MAIL_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = MAIL_USERNAME;
        $mail->Password   = MAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = MAIL_PORT;

        $mail->setFrom(MAIL_FROM_EMAIL, MAIL_FROM_NAME);
        $mail->addAddress(MAIL_TO);

        $mail->isHTML(true);
        $mail->Subject = "New Website Inquiry from " . $_POST['name'];
        $mail->Body    = "
            <h3>New Contact Request</h3>
            <p><b>Name:</b> {$_POST['name']}</p>
            <p><b>Email:</b> {$_POST['email']}</p>
            <p><b>Phone:</b> {$_POST['phone']}</p>
            <p><b>Message:</b> {$_POST['message']}</p>
        ";

        $mail->send();
        $message_status = "success";

    } catch (Exception $e) {
        $message_status = "error";
    }
}



// 2. Fetching Reviews from Google Sheets
$csv_url = REVIEWS_CSV;
$reviews = [];

if (($handle = fopen($csv_url, "r")) !== FALSE) {
    $header = fgetcsv($handle);
    while (($data = fgetcsv($handle)) !== FALSE) {
        $row = array_combine($header, $data);

        $status = isset($row['Status']) ? strtolower(trim($row['Status'])) : '';
        if ($status == 'live') {
            $reviews[] = [
                'Full Name' => $row['Full Name'] ?? 'Valued Client',
                'How would you rate the quality of the product/service?' => $row['How would you rate the quality of the product/service?'] ?? 5,
                'Share your experience or a message about our work' => $row['Share your experience or a message about our work'] ?? ''
            ];
        }
    }
    fclose($handle);
    $reviews = array_reverse($reviews);
}

$reviews_json = json_encode($reviews);

?>

<?php include 'includes/header.php'; ?>

    <br><br><br><br>

    <?php if($message_status == "success"): ?>
        <div style="background: #d1fae5; color: #065f46; padding: 15px; text-align: center; max-width: 1200px; margin: 20px auto; border-radius: 8px;">
            <strong>Success!</strong> Your message has been sent successfully.
        </div>
    <?php elseif($message_status == "error"): ?>
        <div style="background: #fee2e2; color: #991b1b; padding: 15px; text-align: center; max-width: 1200px; margin: 20px auto; border-radius: 8px;">
            <strong>Error!</strong> Something went wrong. Please try again later or contact us directly.
        </div>
    <?php endif; ?>

<section class="contact-cards-section">
        <div class="cards-wrapper">
            <div class="info-card">
                <div class="icon-box">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="card-text">
                    <h3>Our Address</h3>
                    <p>1B-3, 'Isharpan', Adishakti Colony, R.K.Nagar, Kolhapur. Maharashtra, India 416013</p>
                </div>
            </div>

            <div class="info-card">
                <div class="icon-box">
                    <i class="fa-solid fa-phone-volume"></i>
                </div>
                <div class="card-text">
                    <h3>Contact Us</h3>
                    <p>+91 8378090369</p>
                </div>
            </div>

            <div class="info-card">
                <div class="icon-box">
                    <i class="fa-solid fa-envelope-open-text"></i>
                </div>
                <div class="card-text">
                    <h3>Email Support</h3>
                    <p>info@krishnnafinserve.com<br>support@krishnnafinserve.com</p>
                </div>
            </div>

            <div class="info-card">
    <div class="icon-box social-container">
        <a href="https://wa.me/918378090369" target="_blank" class="social-link" title="WhatsApp">
            <i class="fa-brands fa-whatsapp wa-icon"></i>
        </a>
        <a href="https://www.instagram.com/your_username" target="_blank" class="social-link" title="Instagram">
            <i class="fa-brands fa-instagram insta-icon"></i>
        </a>
    </div>
    
    <div class="card-text">
        <h3>Social Connect</h3>
        <p>Chat or Follow us</p>
    </div>
</div>

        </div>
    </section>
<style>
/* Container for the icons */
.social-container {
    display: flex;
    gap: 25px;
    width: auto;
    padding: 12px 30px;
    background: #f4f7fa; /* Light background by default */
    border-radius: 50px;
    transition: all 0.4s ease; /* Smooth transition */
    border: 1px solid #e2e8f0;
}

/* Icons styling */
.social-link {
    font-size: 1.8rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}

/* DEFAULT ICON COLORS (Before Hover) */
.wa-link { color: #25D366; }
.insta-link { color: #E1306C; }

/* HOVER EFFECT: Entire Box becomes Dark, Icons become White */
.social-card:hover .social-container {
    background: #01070fff; /* Your brand Navy Blue */
    border-color: #112847;
    box-shadow: 0 10px 20px rgba(17, 40, 71, 0.2);
}

.social-card:hover .social-link {
    color: #ffffff; /* Icons turn White */
    transform: scale(1.1); /* Subtle grow effect */
}

/* Individual Icon Hover (Optional: keep brand colors even on dark bg) */
.wa-link:hover { color: #25D366 !important; }
.insta-link:hover { color: #ff6699 !important; }
</style>
    <section class="contact-section">
        <div class="contact-card" id="contactSection">
            <div class="contact-visual">
                <img src="static/img/hero-section2.jpg" alt="Our Team" class="contact-img">

                <div class="shape tri-navy-top"></div>
                <div class="shape tri-cyan-top"></div>
                <div class="shape tri-navy-bottom"></div>
                <div class="shape tri-cyan-left"></div>
            </div>

            <div class="contact-form-area">
                <span class="get-in-touch">Get in Touch</span>
                <h2 class="contact-title">We'd Love to Hear <br>From You</h2>

                <div class="form-grid">
                    <form class="actual-form" method="post" action="contact.php">
                        <input type="text" name="name" placeholder="Full Name" required>
                        <input type="email" name="email" placeholder="Email Address" required>
                        <input type="tel" name="phone" placeholder="Phone Number">
                        <textarea name="message" placeholder="Message" rows="4"></textarea>
                        <button type="submit" class="btn-send">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div id="reviews-data-bridge" data-reviews='<?php echo htmlspecialchars($reviews_json, ENT_QUOTES, 'UTF-8'); ?>' style="display: none;"></div>

    <section class="testimonials-section">
        <div class="container">
            <h2 class="test-main-title text-center">Words of <span class="text-purple">Trust</span></h2>
            <div id="testimonial-grid" class="testimonial-grid"></div>

            <div class="text-center load-more-wrapper">
                <button id="view-all-btn" class="know-view-btn" onclick="toggleReviews()">
                    View All Reviews <i class="fa-solid fa-circle-chevron-down"></i>
                </button>
            </div>
        </div>
    </section>

    <script>
        const dataBridge = document.getElementById('reviews-data-bridge');
        let allReviews = [];
        try {
            allReviews = JSON.parse(dataBridge.getAttribute('data-reviews'));
        } catch (e) {
            console.error("Data parsing error", e);
        }

        let showingAll = false;

        function displayReviews() {
            const grid = document.getElementById('testimonial-grid');
            if (!grid) return;
            grid.innerHTML = '';

            if (!allReviews || allReviews.length === 0) {
                grid.innerHTML = '<div class="col-12 text-center text-muted"><p>No live reviews found.</p></div>';
                return;
            }

            let displayList = showingAll ? allReviews : [...allReviews].slice(0, 3);

            displayList.forEach(rev => {
                const name = rev['Full Name'] || "Valued Client";
                const starCount = parseInt(rev['How would you rate the quality of the product/service?']) || 5;
                const reviewText = rev['Share your experience or a message about our work'] || "";
                const initial = name.charAt(0).toUpperCase();

                grid.innerHTML += `
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card shadow-sm p-4 h-100" style="background: white; border-radius: 10px;">
                        <div class="stars mb-2" style="color: #ffc107;">
                            ${'★'.repeat(starCount)}${'☆'.repeat(Math.max(0, 5 - starCount))}
                        </div>
                        <p class="testimonial-text">"${reviewText}"</p>
                        <div class="d-flex align-items-center mt-3">
                            <div class="initial-circle me-2" style="background:#112847; flex-shrink: 0; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                ${initial}
                            </div>
                            <span class="fw-bold">${name}</span>
                        </div>
                    </div>
                </div>`;
            });
        }

        function toggleReviews() {
            showingAll = !showingAll;
            displayReviews();
        }
        document.addEventListener('DOMContentLoaded', displayReviews);
    </script>

    <section class="map-section">
        <div class="map-container">
           
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3822.3524001236747!2d74.23258807514861!3d16.65923988410905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTbCsDM5JzMzLjMiTiA3NMKwMTQnMDYuNiJF!5e0!3m2!1sen!2sin!4v1767902174271!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>