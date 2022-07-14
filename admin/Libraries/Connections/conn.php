<?php
  require_once(BASE_DIR . "config.php");

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

  // function getDBColumnsv2($tablename, $restrictedarray){
  //   $showcolumns = "SHOW COLUMNS FROM $tablename";
  //   $data = runSQL($showcolumns);
  //   $headings = $data->fetch_assoc();
  //   $headingsarray = array();
  //
  //   foreach($headings as $heading){
  //     if(!(in_array($heading, $restrictedarray))){
  //       array_push($headingsarray, $heading);
  //     }
  //   }
  //
  //   return $headingsarray;
  // }

  function getDBColumns($table, $fields){
    if($fields != ""){
      $fields = explode(",", $fields);

      foreach($fields as $field){
        $newFields[] = "'". $field ."'";
      }

      $fields = implode(",",$newFields);

      $sql = "SHOW COLUMNS FROM $table WHERE Field NOT IN ($fields)";
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
