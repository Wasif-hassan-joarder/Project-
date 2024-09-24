<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <script src="validation.js"></script>
  <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
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
    background-color: #ffffff;
    border-radius: 8px;
    padding: 40px;
    width: 360px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }


  .login-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-size: 24px;
    font-weight: bold;
  }


  .input-group {
    margin-bottom: 20px;
  }

  .input-group label {
    font-size: 14px;
    color: #555;
    margin-bottom: 5px;
    display: block;
  }

  .input-group input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    transition: border-color 0.3s ease;
  }

  .input-group input:focus {
    border-color: #007bff;
  }


  .submit-btn {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .submit-btn:hover {
    background-color: #0056b3;
  }


  @media (max-width: 500px) {
    .login-container {
      width: 100%;
      padding: 20px;
      margin: 10px;
    }
  }
  </style>
</head>

<body>
  <div class="login-container">
    <form action="login.php" method="POST" onsubmit="return validateLogin()">
      <h2>Login</h2>

      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
      </div>

      <button type="submit" class="submit-btn">Login</button>
      <ul>



        <li> <a href="admin_login.php" class="btn admin-btn">Admin Login</a></li>
      </ul>
    </form>
  </div>
</body>

</html>