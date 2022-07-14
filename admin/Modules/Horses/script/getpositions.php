<?php
  require_once("../../../../config.php");


  if($_POST['action'] == "getpositions"){
    $sql = "SELECT * FROM positions";
    $data = runSQL($sql);

    while($row = $data->fetch_assoc())
    {
      $rows[] = $row;
    }

    $json = json_encode($rows);
    print $json;
  }
?>
