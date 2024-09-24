<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $query = "INSERT INTO doctors (name, specialty, email, phone) VALUES ('$name', '$specialty', '$email', '$phone')";
    mysqli_query($conn, $query);

    echo "Doctor added successfully!";
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Doctor</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h2>Add Doctor</h2>
  <form action="add_doctor.php" method="POST">
    <label>Doctor Name</label>
    <input type="text" name="name" required>
    <label>Specialty</label>
    <input type="text" name="specialty" required>
    <label>Email</label>
    <input type="email" name="email" required>
    <label>Phone</label>
    <input type="text" name="phone" required>
    <button type="submit">Add Doctor</button>
  </form>
</body>

</html>