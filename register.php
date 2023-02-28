<?php
include('includes/functions.php');
if (isset($_POST['btnRegister'])) :
  $username = $_POST['username'];
  $password = $_POST['password'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  createUser($username, $password, $fname, $lname);
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory Management System</title>
  <?php include('./theme/header.scripts.php'); ?>

</head>

<body>
  <?php
  $loggedproduct = selectSingle(1);
  ?>
  <?php if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
      <?php echo $_SESSION['message']['msg']; ?>
    </div>
    <?php unset($_SESSION['message']); ?>
  <?php endif; ?>
  <div class="register-page">
    <div class="container">
      <h3 class="mb-4">Register</h3>
      <div class="bg-white shadow rounded py-5 px-5">
        <form action="" method="post" class="register">
          <div class="row">
            <div class="col-md-6">
              <label for="fname">First Name:</label>
              <input type="text" name="fname" id="fname" class="form-control">
              <br>
            </div>
            <div class="col-md-6">
              <label for="lname">Last Name:</label>
              <input type="text" name="lname" id="lname" class="form-control">
              <br>
            </div>
          </div>
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" class="form-control">
          <br>
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" class="form-control">
          <br>
          <div class="d-flex align-items-center">

            <button class="btn btn-primary" name="btnRegister">Register</button> 
            <a href="login.php" class="ms-2">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include('theme/footer-scripts.php'); ?>
</body>

</html>