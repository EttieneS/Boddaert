<?php
  require_once("../../../config.php");

  function Label($text){
    $text = ucfirst($text);

    if($text == "Username"){
      $text = "User Name";
    }

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

  function FunctionButton($functionname, $id, $text){
    return "<button type='button' class='btn btn-primary' id='" . $functionname  ."' name='". $functionname ."' onclick='" . $functionname . "(" . $id .")" ."'>" . $text . "</button>";
  }

  function EditFormButton($id, $tablename) {
    return "<form method='post'>
      <button class='btn btn-primary' type='submit' name='action' value='edittable'>Edit</button>
      <input type='hidden' value='$id' id='id' name='id'>
      <input type='hidden' name='db' id='db' value='$tablename'>
    </form>";
  }

  function SelectFormInput($id, $text, $arrayname){
    return "<input type='checkbox' name='". $arrayname . "[]' value='" . $id . "'>" . $text ;
  }

  function Input($name, $type){
    return "<input id='$name' name='$name' type='$type'>";
  };

  function Input($name, $type, $value) {
    return "<input id='$name' name='$name' type='$type' value='$value'>";
  }

  function Table($tablename, $restrictedarray, $buttons){
    $formfields = array();

    $showcolumns = "SHOW COLUMNS FROM " . $tablename;
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
        foreach($button as $value){
          $table .=  "<td>";
          if($value['type'] == "edit"){
            $table .= EditFormButton($id, $tablename);
          }
          if($value['type'] == "select"){
            $table .= SelectFormInput($id, "selected");
          }
          if($value['type'] == "function") {
            $table .= FunctionButton($value['functionname'], $id, $value['text']);
          }

          $table .= "</td>";
        }
      }
      $table .= "</tr>";
    }
    $table .= "</table>
              </form>";

     return $table;
  }

  function CreateAddEditTable($tablename, $id='', $restrictedarray){
    $formfields = array();

    $showcolumns = "SHOW COLUMNS FROM " . $tablename;
    $columns = getDBColumns($showcolumns);

    foreach($columns as $value) {
      array_push($formfields, $value['Field']);
    }

    if ($id != ''){
      $sql = "SELECT * FROM " . $tablename .
             "WHERE
              id = " . $id;

      $data = runSQL($sql);
    }

    $form = "<form method='post'>";
    foreach($formfields as $field){
      if(!(in_array($field, $restrictedarray))){
        $form .= "<div class='form-group'>"
                    . Label($field) . "</br>";
                    if ($id != '') {
                      $form .= Input($name, $data[$field]);
                    } else {
                      $form .= Input($name);
                    }
                    $form .= "</div>";
      }
    }
    $form .= "<div class='form-group'>
                <button type='submit' class='btn btn-primary' name='action'";
    if ($id == ''){
      $form .= "value='add'>Add Record";
    } else {
      $form .= "value='update'>Update Record";
    }
    $form .= "></button></div></form>";
  }
?>
