<?php
  require_once("Users_class.php");
  require_once("../../Includes/header.php");
  require_once("../../Libraries/Elements/Elements.php");
  echo "<script src='../../Libraries/Users/users.js'></script>";

  echo "<pre>" . print_r($_POST) . "</pre>";
  $user = new User();

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'add'){
      $tablename = "users";
      $restrictedarray = array("id");

      $form = CreateAddEditTable($tablename, $restrictedarray);
      echo $form;
    }
    if ($_POST['action'] == 'ShowEditModal'){
      echo "<script>ShowCreateAddEditModal()</script>";
    }
    if ($_POST['action'] == 'addrecord'){
      $result = $user->AddUser();
    }
    if ($_POST['action'] == 'updaterecord'){
      $result = $user->UpdateUser($_POST);
    }
    if ($_POST['action'] == 'Delete'){
      $result = $user->DeleteUser($_POST);
    }
  } else {
      $sql = "SELECT * FROM users";
      $tablename = 'users';
      $restrictedarray = "id";
      $buttons = array();

      $table = createTable($sql, $tablename, $restrictedarray, $buttons);
      echo $table;
  }

  $addsql = "SHOW COLUMNS FOR users";
  $addrecordrestrictedstring = "id";
  $table = "users";

  $viewmodal = createViewModel($tablename,  $addrecordrestrictedstring);
  echo $viewmodal;

  $modal = createAddEditModal($sql, $table, $addrecordrestrictedstring);
  echo $modal;
?>
