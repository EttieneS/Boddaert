<?php
  require_once("../../../config.php");
  require_once("Users_class.php");

  echo "<pre>". print_r($_POST) ."</pre>";

  $user = new User();

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'add'){
      $table = $user->createAddUserTable();
      echo $table;
    }
  } else {
      $table = $user->getAllUsers();
      echo $table;
  }
?>