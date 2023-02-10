<?php
include('includes/functions.php');
if (isset($_POST['btnLogin'])) :
  $username = $_POST['username'];
  $password = $_POST['password'];
  doLogin($username, $password);
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
  <div class="card">
    <div class="card-body">
      <div class="container-fluid">
        <h2 class="mb-4">Login</h2>
        <form action="" method="post" class="login">
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" class="form-control">
          <br>
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control">
          <br>
          <button class="btn btn-primary" name="btnLogin">Login</button> <a href="/register">Register</a>
        </form>
      </div>
    </div>
  </div>
  <?php include('theme/footer-scripts.php'); ?>
</body>

</html>