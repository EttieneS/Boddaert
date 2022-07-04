<?php
define("BASE_DIR", str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__)))."/");

define("ADMIN", BASE_DIR."admin");


function getDBUser(){ return "root";}
function getPass(){ return "";}
function getHost(){ return "localhost";}
function getDB(){ return "labmin";}

include_once(BASE_DIR."./admin/libraries/Connections/conn.php");
?>
