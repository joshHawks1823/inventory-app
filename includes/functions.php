<?php
require_once('db.php');
session_start();

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
  if ($result->num_rows === 0) :
    $_SESSION['message'] = array('type' => 'danger', 'msg' => 'There currently no records in the database');
  else :
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
  endif;
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
  $_SESSION['message'] = array('type' => 'success', 'msg' => 'Successfully created a new product.');
  header('Location: update.php?id=' . $mysqli->insert_id);
  exit();
}
// update statement
function update($pname = NULL, $quantity = NULL, $id)
{
  global $mysqli;
  $stmt = $mysqli->prepare('UPDATE products SET pname = ?, quantity = ? WHERE id =?');
  $stmt->bind_param('ssi', $pname, $quantity, $id);
  $stmt->execute();
  if ($stmt->affected_rows === 0) :
    $_SESSION['message'] = array('type' => 'danger', 'msg' => 'You did not make any changes.');
  else :
    $_SESSION['message'] = array('type' => 'success', 'msg' => 'Successfully updated selected product.');
  endif;
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
  $_SESSION['message'] = array('type' => 'success', 'msg' => 'Successfully deleted selected product.');
  header('Location: index.php');
  exit();
}

// Login Statement
function doLogin($username = NULL, $password = NUll)
{
  global $mysqli;
  // $password = password_hash($password, PASSWORD_DEFAULT);
  // echo $password;
  $stmt = $mysqli->prepare('SELECT * FROM  users WHERE username = ? AND active = 1');
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows === 0) :
    $_SESSION['message'] = array('type' => 'danger', 'msg' => 'Your account has not been enabled. Please contact your adminstrator.');
  else :
    while ($row = $result->fetch_assoc()) {
      $hash = $row['password'];
      if (password_verify($password, $hash)) :
        $_SESSION['user']['id'] = $row['id'];
        $_SESSION['user']['fname'] = $row['fname'];
        $_SESSION['user']['lname'] = $row['lname'];
        $_SESSION['user']['username'] = $row['username'];
        $_SESSION['user']['level'] = $row['level'];
        header('Location: index.php');
      else :
        $_SESSION['message'] = array('type' => 'danger', 'msg' => 'Your username or password is incorrect.');
      endif;
    }
  endif;
  $stmt->close();
}

// Logout Statment
function doLogOut()
{
  unset($_SESSION['user']);
  $_SESSION['message'] = array('type' => 'success', 'msg' => 'You have been successfully logged out');
  header('Location: login.php');
  exit();
}

// Select single statement
function selectSingleUser($id = NULL)
{
  global $mysqli;
  $stmt = $mysqli->prepare('SELECT * FROM  users WHERE id = ?');
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $stmt->close();
  return $row;
}

// $password = password_hash($password, PASSWORD_DEFAULT);