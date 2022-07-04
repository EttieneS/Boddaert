<?php
  //require_once("../../../../config.php");

  class User {
    var $username="";
    var $password="";

    function __construct() {}

    function createUserTable() {
      $table = "<form method='post'>
                  <div>
                    <label>User Name</label>
                    <input id='username' name='username' type='text' />
                  </div>
                  <div>
                    <label>Password</label>
                    <input id='password' name='password' type='text' />
                  </div>
                </form>"
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
        //echo "false";
        $false = json_encode(false);
        return $false;
      } else {
        $true = json_encode(true);
        //echo "true";
        return $true;
      }

      // $print = print_r("Validate result " .$result);
      // return $print;
    }

    function getAllUsers()
    {
      $sql = "SELECT * FROM
        users";

      $users = runsql($sql);

      $usertable = "<table>";

      while($row = $users->fetch_assoc()){
        //$rows[] = $row;
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
}
?>
