<?php
require('../../database/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cin = $_POST['cin'];

    try {
        
        $stmt = $db->prepare("SELECT * FROM client WHERE cin=?");
        $stmt->execute([$cin]);

        $client = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($client) {
            echo "<h3>Client Information:</h3><br>";
            echo "Name: " . $client['name'] . "<br>";
            echo "Birthdate: " . $client['date_n'] . "<br>";
            echo "Email: " . $client['email'] . "<br>";
            echo "Country: " . $client['country'] . "<br>";
            echo "Phone: " . $client['phone'] . "<br>";
        } else {
            echo "Client not found!";
        }
    } catch (PDOException $e) {
        die('Database error: ' . $e->getMessage());
    }
}
?>
