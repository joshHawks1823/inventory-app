<?php
include('includes/functions.php');
$product = (isset($_GET['id']) ? delete($_GET['id']) : exit());
