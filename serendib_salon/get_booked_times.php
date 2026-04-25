<?php
require 'db.php';

if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $stmt = $conn->prepare("SELECT booking_time FROM bookings WHERE booking_date = ?");
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $booked_times = [];
    while ($row = $result->fetch_assoc()) {
        // Format to H:i (e.g., 09:00, 14:00)
        $booked_times[] = date('H:i', strtotime($row['booking_time']));
    }
    
    echo json_encode($booked_times);
    $stmt->close();
}
$conn->close();
?>
