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
</head>

<body>
  <?php if ($product != false) : ?>
    <h1>Update</h1>
    <form action="" method="post">
      <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
      <label for="pname">Product</label>
      <input type="text" name="pname" id="pname" value="<?php echo $product['pname']; ?>">
      <br>
      <label for="quantity">Quantity</label>
      <input type="text" name="quantity" id="quantity" value="<?php echo $product['quantity']; ?>">
      <br>
      <button name="btnUpdate">Insert Record</button>
    </form>
  <?php else : ?>
    <h1>User is not set. Try again.</h1>
  <?php endif; ?>
</body>

</html>