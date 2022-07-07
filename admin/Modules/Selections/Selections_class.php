<?php
  require_once("../../../config.php");

  class Selections {
    var $userid = "";
    var $selections = array();

    function __construct() {}

    function ViewAllTable() {
      $tablename = "selections";
      $reservedarray = array("id");
      $buttons = array("<button type='button' class='btn btn-primary' id='modal' name='modal' onclick='Modal()'>Modal</button>");

      $table = Table($tablename, $reservedarray, $buttons);
      echo $table;
    }
  }
?>
