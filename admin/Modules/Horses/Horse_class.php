<?php
  require_once("../../../config.php");
  echo "<script href='../../Horses/horse.js'></script>";
  
  class Horse {
    var $name="";
    var $number="";

    function __construct() {}

    function Add($horse) {
      $name = $horse[0]['value'];

      $sql = "INSERT INTO
        horses
        (name)
        VALUES
        ('$name')";

      $result = runSQL($sql);
      echo $result;
    }

    function ViewAll(){
      $sql = "SELECT * FROM
        horses";

      $horses = runSQL($sql);

      while($row = $horses->fetch_assoc())
      {
        $rows[] = $row;
      }

      return $rows;
    }

    function Update($userdata) {
      $userid = $userdata[0]['value'];
      $username = $userdata[1]['value'];

      $sql = "UPDATE users SET
        username = '$username'
        WHERE
        id = '$userid'";

      $result = runSQL($sql);

      echo $result;
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

    function GetAllHorses(){
      $getcolumnheadings = "SHOW COLUMNS FROM
                              horses";
      $columns = runSQL($getcolumnheadings);
      $columnheadings = $columns->fetch_assoc();

      $formfields = array();
      foreach($columns as $value){
        array_push($formfields, $value['Field']);
      }

      echo "<pre>" . print_r($columns) . "</pre>";

      $restrictedarray = ["id"];

      $sql = "SELECT * FROM horses";

      $result = runSQL($sql);

      $table = "<form method='post'>
                  <table class='table table-striped'>
                    <tr>
                      <thead>";
      foreach($columns as $attribute){
        // $table .= "<th>" . $attribute['Field'] . "</th>";
        if (!(in_array($attribute['Field'], $restrictedarray))){
            $table .= "<th>" . $attribute['Field'] . "</th>";
        }
      }
      $table .= " <th>Actions</th>
                 </thead>
                </tr>";

      while ($row = $result->fetch_assoc()){
        $table .= "<tr>";
        foreach($columns as $heading){
          if ($heading['Field'] == 'id'){
            $id = $row[$heading['Field']];
          }

          if (!(in_array($heading['Field'], $restrictedarray))){
              $table .= "<td>". $row[$heading['Field']] ."</td>";
          }
        }
        $table .= "     <td>
                          <form method='post'>
                            <button class='btn btn-primary' type='submit' name='action' value='edit'>Edit</button>
                            <input type='hidden' value='$id' id='id' name='id'>
                            <input type='hidden' name='db' id='db' value='users'>
                          </form>
                        </td>
                        <td>
                          <button class='btn btn-primary' onclick='SelectHorse()'>Select</button>
                        </td>
                      </tr>";
      }

      $table .= "</table>
                </form>
                <form method='post'>
                  <button class='btn btn-primary' name='action' value='addusertable' type='submit'>Add User</button>
                  <input type='hidden' name='db' id='db' value='users'>
                </form>";
      echo $table;
    }
  }
?>
