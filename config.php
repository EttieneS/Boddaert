<?php
define("BASE_DIR", str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__)))."/");

function getDBUser(){ return "root";}
function getPass(){ return "";}
function getHost(){ return "localhost";}
function getDB(){ return "labmin_tests";}

include_once(BASE_DIR."Connections/conn.php");
?>
