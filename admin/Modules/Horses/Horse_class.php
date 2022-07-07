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
      // $getcolumnheadings = "SHOW COLUMNS FROM
      //                         horses";
      // $columns = runSQL($getcolumnheadings);
      // $columnheadings = $columns->fetch_assoc();
      //
      // $formfields = array();
      // foreach($columns as $value){
      //   array_push($formfields, $value['Field']);
      // }
      //
      // $restrictedarray = ["id"];
      //
      // $sql = "SELECT * FROM horses";
      //
      // $result = runSQL($sql);
      //
      // $table = "<form method='post'>
      //             <table class='table table-striped'>
      //               <tr>
      //                 <thead>";
      // foreach($columns as $attribute){
      //   if (!(in_array($attribute['Field'], $restrictedarray))){
      //       $table .= "<th>" . $attribute['Field'] . "</th>";
      //   }
      // }
      // $table .= " <th>Actions</th>
      //            </thead>
      //           </tr>";
      //
      // while ($row = $result->fetch_assoc()){
      //   $table .= "<tr>";
      //   foreach($columns as $heading){
      //     if ($heading['Field'] == 'id'){
      //       $id = $row[$heading['Field']];
      //     }
      //
      //     if (!(in_array($heading['Field'], $restrictedarray))){
      //         $table .= "<td>". $row[$heading['Field']] ."</td>";
      //     }
      //   }
      //   $table .= "     <td>
      //                     <form method='post'>
      //                       <button class='btn btn-primary' type='submit' name='action' value='edittable'>Edit</button>
      //                       <input type='hidden' value='$id' id='id' name='id'>
      //                       <input type='hidden' name='db' id='db' value='horses'>
      //                     </form>
      //                   </td>
      //                   <td>
      //                     <input type='checkbox' name='selected[]' value='" . $id . "'>Select
      //                   </td>
      //                 </tr>";
      // }
      //
      // $table .= "     <form method='post'>
      //                     <button class='btn btn-primary' name='action' value='addtable' type='submit'>Add Horse</button>
      //                   <input type='hidden' name='db' id='db' value='horses'>
      //                 </form>
      //             </table>
      //             <button class='btn btn-primary' name='action' value='selecthorses' type='submit'>Select Horses</button>
      //           </form>";
      $id = '';
      $tablename = "horses";
      $restrictedarray = array("id");

      $button1 = array();
      $button1->type = "button";
      $button1->text = "Edit";

      $button2 = array();
      $button2->type = "select";
      $button->text = "Select";
      $buttons = array("edit", "select");
      // $buttons = array("<form method='post'>
      //                       <button class='btn btn-primary' type='submit' name='action' value='edittable'>Edit</button>
      //                       <input type='hidden' value='$id' id='id' name='id'>
      //                       <input type='hidden' name='db' id='db' value='horses'>
      //                     </form>",
      //                     "<input type='checkbox' name='selected[]' value='" . $id . "'>Select");
      $table = Table($tablename, $restrictedarray, $buttons);
      echo $table;
    }

    function createAddEditTable($db, $id=''){
      echo "<h3>Create Add/Edit Table</h3>";
      $restrictedarray = array("id");//[""];
      $showcolumns = "SHOW COLUMNS FROM $db";

      $columns = getDBColumns($showcolumns);
      $id = null;
      if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM
                  horses
                WHERE
                  id = '$id'";
        echo $sql;
        $horsedata = runSQL($sql);

        $horsearray = $horsedata->fetch_assoc();
      }

      $table = "<form method='post'>";

      foreach($columns as $heading) {
        $attribute = $heading['Field'];
        $label = $heading['Field'];

        if ($attribute == "name"){
          $label = "Horse Name";
        }

        if(!(in_array($heading['Field'], $restrictedarray))){


          $table .= "<div class='form-group'>
                      <label>" . $label . "</label></br>
                      <input id='" . $heading['Field'] . "' name='" . $heading['Field'] . "'";
                        if (isset($horsedata)){
                          $table .= "value='" . $horsearray[$attribute] . "'";
                        }
          $table .= "</div>";
        }
      }
      $table .= "<input  type='hidden' id='" . $id . "' name='id' value='". $id  ."'>";


      if (isset($horsedata)){
        $table .= "
                   </br>
                   <button type='submit' class='btn btn-primary' name='action' value='update'>Update Horse</button>
                  </form>";
      } else {
        $table .= "
                   </br>
                   <button type='submit' class='btn btn-primary' name='action' value='add'>Add Horse</button>
                  </form>";
      }

      echo $table;
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
  }
?>
