<script href='../../Horses/horse.js'></script>;
<?php
  require_once("../../../config.php");
  require("../Selections/Selections_class.php");
  require_once("../../Libraries/Elements/Elements.php");

  class Horse {
    var $name="";
    var $number="";

    function __construct() {}

    function init() {
      session_start()

      if(!isset($_SESSION['logged_in'])){
        header("Location: http://localhost/Boddaert/login.php");
      }

      $sql = "SELECT * FROM horses";
      $tablename = 'horses';
      $restrictedarray = "id";
      $buttons = array();

      $table = createTable($sql, $tablename, $restrictedarray, $buttons);
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
      $name = $_POST['name'];

      $sql = "INSERT INTO
        horses
        (name)
        VALUES
        ('$name')";

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

    function ViewAll() {
      $sql = "SELECT * FROM
        horses";

      $horses = runSQL($sql);

      while($row = $horses->fetch_assoc())
      {
        $rows[] = $row;
      }

      return $rows;
    }

    function Update() {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $number = $_POST['number'];

      $sql = "UPDATE horses SET
        name = '$name',
        number = '$number'
        WHERE
        id = '$id'";

      $result = runSQL($sql);

      header('Location: index.php');
    }

    function Delete() {
      $id = $_POST['id'];

      $sql = "DELETE FROM
        horses
        WHERE
        (id = '$id')";

      $result = runSQL($sql);
      echo $result;
    }

    function GetAllHorses() {
      $sql = "SELECT * FROM horses";
      createTable($sql,"horses");
    }

    function AddSelection(){
      $userid = 1; //Session variable

      $checked = $_POST['selected'];
      $selections = implode(',', $checked);

      $sql = "INSERT INTO
        selections
        (userid, selection)
        VALUES
        ('$userid', '$selections')";

      $result = runSQL($sql);
      echo $result;
    }

    function View($db, $id=""){
      $db = $_POST['db'];

      $body = GetViewForm($db,$id);
      echo CreateAddEditModal($body);
      echo "<script>
            $(document).ready(function(){
              $('#AddEditModal').modal('show');
            });
            </script>";
    }
  }
?>
