"<script src='script/selections.js'></script>";

<?php
  require_once("../../../config.php");
  require_once("Selections_class.php");
  require("../../Includes/header.php");
  require_once("../../Libraries/Elements/Elements.php");

  echo "<pre>" . print_r($_POST) . "</pre>";
  $selection= new Selections();
  $sessionvariable = 1;

  if (isset($_POST['action'])){
    if($_POST['action'] == "addNew"){
      $selection->addNew($_POST['db']);
    }
    if ($_POST['action'] == 'Edit'){
      $selection->Edit($_POST['db'], $_POST['id']);
    }
    if ($_POST['action'] == 'updaterecord'){
      echo "update record index";
      print_r($_POST);
      //$result = $selection->Update($_POST);
    }
  } else {
    $sql = "SELECT * FROM selections";
    $tablename = 'selections';
    $restrictedarray = "id";
    $buttons = array();

    $table = createTable($sql, $tablename, $restrictedarray, $buttons);
    echo $table;
  }

  CreateAddEditModal("");
  echo "</body>";
  echo "</html>";
?>
