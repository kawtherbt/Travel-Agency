<?php
require('../../database/config.php');

$stmt = $db->query("SELECT * FROM booking");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>All Bookings</title>
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
  <h2>All Bookings</h2>
  <table>
    <thead>
      <tr>
        <th>Booking ID</th>
        <th>Flight ID</th>
        <th>Hotel ID</th>
        <th>Client CIN</th>
        <th>Hotel Check In</th>
        <th>Hotel Check Out</th>
        <th>Hotel Booked Rooms</th>
        <th>Flight Departure Date</th>
        <th>Flight Return Date</th>
        <!-- Add more columns as needed -->
      </tr>
    </thead>
    <tbody>
      <?php foreach ($bookings as $booking): ?>
      <tr>
        <td><?php echo $booking['id_r']; ?></td>
        <td><?php echo $booking['id_f']; ?></td>
        <td><?php echo $booking['id_h']; ?></td>
        <td><?php echo $booking['cin']; ?></td>
        <td><?php echo $booking['debut_h']; ?></td>
        <td><?php echo $booking['fin_h']; ?></td>
        <td><?php echo $booking['rooms_h']; ?></td>
        <td><?php echo $booking['debut_f']; ?></td>
        <td><?php echo $booking['fin_f']; ?></td>
        
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
