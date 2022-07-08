<?php
  require_once("../../../config.php");
  require_once("Selections_class.php");
  include("../../Includes/header.php");
  require("../../Libraries/Elements/Elements.php");
  echo "<script src='../../Libraries/Selections/selections.js'></script>";

  $selections= new Selections();

  $table = $selections->ViewAllTable();
  echo $table;
?>
<html>
    <div id="exampleModal" class='modal' tabindex='-1' role='dialog'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title'>Selection</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>
          <div class='modal-body'>
            <?php
              $id = 1;

              $sql = "SELECT * FROM selections WHERE id = $id";
              $selectiondata = runSQL($sql);
              print_r($selectiondata);

              while($data = $selectiondata->fetch_assoc()){
                $list = explode(",", $data['selection']);

                $showheadings = "SHOW COLUMNS FROM horses";
                $arrheadings = runSQL($showheadings);

                $restrictedarray = array("id");

                $table = "<table>
                        <tr>
                          <thead>";

                foreach($arrheadings as $heading){
                  if(!(in_array($heading['Field'], $restrictedarray))){
                    $table .= TH(ucfirst($heading['Field']));
                  }
                }
                $table .= "  </thead>
                      <tr>";

                foreach($list as $id){
                  $sql = "SELECT * FROM horses WHERE id = $id";
                  $horsedata = runSQL($sql);
                  $table .= "<tr>";
                  while($columns = $horsedata->fetch_assoc()){
                      foreach($arrheadings as $heading){
                          if(!(in_array($heading['Field'], $restrictedarray))){
                            $table .= TD($columns[$heading['Field']]);
                          }
                      }
                      $table .= "<tr>";
                  }
                }
                $table .= "</table>";
                echo $table;
              }
            ?>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-dismiss='modal' onclick="closeModal()">Close</button>
          </div>
        </div>
      </div>
    </div>"
  </body>
<html>
