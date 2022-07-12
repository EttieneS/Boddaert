<?php
  require_once("../../../config.php");
  echo "<script href='../../Horses/horse.js'></script>";
  require("../Selections/Selections_class.php");
  require_once("../../Libraries/Elements/Elements.php");

  class Horse {
    var $name="";
    var $number="";

    function __construct() {}

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

    function getTools($db, $id){
      echo "<form method=post style='float:right'>
              <input type='submit' name='action' id='edit' value='Edit' class='btn btn-warning'>
              <input type='submit' name='action' id='remove' value='Delete' class='btn btn-danger'>
              <input type='submit' name='action' id='View' value='View' class='btn btn-info'>
              <input type='checkbox' id='selected' name='selected[]' value='$id'>
              <input type='hidden' name='db' id='db' value='$db'>
              <input type='hidden' name='id' id='id' value='$id'>
            </form>";
    }
  }
?>
