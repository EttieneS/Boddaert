<script href='../../Horses/horse.js'></script>;
<script href='../../Horses/script/chart.js'></script>;
<?php
  require_once("../../../config.php");
  require_once("../../Libraries/Elements/Elements.php");

  class Horse {
    var $name="";
    var $number="";

    function __construct() {}

    function init() {
      if(!isset($_SESSION['logged_in'])){
        header("Location: http://localhost/Boddaert/login.php");
      }

      $sql = "SELECT * FROM horses";
      $tablename = 'horses';
      $restrictedarray = "id";
      $buttons = array("select", "saveselection");

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
      $number = $_POST['number'];

      $sql = "INSERT INTO
        horses
        (name, number)
        VALUES
        ('$name', '$number')";

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

      while($row = $horses->fetch_assoc()){
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
      $userid = $_SESSION['userid'];

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
      $id = $_POST['id'];

      $body = GetViewForm($db,$id);
      echo CreateAddEditModal($body);
      echo "<script>
            $(document).ready(function(){
              $('#AddEditModal').modal('show');
            });
            </script>";
    }

    function DisplayChart() {
      $id = $_POST['id'];

      echo "<div id='chart-container'>
              <canvas id='mycanvas' width='600' height='600'></canvas>
            </div>
            <script>
              $(document).ready(function(){
                GetPositions(" . $id . ");
                var ctx = document.getElementById('mycanvas').getContext('2d');
              });
            </script>";
    }
  }
?>
