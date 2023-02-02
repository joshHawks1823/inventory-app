<?php
include('includes/functions.php');
if (isset($_POST['btnInsert'])) :
  insert($_POST['pname'], $_POST['quantity']);
endif;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory Management System</title>
  <?php include('theme/header.scripts.php');
  ?>
</head>

<body>
  <?php include('theme/header.php'); ?>
  <div class="container">
    <h2>Create New Product</h2>
    <form action="" method="post" class="form">
      <div class="row">
        <div class="col-md-6">
          <label for="pname">Product:</label>
          <input class="form-control" type="text" name="pname" id="pname" value="">
          <br>
          <label for="quantity">Quantity:</label>
          <input class="form-control" type="number" name="quantity" id="quantity" value="">
          <br>
          <button class="btn btn-primary" name="btnInsert">Submit</button>
        </div>
      </div>
    </form>
    <?php include('../Inventory-App/theme/footer-scripts.php'); ?>

  </div>

</body>

</html>