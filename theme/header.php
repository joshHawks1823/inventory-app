<?php
if (!isset($_SESSION['user'])) :
  header('Location: login.php');
  exit();
endif;
?>

<?php
$loggedInUser = selectSingleUser($_SESSION['user']['id']);
$welcome = 'Welcome, ' . $loggedInUser['fname'] . ' ' . $loggedInUser['lname'] . '<a href="logout.php">(Logout)</a>';
?>
<?php if (isset($_SESSION['message'])) : ?>
  <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
    <?php echo $_SESSION['message']['msg']; ?>
  </div>
  <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<!-- <div class="card">
  <div class="card-body"> -->
    <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">KDP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/inventory-app/index.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/inventory-app/create.php">Create New</a>
        </li>
        <?php if ($_SESSION['user']['level'] >= 1) : ?>
        <li class="nav-item">
          <a class="nav-link" href="/inventory-app/users.php">Users</a>
        </li>
        <li class="nav-item" style="margin-left: .5rem;">
        <?php endif; ?>
        <?php echo $welcome; ?>
        </li>
       </ul>
    </div>
  </div>
</nav>
</header>