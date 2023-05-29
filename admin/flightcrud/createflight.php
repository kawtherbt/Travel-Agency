<?php
require_once '../../database/config.php';
require_once '../../models/FlightModel.php';

function createFlight($flightData) {
    $flight = new FlightModel();
    global $db;

    $flight->setId_f($flightData['id_f']);
    $flight->setDepartDate($flightData['depart_date']);
    $flight->setReturnDate($flightData['return_date']);
    $flight->setDepartTime($flightData['depart_time']);
    $flight->setReturnTime($flightData['return_time']);
    $flight->setPlaceFrom($flightData['place_from']);
    $flight->setPlaceTo($flightData['place_to']);
    $flight->setPassengers($flightData['passengers']);

    
    $stmt = $db->prepare("INSERT INTO flight (id_f,depart_date, return_date, depart_time, return_time, place_from, place_to, passengers) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
    $stmt->execute([$flight->getId_f(),$flight->getDepartDate(), $flight->getReturnDate(), $flight->getDepartTime(), $flight->getReturnTime(), $flight->getPlaceFrom(), $flight->getPlaceTo(), $flight->getPassengers()]);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $flightData = [
        'id_f' => $_POST['id_f'],
        'depart_date' => $_POST['depart_date'],
        'return_date' => $_POST['return_date'],
        'depart_time' => $_POST['depart_time'],
        'return_time' => $_POST['return_time'],
        'place_from' => $_POST['place_from'],
        'place_to' => $_POST['place_to'],
        'passengers' => $_POST['passengers']
    ];

    createFlight($flightData);

     header('Location: ../flights.html');
}

?>
