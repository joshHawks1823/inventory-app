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
</head>

<body>
  <h1>Insert</h1>
  <form action="" method="post">
    <label for="pname">Product</label>
    <input type="text" name="pname" id="pname" value="">
    <br>
    <label for="quantity">Quantity</label>
    <input type="text" name="quantity" id="quantity" value="">
    <br>
    <button name="btnInsert">Insert Record</button>
  </form>
</body>

</html>