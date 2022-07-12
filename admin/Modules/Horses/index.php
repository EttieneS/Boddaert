<script src='script/horses.js'></script>";
<?php
  require_once("../../../config.php");
  require_once("Horse_class.php");
  require("../../Includes/header.php");

  echo '<pre>'.print_r($_POST,true).'</pre>';

  $horse = new Horse();

  if (isset($_POST['action'])){
    if($_POST['action'] == "addNew"){
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
    if ($_POST['action'] == 'Delete'){
      $result = $horse->Delete($_POST);
      $_POST = '';
      echo header('Location: index.php');
    }
    if ($_POST['action'] == 'View'){
      $result = $horse->View($_POST['db']);
    }
    if ($_POST['action'] == 'Select'){
      $result = $horse->Select($_POST['selected']);
      echo print_r($_POST);
    }
  } else {
    $sql = "SELECT * FROM horses";
    $tablename = 'horses';
    $restrictedarray = "id";
    $buttons = array();

    $table = createTable($sql, $tablename, $restrictedarray, $buttons);
    echo $table;
  }

  CreateAddEditModal("");

  include("../../Includes/footer.php");
?>
