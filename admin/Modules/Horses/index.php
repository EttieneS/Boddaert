<?php
  require_once("../../../config.php");
  require_once("Horse_class.php");
  include("../../Includes/header.php");    

  echo "<pre>". print_r($_POST) ."</pre>";

  $horse = new Horse();

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'selection'){

    }
    // if ($_POST['action'] == 'add'){
    //   $table = $user->createAddUserTable();
    //   echo $table;
    // }
  } else {
      $table = $horse->GetAllHorses();
      echo $table;
  }
?>
