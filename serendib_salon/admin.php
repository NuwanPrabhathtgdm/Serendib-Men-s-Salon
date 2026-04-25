<?php 
session_start();
require 'db.php'; 

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    if ($_POST['password'] === 'Admin@123') {
        $_SESSION['admin_logged_in'] = true;
    } else {
        $error = 'Invalid password.';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Serendib Men's Salon</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .page-content { padding: 120px 0; min-height: 80vh; }
        .table-container { background: var(--card-bg); padding: 20px; border-radius: 15px; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid rgba(255,255,255,0.1); }
        th { color: var(--primary-color); }
        .status-pending { color: orange; font-weight: bold; }
        .status-confirmed { color: #4caf50; font-weight: bold; }
        .btn-action { padding: 8px 12px; border-radius: 5px; border: none; cursor: pointer; color: white; font-size: 14px; margin-right: 5px; }
        .btn-confirm { background-color: #4caf50; }
        .btn-confirm:hover { background-color: #45a049; }
        .btn-remove { background-color: #f44336; }
        .btn-remove:hover { background-color: #d32f2f; }
        .login-container { max-width: 400px; margin: 50px auto; background: var(--card-bg); padding: 30px; border-radius: 15px; text-align: center; }
        .error-msg { color: #f44336; margin-bottom: 15px; }
    </style>
</head>
<body>
    <header class="header">
        <div class="container nav-container">
            <a href="index.php" class="logo">
                <i class="fa-solid fa-user-shield"></i> Admin<span>Panel</span>
            </a>
            <button class="mobile-menu-btn" onclick="document.querySelector('.nav-menu').classList.toggle('active')">
                <i class="fa-solid fa-bars"></i>
            </button>
            <nav class="nav-menu">
                <a href="index.php">Back to Site</a>
                <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']): ?>
                    <a href="admin.php?logout=1">Logout</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <div class="container page-content">
        <?php if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']): ?>
            <div class="login-container">
                <h2>Admin Login</h2>
                <p style="margin-bottom: 20px; color: var(--text-muted);">Please enter the admin password</p>
                <?php if ($error) echo "<p class='error-msg'>$error</p>"; ?>
                <form method="POST" action="admin.php">
                    <div class="input-group">
                        <input type="password" name="password" required placeholder="Password">
                    </div>
                    <button type="submit" name="login" class="btn-primary full-width">Login</button>
                </form>
            </div>
        <?php else: ?>
            <h2 class="section-title">Manage Bookings</h2>
            
            <?php
            $sql = "SELECT * FROM bookings ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='table-container' style='overflow-x: auto;'>";
                echo "<table>";
                echo "<tr><th>ID</th><th>Customer</th><th>Phone</th><th>Service</th><th>Location</th><th>Address</th><th>Date & Time</th><th>Status</th><th>Actions</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    $status_class = 'status-' . strtolower($row['status']);
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['customer_phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['service']) . "</td>";
                    
                    $is_home = isset($row['service_type']) && $row['service_type'] == 'Home';
                    if ($is_home) {
                        echo "<td><strong style='color:var(--primary-color);'><i class='fa-solid fa-house'></i> Home</strong></td>";
                        echo "<td><small>" . htmlspecialchars($row['home_address']) . "</small></td>";
                    } else {
                        echo "<td>Salon</td><td>-</td>";
                    }

                    echo "<td>" . date('M d, Y', strtotime($row['booking_date'])) . " at " . date('h:i A', strtotime($row['booking_time'])) . "</td>";
                    echo "<td class='" . $status_class . "'>" . htmlspecialchars($row['status']) . "</td>";
                    echo "<td>";
                    if ($row['status'] == 'Pending') {
                        echo "<form action='admin_action.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <input type='hidden' name='action' value='confirm'>
                                <button type='submit' class='btn-action btn-confirm'>Confirm</button>
                              </form>";
                    }
                    echo "<form action='admin_action.php' method='POST' style='display:inline;' onsubmit='return confirm(\"Are you sure you want to remove this booking?\");'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <input type='hidden' name='action' value='remove'>
                            <button type='submit' class='btn-action btn-remove'>Remove</button>
                          </form>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p style='text-align:center;'>No bookings found.</p>";
            }
            ?>
        <?php endif; ?>
    </div>
</body>
</html>
