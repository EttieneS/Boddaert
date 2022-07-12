<?php
  require_once("../../../config.php");

  class Selections {
    var $userid = "";
    var $selections = array();

    function __construct() {}

    function ViewAllTable() {
      $tablename = "selections";
      $reservedarray = array("id");

      $buttons = $this->getTools($db,$id);//array( array('type' => 'function', 'text' => 'Details', 'functionname' => "detailsModal"));

      $table = createTable($tablename, $reservedarray, $buttons);
      echo $table;
    }

    function addNew($db, $id=""){
      $body = GetAddEditForm($db,$id);
      echo CreateAddEditModal($body);
      echo "<script>
            $(document).ready(function(){
              $('#AddEditModal').modal('show');
            });
            </script>";
    }

    function Edit($db, $id) {
      $body = GetAddEditForm($db,$id);

      echo CreateAddEditModal($body);
      echo "<script>
            $(document).ready(function(){
              $('#AddEditModal').modal('show');
            });
            </script>";
    }

    function Update($data) {
      $id = $data['id'];
      $selection = $data['selection'];

      print_r($_POST);
      $sql = "UPDATE selections SET
        selections = '$selection'
        WHERE
        id = '$id'";

      echo $sql;

      $result = runSQL($sql);
      //echo header('Location: index.php');
    }

    function getTools($db,$id){
      echo "<form method=post style='float:right'>
              <input type='submit' name='edit' id='edit' value='Edit' class='btn btn-warning'>
              <input type='submit' name='remove' id='remove' value='Remove' class='btn btn-danger'>
              <input type='submit' name='View' id='View' value='View' class='btn btn-info'>
              <input type='hidden' name='db' id='db' value='$db'>
              <input type='hidden' name='id' id='id' value='$id'>
            </form>";
    }
  }
?>
