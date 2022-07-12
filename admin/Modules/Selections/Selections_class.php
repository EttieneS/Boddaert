<script href='../../Selections/script/selection.js'></script>;

<?php
  require_once("../../../config.php");
  require_once("../../Libraries/Elements/Elements.php");

  class Selections {
    var $userid = "";
    var $selections = array();

    function __construct() {}

    function init() {
      //CONCAT(u.username," ", u.surname)
      $sql = "SELECT s.id, u.username as 'User Name', s.selection as 'Selection' FROM selections s
          LEFT JOIN users u ON u.id = s.userid";

      $tablename = 'selections';
      $restrictedstring = "s.id";

      $buttons = array("select");

      $headings = array('User Name', 'Selection');
      $table = createJoinTable($sql, $tablename, $headings, $buttons);

      echo $table;
    }

    function ViewAllTable() {
      $tablename = "selections";
      $restrictedstring = "id";

      $buttons = array("select");
      $tools = $this->getTools($tablename,$id='');
      $sql = "SELECT * FROM selections";

      $table = createTable($sql, $tablename, $restrictedstring, $tools);
      echo $table;
    }

    function addNew($db, $id=""){
      $body = GetAddEditForm($db, $id);
      echo CreateAddEditModal($body);
      echo "<script>
            $(document).ready(function(){
              $('#AddEditModal').modal('show');
            });
            </script>";
    }

    function Add() {
      $selection = $_POST['selection'];

      $sql = "INSERT INTO
        selections
        (selection)
        VALUES ('$selection')";

      $result = runSQL($sql);
      echo $result;
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
      $selection = $_POST['selection'];

      print_r($_POST);
      $sql = "UPDATE selections SET
        selection = '$selection'
        WHERE
        id = '$id'";

      $result = runSQL($sql);
      echo header('Location: index.php');
    }

    function SaveSelection(){
      $userid = 1; //sessionvariable

      $selection = implode(",", $_POST['selected']);

      $sql = "INSERT INTO selections
              (userid, selection)
              VALUES
              ('$userid', '$selection')";


      $result = runSQL($sql);
      echo $result;
    }

    function View($db, $id=""){
      $db = $_POST['db'];

      $body = $this->GetViewDetailsForm($db, $id);
      echo $body;
      echo CreateAddEditModal($body);
      echo "<script>
            $(document).ready(function(){
              $('#AddEditModal').modal('show');
            });
            </script>";
    }

    function GetViewDetailsForm($db, $id){
      //$db = $_POST['db'];
      //$id = $_POST['id'];
      $db = "horses";
      $id = 1;

      $restrictedarray = "";
      $headings = getDBColumns($db, $restrictedarray);

      $body = "<table class='table table-striped'>
              <thead>";
      foreach($headings as $heading){
        if ($heading['Field'] != 'id'){
            $name = ucfirst($heading['Field']);
            $body .= "<th>{$name}</th>";
        }
      }
      $body .= "<thead>";

      $getSelection = "SELECT selection FROM selections WHERE id = " . $id;
      $selection = runSQL($getSelection);
      print_r($selection);
      $selection = $selection->fetch_assoc();
      $selection = explode(",", $selection['selection']);

      foreach($selection as $item){
        $getHorse = "SELECT * FROM horses WHERE id = " . $item;
        $data = runSQL($getHorse);
        $horse = $data->fetch_assoc();

        $body .= "<tr>";
        foreach($headings as $heading) {
          $name = $heading['Field'];
          if ($name != 'id'){
              $body .= "<td>" . $horse[$name] . "</td>";
          }
        }
        $body .= "</tr>";
      }
      $body .= "</table>";
      return $body;
    }
  }
?>
