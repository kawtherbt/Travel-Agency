<?php
require_once '../../database/config.php';
require_once '../../models/HotelModel.php';

function createHotel($hotelData) {
    $hotel = new HotelModel();
    global $db;

    $hotel->setId_h($hotelData['id_h']);
    $hotel->setName($hotelData['name']);
    $hotel->setLocation($hotelData['location']);
    $hotel->setRooms($hotelData['rooms']);
    $hotel->setPrix($hotelData['prix']);
   
    
    $stmt = $db->prepare("INSERT INTO hotel (id_h,name, location, rooms, prix) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$hotel->getId_h(),$hotel->getName(), $hotel->getLocation(), $hotel->getRooms(), $hotel->getPrix()]);
}


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hotelData = [
        'id_h' => $_POST['id_h'],
        'name' => $_POST['name'],
        'location' => $_POST['location'],
        'rooms' => $_POST['rooms'],
        'prix' => $_POST['prix'],
      
    ];

    createHotel($hotelData);

     header('Location: ../hotels.html');
}

?>
