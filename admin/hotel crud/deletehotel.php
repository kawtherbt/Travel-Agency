<?php
require '../../database/config.php';
require_once '../../models/HotelModel.php';

function deleteFlight($hotelId) {
    global $db;

    $stmt = $db->prepare("DELETE FROM hotel WHERE id_h = ?");
    $stmt->execute([$hotelId]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hotelId = $_POST['id_h'];

    deleteFlight($hotelId);

}
?>
