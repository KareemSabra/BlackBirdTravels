<?php
/* define Database credentials*/
define('DBSERVER','n3plcpnl0053'); // Database server
define('DBUSERNAME','BlackBirdTravel'); //Database username
define('DBPASSWORD','blackbirdtravel'); //Database password
define('DBNAME','BlackBirdTravel_db'); //Database name

/*connect to MySQL database */
$con = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

//chech db connection
if($con === false){
    die("Error: conncetion error." . mysqli_connect_error());
}
?>
