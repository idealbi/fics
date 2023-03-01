<?php

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "web_app_user", "pwd" => "P@ss1234", "Database" => "fics_db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:srv-db-idealbi.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
if( $conn ) {
     echo "Connection established.<br />";
   }else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
   }

?>
