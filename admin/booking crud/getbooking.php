<?php
require('../../database/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_r = $_POST['id_r'];

    try {
        
        $stmt = $db->prepare("SELECT * FROM booking WHERE id_r=?");
        $stmt->execute([$id_r]);

        $booking = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($booking) {
            echo "<h3>Booking Information:</h3><br>";
            echo "Booking ID: " . $booking['id_r'] . "<br>";
            echo "Flight ID: " . $booking['id_f'] . "<br>";
            echo "Hotel ID: " . $booking['id_h'] . "<br>";
            echo "Client CIN: " .$booking['cin'] . "<br>";
            echo "Hotel Check In: " . $booking['debut_h'] . "<br>";
            echo "Hotel Check Out: " . $booking['fin_h'] . "<br>";
            echo "Hotel Booked Rooms: " . $booking['rooms_h'] . "<br>";
            echo "Flight Departure Date: " . $booking['debut_f'] . "<br>";
            echo "Flight Return Date:" . $booking['fin_f'] . "<br>";

        } else {
            echo "Booking not found!";
        }
    } catch (PDOException $e) {
        die('Database error: ' . $e->getMessage());
    }
}
?>
