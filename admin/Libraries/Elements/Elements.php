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

<<<<<<< HEAD
  function createAddEditForm($sql, $tablename, $restrictedarray, $buttons, $id=""){
    $columns = getDBColumns($tablename,$restrictedarray);

    echo "<form method=post>";
      foreach($columns as $column){
        $form =  Label($column['Field']) . "</ br>";
        if ($id == ""){
          $form .= Input($column['Field'], "text, ");
        }
      }
    echo "</form>";
  }

  function createTable($sql, $tablename, $restrictedarray="", $buttons){
    $columns = getDBColumns($tablename,$restrictedarray);

    echo "<form method=post style='float:right'>
            <button type='button' class='btn btn-success' id='addBtn' name='addBtn' onclick='ShowCreateAddEditModal()'>Add</button>
=======
  function createTable($sql, $tablename, $restrictedarray, $buttons=""){
    $columns = getDBColumns($tablename, $restrictedarray);
    echo "<form method='post'>
            <input type='submit' name='addNew' id='addNew' value='Add Record'  class='btn btn-success'>
            <input type='hidden' name='db' id='db' value='$tablename'>
>>>>>>> 83f018666253445bbf700183f44f317e6f54e718
          </form>";
    echo "<button class='btn btn-success' type='button' id='btnAdd' type='btnAdd' onclick='AjaxModal()' style='float: right'>Add record</button>
          <table class='table table-striped'>
          <thead>";

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
<<<<<<< HEAD
      getTools($tablename,$row['id'], "selected", );
=======
      echo "<td>";
      if($buttons == ""){
        getTools($tablename, $row['id']);
      }else{
        getTools($tablename, $row['id']);
      }
>>>>>>> 83f018666253445bbf700183f44f317e6f54e718
      echo "</td>";
      echo "</tr>";
    }

    echo "</table>";
  }

  function getTools($db, $id){
    echo "<form method=post style='float:right'>
            <input type='submit' name='edit' id='edit' value='Edit' class='btn btn-warning'>
            <input type='submit' name='action' id='remove' value='Delete' class='btn btn-danger'>
            <input type='submit' name='View' id='View' value='View' class='btn btn-info'>
            <input type='hidden' name='db' id='db' value='$db'>
            <input type='hidden' name='id' id='id' value='$id'>
          </form>";
  }

<<<<<<< HEAD
  function createAddEditModal($sql, $tablename, $restrictedstring, $id='') {
      $row = array();
      $restrictedarray = explode(",", $restrictedstring);
      print_r($restrictedarray);

      echo "<div class='modal fade' id='addeditModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='addeditModalLabel'>Modal title</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                  </div>
                  <div class='modal-body'>";

       $headings = getDBColumns($tablename, $restrictedstring);
       if ($id != ''){
         $getrecord = "SELECT * FROM " . $tablename . " WHERE id = " . $id;
         $columns = runSQL($getrecord);
         $row = $columns->fetch_assoc();
       }

       $form = "<form method=post style='float:left'>";
       foreach($headings as $heading){
         $name = $heading['Field'];

         $form .= "<div class='form-group'>";
            if (!(in_array($name, $restrictedarray))){
              $form .= Label($heading['Field']) . "</br>";
            if ($id != ''){
              $form .= TD(Input($name, "text", $row[$name])) . "</br>";
            } else {
              $form .= TD(Input($name, "text")) . "</br>";
            }
              $form .= "</div>";
          }
       }
       if ($id == '') {
         $form .= "<button class='btn btn-primary' type='submit' id='action' name='action' value='addrecord'>Add</button>";
       } else {
         $form .= "<button class='btn btn-primary' type='submit' id='action' name='action' value='editrecord'>Update</button>";
       }

       $form .=  "</form>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                    <button type='button' class='btn btn-primary'>Save changes</button>
                  </div>
                </div>
              </div>
            </div>";
      echo $form;
  }

  function createViewModel($tablename,  $restrictedstring, $id=''){
    $row = array();
    $id = $_POST['id'];
    
    $restrictedarray = explode(",", $restrictedstring);

    echo "<div class='modal fade' id='addeditModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h5 class='modal-title' id='addeditModalLabel'>Modal title</h5>
                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>";

     $headings = getDBColumns($tablename, $restrictedstring);
     if ($id != ''){
       $getrecord = "SELECT * FROM " . $tablename . " WHERE id = " . $id;
       $columns = runSQL($getrecord);
       $row = $columns->fetch_assoc();
     }

     $form = "<form method=post style='float:left'>";
     foreach($headings as $heading){
       $name = $heading['Field'];

       $form .= "<div class='form-group'>";
          if (!(in_array($name, $restrictedarray))){
            $form .= Label($heading['Field']) . "</br>";
          if ($id != ''){
            $form .= TD(Input($name, "text", $row[$name])) . "</br>";
          } else {
            $form .= TD(Input($name, "text")) . "</br>";
          }
            $form .= "</div>";
        }
     }

     $form .=  "</form>
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                  <button type='button' class='btn btn-primary'>Save changes</button>
                </div>
              </div>
            </div>
          </div>";
    echo $form;
  }

  function CreateAddEditTable($tablename,  $restrictedarray, $id=''){
    $formfields = array();
    $rows = array();

    $showcolumns = "SHOW COLUMNS FROM " . $tablename;
    $columns = getDBColumns($showcolumns);

    foreach($columns as $value) {
      array_push($formfields, $value['Field']);
=======
  function CreateAddEditModal($body){
    echo "<div class='modal fade' id='AddEditModal' name='AddEditModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Add/Edit Record</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>
          <div class='modal-body' id='addeditModal' >";
          echo $body;
    echo  "</div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
            <button type='button' class='btn btn-primary'>Save changes</button>
          </div>
        </div>
      </div>
    </div>";
  }

  function ShowColumns($db, $id=''){
    $showcolumns = 'SHOW COLUMNS FOR ' . $db;

    $columns = getDBColumns($tablename, $restrictedstring, $id);

    foreach($columns as $column){
      $name = $column['Field'];

      echo Label($name) . ":</br>";
      echo "<input id='$name' name='$name' type='text'></br>";
    }
  }

  function AddEditForm($sql, $db, $restrictedstring, $id=''){
    $showcolumns = 'SHOW COLUMNS FOR ' . $db;

    $columns = getDBColumns($tablename, $restrictedstring, $id);

    $result = runSQL($sql);

    if ($id != '') {
      $row = $result->fetch_assoc();
>>>>>>> 83f018666253445bbf700183f44f317e6f54e718
    }

    echo "<form method='post'>";
    foreach($columns as $column){
      $name = $column['Field'];

      echo Label($name) . ":</br>";
      if ($id = '') {
          echo "<input id='$name' name='$name' type='text'></br>";
      } else {
        echo "<input id='$name' name='$name' type='text' value='$row[$name]'></br>";
      }
    }
    echo "<button type='submit' class='btn btn-primary' id='addRecord' name='addRecord'>Save</button>
    </form>";
  }
  ?>
