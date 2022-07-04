<?php
  require_once("../../../config.php");
  require_once("Users_class.php");

  $user = new User();

  if ($_POST['action'] == 'add' ){
    $table = $user->addUserTable();
    echo $table;
  } else {
      $table = $user->getAllUsers();
      echo $table;
  }
?>
