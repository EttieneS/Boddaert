<?php
  require_once("../../../config.php");
  echo "<script href='script/users.js'></script>";
  require_once("../../Libraries/Elements/Elements.php");

  class User {
    var $username="";
    var $password="";

    function __construct() {}

    function init(){
      session_start()

      if(!isset($_SESSION['logged_in'])){
        header("Location: http://localhost/Boddaert/login.php");
      }

      $sql = "SELECT * FROM users";
      $tablename = 'users';
      $restrictedarray = array("id");
      $restrictedstring = "id";
      $buttons[] = array();
      $db = "users";

      echo createTable($sql, $tablename, $restrictedstring, $buttons);
    }

    function createAddEditTable($tablename, $id="") {
      $db = "users";
      $showcolumns = "SHOW COLUMNS FROM $db";

      $restrictedstring = "id";
      $columns = getDBColumns($showcolumns, $restrictedstring);

      $restrictedarray = ("id");

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

    function addNew($db, $id=""){
      $body = GetAddEditForm($db,$id);
      echo CreateAddEditModal($body);
      echo "<script>
            $(document).ready(function(){
              $('#AddEditModal').modal('show');
            });
            </script>";
    }

    function Edit($db, $id) {
      $body = GetAddEditForm($db,$id);

      echo CreateAddEditModal($body);
      echo "<script>
            $(document).ready(function(){
              $('#AddEditModal').modal('show');
            });
            </script>";
    }

    function ViewUser($db, $id=""){
      $db = $_POST['db'];

      $body = $this->getViewUserForm($db,$id);
      echo CreateAddEditModal($body);
      echo "<script>
            $(document).ready(function(){
              $('#AddEditModal').modal('show');
            });
            </script>";
    }

    function GetViewUserForm($db, $id){
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

    function Validate($username,$password){

      $sql= "SELECT * FROM users
             WHERE username = '$username'";

      $result = runSQL($sql);

      $userdata = $result->fetch_assoc();
      if($userdata['password']==$password && $userdata['username']=="$username"){
        echo "true";
      }else{
        echo "false";
      }
    }

    function getAllUsers(){
      $sql = "SELECT * FROM users";
      $tablename = "users";
      $restrictedarray = "id";

      createTable($sql, $tablename, $restrictedarray);

      echo $table;
    }

    function AddUser() {
      $username = $_POST['username'];
      $password = $_POST['password'];

      $salt = "x234";

      $pwd_salted = hash_hmac("sha256", $password, $salt);

      $sql = "INSERT INTO
        users
        (username, password)
        VALUES
        ('$username', '$pwd_salted')";

      $result = runSQL($sql);
      $_POST['action']= '';
      echo header('Location: index.php');
    }

    function UpdateUser($user) {
      $id = $user['id'];
      $username = $user['username'];

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
      $_POST = '';
      echo header('Location: index.php');
    }
}
?>
