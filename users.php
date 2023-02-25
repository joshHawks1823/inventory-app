

<?php
include('includes/functions.php');
auth();
if(isset($_POST['btnCreateUser'])):
  $username = $_POST['username'];
  $password = $_POST['password'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $active = $_POST['lname'];
  $level = $_POST['lname'];

  createUser($username, $password, $fname, $lname, $active, $level);
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
  <?php include('./theme/header.php'); ?>
  <div class="container-fluid">
    <h2 class="mb-4">Users</h2>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-users-tab" data-bs-toggle="tab" data-bs-target="#nav-users" type="button" role="tab" aria-controls="nav-users" aria-selected="true">Users</button>
      <button class="nav-link" id="nav-add-tab" data-bs-toggle="tab" data-bs-target="#nav-add" type="button" role="tab" aria-controls="nav-add" aria-selected="false">Add New User</button>
    </div>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab" tabindex="0">
        <table class="table table-striped users">
          <thead>
            <tr>
              <th>
                ID
              </th>
              <th>
                Active:
              </th>
              <th>
                Username:
              </th>
              <th>
                First Name:
              </th>
              <th>
                Last Name:
              </th>
              <th>
              </th>
            </tr>
          </thead>
        </table>

      </div>
      <div class="tab-pane fade" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab" tabindex="0"> <form action="" method="post" class="register">
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
          <div class="row">
            <div class="col-md-6">
              <label for="level">Level:</label>
              <select name="level" id="level" class="form-control">
                <option value="0" selected>0 - Read Only</option>
                <option value="1" selected>1 - Admin</option>
              </select>
              <br>
            </div>
            <div class="col-md-6">
              <label for="active">Active:</label>
              <select type="text" name="active" id="active" class="form-control">
              <option value="0" selected>Inactive</option>
                <option value="1" selected>Active</option>
              </select>
              <br>
            </div>
          </div>
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" class="form-control">
          <br>
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" class="form-control">
          <br>
          <button class="btn btn-primary" name="btnCreateUser">Create New User</button>
        </form></div>
    </div>
  </div>
  <?php include('theme/footer-scripts.php'); ?>
</body>

</html>