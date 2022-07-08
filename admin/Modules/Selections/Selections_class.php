<?php
  require_once("../../../config.php");

  class Button {
    //function __construct(){}

    public $type;
    public $functionname;
    public $text;
  }

  class Selections {
    var $userid = "";
    var $selections = array();

    function __construct() {}

    function ViewAllTable() {
      // $tablename = "selections";
      // $reservedarray = array("id");

      // $buttons[] = array( array('type' => 'function', 'text' => 'Details', 'functionname' => "detailsModal"));

      // $table = Table($tablename, $reservedarray, $buttons);
      // echo $table;
    }
  }
?>
