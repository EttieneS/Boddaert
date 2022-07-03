<?php
  require_once("../config.php");

  class User {
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
?>
