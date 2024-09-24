<?php
session_start();
include('db.php');

if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

$query = "SELECT a.id, u.username, a.doctor, a.appointment_date, a.status FROM appointments a JOIN users u ON a.user_id = u.id";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Appointment List</title>

</head>

<body>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Doctor</th>
        <th>Appointment Date</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['doctor']; ?></td>
        <td><?php echo $row['appointment_date']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
          <a href="confirm_appointment.php?id=<?php echo $row['id']; ?>">Confirm</a>
          <a href="delete_appointment.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>

</html>