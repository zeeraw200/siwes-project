<?php 
include 'privatePage.php';
include 'global.php';

$requests =array_filter($requests, 'calculateTreated');
$requests = array_values($requests);


if (isset($_POST['delete'])) {
	$id = $_POST['id'];

	$query = "DELETE FROM `requests` WHERE `requests`.`id` = $id";
	$result = mysqli_query($conn, $query);

	if ($result) {
			header("Location: treated.php");
	} else {
			$deleteCusErrorMsg = 'Unable to delete customer';
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/table.css">
  <title>Treated request</title>
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
      <a class="log-out" href=""><span>Log out</span></a>
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

      <div class="table--container">
        <section class="table--header">
        <h2>Request Treated: <?php echo count($requests); ?></h2>
        </section>
        <table>
          <thead>
            <tr>
              <th>Sn</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone No</th>
              <th>Buisness Type</th>
              <th>Message</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($requests as $index => $request) : ?>
            <tr>
              <td><?php echo $index + 1; ?></td>
              <td><?php echo $request['name']; ?></td>
							<td><?php echo $request['email']; ?></td>
							<td><?php echo $request['phone_no']; ?></td>
							<td><?php echo $request['buisness_type']; ?></td>
							<td><?php echo $request['message']; ?></td>
							<td><?php echo $request['status']; ?></td>
              <td>
                  <div class="actions">
                      
                    <?php if($request['status'] === 'pending'): ?>
                      <form> </form>
                    <form method="POST" action="totalrequest.php">
                      <input type="hidden" name="id" value="<?php echo $request['id']; ?>">
                      <button type="submit" name="treat"><img src="../img/check.png" alt="" height="15px" width="15px"></button>
                    </form>
                      <form method="POST" action="totalrequest.php" >
                        <input type="hidden" name="id" value="<?php echo $request['id']; ?>">
                        <button type="submit" name="reject"><img src="../img/close.png" alt="" height="15px" width="15px"></button>
                      </form>
                    <?php endif ?>
                    <form method="POST" action="totalrequest.php" >
                      <input type="hidden" name="id" value="<?php echo $request['id']; ?>">
                      <button type="submit" name='delete'><img src="../img/delete.png" alt="" height="15px" width="15px"></button></form>
                  </div>
                </td>
            </tr>
            <?php endforeach ?>
          
          </tbody>
        </table>
      </div>
  </div>
</body>
</html>