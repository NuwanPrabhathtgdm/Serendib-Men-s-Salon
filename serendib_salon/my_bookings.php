<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings | Serendib Men's Salon</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .page-content { padding: 120px 0; min-height: 80vh; }
        .form-container { max-width: 500px; margin: 0 auto 40px; background: var(--card-bg); padding: 30px; border-radius: 15px; }
        .table-container { background: var(--card-bg); padding: 20px; border-radius: 15px; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid rgba(255,255,255,0.1); }
        th { color: var(--primary-color); }
        .status-pending { color: orange; font-weight: bold; }
        .status-confirmed { color: #4caf50; font-weight: bold; }
        .status-removed { color: #f44336; font-weight: bold; }
    </style>
</head>
<body>
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
                <a href="book_page.php" class="btn-book-nav">Book Now</a>
            </nav>
        </div>
    </header>

    <div class="container page-content">
        <h2 class="section-title">Check Your Booking Status</h2>
        <div class="form-container">
            <form action="my_bookings.php" method="POST">
                <div class="input-group">
                    <label for="phone">Enter your phone number</label>
                    <input type="tel" id="phone" name="phone" required placeholder="077xxxxxxx">
                </div>
                <button type="submit" class="btn-primary full-width">Check Bookings</button>
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $phone = $_POST['phone'];
            $stmt = $conn->prepare("SELECT * FROM bookings WHERE customer_phone = ? ORDER BY booking_date DESC, booking_time DESC");
            $stmt->bind_param("s", $phone);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Check for confirmed bookings to show a notification
                $confirmed_bookings = [];
                $rows = [];
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                    if ($row['status'] == 'Confirmed') {
                        $confirmed_bookings[] = $row;
                    }
                }

                if (count($confirmed_bookings) > 0) {
                    echo "<div style='background-color: #e8f5e9; border-left: 5px solid #4caf50; padding: 15px; margin-bottom: 20px; border-radius: 4px; color: #2e7d32;'>";
                    echo "<strong><i class='fa-solid fa-bell'></i> Notification:</strong> ";
                    echo "You have " . count($confirmed_bookings) . " confirmed booking(s)! The Admin has approved your appointment(s). See details below.";
                    echo "</div>";
                }

                echo "<div class='table-container' style='overflow-x: auto;'>";
                echo "<table>";
                echo "<tr><th>Date</th><th>Time</th><th>Service</th><th>Location</th><th>Address</th><th>Status</th></tr>";
                foreach ($rows as $row) {
                    $status_class = 'status-' . strtolower($row['status']);
                    echo "<tr>";
                    echo "<td>" . date('Y-m-d', strtotime($row['booking_date'])) . "</td>";
                    echo "<td>" . date('h:i A', strtotime($row['booking_time'])) . "</td>";
                    echo "<td>" . htmlspecialchars($row['service']) . "</td>";
                    
                    if (isset($row['service_type'])) {
                        echo "<td>" . ($row['service_type'] == 'Home' ? '<span style="color:var(--primary-color);"><i class="fa-solid fa-house"></i> Home</span>' : 'Salon') . "</td>";
                        echo "<td>" . ($row['service_type'] == 'Home' ? htmlspecialchars($row['home_address']) : '-') . "</td>";
                    } else {
                        echo "<td>Salon</td><td>-</td>";
                    }

                    echo "<td class='" . $status_class . "'>" . htmlspecialchars($row['status']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p style='text-align:center;'>No bookings found for this phone number.</p>";
            }
            $stmt->close();
        }
        ?>
    </div>
</body>
</html>
