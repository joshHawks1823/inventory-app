<?php
include('includes/functions.php');
if (isset($_POST['btnUpdate'])) :
  update($_POST['pname'], $_POST['quantity'], $_POST['id']);
endif;
$product  = (isset($_GET['id'])) ? selectSingle($_GET['id']) : false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory Management System</title>
  <?php include('theme/header.scripts.php'); ?>
</head>

<body>
  <?php include('theme/header.php'); ?>
  <div class="container">
    <?php if ($product != false) : ?>
      <h2>Update</h2>
      <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <div class="row">
          <div class="col-md-6">
            <label for="pname">Product</label>
            <input type="text" name="pname" class="form-control" id="pname" value="<?php echo $product['pname']; ?>">
            <br>
            <label for="quantity">Quantity</label>
            <input type="text" name="quantity" class="form-control" id="quantity" value="<?php echo $product['quantity']; ?>">
            <br>
            <button class="btn btn-primary" name="btnUpdate">Insert Record</button>
          </div>
        </div>

      </form>
    <?php else : ?>
      <h1>User is not set. Try again.</h1>
    <?php endif; ?>

  </div>
  <?php include('theme/footer-scripts.php'); ?>
</body>

</html>