<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = 'localhost';
$user = 'root'; // Default XAMPP username
$pass = '';     // Default XAMPP password
$dbname = 'serendib_salon';

// 1. Create connection without database
$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Create Database if it doesn't exist
$sql_create_db = "CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if ($conn->query($sql_create_db) === FALSE) {
    die("Error creating database: " . $conn->error);
}

// 3. Connect to the database
$conn->select_db($dbname);

// 4. Create Tables if they don't exist
$sql_create_table = "
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `service` varchar(100) NOT NULL,
  `service_type` enum('Salon','Home') DEFAULT 'Salon',
  `home_address` text DEFAULT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `status` enum('Pending','Confirmed') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
";

if ($conn->query($sql_create_table) === FALSE) {
    die("Error creating table: " . $conn->error);
}
?>
