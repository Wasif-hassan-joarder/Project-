<?php
include('db.php');


$valid_admin_code = "WEB123";  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $admin_code = $_POST['admin_code'];  

   
    if ($admin_code !== $valid_admin_code) {
        echo "Invalid Admin Code!";
    } else {
        
        $query = "INSERT INTO admins (username, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($conn, $query);
        echo "Admin Registration Successful!";
        header("Location: admin_login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Registration</title>
  <style>
  body,
  h2,
  label {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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


  .register-container {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    padding: 30px;
    width: 300px;
  }


  .register-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
  }


  .form-group {
    margin-bottom: 15px;
  }


  label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
    color: #555;
  }

  input[type="text"],
  input[type="email"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    transition: border-color 0.3s;
  }

  input:focus {
    border-color: #4a90e2;
    outline: none;
  }


  .register-btn {
    background-color: #4a90e2;
    color: white;
    border: none;
    padding: 10px;
    width: 100%;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
  }


  .register-btn:hover {
    background-color: #357ab8;
  }

  @media (max-width: 400px) {
    .register-container {
      width: 90%;
    }
  }
  </style>
</head>

<body>
  <div class="register-container">
    <h2>Admin Registration</h2>
    <form action="admin_register.php" method="POST">
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>
      <div class="form-group">
        <label>Admin Code</label>
        <input type="text" name="admin_code" required>
      </div>
      <button type="submit" class="register-btn">Register as Admin</button>
    </form>
  </div>
</body>

</html>