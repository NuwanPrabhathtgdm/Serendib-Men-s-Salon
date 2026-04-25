<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Prevent same person from having multiple active bookings in the future or currently ongoing
    // Assuming a booking takes 1.5 hours (90 minutes). If the booking time + 90 mins has passed, they can book again.
    $check_user_stmt = $conn->prepare("SELECT id FROM bookings WHERE customer_phone = ? AND status IN ('Pending', 'Confirmed') AND TIMESTAMP(booking_date, booking_time) >= DATE_SUB(NOW(), INTERVAL 90 MINUTE)");
    $check_user_stmt->bind_param("s", $phone);
    $check_user_stmt->execute();
    $check_user_result = $check_user_stmt->get_result();

    if ($check_user_result->num_rows > 0) {
        echo "<script>alert('You already have an active or upcoming booking. Please wait until it is completed to make a new one.'); window.location.href='my_bookings.php';</script>";
        $check_user_stmt->close();
        $conn->close();
        exit();
    }
    $check_user_stmt->close();

    $service_type = isset($_POST['service_type']) ? $_POST['service_type'] : 'Salon';
    $home_address = isset($_POST['home_address']) ? trim($_POST['home_address']) : '';

    // Server-side check for double booking on that time slot
    $check_stmt = $conn->prepare("SELECT id FROM bookings WHERE booking_date = ? AND booking_time = ?");
    $check_stmt->bind_param("ss", $date, $time);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Sorry, this time slot has just been booked. Please choose another time.'); window.location.href='book_page.php';</script>";
    } else {
        // Prepare and bind with new columns
        $stmt = $conn->prepare("INSERT INTO bookings (customer_name, customer_email, customer_phone, service, booking_date, booking_time, service_type, home_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $email, $phone, $service, $date, $time, $service_type, $home_address);

        if ($stmt->execute()) {
            echo "<script>alert('Booking successful! You can view your status here.'); window.location.href='my_bookings.php';</script>";
        } else {
            echo "<script>alert('Error in booking. Please try again later.'); window.location.href='book_page.php';</script>";
        }
        $stmt->close();
    }
    
    $check_stmt->close();
    $conn->close();
} else {
    header("Location: book_page.php");
    exit();
}
?>
