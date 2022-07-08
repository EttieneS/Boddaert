<?php
  require_once("../../../config.php");
  echo "<script href='../../Horses/horse.js'></script>";
  require("../Selections/Selections_class.php");
  require_once("../../Libraries/Elements/Elements.php");

  class Horse {
    var $name="";
    var $number="";

    function __construct() {}

    function Add() {
      $name = $_POST['name'];
      echo "<pre>" . $_POST . '</pre>';
      $sql = "INSERT INTO
        horses
        (name)
        VALUES
        ('$name')";

      $result = runSQL($sql);
      echo $result;
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

    function Delete($userdata) {
      $id = $userdata['id'];

      $sql = "DELETE FROM
        users
        WHERE
        (id = '$id')";

      $result = runSQL($sql);
      echo $result;
    }

    function GetAllHorses() {
      
      $sql = "SELECT * FROM horses";
      createTable($sql,"horses");
    }

    // function createAddEditTable($db, $id=''){
    //   echo "<h3>Create Add/Edit Table</h3>";
    //   $restrictedarray = array("id");//[""];
    //   $showcolumns = "SHOW COLUMNS FROM $db";

    //   $columns = getDBColumns($showcolumns);
    //   $id = null;
    //   if(isset($_POST['id'])){
    //     $id = $_POST['id'];
    //     $sql = "SELECT * FROM
    //               horses
    //             WHERE
    //               id = '$id'";
    //     echo $sql;
    //     $horsedata = runSQL($sql);

    //     $horsearray = $horsedata->fetch_assoc();
    //   }

    //   $table = "<form method='post'>";

    //   foreach($columns as $heading) {
    //     $attribute = $heading['Field'];
    //     $label = $heading['Field'];

    //     if ($attribute == "name"){
    //       $label = "Horse Name";
    //     }

    //     if(!(in_array($heading['Field'], $restrictedarray))){


    //       $table .= "<div class='form-group'>
    //                   <label>" . $label . "</label></br>
    //                   <input id='" . $heading['Field'] . "' name='" . $heading['Field'] . "'";
    //                     if (isset($horsedata)){
    //                       $table .= "value='" . $horsearray[$attribute] . "'";
    //                     }
    //       $table .= "</div>";
    //     }
    //   }
    //   $table .= "<input  type='hidden' id='" . $id . "' name='id' value='". $id  ."'>";


    //   if (isset($horsedata)){
    //     $table .= "
    //                </br>
    //                <button type='submit' class='btn btn-primary' name='action' value='update'>Update Horse</button>
    //               </form>";
    //   } else {
    //     $table .= "
    //                </br>
    //                <button type='submit' class='btn btn-primary' name='action' value='add'>Add Horse</button>
    //               </form>";
    //   }

    //   echo $table;
    // }

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
  }
?>
