<?php
  require_once("../../../config.php");

  function Label($text){
    return "<label>" . $text . "</label>";
  }

  function TD($text) {
    return "<td>" . $text . "</td>";
  }

  function TH($text) {
    $text = ucfirst($text);
    if ($text == "Username"){
      $text = "User Name";
    }
    return "<th>" . $text . "</th>";
  }

  function DivCol() {
    return "<div class='col'></div>";
  }

  function EditFormButton($id, $tablename) {
    return "<form method='post'>
      <button class='btn btn-primary' type='submit' name='action' value='edittable'>Edit</button>
      <input type='hidden' value='$id' id='id' name='id'>
      <input type='hidden' name='db' id='db' value='$tablename'>
    </form>";
  }

  function SelectFormInput($id, $text){
    return "<input type='checkbox' name='selected[]' value='" . $id . "'>" . $text ;
  }

  function Table($tablename, $restrictedarray, $buttons){
    $formfields = array();

    $showcolumns = "SHOW COLUMNS FROM "  .  $tablename;

    $columns = getDBColumns($showcolumns);

    foreach($columns as $value) {
      array_push($formfields, $value['Field']);
    }

    $table = "<table>
                <tr>
                  <thead>";
    foreach($formfields as $heading){
      if(!(in_array($heading, $restrictedarray))){
        $table .= TH($heading);
      }
    }
    if(isset($buttons)){
      foreach($buttons as $button){
          $table .= TH("");
      }
    }

    $table .=   "</thead>
              </tr>";

    $selectall = "SELECT * FROM " . $tablename;
    $tabledata = runSQL($selectall);
    $id = "";

    while ($row = $tabledata->fetch_assoc()){
      $id = ($row['id']);
      $table .= "<tr>";
      foreach($formfields  as $value){
        if(!(in_array($value, $restrictedarray))){
          $table .= TD($row[$value]);
        }
      }

      foreach($buttons as $button){
        $table .=  "<td>";
        if($button == "edit"){
          $table .= EditFormButton($row['id'], $tablename);
        }
        if($button == "select"){
          $table .= SelectFormInput($row['id'], "selected");
        }

        $table .= "</td>";
      }
      $table .= "</tr>";
    }
    $table .= "</table>
              </form>";

     return $table;
  }
?>
