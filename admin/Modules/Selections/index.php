<script src='script/selections.js'></script>

<?php
  require_once("../../../config.php");
  require_once("Selections_class.php");
  require("../../Includes/header.php");
  require_once("../../Libraries/Elements/Elements.php");

  $selection = new Selections();

  if (isset($_POST['action'])){
    if($_POST['action'] == "addNew"){
      $selection->addNew($_POST['db']);
    }
    if ($_POST['action'] == 'addrecord'){
      $result = $selection->Add($_POST);
      echo $result;
    }
    if ($_POST['action'] == 'Edit'){
      $selection->Edit($_POST['db'], $_POST['id']);
    }
    if ($_POST['action'] == 'updaterecord'){
      $result = $selection->Update($_POST);
      echo $result;
    }
    if ($_POST['action'] == 'saveselection'){
      $result = $selection->SaveSelection();
    }
    if ($_POST['action'] == 'deleterecord'){
      $result = $selection->DeleteRecord();

      echo header('Location: index.php');
    }
    if ($_POST['action'] == 'viewmodal'){
      $result = $selection->View($_POST['db']);
    }
  } else {
    $selection->init();
  }
?>
