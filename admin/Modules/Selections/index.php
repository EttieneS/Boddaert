<?php
  require_once("../../../config.php");
  require_once("Selections_class.php");
  include("../../Includes/header.php");
  echo "<script src='../../Libraries/Selections/selections.js'></script>";
  
  echo "<pre>". print_r($_POST) ."</pre>";

  $selections= new Selections();

  //if (!(isset($_POST['action'])){
    $table = $selections->ViewAllTable();
    echo $table;
  //}
?>
