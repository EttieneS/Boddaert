<?php
  require_once("../../../config.php");
  require_once("Selections_class.php");
  require("../../Includes/header.php");
  require("../../Libraries/Elements/Elements.php");
  echo "<script src='../../Libraries/Selections/selections.js'></script>";

  $selections= new Selections();
<<<<<<< HEAD
  $sessionvariable = 1;
=======
  echo "<p>Selections</p>";
>>>>>>> 83f018666253445bbf700183f44f317e6f54e718

  if (!($_POST['action'] = '')){
    if ($_POST['action'] == 'View'){
      $result = $user->ViewUser($_POST);
    }
    if ($_POST['action'] == 'Delete'){
      $result = $user->DeleteUser($_POST);
    }
  } else {
    $viewallsql = "SELECT * FROM selections WHERE userid = 1";
    $selectionstable = "selections";
    $restrictedarray = "id";
    $buttons = array("selection");

    $table = createTable($viewallsql, $selectionstable, $restrictedarray, $buttons);
    echo $table;

    
  }

  $addsql = "SHOW COLUMNS FOR selections";
  $addrecordrestrictedstring = "id";
  createAddEditModal($sql, $selectionstable, $addrecordrestrictedstring="");

  echo "</body>";
?>
