<?php
  //define("BASE_DIR", str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__)))."/");
  require_once(BASE_DIR . "config.php");

  function mySQLI($sql){
    $mysqli = mysqli_connect("localhost","root","","labmin");

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    $result = $mysqli -> query($sql);
    if (!($result)){
      echo ($mysqli->connect_error);
    }

    $mysqli -> close();
    return $result;
  }

  function runSQL($sql){
    $conn = new mysqli(getHost(), getDBUser(), getPass(), getDB());

    if ($conn->connect_errno) {
      echo "Failed to connect to MySQL: " . $conn->connect_error;
      exit();
    }

    $result = $conn->query($sql);

    if (!($result)){
      if ($conn->errno){
        echo("query error " . $conn->error);
      } else {
        echo("unknown error");
      }
    }

    $conn->close();
    return $result;
  }

  function getDBColumns($sql){
    $conn = new mysqli(getHost(), getDBUser(), getPass(), getDB());

    if ($conn->connect_errno) {
      echo "Failed to connect to MySQL: " . $conn->connect_error;
      exit();
    }

    $result = $conn->query($sql);

    return $result;
  }
?>
