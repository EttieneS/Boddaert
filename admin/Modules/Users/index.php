<?php
  require_once("Users_class.php");
  require_once("../../Includes/header.php");
  require_once("../../Libraries/Elements/Elements.php");
  echo "<script src='../../Libraries/Users/users.js'></script>";

  $user = new User();

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'add'){
      $tablename = "users";
      $restrictedarray = array("id");

      $form = CreateAddEditTable($tablename, $restrictedarray);
      echo $form;
    }
    if ($_POST['action'] == 'edittable'){
      $id = $_POST['id'];
      $tablename = "users";
      $restrictedarray = array("id");

      $form = CreateAddEditTable($tablename, $restrictedarray, $id);
      echo $form;
    }
    if ($_POST['action'] == 'addrecord'){
      $result = $user->AddUser();
    }
    if ($_POST['action'] == 'updaterecord'){
      $result = $user->UpdateUser($_POST);
    }
    if ($_POST['action'] == 'deleterecord'){
      $result = $user->DeleteUser($_POST);
    }
  } else {
      $sql = "SELECT * FROM users";
      $tablename = 'users';
      $restrictedarray = array("id");
      $restrictedstring = "id";
      $buttons[] = array();

      //function createTable($sql, $tablename, $restrictedarray){
      $table = createTable($sql, $tablename, $restrictedstring, $buttons);

      //echo $table;
  }

  // $addeditmodal = CreateAddEditModal();
  // echo $addeditmodal;

  $table .= CreateAddEditModal();
  echo $table;

  echo "</body>";
  echo "</html>";
?>
