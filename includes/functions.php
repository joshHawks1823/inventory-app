<?php
require_once('db.php');

// format arrays
function formatcode($arr)
{
  echo '<pre>';
  print_r($arr);
  echo '</pre>';
}

// Select Statement
function selectAll()
{
  global $mysqli;
  $data = array();
  $stmt = $mysqli->prepare('SELECT * FROM  products');
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows === 0) echo ('no rows');
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
  $stmt->close();
  return $data;
}
