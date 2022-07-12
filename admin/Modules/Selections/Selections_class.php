<script href='../../Selections/script/selection.js'></script>;

<?php
  require_once("../../../config.php");
  require_once("../../Libraries/Elements/Elements.php");

  echo "<pre>" . print_r($_POST) . "</pre>";
  class Selections {
    var $userid = "";
    var $selections = array();

    function __construct() {}

    function init() {

      if(!isset($_SESSION['logged_in'])){
        header("Location: http://localhost/Boddaert/login.php");
      }
      //CONCAT(u.username," ", u.surname)
      $sql = "SELECT s.id, u.username as 'User Name', s.selection as 'Selection' FROM selections s
          LEFT JOIN users u ON u.id = s.userid";

      $races = "SELECT * FROM races WHERE id = 1";

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

      $races = "SELECT * FROM races WHERE id = 1";

      $body = $this->GetViewDetailsForm($db, $id, $races);
      echo $body;
      echo CreateAddEditModal($body);
      echo "<script>
            $(document).ready(function(){
              $('#AddEditModal').modal('show');
            });
            </script>";
    }

    function GetViewDetailsForm($db, $id, $getpositions){
      //$db = $_POST['db'];
      //$id = $_POST['id'];
      $db = "horses";
      $id = 1;

      $restrictedarray = "";
      $headings = getDBColumns($db, $restrictedarray);

      $getpositions = "SELECT * FROM races WHERE id = 1";
      $data = runSQL($getpositions);
      print_r($data);
      $raceresults = $data->fetch_assoc();
      $raceresults = explode(",", $raceresults['positions']);

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

      $selection = $selection->fetch_assoc();
      $selection = explode(",", $selection['selection']);

      $index = 0;

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
        // if ($raceresults[$index] != null){
          $body .= $this->JudgeResult($horse['id'], $raceresults[$index]);
          $index += 1;
        // }

        $body .= "</tr>";
      }

      $body .= "</table>";
      return $body;
    }

    function JudgeResult($horse, $position){
      if ($horse == null){
        return $cell = "<td>You didn't bet</td>";
      }
      if ($position == null){
        return $cell = "<td>No horse in this position</td>";
      }

      if ($horse == $position){
         $_SESSION['wallet'] += 10;
         $_SESSION['won'] += 10;
         return $cell = "<td>You won</td>";
      } else {
        $_SESSION['wallet'] -= 10;
        $_SESSION['lost'] += 10;
        return $cell = "<td>You lost</td>";
      }

      return $cell;
    }

    function DeleteRecord(){
      $id = $_POST['id'];
      $sql = "DELETE FROM selections WHERE id = " . $id;

      $result = runSQL($sql);
      $header = "Location: index.php";
    }
  }
?>
