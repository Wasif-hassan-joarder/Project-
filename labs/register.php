<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: login.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
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


  .form-container {
    background-color: #fff;
    border-radius: 8px;
    padding: 40px;
    width: 400px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }


  .form-container h2 {
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
    color: #666;
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
    color: #fff;
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
    .form-container {
      width: 100%;
      padding: 20px;
      margin: 10px;
    }
  }
  </style>
  <title>Register</title>

  <script src="validation.js"></script>
</head>

<body>
  <div class="form-container">
    <form action="register.php" method="POST" onsubmit="return validateRegister()">
      <h2>Register</h2>

      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>

      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button type="submit" class="submit-btn">Register</button>
      <ul>



        <li> <a href="admin_register.php" class="btn admin-btn">Admin Registration</a></li>
      </ul>
    </form>
  </div>
</body>

</html>