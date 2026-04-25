<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Serendib Men's Salon</title>
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

    <!-- About Section -->
    <section class="about-page" style="padding: 100px 0; min-height: 70vh;">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto; background: var(--card-bg); padding: 50px; border-radius: 20px; text-align: center; border-top: 4px solid var(--primary-color);">
                <i class="fa-solid fa-user-tie" style="font-size: 60px; color: var(--primary-color); margin-bottom: 20px;"></i>
                <h2 class="section-title" style="margin-bottom: 30px;">About the Barber</h2>
                
                <h3 style="font-size: 28px; margin-bottom: 10px; color: white;">T.G.D.M. Nuwan Prabhath</h3>
                <p style="font-size: 18px; color: var(--text-muted); margin-bottom: 40px; line-height: 1.8;">
                    I am a professional men's grooming expert with years of experience in delivering premium haircuts, beard styling, and skin treatments. My mission is to provide you with the highest quality salon experience without you having to leave your home.
                </p>

                <div style="display: flex; flex-direction: column; gap: 20px; align-items: center; margin-bottom: 40px;">
                    <div style="display: flex; align-items: center; gap: 15px; font-size: 18px;">
                        <i class="fa-solid fa-envelope" style="color: var(--primary-color); font-size: 24px;"></i>
                        <a href="mailto:nuwanprabhathtgdm@gmail.com" style="color: var(--text-light);">nuwanprabhathtgdm@gmail.com</a>
                    </div>
                    <div style="display: flex; align-items: center; gap: 15px; font-size: 18px;">
                        <i class="fa-solid fa-phone" style="color: var(--primary-color); font-size: 24px;"></i>
                        <a href="tel:0783843082" style="color: var(--text-light);">0783843082</a>
                    </div>
                </div>

                <div style="background: rgba(212, 175, 55, 0.1); padding: 25px; border-radius: 10px; border: 1px dashed var(--primary-color);">
                    <i class="fa-solid fa-location-dot" style="color: var(--primary-color); font-size: 30px; margin-bottom: 15px;"></i>
                    <h4 style="font-size: 20px; margin-bottom: 10px; color: white;">Anywhere in Colombo</h4>
                    <p style="color: var(--text-muted);">You can get my service anywhere inside Colombo. Just book an appointment and I will come to your place!</p>
                </div>
                
                <div style="margin-top: 40px;">
                    <a href="book_page.php" class="btn-primary">Book Now</a>
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

</body>
</html>
