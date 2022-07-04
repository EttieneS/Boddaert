<?php
  require_once("../config.php");

  class Horse {
    var $name="";
    var $number="";

    function __construct() {}

    function Add($horse) {
      $name = $horse[0]['value'];

      $sql = "INSERT INTO
        horses
        (name)
        VALUES
        ('$name')";

      $result = runSQL($sql);
      echo $result;
    }

    function ViewAll(){
      $sql = "SELECT * FROM
        horses";

      $horses = runSQL($sql);

      while($row = $horses->fetch_assoc())
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
