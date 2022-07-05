<?php
  require_once("../../../config.php");
  require_once("Users_class.php");
  include("../../Includes/header.php");

  echo "<pre>". print_r($_POST) ."</pre>";

  $user = new User();

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'addusertable'){

      $table = $user->createAddEditTable($_POST['db']);
      echo $table;
    }
    if ($_POST['action'] == 'addUser'){
      $name = $_POST['username'];
      $password = $_POST['password'];

      $user->username = $name;

      $result = $user->AddUser($_POST);
      echo $result;
    }

    if ($_POST['action'] == 'edit'){
      $table = $user->createAddEditTable($_POST['db'], $_POST['id']);
      echo $table;
    }
  } else {
      $table = $user->getAllUsers();
      echo $table;
  }
?>
