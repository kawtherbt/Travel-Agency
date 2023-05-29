<?php
require('../../database/config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $id_f = $_POST['id_f'];

     
    
         
        $stmt = $db->prepare("SELECT * FROM flight WHERE id_f=?");
        $stmt->execute([$id_f]);

        $flight = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($flight) {
            echo "<h3>Flight Information:</h3><br>";
            echo "Departure Date: " . $flight['depart_date'] . "<br>";
            echo "Return Date: " . $flight['return_date'] . "<br>";
            echo "Departure Time: ". $flight['depart_time'] . "<br>";
            echo "Return Time: " .  $flight['return_time'] . "<br>";
            echo "From: " .$flight['place_from'] . "<br>";
            echo "To: ".$flight['place_to'] . "<br>";
            echo "Passengers: " . $flight['passengers'] . "<br>";


        } else {
            echo "Flight not found!";
        }
    
}
?>