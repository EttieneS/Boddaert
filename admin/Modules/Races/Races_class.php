<?php
  require_once("../../../config.php");
  require("../Selections/Selections_class.php");
  require_once("../../Libraries/Elements/Elements.php");

  class Races {
    var $description="";
    var $positions= array();

    function __construct() {}

    function init() {
      CreateAddEditModal("");

      $sql = "SELECT * FROM races";
      $db = "races";
      $restrictedarray = "id";
      $buttons = "";

      createTable($sql, $db, $restrictedarray="", $buttons);
    }

    function AddModal($db){
      $body = GetAddEditForm($db, $id="");
      echo CreateAddEditModal($body);
      echo "<script>
            $(document).ready(function(){
              $('#AddEditModal').modal('show');
            });
            </script>";
    }

    function AddRecord() {
      $random_number_array = range(1, 10);
      shuffle($random_number_array );
      $random_number_array = array_slice($random_number_array ,0,6);
      $array = implode(",", $random_number_array);

      $sql = "INSERT INTO races (positions) VALUES ('$array')";
      $result = runSQL($sql);

      print_r($random_number_array);
    }
  }
?>
