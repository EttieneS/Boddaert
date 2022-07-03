<?php
  require_once("../config.php");

  class User {
    var $username="";
    var $password="";
    function __construct() {}

    function Add($userdata) {
      $username = $userdata[0]['value'];
      $password = $userdata[1]['value'];

      $sql = "INSERT INTO
        users
        (username, password)
        VALUES
        ('$username', '$password')";

      $result = runSQL($sql);
      echo $result;
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
        echo "false";
        $false = json_encode(false);
        return $false;
      } else {
        $true = json_encode(true);
        echo "true";
        return $true;
      }

      // $print = print_r("Validate result " .$result);
      // return $print;
    }

    function ViewAll(){
      $sql = "SELECT * FROM
        users";

      $users = runSQL($sql);

      while($row = $users->fetch_assoc())
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
  }
?>
