<?php
  require_once("../config.php");

  class User {
    var $username="";
    var $password="";
    function __construct() {}

    function Add($userdata) {
      $username = $userdata[0]['value'];
      $password = $userdata[0]['value'];

      $sql = "INSERT INTO
        users
        (username, password)
        VALUES
        ('$username', '$password')";

      $result = runSQL($sql);
      print_r($result);
    }

    function Validate($userdata){
      $username = $userdata[0]['value'];
      $password = $userdata[0]['value'];

      // $sql = "SELECT * FROM
      //   users
      //   WHERE
      //   username = '$username' AND
      //   password = '$password')";

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

      $users = mySQLI($sql);

      while($row = $users->fetch_assoc())
      {
        $rows[] = $row;
      }
      
      // $jsonObj = json_encode($users);
      return $rows;
    }
  }
?>
