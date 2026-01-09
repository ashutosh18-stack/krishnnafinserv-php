<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krishnna FinServe</title>
    <link rel="icon" href="static/img/logodark.png" type="image/png" media="(prefers-color-scheme: light)">

    <link rel="icon" href="static/img/logo.png" type="image/png" media="(prefers-color-scheme: dark)">

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<nav class="navbar" id="navbar">
    <div class="nav-container">

        <a href="index.php" class="brand-group">
            <img src="static/img/logo.png" alt="Logo" class="nav-logo">
            <div class="brand-text" id="brandText">
                <span class="text-white">Krishnna</span><span class="text-purple">FinServe</span>
            </div>
        </a>

        <div class="menu-toggle" id="mobile-menu">
            <span></span><span></span><span></span>
        </div>

        <ul class="nav-links" id="navLinks">
            <li><a href="index.php" class="hover-underline">Home</a></li>
            <li><a href="about.php" class="hover-underline">About Us</a></li>
            <li><a href="services.php" class="hover-underline">Services</a></li>

            <li class="dropdown">
                <a href="#" class="hover-underline">Tools ▾</a>
                <ul class="dropdown-content">
                    <li><a href="sip-calculator.php">SIP Calculator</a></li>
                    <li><a href="swp-calculator.php">SWP Calculator</a></li>
                    <li><a href="stp-calculator.php">STP Calculator</a></li>
                    <li><a href="lumpsum-calculator.php">Lumpsum Calculator</a></li>
                    <li><a href="retirement-calculator.php">Retirement Calculator</a></li>

                </ul>
            </li>

            <li><a href="knowledge.php" class="hover-underline">Knowledge</a></li>
            <li><a href="contact.php" class="hover-underline">Contact</a></li>
        </ul>

        <div class="nav-actions">
            <a href="login.php" class="client-login">Client Login</a>
        </div>
    </div>
</nav>