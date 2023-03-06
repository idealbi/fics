<?php
if(isset($_POST['get_option']))
{
$connectionInfo = array("UID" => "web_app_user", "pwd" => "P@ss1234", "Database" => "fics_db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:srv-db-idealbi.database.windows.net,1433";
$conn_division= sqlsrv_connect($serverName, $connectionInfo);
 

 $state = $_POST['get_option'];
 $find_sql_division = "SELECT  [DivisionID] ,[Division] FROM [fics].[Division]   where [CompanyID] ='".$state."'";
$result_select_division=sqlsrv_query($conn_division, $find_sql_division);
   while($row_division= sqlsrv_fetch_array($result_select_division, SQLSRV_FETCH_ASSOC))
 {
  echo "<option value ='".$row_division['DivisionID']."'>".$row_division['Division']."</option>";
 }
 exit;
}
?>