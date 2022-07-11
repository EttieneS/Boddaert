<?php
  require_once("../../../config.php");
  require_once("Selections_class.php");
  include("../../Includes/header.php");
  require("../../Libraries/Elements/Elements.php");
  echo "<script src='../../Libraries/Selections/selections.js'></script>";

  $selections= new Selections();
  echo "<p>Selections</p>";

  //$table = $selections->ViewAllTable();
  //echo $table;
?>
