<?php 
/*
* Louis la Grange | SL2CQH2H6
* BSc IT 3A | ITEC301
*/

//Database config variables
$db_name = "cakeinc_db";
$mysql_username = "root";
$mysql_password = "";
$server_name = "localhost";

try {
    // Initialise new global variable with DB connection (to be used by on demand)
    $GLOBALS['dbcon'] = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);
} catch (\Throwable $th) {
}

?>
