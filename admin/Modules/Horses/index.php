<?php
  require_once("../../../config.php");
  require_once("Horse_class.php");
  require("../../Includes/header.php");
  echo "<script src='../../Libraries/Horses/horses.js'></script>";

  $horse = new Horse();

  if (isset($_POST['action'])){
<<<<<<< HEAD
  //   if ($_POST['action'] == 'selecthorses'){
  //     $checked = $_POST['selected'];
  //     $list = implode(',', $checked);
  //     print_r($list);

  //     $result = $horse->AddSelection($list);
  //   }
  //   if ($_POST['action'] == 'addtable'){
  //     $table = $horse->CreateAddEditTable($_POST['db']);
  //     echo $table;
  //   }

  //   if ($_POST['action'] == 'edittable'){
  //     $db = $_POST['db'];

  //     $table = $horse->CreateAddEditTable($_POST['db'], $_POST['id']);
  //     echo $table;
  //   }

  //   if ($_POST['action'] == 'add'){
  //     $result = $horse->Add();
  //   } else if ($_POST['action'] == 'update'){
  //     $result = $horse->Update();
  //   }
  } else {
      $table = $horse->GetAllHorses();
      echo $table;
  }

  echo '<pre>'.print_r($_POST,true).'</pre>';
  echo "</body>";
=======
    if ($_POST['addNew'] =="Add"){
      //CALL MODAL
      //createModal();
    }
  } else {
    $table = $horse->GetAllHorses();
    echo $table;
  }
  
  $addModal = AddEditModal();
  echo $addModal;

  include("../../Includes/footer.php");
>>>>>>> 83f018666253445bbf700183f44f317e6f54e718
?>
