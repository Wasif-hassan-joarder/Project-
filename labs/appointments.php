<?php
session_start();
include('db.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor = $_POST['doctor'];
    $appointment_date = $_POST['appointment_date'];
    $username = $_SESSION['username'];

    $query = "SELECT id FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    $user_id = $user['id'];

    $query = "INSERT INTO appointments (user_id, doctor, appointment_date) VALUES ('$user_id', '$doctor', '$appointment_date')";
    
    if (mysqli_query($conn, $query)) {
        echo "Appointment booked";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Appointments</title>
  <link rel="stylesheet" href="style.css">
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

  .container {
    background-color: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    width: 300px;
    text-align: center;
  }


  label {
    display: block;
    margin: 15px 0 5px;
    font-weight: bold;
    color: #00796b;
  }


  input[type="text"],
  input[type="date"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #b0bec5;
    border-radius: 5px;
    margin-bottom: 20px;
    font-size: 1em;
    transition: border-color 0.3s;
  }


  input:focus {
    border-color: #00796b;
    outline: none;
  }


  button {
    background-color: #00796b;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 1.1em;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%;
  }


  button:hover {
    background-color: #004d40;
  }
  </style>
</head>

<div class="container">
  <h2>Book Appointment</h2>
  <form action="appointments.php" method="POST">
    <label for="doctor">Doctor</label>
    <input type="text" name="doctor" id="doctor" required>

    <label for="appointment_date">Appointment Date</label>
    <input type="date" name="appointment_date" id="appointment_date" required>

    <button type="submit">Book Appointment</button>
  </form>
</div>

</html>