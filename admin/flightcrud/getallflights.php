<?php
require('../../database/config.php');

$stmt = $db->query("SELECT * FROM flight");
$flights = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
  <h2>All Flights</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>DEPARTURE DATE</th>
        <th>RETURN DATE</th>
        <th>DEPARTURE TIME</th>
        <th>RETURN TIME</th>
        <th>FROM</th>
        <th>TO</th>
        <th>PASSENGERS</th>

        <!-- Add more columns as needed -->
      </tr>
    </thead>
    <tbody>
      <?php foreach ($flights as $flight): ?>
      <tr>
        <td><?php echo $flight['id_f']; ?></td>
        <td><?php echo $flight['depart_date']; ?></td>
        <td><?php echo $flight['return_date']; ?></td>
        <td><?php echo $flight['depart_time']; ?></td>
        <td><?php echo $flight['return_time']; ?></td>
        <td><?php echo $flight['place_from']; ?></td>
        <td><?php echo $flight['place_to']; ?></td>
        <td><?php echo $flight['passengers']; ?></td>

        
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
