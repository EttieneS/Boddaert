<?php
  require_once("../../../config.php");

  class Selections {
    var $userid = "";
    var $selection = array();

    function __construct() {}

    function ViewAllTable() {
      $sql = "SELECT * FROM selections";
      $restrictedarray = array();

      $selections = runSQL($sql);

      $showcolumns = "SHOW COLUMNS FROM selections";
      $columns = getDBColumns($showcolumns);
      print_r($columns);

      $formfields = array();
      foreach($columns as $value){
        array_push($formfields, $value['Field']);
      }

      $table = "<form method='post'>
                  <table class='table table-striped'>
                    <tr>
                      <thead>";
      foreach($columns as $heading){
        if (!(in_array($heading, $restrictedarray))){
            $table .= "<th>" . $heading['Field'] . "</th>";
        }
      }
      $table .= " <th>Actions</th>
                 </thead>
                </tr>";

        while ($row = $selections->fetch_assoc()){
        $table .= "<tr>";
        foreach($columns as $heading){
          if ($heading == 'id'){
            $id = $row[$heading];
          }
          if (!(in_array($heading, $restrictedarray))){
              $table .= "<td>". $row[$heading] ."</td>";
          }
        }
        $table .= "   <td>
                        <form>
                          <button class='btn btn-primary' type='submit' name='action' value='view'>Details</button>
                          <input type='hidden' value='$id' id='id' name='id'>
                          <input type='hidden' name='db' id='db' value='users'>
                        </form>
                      </td>
                    </tr>";
      }

      $table .= "</table>
                </form>";

      echo $table;
    }
  }
?>
