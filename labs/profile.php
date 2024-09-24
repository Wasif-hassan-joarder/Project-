<?php
session_start();
include('db.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $query = "UPDATE users SET email='$email' WHERE username='$username'";
    mysqli_query($conn, $query);
    echo "Profile updated";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
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

  }

  h2 {
    text-align: center;
    color: #333;
  }


  .profile-container {
    background-color: white;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 400px;
    margin: 20px auto;
  }


  .profile-form {
    display: flex;
    flex-direction: column;
  }

  .form-group {
    margin-bottom: 15px;
  }

  .form-group label {
    display: block;
    margin-bottom: 5px;
    color: #555;
    font-weight: bold;
  }

  .form-group input {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }

  .update-btn {
    background-color: #007bff;
    color: white;
    padding: 10px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
  }

  .update-btn:hover {
    background-color: #0056b3;
  }


  .success-msg {
    color: green;
    font-weight: bold;
    text-align: center;
    margin-bottom: 10px;
  }
  </style>
  <title>Profile</title>

</head>

<body>
  <div class="profile-container">
    <h2>User Profile</h2>

    <form action="profile.php" method="POST" class="profile-form">
      <div class="form-group">
        <label>Username: <strong><?php echo $user['username']; ?></strong></label>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
      </div>


      <div class="form-group">
        <label>Joined Date: <strong><?php echo $user['created_at']; ?></strong></label>
      </div>

      <button type="submit" class="update-btn">Update Profile</button>
    </form>
  </div>
</body>

</html>