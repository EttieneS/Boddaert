<?php
  require_once("../../../config.php");
  echo "<script href='../../Horses/horse.js'></script>";
  require_once("../../Libraries/Elements/Elements.php");

  class User {
    var $username="";
    var $password="";

    function __construct() {}

    function createAddEditTable($tablename, $id="") {
      $db = "users";
      $showcolumns = "SHOW COLUMNS FROM $db";
      $restrictedstring = "id";
      $columns = getDBColumns($showcolumns, $restrictedstring);

      if (isset($_POST['id'])){
        $id = $_POST['id'];

        $getUser = "SELECT * FROM
                    users
                    WHERE id = '$id'";

        $user = runSQL($getUser);
        $userdata = $user->fetch_assoc();
      }

      $table = "<div class='row'>
                  <div class='col'></div>
                  <div class='col justify-content-center'>
                    <form method='post'>
                      <table>";

      $formfields = array();
      foreach($columns as $value){
        array_push($formfields, $value['Field']);
      }

      foreach($formfields as $attribute){
        if (!(in_array($attribute, $restrictedarray))){
          $label = $attribute;
          if ($label == "username"){
            $label = "User Name";
          }
          if ($label == "password"){
            $label = "Password";
          }

          $table .= "<tr>
                      <td><label id='$attribute' name='$attribute'>$label</label></td>
                      <td><input id='$attribute' name='$attribute'";
                      if (isset($userdata)) {
                          $table .= "value='" . $userdata[$attribute];
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
      $sql = "SELECT * FROM horses";
      $tablename = "horses";
      $restrictedarray = "id";

      createTable($sql, $tablename, $restrictedarray);

      echo $table;
    }

    function AddUser() {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $sql = "INSERT INTO
        users
        (username, password)
        VALUES
        ('$username', '$password')";

      $result = runSQL($sql);
      $_POST['action']= '';
      echo header('Location: index.php');
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

    function UpdateUser($user) {
      $id = $user['id'];
      $username = $user['username'];

      echo "<pre>" .  print_r($user) . "</pre>";

      $sql = "UPDATE users SET
        username = '$username'
        WHERE
        id = '$id'";

      $result = runSQL($sql);
      echo header('Location: index.php');
    }

    function DeleteUser() {
      $id = $_POST['id'];

      $sql = "DELETE FROM users
        WHERE
        id = '$id'";

      echo $sql;

      $result = runSQL($sql);
      echo $result;
      $_POST = '';
      echo header('Location: index.php');
    }
}
?>
