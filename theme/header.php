<?php
$loggedproduct = selectSingle(1);
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
      <div class="container">
        <div class="row">
          <div class="col">
            [logo here]
          </div>
          <div class="col-md-8 text-end">
            <nav>
              <ul>
                <li><a href="/inventory-app/index.php">Dashboard</a></li>
                <li><a href="/inventory-app/create.php">Create New</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>