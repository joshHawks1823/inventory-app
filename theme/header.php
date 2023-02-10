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
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <h4>KDRP</h4>
          </div>
          <div class="col-md-8 text-end">
            <nav>
              <ul>
                <li><a href="/inventory-app/index.php">Dashboard</a></li>
                <li><a style="margin-left: 1rem;" href="/inventory-app/create.php">Create New</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>