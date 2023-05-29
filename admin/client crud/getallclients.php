<?php
require('../../database/config.php');

$stmt = $db->query("SELECT * FROM client");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>All Clients</title>
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
  <h2>All Clients</h2>
  <table>
    <thead>
      <tr>
        <th>CIN</th>
        <th>Name</th>
        <th>Birthdate</th>
        <th>Email</th>
        <th>Country</th>
        <th>Phone</th>
        <!-- Add more columns as needed -->
      </tr>
    </thead>
    <tbody>
      <?php foreach ($clients as $client): ?>
      <tr>
        <td><?php echo $client['cin']; ?></td>
        <td><?php echo $client['name']; ?></td>
        <td><?php echo $client['date_n']; ?></td>
        <td><?php echo $client['email']; ?></td>
        <td><?php echo $client['country']; ?></td>
        <td><?php echo $client['phone']; ?></td>
        
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
