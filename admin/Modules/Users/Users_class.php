<?php
  require_once("../../../config.php");

  class User {
    var $username="";
    var $password="";

    function __construct() {}

    function createAddUserTable() {
      $table = "<form method='post'>
                  <div>
                    <label>User Name</label>
                    <input id='username' name='username' type='text' />
                  </div>
                  <div>
                    <label>Password</label>
                    <input id='password' name='password' type='text' />
                  </div>
                  <div>
                    <button type='submit' value='' class='btn btn-primary'>Save User</button>
                  </div>
                </form>";
      echo $table;
    }

    function Validate($userdata){
      $username = $userdata[0]['value'];
      $password = $userdata[0]['value'];

      $sql= "SELECT 1 FROM
          users
          WHERE
          username = '$username'
          AND
          password = '$password'";

      $result = runSQL($sql);

      if (empty($result)) {
        $false = json_encode(false);
        return $false;
      } else {
        $true = json_encode(true);
        return $true;
      }
    }

    function getAllUsers(){
      $sql = "SELECT * FROM
        users";

      $users = runsql($sql);

      $usertable = "<table>";

      while($row = $users->fetch_assoc()){
        $username = $row['username'];
        $usertable .= "<tr>
                        <td>$username</td>
                      </tr>";
      }

      $usertable .= "</table>";
      $usertable .= "<form method='post'>
                      <button class='btn btn-primary' type='submit'  name='action' value='add'>New User</button>
                    </form>";

      echo $usertable;
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
