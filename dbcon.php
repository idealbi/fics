
<?php

$serverName = "mssql-115975-0.cloudclusters.net,19881";
$connectionInfo = array( "Database"=>"idealbi_db", "UID"=>"web_app_user", "PWD"=>"P@ss1234");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
echo "Test new 1";
if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>