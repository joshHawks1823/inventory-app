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
  header('Location: update.php?id=' . $mysqli->insert_id);
}
// update statement
function update($pname = NULL, $quantity = NULL, $id)
{
  global $mysqli;
  $stmt = $mysqli->prepare('UPDATE products SET pname = ?, quantity = ? WHERE id =?');
  $stmt->bind_param('ssi', $pname, $quantity, $id);
  $stmt->execute();
  if ($stmt->affected_rows === 0) echo ('No rows updated');
  $stmt->close();
}

// delete statement
function delete($id)
{
  global $mysqli;
  $stmt = $mysqli->prepare('DELETE FROM products WHERE id =?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $stmt->close();
  header('Location: index.php');
}
