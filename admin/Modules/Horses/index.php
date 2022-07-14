<script src='script/horses.js'></script>

<?php
  require_once("../../../config.php");
  require_once("Horse_class.php");
  require("../../Includes/header.php");

  $horse = new Horse();

  if (isset($_POST['action'])){
    if ($_POST['action'] == "addNew"){
      $horse->addNew($_POST['db']);
    }
    if ($_POST['action'] == 'addrecord'){
      $result = $horse->Add();
    }
    if ($_POST['action'] == 'Edit'){
      $horse->Edit($_POST['db'], $_POST['id']);
    }
    if ($_POST['action'] == 'updaterecord'){
      $result = $horse->Update();
    }
    if ($_POST['action'] == 'deleterecord'){
      $result = $horse->Delete($_POST);
    }
    if ($_POST['action'] == 'viewmodal'){
      $result = $horse->View($_POST['db']);
    }
    if ($_POST['action'] == 'saveselection'){
      $result = $horse->AddSelection();
      echo $result;
    }
    if ($_POST['action'] == 'displaychart'){
      $result = $horse->DisplayChart();
      echo $result;
    }
  } else {
    $horse->init();
  }

  include("../../Includes/footer.php");
?>
