<?php
require('../../database/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cin = $_POST['cin'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $date_n = $_POST['date_n'];

    
       
        $stmt = $db->prepare("UPDATE client SET name=?, email=?, country=?, phone=?, date_n=? WHERE cin=?");
        $stmt->execute([$name, $email, $country, $phone, $date_n, $cin]);

        header('Location: ../clients.html');
   
}
?>
