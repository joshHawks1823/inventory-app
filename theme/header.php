<?php
if (!isset($_SESSION['user'])) :
  header('Location: login.php');
  exit();
endif;
?>

<?php
$loggedInUser = selectSingleUser($_SESSION['user']['id']);
$welcome = 'Welcome, ' . $loggedInUser['fname'] . ' ' . $loggedInUser['lname'] . '(<a href="logout.php">Logout</a>)';
  // $loggedInUser = selectSingle(1);
;
?>
<?php if (isset($_SESSION['message'])) : ?>
  <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
    <?php echo $_SESSION['message']['msg']; ?>
  </div>
  <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<div class="card">
  <div class="card-body">
    <header>
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <h4>KDRP</h4>
          </div>
          <div class="col-md-8 text-end">
            <nav>
              <ul>
                <li style="margin-right: 1rem;"><a href="/inventory-app/index.php">Dashboard</a></li>
                <?php if($_SESSION['user']['level']>=1) : ?>
                <li style="margin-left: 1rem;"><a href="/inventory-app/create.php">Create New</a></li>
                <li style="margin-left: 1rem;"><a href="/inventory-app/users.php">Users</a></li>
                <li style="margin-left: 1rem;">
                <?php endif;?>
                  <?php echo $welcome; ?>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>