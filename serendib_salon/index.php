<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serendib Men's Salon | Premium Grooming</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="container nav-container">
            <a href="index.php" class="logo">
                <i class="fa-solid fa-scissors"></i> Serendib Men's <span>Salon</span>
            </a>
            <button class="mobile-menu-btn" onclick="document.querySelector('.nav-menu').classList.toggle('active')">
                <i class="fa-solid fa-bars"></i>
            </button>
            <nav class="nav-menu">
                <a href="index.php">Home</a>
                <a href="services.php">Services</a>
                <a href="about.php">About</a>
                <a href="my_bookings.php">My Bookings</a>
                <a href="admin.php">Admin</a>
                <a href="book_page.php" class="btn-book-nav">Book Now</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Refine Your <span>Style</span></h1>
            <p>Experience premium men's grooming with top-tier barbers. Your journey to a sharper look starts here.</p>
            <div class="hero-actions">
                <a href="book_page.php" class="btn-primary">Make an Appointment</a>
                <div class="animated-scissor">
                    <i class="fa-solid fa-scissors"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Home Service Banner -->
    <section class="home-service-banner">
        <div class="container">
            <div class="banner-content">
                <i class="fa-solid fa-house-user banner-icon"></i>
                <div class="banner-text">
                    <p class="lang-en"><strong>Home Service Available!</strong> Please call or WhatsApp this number to book your home appointment: <strong>0783843082</strong></p>
                    <p class="lang-si"><strong>ඔබගේ නිවසට පැමිණ සේවාව ලබා ගත හැක!</strong> ඒ සඳහා මෙම දුරකථන අංකයට WhatsApp පණිවිඩයක් හෝ ඇමතුමක් ලබා දෙන්න: <strong>0783843082</strong></p>
                    <p class="lang-ta"><strong>உங்கள் வீட்டிற்கு வந்து சேவை வழங்க முடியும்!</strong> அதற்காக இந்த எண்ணிற்கு WhatsApp செய்தி அல்லது அழைப்பு விடுக்கவும்: <strong>0783843082</strong></p>
                </div>
                <div class="banner-actions">
                    <a href="tel:0783843082" class="btn-call"><i class="fa-solid fa-phone"></i> Call</a>
                    <a href="https://wa.me/94783843082" class="btn-whatsapp" target="_blank"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-content">
            <div class="footer-brand">
                <h3>Serendib Men's <span>Salon</span></h3>
                <p>Bringing out the true gentleman in you with our professional grooming services anywhere in Colombo.</p>
                <div class="socials">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
            <div class="footer-links">
                <h4>Quick Links</h4>
                <a href="index.php">Home</a>
                <a href="services.php">Services</a>
                <a href="about.php">About Us</a>
                <a href="book_page.php">Book Appointment</a>
                <a href="my_bookings.php">Check My Booking</a>
            </div>
            <div class="footer-hours">
                <h4>Opening Hours</h4>
                <p>Monday - Sunday: 24 Hours Open</p>
                <p style="color: var(--primary-color); margin-top:10px;">Home Service: Any time by appointment</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Serendib Men's Salon. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // Make sure the active class toggle works cleanly
        document.querySelector('.mobile-menu-btn').addEventListener('click', function(e) {
            e.stopPropagation();
        });
        document.addEventListener('click', function(e) {
            const navMenu = document.querySelector('.nav-menu');
            if (navMenu.classList.contains('active') && !e.target.closest('.nav-menu') && !e.target.closest('.mobile-menu-btn')) {
                navMenu.classList.remove('active');
            }
        });
    </script>
</body>
</html>
