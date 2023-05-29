<?php
require_once '../../database/config.php';




function updateFlight($flightData) {
    global $db;

    $stmt = $db->prepare("UPDATE flight SET depart_date = ?, return_date = ?, depart_time = ?, return_time = ?, place_from = ?, place_to = ?, passengers = ? WHERE id_f = ?");
    $stmt->execute([$flightData['depart_date'], $flightData['return_date'], $flightData['depart_time'], $flightData['return_time'], $flightData['place_from'], $flightData['place_to'], $flightData['passengers'], $flightData['id_f']]);
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

      updateFlight($flightData);

     header('Location: ../flights.html');
}
?>
