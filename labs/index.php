<li?php session_start(); ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body,
    html {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      background: linear-gradient(to right, #4facfe, #00f2fe);
      color: #333;


      height: 100vh;
    }

    .container {

      padding: 100px;
      text-align: center;

    }


    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #333;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li a:hover {
      background-color: #111;
    }

    img {
      border-radius: 50%;
    }

    .footer {
      background-color: slateblue;
      color: #ffffff;

      font-family: Arial, sans-serif;
    }

    .footer .container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .footer-sections {
      display: flex;
      justify-content: space-between;
      width: 100%;
      margin-bottom: 20px;
    }
    </style>
  </head>


  <body>



    <ul>
      <li><a href="login.php">Login</a>
      </li>
      <li> <a href="register.php">Register</a></li>
      <li> <a href="https://www.evercarebd.com/dhaka/about-us/">About Us</a></li>


    </ul>

    </nav>

    <div class="container">

      <h1>Welcome to the
        <b><i> Ever Care Hospital</i>

      </h1>
      <img src="hospital.jpg" alt="Paris" width="300" height="300">

    </div>

    <footer class="footer">
      <div class="container">
        <div class="footer-sections">

          <div class="footer-column">
            <h4><b><u>Contact Us</u></b></h4>
            <p><strong>Address:</strong> 123 Health St, Wellness City</p>
            <p><strong>Email:</strong> contact@hospital.com</p>
            <p><strong>Phone:</strong> +123 456 7890</p>
          </div>


          <div class="footer-column">
            <h4><b><u>Follow Us</u></b></h4>
            <div class="social-icons">
              <a href="#"><img src="icon-facebook.png" alt="Facebook"></a>
              <a href="#"><img src="icon-twitter.png" alt="Twitter"></a>
              <a href="#"><img src="icon-instagram.png" alt="Instagram"></a>

            </div>
          </div>
        </div>

        <div class="footer-bottom">
          <p>&copy; 2024 Ever Care Hospital. All Rights Reserved.</p>
        </div>
      </div>
    </footer>
  </body>

  </html>