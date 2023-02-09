<?php
include('includes/functions.php');
$allProducts = selectAll();
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
  <?php include('./theme/header.php'); ?>
  <div class="container-fluid">
    <h2 class="mb-4">Inventory Management</h2>
    <table class="table table-striped data-table">
      <thead>
        <tr>
          <th>
            ID
          </th>
          <th>
            Product Name:
          </th>
          <th>
            Quantity:
          </th>
          <th>
          </th>
        </tr>
      </thead>
    </table>
  </div>
  <?php include('theme/footer-scripts.php'); ?>
</body>

</html>