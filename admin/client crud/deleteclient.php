<?php
require('../../database/config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cin = $_POST['cin'];

    
       
        $stmt = $db->prepare("DELETE FROM client WHERE cin=?");
        $stmt->execute([$cin]);

        header('Location: ../clients.html');
        echo "Client deleted successfully!";
    
}
?>
