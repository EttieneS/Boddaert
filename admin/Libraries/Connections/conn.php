<?php
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

<<<<<<< HEAD
  function getDBColumns($db, $fields){
=======
  function getDBColumns($table, $fields){
    $fields = "";
>>>>>>> 83f018666253445bbf700183f44f317e6f54e718
    if($fields != ""){
      $fields = explode(",", $fields);

      foreach($fields as $field){
        $newFields[] = "'". $field ."'";
      }

<<<<<<< HEAD
      $fields = implode(",", $newFields);
      $sql = "SHOW COLUMNS FROM $db WHERE Field NOT IN ($fields)";
=======
      $fields = implode(",",$newFields);
      $sql = "SHOW COLUMNS FROM $table WHERE Field NOT IN ($fields)";
>>>>>>> 83f018666253445bbf700183f44f317e6f54e718
    }else{
      $sql = "SHOW COLUMNS FROM $table";
    }

    $result = runSQL($sql);
    $fields = array();
    
    while($row = $result->fetch_assoc()){
      $fields[] = $row;
    }

    return $fields;
  }
?>
