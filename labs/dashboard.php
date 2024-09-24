<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('db.php');


$query = "SELECT * FROM doctors";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <style>
  body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background: linear-gradient(to right, #4facfe, #00f2fe);
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }



  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }

  h1 {
    margin-bottom: 20px;
    color: black;
  }

  nav {
    margin-bottom: 20px;
    background-color: #007bff;
    border-radius: 5px;
    padding: 10px;
  }

  nav ul {
    list-style-type: none;
    display: flex;
    justify-content: space-around;
  }

  nav ul li {
    margin: 0;
  }

  nav a {
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    transition: background 0.3s, color 0.3s;
  }

  nav a:hover {
    background-color: #0056b3;
    color: #fff;
    border-radius: 5px;
  }

  .doctor-list {
    margin-top: 20px;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  h2 {
    margin-bottom: 20px;
    color: #333;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  th,
  td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #007bff;
    color: white;
  }

  tr:hover {
    background-color: #f1f1f1;
  }

  tbody tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  tbody tr:nth-child(odd) {
    background-color: #fff;
  }
  </style>
</head>

<body>
  <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

  <nav>
    <ul>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="changepassword.php">Change Password</a></li>
      <li><a href="appointments.php">Appointments</a></li>
      <li><a href="logout.php">Logout</a></li>
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