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

// Select Single Statement
function selectSingle($id = NULL)
{
  global $mysqli;
  $stmt = $mysqli->prepare('SELECT * FROM  products WHERE id = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows === 0) echo ('no rows');
  $row = $result->fetch_assoc();
  $stmt->close();
  return $row;
}

// insert statement
function insert($pname = NULL, $quantity = NULL)
{
  global $mysqli;
  $stmt = $mysqli->prepare('INSERT INTO products (pname, quantity) VALUES (?, ?)');
  $stmt->bind_param('ss', $pname, $quantity);
  $stmt->execute();
  $stmt->close();
}
