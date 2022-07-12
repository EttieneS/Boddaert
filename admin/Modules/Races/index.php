<?php
  require_once("../../../config.php");
  require_once("Races_class.php");
  require("../../Includes/header.php");

  $races = new Races();

  if (isset($_POST['action'])){
    if($_POST['action'] == "addNew"){
      $races->AddModal($_POST['db']);
    }
    if($_POST['action'] == "addrecord"){
      $races->AddRecord($_POST['db']);
    }
    if($_POST['action'] == "deleterecord"){
      $races->DeleteRecord();
    }
  } else {
    $races->init();
  }
?>
