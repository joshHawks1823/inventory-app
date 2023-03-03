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
  <h2 class="text-center">KDP</h2>
  <div class="login-page">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h3 class="mb-3">Login Now</h3>
          <div class="bg-white shadow rounded">
            <div class="row">
              <div class="col-md-10 pe-0">
                <div class="form-left h-100 py-5 px-5">
                  <form action="" method="post" class="login">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" class="form-control">
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <br>
                    <div class="d-flex align-items-center">

                      <button class="btn btn-primary" name="btnLogin">Login</button>
                      <a href="register.php" class="ms-2">Register</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('theme/footer-scripts.php'); ?>
</body>

</html>