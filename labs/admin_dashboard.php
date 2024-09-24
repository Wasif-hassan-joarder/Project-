<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}

$admin_username = $_SESSION['admin_username'];
include('db.php');


$query = "SELECT * FROM doctors";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Welcome Admin, <?php echo $admin_username; ?>!</h1>

  <nav>
    <ul>

      <li><a href="add_doctor.php">Add Doctor</a></li>
      <li><a href="delete_doctor.php">Delete Doctor</a></li>
      <li><a href="admin_logout.php">Logout</a></li>
    </ul>
  </nav>

  <div class="doctor-list">
    <h2>Doctor Availability List</h2>
    <table border="1">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Specialty</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Availability</th>
      </tr>
      <?php while ($doctor = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?php echo $doctor['id']; ?></td>
        <td><?php echo $doctor['name']; ?></td>
        <td><?php echo $doctor['specialty']; ?></td>
        <td><?php echo $doctor['email']; ?></td>
        <td><?php echo $doctor['phone']; ?></td>
        <td><?php echo $doctor['availability']; ?></td>
      </tr>
      <?php } ?>
    </table>
  </div>
</body>

</html>