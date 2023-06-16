<?php
include 'database.php';

if (isset($_POST['submit-btn'])) {
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone_number = $_POST['phone_number'];
	$buisness_type = $_POST['solutions'];
	$message = $_POST['message'];

	if (strlen(trim($fullname)) === 0 || strlen(trim($email)) === 0 || strlen(trim($phone_number)) === 0 || strlen(trim($buisness_type)) === 0 || strlen(trim($message)) === 0) {
    echo "<script>alert('please fill all inputs');</script>";

		goto ifEnd;
	}

  

	$query = "INSERT INTO `requests` (`name`, `email`, `phone_no`, `buisness_type`, `message`, `status`) VALUES ('$fullname', '$email', '$phone_number', '$buisness_type', '$message', 'pending')";
	$result = mysqli_query($conn, $query);

	if ($result) {
		echo "<script>alert('Your request has been logged successfully. we would get back to via the email provided.');</script>";
	} else {
    echo "<script>alert('Invalid request');</script>";
	}
}
ifEnd:
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
    <title>Wareez Project</title>
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
      <!-- <i class="fa fa-bars"></i> -->
    </nav>

    <section class="mar">
      <div class="request-form">
        <form action="MAR.php" id="form" method="POST">
          <h2>Make your request</h2>
          <hr />
          <div class="form-content">
            <label for="fullname">Full Name:</label>
            <br />
            <input name="fullname" type="text" placeholder="Enter your Full Name" required />
            <br />
            <label for="email">Email:</label>
            <br />
            <input name="email" type="email" placeholder="email@email.com" required />
            <br />
            <label for="phone_number">Phone Number:</label>
            <br />
            <input name="phone_number" type="text" placeholder="Phone number" />
            <br />
            <label for="solutions">Buisness Type:</label>
            <select name="solutions" id="solutions">
              <option value="share registration">Share Registration</option>
              <option value="digital technology">Digital Technology</option>
              <option value="dividend">Dividend</option>
              <option value="investor relation">investor Relation</option>
            </select>
            <br />
            <br />
            <label for="message">Message:</label>
            <br />
            <input
              class="message-box"
              type="text"
              placeholder="Tell us more about the buisness you want"
              style="height: 100px"
              name="message"
            />
            <br />

            <button class="btn" type="submit" name="submit-btn">Submit</button>
          </div>
        </form>
      </div>
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
