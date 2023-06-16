<?php 
include 'privatePage.php';
include 'global.php';

$query = "SELECT * from `requests`";
$result = mysqli_query($conn, $query);
$requests = mysqli_fetch_all($result, 1);
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
    <link rel="stylesheet" href="../css/dashboard.css" />
    <title>Admin Dashboard</title>
  </head>
  <body>
    <div class="layout">
      <aside>
        <div class="logo">
          <img
            src="../img/Africa-Prudential-1.svg"
            alt="AP logo"
            width="150px"
            height="50px"
          />
        </div>
        <nav>
          <a class="active" href="./dashboard.php"><span>Dashboard</span></a>
          <a href="./totalrequest.php"><span>All Request</span></a>
          <a href="./pending.php"><span>Pending Request</span></a>
          <a href="./treated.php"><span>Request Treated</span></a>
          <a href="./rejected.php"><span>Request Rejected</span></a>
        </nav>
        <a class="log-out" href="logout.php"><span>Log out</span></a>
      </aside>
      <section class="main-section">
        <header>
          <section>
            <h2>Welcome back</h2>
          </section>

          <section class="name-section">
            <div>
              <h2 style="text-transform: capitalize;"><?php echo $_SESSION['name']; ?></h2>
              <span style="color: gray;">Administrator</span>
            </div>
          </section>
        </header>

        <!-- Pallet List start -->
        <section class="pallet--list">
          <div class="pallet">
            <h4>Total Request Submitted</h4>
            <p><?php echo count($requests); ?></p>
          </div>
          
          <div class="pallet">
            <h4>Pending Request</h4>
            <p><?php echo count(array_filter($requests, 'calculatePending')); ?></p>
          </div>
          
          <div class="pallet">
            <h4>Request Treated</h4>
            <p><?php echo count(array_filter($requests, 'calculateTreated')); ?></p>
          </div>
          
          <div class="pallet">
            <h4>Request Rejected</h4>
            <p><?php echo count(array_filter($requests, 'calculateRejected')); ?></p>
          </div>
        </section>
        <!-- Pallet List end -->
      </section>
    </div>
  </body>
</html>
