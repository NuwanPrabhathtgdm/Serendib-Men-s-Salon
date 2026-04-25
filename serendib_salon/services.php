<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services | Serendib Men's Salon</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="padding-top: 80px;">

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

    <!-- Detailed Services Section -->
    <section class="services" style="padding: 100px 0;">
        <div class="container">
            <h2 class="section-title">Our Premium Services</h2>
            <p style="text-align:center; max-width: 600px; margin: 0 auto 50px; color: var(--text-muted);">Explore our detailed range of premium men's grooming services. We bring the ultimate barbershop experience right to your home anywhere in Colombo.</p>
            <div class="service-grid">
                <div class="service-card">
                    <i class="fa-solid fa-scissors"></i>
                    <h3>Haircut & Styling</h3>
                    <p>Expert modern and classic cuts tailored to your personal style. Includes wash, cut, blow-dry, and professional styling products.</p>
                    <p style="color: var(--primary-color); margin-top: 15px; font-weight: bold;">Rs. 1,500.00</p>
                </div>
                <div class="service-card">
                    <i class="fa-solid fa-mars"></i>
                    <h3>Beard Grooming</h3>
                    <p>Precision trimming, shaping, and conditioning for a perfect beard. Includes hot towel and premium beard oils.</p>
                    <p style="color: var(--primary-color); margin-top: 15px; font-weight: bold;">Rs. 500.00</p>
                </div>
                <div class="service-card">
                    <i class="fa-solid fa-water"></i>
                    <h3>Hot Towel Shave</h3>
                    <p>Traditional straight razor shave with relaxing hot towel treatment, pre-shave oil, and soothing aftershave balm.</p>
                    <p style="color: var(--primary-color); margin-top: 15px; font-weight: bold;">Rs. 800.00</p>
                </div>
                <div class="service-card">
                    <i class="fa-solid fa-face-smile"></i>
                    <h3>Men's Facial</h3>
                    <p>Deep cleansing, exfoliating, and moisturizing therapies designed specifically for men's thicker skin to remove impurities and rejuvenate.</p>
                    <p style="color: var(--primary-color); margin-top: 15px; font-weight: bold;">Rs. 2,500.00</p>
                </div>
                <div class="service-card">
                    <i class="fa-solid fa-spray-can"></i>
                    <h3>Hair Coloring</h3>
                    <p>Professional hair coloring services including full color, highlights, and grey blending for a natural and refreshed look.</p>
                    <p style="color: var(--primary-color); margin-top: 15px; font-weight: bold;">Rs. 3,500.00</p>
                </div>
                <div class="service-card">
                    <i class="fa-solid fa-hand-sparkles"></i>
                    <h3>Manicure & Pedicure</h3>
                    <p>Complete hand and foot care for men. Includes nail trimming, cuticle care, scrub, and massage for neat, professional-looking hands and feet.</p>
                    <p style="color: var(--primary-color); margin-top: 15px; font-weight: bold;">Rs. 2,000.00</p>
                </div>
            </div>
            <div style="text-align: center; margin-top: 50px;">
                <a href="book_page.php" class="btn-primary">Book Your Home Service Now</a>
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

</body>
</html>
