<?php
  //define("BASE_DIR", str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__)))."/");
  require_once(BASE_DIR . "config.php");

  // $test = "test";
  // runSQL($test);
  function mySQLI($sql){

    $mysqli = mysqli_connect("localhost","root","","labmin");

    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }
    $result = $mysqli -> query($sql);

    $mysqli -> close();
    return $result;
  }


  function runSQL($sql){
    $conn = new mysqli(getHost(), "root", getPass(), getDB());

    if ($conn->connect_errno) {
      echo "Failed to connect to MySQL: " . $conn->connect_error;
      exit();
    }
    // else {
    //     echo "connected to db";
    // }

    if ($conn->query($sql)) {
      $result = $conn->query($sql);
    } else {
      return false;
    }

    $conn->close();
    return $result;
  }
?>
