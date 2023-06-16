<?php
include 'database.php';

session_start();

if (isset($_POST['submit-btn'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "SELECT * FROM `user` WHERE email='$email' and password='$password'";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result)) {
		$result = mysqli_fetch_assoc($result);
		$_SESSION['name'] = $result['name'];

		header("Location: dashboard.php");
	} else {
    echo "<script>alert('Invalid login details');</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- FONT LINK  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700;900&display=swap"
      rel="stylesheet"
    />

    <!-- ICON LINK  -->
    <script
      src="https://kit.fontawesome.com/91dbb59489.js"
      crossorigin="anonymous"
    ></script>

    <!-- CSS LINK  -->
    <link rel="stylesheet" href="../css/style.css" />

    <!-- PAGE TITLE  -->
    <title>Admin</title>
  </head>
  <body>
    <!-- HEADER  -->
    <header>
      <!-- TOP AREA  -->
      <div class="top">
        <div class="logo">
          <!-- LOGO IMAGE -->
          <a href="../index.php">
            <img
              src="../img/Africa-Prudential-1.svg"
              alt="AP logo"
              width="200px"
              height="50px"
            />
          </a>
        </div>
      </div>
    </header>
    <!-- NAV BAR  -->
    <nav>
      <a href="../index.php">Home</a>
      <a href="../assets/MAR.php">Make a request</a>
      <a href="#contact">Contact</a>
    </nav>

    <!-- LOGIN FORM  -->
    <section class="adminlog">
      <div class="form">
        <form method="post" action="">
          <h2>Login as Admin User</h2>
          <hr />
          <div class="inputs">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Admin ID" />
          </div>
          <div class="inputs">
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password" />
          </div>

          <button type="submit" name='submit-btn' class="btn">LOGIN</button>
          <p>
            Not yet registered?
            <u><a href="./signup.php">Sign Up</a></u> here
          </p>
        </form>
      </div>
      <!-- TERMS AND CONDITION  -->
      <!-- <div class="tc">
        <a href="#">Terms of use Privacy Policy</a>
      </div> -->
    </section>

    <!-- FOOTER  -->
    <footer>
      <div class="footcont">
        <!-- LEFT SIDE OF THE FOOTER  -->
        <div class="cont">
          <!-- COMAPNY LOGO AND WRITEUP  -->
          <div class="companyprofile">
            <img
              src="../img/Africa-Prudential-Logo-WX.svg"
              alt="ap logo"
              width="200px"
            />
            <p>
              Empowering organisations to achieve more through innovative and
              beneficial solutions.
            </p>
          </div>
          <!-- SOCIAL MEDIA ICONS  -->
          <div class="social">
            <div class="icons">
              <i class="fa-brands fa-instagram"></i>
            </div>
            <div class="icons">
              <i class="fa-brands fa-facebook-f"></i>
            </div>
            <div class="icons">
              <i class="fa-brands fa-twitter"></i>
            </div>
            <div class="icons">
              <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>

        <!-- RIGHT SIDE OF THE FOOTER  -->
        <div class="cont" id="contact">
          <h1>CONTACTS</h1>
          <div class="location">
            <i class="fa-solid fa-location-dot"></i>
            <div class="address">
              <p><span>Head Office</span></p>
              <p>220B, Ikorodu Road, Palmgrove, Lagos</p>
            </div>
          </div>
          <div class="location">
            <i class="fa-solid fa-location-dot"></i>
            <div class="address">
              <p><span>Abuja Office</span></p>
              <p>
                Infinity House (2nd Floor), 11 Kaura Namoda Street, Off Faskari
                Crescent, Area 3, Garki
              </p>
            </div>
          </div>
          <div class="location">
            <i class="fa-solid fa-location-dot"></i>
            <div class="address">
              <p><span>Port Harcourt Office</span></p>
              <p>1A, Evo Road, Oklen Suite (2nd Floor), GRA Phase II</p>
            </div>
          </div>
          <div class="location">
            <i class="fa-solid fa-phone"></i>
            <div class="address">
              <p><span>Have Any Questions?</span></p>
              <p>0700 AFRIPRUD (0700 23747783)</p>
            </div>
          </div>
          <div class="location">
            <i class="fa-solid fa-paper-plane"></i>
            <div class="address">
              <p><span>Send Us An Email</span></p>
              <p>cxc@africaprudential.com></p>
            </div>
          </div>
        </div>
      </div>

      <!-- DIVIDING LINE  -->
      <div class="line"></div>
      <!-- COPY RIGHT -->
      <div class="copyright">
        <p>Copyright &copy; 2022 Africa Prudential. All Rights Reserved.</p>
        <div class="legal">
          <a href="#">Privacy Policy</a> |
          <a href="#">Terms and Conditions</a>
        </div>
      </div>
    </footer>
  </body>
</html>
