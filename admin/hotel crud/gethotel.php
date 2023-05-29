<?php
require_once('../../database/config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_h = $_POST['id_h'];

             $stmt = $db->prepare("SELECT * FROM hotel WHERE id_h = ?");
        $stmt->execute([$id_h]);

        $hotel = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($hotel) {
            echo "<h3>Hotel Information:</h3>";
            echo "Name: " . $hotel['name'] . "<br>";
            echo "Location: " . $hotel['location'] . "<br>";
            echo "Rooms: " . $hotel['rooms'] . "<br>";
            echo "Prix: " . $hotel['prix'] . "<br>";
        } else {
            echo "Hotel not found!";
        }
    
}
?>
