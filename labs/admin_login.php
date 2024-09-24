<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $query = "SELECT * FROM admins WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $admin = mysqli_fetch_assoc($result);


    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_username'] = $username; 
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

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

  .login-container {
    background-color: white;
    padding: 2em;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
  }

  h2 {
    margin-bottom: 1.5em;
    color: #333;
  }

  .form-group {
    margin-bottom: 1.5em;
  }

  label {
    display: block;
    margin-bottom: 0.5em;
    color: #555;
  }

  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border 0.3s;
  }

  input[type="text"]:focus,
  input[type="password"]:focus {
    border-color: #007bff;
    outline: none;
  }

  .login-btn {
    background-color: #007bff;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    transition: background 0.3s;
  }

  .login-btn:hover {
    background-color: #0056b3;
  }

  ul {
    list-style: none;
    padding: 0;
    margin-top: 1em;
  }

  li {
    margin: 0.5em 0;
  }

  .admin-btn {
    text-decoration: none;
    color: #007bff;
    transition: color 0.3s;
  }

  .admin-btn:hover {
    color: #0056b3;
  }
  </style>
</head>

<body>
  <div class="login-container">
    <h2>Admin Login</h2>
    <form action="admin_login.php" method="POST">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>
      <button type="submit" class="login-btn">Login</button>

      <ul>



        <li> <a href="index.php" class="btn admin-btn">Index</a></li>
      </ul>
    </form>
  </div>
</body>

</html>