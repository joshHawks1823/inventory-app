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
  <?php include('theme/header.scripts.php'); ?>

</head>

<body>
  <?php include('theme/header.php'); ?>
  <div class="container">

    <h2><i class="fas fa-table"></i> Inventory Management</h2>
    <table class="table data-table">
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
      <tbody>
        <?php
        foreach ($allProducts as $product) :
          echo '
          <tr>
            <td>' . $product['id'] . '</td>
            <td>' . $product['pname'] . '</td>
            <td>' . $product['quantity'] . '</td>
            <td class="text-end">
           <a href="/update.php?id=' . $product['id'] . '">Update</a>
           <a href=/delete?id=' . $product['id'] . '">Delete</a>
            </td>
          </tr>
          ';
        endforeach;
        ?>
      </tbody>
    </table>
  </div>

  <?php include('theme/footer-scripts.php'); ?>
</body>

</html>