<?php
require_once '../../database/config.php';

function updateHotel($hotelData) {
    global $db;

    $stmt = $db->prepare("UPDATE hotel SET name = ?, location = ?, rooms = ?, prix = ?");
    $stmt->execute([$hotelData['name'], $hotelData['location'], $hotelData['rooms'], $hotelData['prix']]);
}

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hotelData = [
        'id_h' => $_POST['id_h'],
        'name' => $_POST['name'],
        'location' => $_POST['location'],
        'rooms' => $_POST['rooms'],
        'prix' => $_POST['prix'],

       
    ];

    updateHotel($hotelData);

     header('Location: ../hotels.html');
}
?>
