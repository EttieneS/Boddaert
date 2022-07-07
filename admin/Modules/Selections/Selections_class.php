<?php
  require_once("../../../config.php");

  class Selections {
    var $userid = "";
    var $selections = array();

    function __construct() {}

    function ViewAllTable() {
      $sql = "SELECT * FROM selections";
      $restrictedarray = array("id");

      $selections = runSQL($sql);

      $showcolumns = "SHOW COLUMNS FROM selections";
      $columns = getDBColumns($showcolumns);

      $formfields = array();
      foreach($columns as $value){
        array_push($formfields, $value['Field']);
      }

      $table = "<form method='post'>
                  <table class='table table-striped'>
                    <tr>
                      <thead>";
      foreach($formfields as $attribute){
        if (!(in_array($attribute, $restrictedarray))){
            $table .= TH($attribute);
        }
      }
      $table .= " <th>Actions</th>
                 </thead>
                </tr>";

        while ($row = $selections->fetch_assoc()){
        $table .= "<tr>";
        $id = '';

        foreach($columns as $heading){
          if ($heading['Field'] == 'id'){
            $id = $row[$heading['Field']];
          }
          if (!(in_array($heading['Field'], $restrictedarray))){
              $table .= "<td>". $row[$heading['Field']] ."</td>";
          }
        }
        $table .= "   <td>
                        <button type='button' class='btn btn-primary' id='modal' name='modal' onclick='Modal()'>Modal</button>
                      </td>
                    </tr>";
      }

      $table .= "</table>
                </form>";

      echo $table;
    }
  }
?>
