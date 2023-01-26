<?php
$mysqli = new mysqli("localhost", "root", "", "inventory-app", "3308");
if ($mysqli->connect_error) {
  exit('Error connecting to database');
}
