<?php
ob_start("ob_gzhandler");
?>
<style>
    *{
        margin: 0;
    padding: 0;
    box-sizing: border-box;
    }
:root {
    --log-navy: #112847;
    --log-purple: #6a1b9a;
    --log-white: #ffffff;
    --log-light: #f4f7fa;
    --log-text: #64748b;
    --log-nj: #0054a6; /* NJ Wealth corporate color */
}

.log-body {
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(135deg, var(--log-navy), #1e3a5f);
    font-family: 'Inter', sans-serif;
}

.log-wrapper {
    width: 100%;
    max-width: 420px;
    padding: 15px;
}

.log-card {
    background: var(--log-white);
    padding: 40px 30px 30px;
    border-radius: 24px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.3);
    position: relative;
}

.log-back-btn {
    position: absolute;
    top: 18px;
    left: 18px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: var(--log-light);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--log-navy);
    text-decoration: none;
}

.log-logo {
    width: 70px;
    display: block;
    margin: 0 auto 15px;
}

.log-brand h2 {
    text-align: center;
    margin: 0;
    color: var(--log-navy);
}

.log-brand p {
    text-align: center;
    color: var(--log-text);
    margin-bottom: 20px;
}

/* White-label selection buttons */
.log-wl-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 25px;
}

.log-wl-buttons button {
    flex: 1;
    padding: 12px;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    background: #fff;
    color: var(--log-text);
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.log-wl-buttons button.active[data-wl="ifa"] {
    border-color: var(--log-purple);
    background: var(--log-purple);
    color: #fff;
}

.log-wl-buttons button.active[data-wl="nj"] {
    border-color: var(--log-nj);
    background: var(--log-nj);
    color: #fff;
}

/* Input groups */
.log-input-group {
    margin-bottom: 18px;
}
/* Ensure labels are perfectly aligned to the left of the input box */
.log-input-group label {
    font-size: 0.85rem;
    font-weight: 600;
    margin-bottom: 8px; /* Increased spacing slightly */
    display: block;
    text-align: left; /* Explicitly start label at left */
    color: var(--log-navy);
}

.log-input-field {
    position: relative;
    width: 100%;
}

.log-input-field input {
    width: 100%;
    box-sizing: border-box;
    /* Padding breakdown: 
       Top/Bottom: 14px
       Right: 45px (space for the eye icon)
       Left: 40px (space for the user/lock icon)
    */
    padding: 14px 45px 14px 40px; 
    border-radius: 12px;
    border: 1.5px solid #e2e8f0;
    font-size: 1rem;
    background-color: #ffffff;
    transition: all 0.2s ease;
    
    /* This ensures the cursor starts exactly where the padding ends */
    text-align: left; 
}

.log-input-field input:focus {
    outline: none;
    border-color: var(--log-purple);
    box-shadow: 0 0 0 3px rgba(106, 27, 154, 0.1); /* Subtle focus ring */
}

/* Positioning the Left Icons */
.log-input-field i.fa-user,
.log-input-field i.fa-lock {
    position: absolute;
    left: 15px; /* Fixed distance from left edge */
    top: 50%;
    transform: translateY(-50%);
    color: #cbd5e1;
    pointer-events: none; /* Icon won't block clicks */
    z-index: 2;
}

/* Positioning the Toggle Eye Icon */
.log-toggle-pass {
    position: absolute;
    right: 15px; /* Fixed distance from right edge */
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: var(--log-text);
    font-size: 1rem;
    z-index: 2;
}

.log-btn {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    background: var(--log-purple);
    color: #fff;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: opacity 0.2s;
}

.log-btn:hover {
    opacity: 0.9;
}

.nj-theme .log-btn {
    background: var(--log-nj);
}

#statusMsg {
    margin-top: 12px;
    font-size: 0.85rem;
    color: #ef4444;
    text-align: center;
    min-height: 1.2em;
}

@media (max-width: 480px) {
    .log-card {
        padding: 35px 20px 25px;
    }
}
</style>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="static/style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

<div class="log-body">
    <div class="log-wrapper">
        <div class="log-card" id="loginCard">

            <a href="index.php" class="log-back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

            <div class="log-brand">
                <img src="static/img/logodark.png" class="log-logo">
                <h2>Welcome</h2>
                <p id="platformName">Access your IFA Planet Dashboard</p>
            </div>

            <div class="log-wl-buttons">
                <button type="button" class="active" data-wl="ifa">IFA Planet</button>
                <a href="https://cdesk.njwealth.in/cdesk/login?_gl=1*hpqllq*_gcl_aw*R0NMLjE3NjcxMjAxNzEuQ2p3S0NBaUFqYzdLQmhCdkVpd0FFMkJET2JCbWh0eDhtN2F5WnpmOUoxZlFfUmg5YWxHYmtsSTFvQ0RGM2lMenhmSll0REUxS1ktQ1BSb0NlQ01RQXZEX0J3RQ..*_gcl_au*MTczNzIxODUxOC4xNzY3NzExNjUx*_ga*MTM2ODYyMTc4MC4xNzY2Njg0MDUx*_ga_0RJEY442W4*czE3Njc4OTk1NDAkbzQkZzAkdDE3Njc4OTk1NDYkajU0JGwwJGgw" target="_blank">
    <button type="button">NJ Wealth</button>
</a>
            </div>

            <form id="login-form">
                <div class="log-input-group">
                    <label id="labelUser">Client ID / Email</label>
                    <div class="log-input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username" id="username" placeholder="Enter your ID or Email" required>
                    </div>
                </div>

                <div class="log-input-group">
                    <label>Password</label>
                    <div class="log-input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="••••••••" required>
                        <i class="fa-solid fa-eye log-toggle-pass" id="togglePassword"></i>
                    </div>
                </div>

                <button type="submit" class="log-btn" id="submitBtn">Secure Login</button>
                <div id="statusMsg"></div>
            </form>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let selectedWL = "ifa";

// Toggle between platforms
$(".log-wl-buttons button").on("click", function() {
    $(".log-wl-buttons button").removeClass("active");
    $(this).addClass("active");
    selectedWL = $(this).data("wl");

    if(selectedWL === "nj") {
        $("#loginCard").addClass("nj-theme");
        $("#platformName").text("Redirect to NJ Wealth Secure Desk");
        $("#local-inputs").hide(); // Hide local fields as NJ uses its own domain
        $("#submitBtn").text("Go to NJ Wealth Login");
        $("#statusMsg").html("");
    } else {
        $("#loginCard").removeClass("nj-theme");
        $("#platformName").text("Access your IFA Planet Dashboard");
        $("#local-inputs").show();
        $("#submitBtn").text("Secure Login");
    }
});

// Authentication and Redirect Logic
$("#login-form").on("submit", function(e) {
    e.preventDefault();

    if(selectedWL === "ifa"){
        $("#statusMsg").css("color", "#64748b").html("Connecting to IFA Planet...");
        const username = $("#username").val();
        const password = $("#password").val();

        if(!username || !password) {
            $("#statusMsg").css("color", "#ef4444").html("Please fill all fields.");
            return;
        }

        $.ajax({
            type: "post",
            url: "https://www.ifaplanet.com/authenticate_user.php",
            data: { username: username, password: password },
            crossDomain: true,
            success: function(data) {
                try {
                    let Resultdata = JSON.parse(data);
                    if (Resultdata.status == 1) {
                        window.location = "https://www.ifaplanet.com/authenticate_login.php?token=" + Resultdata.token;
                    } else {
                        $("#statusMsg").css("color", "#ef4444").html(Resultdata.msg);
                    }
                } catch(e) {
                    $("#statusMsg").css("color", "#ef4444").html("Authentication error.");
                }
            },
            error: function() {
                $("#statusMsg").css("color", "#ef4444").html("Connection error.");
            }
        });
    } 
});

// Password Toggle
$("#togglePassword").on("click", function () {
    const pass = $("#password");
    const type = pass.attr("type") === "password" ? "text" : "password";
    pass.attr("type", type);
    $(this).toggleClass("fa-eye fa-eye-slash");
});
</script>

<?php
ob_end_flush(); // Send the buffered output to the browser
?>