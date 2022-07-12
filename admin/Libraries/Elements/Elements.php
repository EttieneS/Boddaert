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

  function Input($name, $type, $value=''){
    return "<input id='$name' name='$name' type='$type' value='$value'>";
  };

  function DeleteFormButton($id){
    return "<form method='post'>
             <button id='deleteaction' name='action' value='deleterecord' type='submit' class='btn btn-primary'>Delete</button>
             <input type='hidden' id='id' name='id' value='$id'>
            </form>";
  }

  function createTable($sql, $tablename, $restrictedarray="", $buttons){
    $columns = getDBColumns($tablename,$restrictedarray);

    echo "<form method=post style='float:right'>
            <button type='submit' class='btn btn-success' id='addBtn' name='action' value='addNew'>Add</button>
            <input type='hidden' id='db' name='db' value='$tablename'>
          </form>";
    echo "<table class='table table-striped'>";
    echo "<thead>";
    foreach($columns as $column){
      echo "<th>{$column['Field']}</th>";
    }
    echo "<th>Tools</th>";
    echo "</thead>";

    $result = runSQL($sql);

    while($row = $result->fetch_assoc()){
      echo "<tr>";
      foreach($columns as $column){
        echo "<td>{$row[$column['Field']]}</td>";

      }

      if (!(isset($buttons))){
        foreach($buttons as $button){
          SelectFormInput($row[$column['id']]);
          if ($button == "select"){
          }
        }
      }

      echo "<td>";
      getTools($tablename,$row['id'], "selected", );
      echo "</td>";
      echo "</tr>";
    }

    echo "</table>";
  }

  function getTools($db, $id){
    echo "<form method=post style='float:right'>
            <input type='submit' name='action' id='edit' value='Edit' class='btn btn-warning'>
            <input type='submit' name='action' id='remove' value='Delete' class='btn btn-danger'>
            <input type='submit' name='action' id='View' value='View' class='btn btn-info'>
            <input type='hidden' name='db' id='db' value='$db'>
            <input type='hidden' name='id' id='id' value='$id'>
          </form>";
  }

  function CreateAddEditModal($body){
    echo  "<div class='modal fade' id='AddEditModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'>Add/Edit</h5>
              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>
            <div class='modal-body'>";
              if (isset($body)){
                echo $body;
              }
    echo   "</div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-secondary' data-dismiss='modal' onclick='CloseAddEditModal()'>Close</button>
            </div>
          </div>
        </div>
      </div>";
  }

  function GetAddEditForm($db,$id=''){
    $sql = "";
    $column = "";
    $action = $_POST['action'];

    $body = "<form method='post'>";

    if ($action == 'Edit'){
      $id = $_POST['id'];
      $sql = "SELECT * FROM " . $db . " WHERE id = " . $id;
      $body .= "<input type='hidden' id='id' name='id' value='$id' >";

      $columns = runSQL($sql);
      $column = $columns->fetch_assoc();
    }

    $restrictedstring = "id";
    $headings = getDBColumns($db, $restrictedstring);

    foreach($headings as $heading){
      $name = $heading['Field'];
      $body .= Label($name) . '</br>';
      if ($action == 'addNew') {
          $body .= "<input id='$name' name='$name' ></br>";
      } else if($action == 'Edit') {
        $body .= "<input id='$name' name='$name' value='$column[$name]'></br>";
      }
    }

    if ($action == 'addNew' ){
      $body .= "<button type='submit' class='btn btn-primary' id='saveBtn' name='action' value='addrecord'>Save Record</button>";
    } else {
      $body .= "<button type='submit' class='btn btn-primary' id='saveBtn' name='action' value='updaterecord'>Update Record</button>";
    }
    $body .= "</form>";

    return $body;
  }

  function GetViewForm($db, $id){
    $db = $_POST['db'];
    $id = $_POST['id'];

    $restrictedstring = "id";
    $headings = getDBColumns($db, $restrictedstring);

    $body = "";

    $sql = "SELECT * FROM $db WHERE id = $id";
    $columns = runSQL($sql);
    $column = $columns->fetch_assoc();

    foreach($headings as $heading){
      $name = $heading['Field'];
      $body .= Label($name) . ': ';
      $body .= Label($column[$name]) . '</br>';
    }

    return $body;
  }

  ?>
