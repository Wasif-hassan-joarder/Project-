<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}

include('db.php');


if (isset($_GET['id'])) {
    $doctor_id = $_GET['id'];
    $query = "DELETE FROM doctors WHERE id = $doctor_id";
    mysqli_query($conn, $query);
    echo "Doctor deleted successfully!";
    header("Location: delete_doctor.php");
    exit();
}


$query = "SELECT * FROM doctors";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Doctor</title>

</head>

<body>
  <h2>Delete Doctor</h2>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Specialty</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Action</th>
    </tr>
    <?php while ($doctor = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $doctor['id']; ?></td>
      <td><?php echo $doctor['name']; ?></td>
      <td><?php echo $doctor['specialty']; ?></td>
      <td><?php echo $doctor['email']; ?></td>
      <td><?php echo $doctor['phone']; ?></td>
      <td><a href="delete_doctor.php?id=<?php echo $doctor['id']; ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
</body>

</html>