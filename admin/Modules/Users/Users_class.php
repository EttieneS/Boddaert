<?php
<<<<<<< HEAD
  require_once("../../../config.php");
  echo "<script href='../../Horses/horse.js'></script>";
  require_once("../../Libraries/Elements/Elements.php");
=======
  //require_once("../../../config.php");
>>>>>>> 83f018666253445bbf700183f44f317e6f54e718

  class User {
    var $username="";
    var $password="";

    function __construct() {}

    function init(){
      $sql = "SELECT * FROM users";
      $tablename = 'users';
      $restrictedarray = array("id");
      $restrictedstring = "id";
      $buttons[] = array();
      $db = "users";

      echo createTable($sql, $tablename, $restrictedstring, $buttons);
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

    function createAddEditTable($tablename, $id="") {
      $db = "users";
      $showcolumns = "SHOW COLUMNS FROM $db";
<<<<<<< HEAD
      $restrictedstring = "id";
      $columns = getDBColumns($showcolumns, $restrictedstring);
=======

      $columns = getDBColumns($showcolumns);

      $restrictedarray = ['id'];
>>>>>>> 83f018666253445bbf700183f44f317e6f54e718

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

    function addNew($db,$id=""){
      $db = $_POST['db'];

      $body = $this->getAddEditForm($db,$id);
      echo CreateAddEditModal($body);
      echo "<script>
            $(document).ready(function(){
              $('#AddEditModal').modal('show');
            });
            </script>";

    }

    function getAddEditForm($db,$id){
      $s = "<table class='table'>
              <thead>
                <tr>
                  <th scope='col'>#</th>
                  <th scope='col'>First</th>
                  <th scope='col'>Last</th>
                  <th scope='col'>Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope='row'>1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope='row'>2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope='row'>3</th>
                  <td colspan='2'>Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>";

      return $s;
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
