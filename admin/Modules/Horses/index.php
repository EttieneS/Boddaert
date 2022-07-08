<?php
  require_once("../../../config.php");
  require_once("Horse_class.php");
  include("../../Includes/header.php");

  $horse = new Horse();

  if (isset($_POST['action'])){
    if ($_POST['action'] == 'selecthorses'){
      $checked = $_POST['selected'];
      $list = implode(',', $checked);
      print_r($list);

      $result = $horse->AddSelection($list);
    }
    if ($_POST['action'] == 'addtable'){
      $table = $horse->CreateAddEditTable($_POST['db']);
      echo $table;
    }

    if ($_POST['action'] == 'edittable'){
      $db = $_POST['db'];

      $table = $horse->CreateAddEditTable($_POST['db'], $_POST['id']);
      echo $table;
    }

    if ($_POST['action'] == 'add'){
      $result = $horse->Add();
    } else if ($_POST['action'] == 'update'){
      $result = $horse->Update();
    }
  } else {
      $table = $horse->GetAllHorses();
      echo $table;
  }
?>
