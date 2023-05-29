<?php
require '../../database/config.php';
require_once '../../models/FlightModel.php';

function deleteFlight($flightId) {
    global $db;

    $stmt = $db->prepare("DELETE FROM flight WHERE id_f = ?");
    $stmt->execute([$flightId]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $flightId = $_POST['id_f'];

    deleteFlight($flightId);

}
?>
