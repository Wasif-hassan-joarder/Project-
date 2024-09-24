<?php
session_start();
include('db.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $old_password = $_POST['old_password'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (password_verify($old_password, $user['password'])) {
        $query = "UPDATE users SET password='$new_password' WHERE username='$username'";
        mysqli_query($conn, $query);
        echo "Password updated";
    } else {
        echo "Old password is incorrect";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Change Password</title>
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

  .password-container {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
  }


  label {
    font-weight: bold;
    margin-bottom: 10px;
    display: block;
    font-size: 14px;
    color: #333;
  }

  input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 14px;
    background-color: #f9f9f9;
    transition: border-color 0.3s ease;
  }

  input[type="password"]:focus {
    border-color: #74ebd5;
    outline: none;
  }


  button {
    width: 100%;
    padding: 12px;
    background-color: #74ebd5;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  button:hover {
    background-color: #acb6e5;
  }


  input[type="password"]:hover {
    border-color: #acb6e5;
  }
  </style>
</head>

<body>
  <div class="password-container">
    <form action="changepassword.php" method="POST">
      <label for="old_password">Old Password</label>
      <input type="password" id="old_password" name="old_password" required>

      <label for="new_password">New Password</label>
      <input type="password" id="new_password" name="new_password" required>

      <button type="submit">Change Password</button>
    </form>
  </div>
</body>

</html>