<?php
define("BASE_DIR", str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__)))."/");

define("ADMIN", BASE_DIR."admin");
define("LIB_DIR", ADMIN."/Libraries");
define("HEADER", ADMIN."/assets/header.php");
define("FOOTER", ADMIN."/assets/footer.php");
define("MOD_DIR", ADMIN."/Modules");

function getDBUser(){ return "root";}
function getPass(){ return "";}
function getHost(){ return "localhost";}
function getDB(){ return "labmin_tests";}

include_once(BASE_DIR. "./admin/libraries/Connections/conn.php");
//include_once(BASE_DIR. "./admin/includes/session_handler.php");
?>
