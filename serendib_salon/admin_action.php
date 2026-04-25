<?php
session_start();
require 'db.php';

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: admin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action == 'confirm') {
        $stmt = $conn->prepare("UPDATE bookings SET status = 'Confirmed' WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "<script>alert('Booking confirmed successfully.'); window.location.href='admin.php';</script>";
        } else {
            echo "<script>alert('Error updating booking.'); window.location.href='admin.php';</script>";
        }
        $stmt->close();
    } elseif ($action == 'remove') {
        $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "<script>alert('Booking removed successfully.'); window.location.href='admin.php';</script>";
        } else {
            echo "<script>alert('Error removing booking.'); window.location.href='admin.php';</script>";
        }
        $stmt->close();
    }
} else {
    header("Location: admin.php");
}
$conn->close();
?>
