<?php
require('../../database/config.php');

$stmt = $db->query("SELECT * FROM hotel");
$hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>All Hotels</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
  </style>
</head>
<body>
  <h2>All Hotels</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Location</th>
        <th>Rooms</th>
        <th>Price Per Night</th>


        <!-- Add more columns as needed -->
      </tr>
    </thead>
    <tbody>
      <?php foreach ($hotels as $hotel): ?>
      <tr>
        <td><?php echo $hotel['id_h']; ?></td>
        <td><?php echo $hotel['name']; ?></td>
        <td><?php echo $hotel['location']; ?></td>
        <td><?php echo $hotel['rooms']; ?></td>
        <td><?php echo $hotel['prix']; ?></td>

        

        
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
