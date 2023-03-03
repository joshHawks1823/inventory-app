<?php
include('includes/functions.php');
auth();
if (isset($_POST['btnUpdateUser'])) :
  $username = $_POST['username'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $active = $_POST['active'];
  $level = $_POST['level'];
  $id = $_POST['id'];

  updateUser($username, $fname, $lname, $active, $level, $id);
endif;
$user = (isset($_GET['id'])) ?  selectSingleUser($_GET['id']) :
  false;
$activeArr = array(0 => 'Inactive', 1 => 'Active');
$levelArr = array(0 => 'View Only', 1 => '1 - Admin');
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
    <!-- <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-users-tab" data-bs-toggle="tab" data-bs-target="#nav-users" type="button" role="tab" aria-controls="nav-users" aria-selected="true">Users</button>
      <button class="nav-link" id="nav-add-tab" data-bs-toggle="tab" data-bs-target="#nav-add" type="button" role="tab" aria-controls="nav-add" aria-selected="false">Add New User</button>
    </div> -->
    <!-- <div class="tab-content" id="nav-tabContent"> -->
    <!-- <div class="tab-pane fade show active" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab" tabindex="0"> -->
    <form action="" method="post" class="register">
      <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id">
      <div class="row">
        <div class="col-md-6">
          <label for="fname">First Name:</label>
          <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $user['fname']; ?>">
          <br>
        </div>
        <div class="col-md-6">
          <label for="lname">Last Name:</label>
          <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $user['lname']; ?>">
          <br>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label for="level">Level:</label>
          <select name="level" id="level" class="form-control">
            <?php
            foreach ($levelArr as $key => $level) :
              if ($key == $user['level']) :
                $selected = ' selected';
              else :
                $selected = '';
              endif;
              echo '<option value="' . $key . '"' .
                $selected . '>' . $level . '</option>';
            endforeach;
            ?>
          </select>
          <br>
        </div>
        <div class="col-md-6">
          <label for="active">Active:</label>
          <select type="text" name="active" id="active" class="form-control">
            <?php
            foreach ($activeArr as $key => $active) :
              if ($key == $user['active']) :
                $selected = ' selected';
              else :
                $selected = '';
              endif;
              echo '<option value="' . $key . '"' .
                $selected . '>' . $active . '</option>';
            endforeach;
            ?>
            <!-- <option value="0" selected>Inactive</option>
                <option value="1" selected>Active</option> -->
          </select>
          <br>
        </div>
      </div>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" class="form-control" value="<?php echo $user['username']; ?>" readonly>
      <br>
      <button class="btn btn-primary" name="btnUpdateUser">Update User</button>
      <a href="#">Reset Password</a>
    </form>
  </div>
  <!-- <div class="tab-pane fade" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab" tabindex="0">  -->

  <!-- </div> -->
  <!-- </div> -->
  <!-- </div> -->
  <?php include('theme/footer-scripts.php'); ?>
</body>

</html>