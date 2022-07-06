<?php
  require_once("../../../config.php");

  class User {
    var $username="";
    var $password="";

    function __construct() {}

    function Add($data){
      $userid = 1; //SESSIONVARIABLE ....$data['userid'];
      $horseid = $data['horseid'];

      $sql = "INSERT INTO selection
      (userid, horseid)
      VALUES
      ('$userid', '$horseid')";

      $result = runSQL($sql);
      return $result;
    }

?>
