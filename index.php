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

    <h2>Inventory Management</h2>
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
           <a href="update.php?id=' . $product['id'] . '" <abbr title="Edit this product"></abbr><i class="fas fa-pen-square"></i></a>
           <a href="delete.php?id=' . $product['id'] .  '" class="text-danger" onClick="return confirm(\'Are you sure you want to delete this product?\');" ><i class="fas fa-trash"></i></a>
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