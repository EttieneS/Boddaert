<?php
  require_once("../config.php");

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

    function GetAllUsers(){
      $getcolumnheadings = "SELECT COLUMNS FROM
                              horses";

      $columnHeadings = getDBColumns($getcolumnheadings);
      $restrictedarray = ["password"];

      $sql = "SELECT * FROM horses";

      $result = runSQL($sql);
      $table = "<form method='post'>
                  <table class='table table-striped'>
                    <tr>
                      <thead>";
      foreach($columnheadings as $heading){
        if (!(in_array($heading, $restrictedarray))){
            $table .= "<th>$heading</th>";
        }
      }
      $table .= " <th>Actions</th>
                 </thead>
                </tr>";

      while ($row = $result->fetch_assoc()){
        $table .= "<tr>";
        foreach($arrHeadings as $heading){
          if ($heading == 'id'){
            $id = $row[$heading];
          }
          if (!(in_array($heading, $restrictedarray))){
              $table .= "<td>". $row[$heading] ."</td>";
          }
        }
        $table .= "     <td>
                          <form>
                            <button class='btn btn-primary' type='submit' name='action' value='edit'>Edit</button>
                            <input type='hidden' value='$id' id='id' name='id'>
                            <input type='hidden' name='db' id='db' value='users'>
                          </form>
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
