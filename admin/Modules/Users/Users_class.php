<?php
  require_once("../../../config.php");

  class User {
    var $username="";
    var $password="";

    function __construct() {}

    function createAddEditTable($tablename, $id="") {
      $db = "users";
      $showcolumns = "SHOW COLUMNS FROM $db";

      $columns = getDBColumns($showcolumns);

      $restrictedarray = ['id'];

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
      // $sql = "SELECT * FROM users";
      //
      // $arrHeadings = array("id","username");
      // $restrictedarray = ["id", "password"];
      //
      // $result = runSQL($sql);
      //
      // $table = "<form method='post'>
      //             <table class='table table-striped'>
      //               <tr>
      //                 <thead>";
      // foreach($arrHeadings as $heading){
      //   if (!(in_array($heading, $restrictedarray))){
      //       $table .= TH($heading);
      //   }
      // }
      // $table .= TH("Actions") .
      //            " </thead>
      //            </tr>";
      //
      // while ($row = $result->fetch_assoc()){
      //   $table .= "<tr>";
      //   foreach($arrHeadings as $heading){
      //     if ($heading == 'id'){
      //       $id = $row[$heading];
      //     }
      //     if (!(in_array($heading, $restrictedarray))){
      //         $table .= TD($row[$heading]);//"<td>". $row[$heading] . "</td>"; //TD($row[$heading]);
      //     }
      //   }
      //   $table .= " <td>
      //                 <form>
      //                   <button class='btn btn-primary' type='submit' name='action' value='edit'>Edit</button>
      //                   <input type='hidden' value='$id' id='id' name='id'>
      //                   <input type='hidden' name='db' id='db' value='users'>
      //                 </form>
      //               </td>
      //             </tr>";
      // }
      //
      // $table .= "</table>
      //           </form>
      //           <form method='post'>
      //             <button class='btn btn-primary' name='action' value='add' type='submit'>Add User</button>
      //             <input type='hidden' name='db' id='db' value='users'>
      //           </form>";
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

      $result = runSQL($sql);
      echo $result;
      $_POST = '';
      echo header('Location: index.php');
    }
}
?>
