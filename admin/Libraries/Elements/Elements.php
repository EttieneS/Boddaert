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

  function createTable($sql, $tablename, $restrictedarray, $buttons){
    $columns = getDBColumns($tablename, $restrictedarray);

    echo "<form method=post style='float:right'>
            <input type='submit' name='addNew' id='addNew' value='Add' onclick='OpenAddEditModal()' class='btn btn-success'>
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
      echo "<td>";
      getTools($tablename,$row['id']);
      echo "</td>";
      echo "</tr>";
    }

    echo "</table>";
  }

  function getTools($db,$id){
    echo "<form method=post style='float:right'>
            <input type='submit' name='edit' id='edit' value='Edit' class='btn btn-warning'>
            <input type='submit' name='remove' id='remove' value='Remove' class='btn btn-danger'>
            <input type='submit' name='View' id='View' value='View' class='btn btn-info'>
            <input type='hidden' name='db' id='db' value='$db'>
            <input type='hidden' name='id' id='id' value='$id'>
          </form>";
  }

  function createModal(){
    echo "<script>

          </script>";
    echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h5 class='modal-title' id='exampleModalLabel'>Modal title</h5>
                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                  ...
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                  <button type='button' class='btn btn-primary'>Save changes</button>
                </div>
              </div>
            </div>
          </div>";
  }

  function CreateAddEditModal() {
    $modal =  "<div class='modal fade' id='AddEditModal' name='AddEditModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Add/Edit Record</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>
          <div class='modal-body'>
            <p>Add/Edit</p>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
            <button type='button' class='btn btn-primary'>Save changes</button>
          </div>
        </div>
      </div>
    </div>";


    echo $modal;
  }

  function CreateAddEditTable($tablename,  $restrictedarray, $id=''){
    $formfields = array();
    $rows = array();

    $showcolumns = "SHOW COLUMNS FROM " . $tablename;
    $columns = getDBColumns($showcolumns);

    foreach($columns as $value) {
      array_push($formfields, $value['Field']);
    }

    if ($id != ''){
      $sql = "SELECT * FROM " . $tablename .
             " WHERE
              id = " . $id;

      $data = runSQL($sql);
      $rows = $data->fetch_assoc();
    }

    $form = "<form method='post'>";
    foreach($formfields as $field){
      if(!(in_array($field, $restrictedarray))){
        $form .= "<div class='form-group'>"
                    . Label($field) . "</br>";
                    if ($id == '') {
                      $form .= Input($field, "text");
                    }
                    else {
                      $form .= Input($field, "text", $rows[$field]);
                    }
                    $form .= "</div>";
      }
    }
    $form .= ";
               <button type='submit' class='btn btn-primary' id='action' name='action'";
    if ($id == ''){
      $form .= "value='addrecord'>Add Record</button>";
    } else {
      $form .= "value='updaterecord'>Update Record</button>
                <input type='hidden' id='id' name='id' value='$id'>";
    }
    $form .= "</form></div>";

    return $form;
  }
  ?>
