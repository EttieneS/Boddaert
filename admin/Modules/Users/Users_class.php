<?php
  require_once("../../../config.php");

  class User {
    var $username="";
    var $password="";

    function __construct() {}

    function createAddUserTable() {
      $sql = "SHOW COLUMNS FROM users";

      //for

      $tablearray = runSQL($sql);
      print_r($tablearray);

      $restrictedarray = ['password'];

      $table = "<form method='post'>";

      $usercolumns = $tablearray->fetch_assoc();
      echo "<pre>" . print_r($usercolumns) ."</pre>";
      while ($row = $tablearray->fetch_assoc()){
        //print_r($row);
        //echo $row['Field'] ."</br";
        foreach($row as $value){
          echo $row['Field'] . "</br>";
        }
      }

        // if (!(in_array($heading, $restrictedarray))){
        //   $table .= "<div>
        //               <label name='$'"
        // }

      //             <div>
      //               <label>User Name</label>
      //               <input id='username' name='username' type='text' />
      //             </div>
      //             <div>
      //               <label>Password</label>
      //               <input id='password' name='password' type='text' />
      //             </div>
      //             <div>
      //               <button type='submit' value='' class='btn btn-primary'>Save User</button>
      //             </div>
      //           </form>";
      //
      //            typ = sub value= sub name=action  value = addUser
      // echo $table;
    }

    function Validate($username,$password){

      $sql= "SELECT * FROM users
             WHERE username = '$username'";

      $result = runSQL($sql);

      $userdata = $result->fetch_assoc();
      if($userdata['password']==$password && $userdata['username']=="$username"){
        return true;
      }else{
        return false;
      }
    }

    function getAllUsers(){
      $sql = "SELECT * FROM users";

      $arrHeadings = array("id","username");
      $restrictedarray = ["password"];

      $result = runSQL($sql);

      echo '<pre>'.print_r($result,true).'</pre>';
      $table = "<table class='table table-striped'>
                  <thead>";
      foreach($arrHeadings as $heading){
        if (!(in_array($heading, $restrictedarray))){
            $table .= "<th>$heading</th>";
        }
      }
      $table .= "</thead>";

      while ($row = $result->fetch_assoc()){
        $table .= "<tr>";
        foreach($arrHeadings as $heading){
          if (!(in_array($heading, $restrictedarray))){
              $table .= "<td>". $row[$heading] ."</td>";
          }
        }
        $table .= "</tr>";
      }

      $table .= "<form method='post'>
                  <button class='btn btn-primary' name='action' value='addusertable' type='submit'>Add User</button>
                </form>";
      echo $table;
    }

    function Add($userdata) {
      $username = $userdata['username'];
      $password = $userdata['password'];

      echo ('username ' . $username);
      $sql = "INSERT INTO
        users
        (username, password)
        VALUES
        ('$username', '$password')";

      $result = runSQL($sql);
      echo $result;
    }
}
?>
