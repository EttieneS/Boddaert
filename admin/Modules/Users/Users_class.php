<?php
  require_once("../../../config.php");

  class User {
    var $username="";
    var $password="";

    function __construct() {}

    function createAddEditTable($db, $id="") {
      $db = "users";
      $showcolumns = "SHOW COLUMNS FROM $db";

      $columns = getDBColumns($showcolumns);

      //$tablearray = runSQL($sql);
      $restrictedarray = ['id'];

      if (isset($_POST['id'])){
        $id = $_POST['id'];

        $getUser = "SELECT * FROM
                    users
                    WHERE id = '$id'";

        $user = runSQL($getUser);
      }

      $table = "<div class='row'>
                  <div class='col'></div>
                  <div class='col justify-content-center'>
                    <form method='post'>
                      <table>";

      $usercolumns = $tablearray->fetch_assoc();

      $formfields = array();
      foreach($tablearray as $value){
        array_push($formfields, $value['Field']);
      }

      foreach($formfields as $names){
        if (!(in_array($names, $restrictedarray))){
          $label = $names;
          if ($label == "username"){
            $label = "User Name";
          }
          if ($label == "password"){
            $label = "Password";
          }

          $table .= "<tr>
                      <td><label id='$names' name='$names'>$label</label></td>
                      <td><input id='$names' name='$names'";
                      if (isset($userdata)) {
                          $table .= "value='" . $attribute[$headings['Field']];
                      }
          $table .= "'></td>
                     </tr>";
        }
      }
       $table .=      "<tr>
                        <td><button class='btn btn-primary' type='submit' id='action' name='action' value='addUser'>Save User</button></td>
                        <td></td>
                       </tr>
                    </table>
                   </form>
                 </div>
                 <div class='col'></div>
               </div>";

      echo $table;
    }

    function Validate($username,$password){

      $sql= "SELECT * FROM users
             WHERE username = '$username'";

      $result = runSQL($sql);

      $userdata = $result->fetch_assoc();
      if($userdata['password']==$password && $userdata['username']=="$username"){
        echo "true";
        //return json_encode("true");
      }else{
        echo "false";
        //return json_encode("false");
      }
    }

    function getAllUsers(){
      $sql = "SELECT * FROM users";

      $arrHeadings = array("id","username");
      $restrictedarray = ["password"];

      $result = runSQL($sql);

      $table = "<form method='post'>
                  <table class='table table-striped'>
                    <tr>
                      <thead>";
      foreach($arrHeadings as $heading){
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

    function AddUser($userdata) {
      $username = $userdata['username'];
      $password = $userdata['password'];

      $sql = "INSERT INTO
        users
        (username, password)
        VALUES
        ('$username', '$password')";

      $result = runSQL($sql);
      header('Location: index.php');
    }

    function CreateEditTable($id) {
      $showcols = "SHOW COLUMNS FROM users";
      //$colheadings = runSQL($showcols);
      //$id = $userdata['id'];
      //print_r($colheadings->fetch_assoc());

      $colheadings = getDBColumns($sql);

      $sql = "SELECT * FROM users
        WHERE
        id = '$id'";

      $user = runSQL($sql);

      $table = "";
      foreach($user as $attribute){
        foreach($colheadings as $headings){
          //$table .= "<label>" . $headings['Field'] . "</label>";
          //print_r($attribute[$headings['Field']]);
          echo "<label>" . $headings['Field'] . "</label></br>
                <input value='". $attribute[$headings['Field']] . "'></br>";
        }
      }


      //print_r($user);

      // while($columns = $user->fetch_assoc()){
      //   $table .= "<label>" . $columns .  "</label></br>";
      // }
      // $table .= "</table>
      //            <button class='btn btn-primary' class='button' type='submit' value='update'>Save Changes</button>";
    }
}
?>
