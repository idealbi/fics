<?php
$myServer = "41.76.215.228\SMARTBIZSOLZ\SQLEXPRESS";
$myUser = "web_app_user";
$myPass = "P@ss1234";
$myDB = "fics_db";

//connection to the database
$dbhandle = mssql_connect($myServer, $myUser, $myPass)
  or die("Couldn't connect to SQL Server on $myServer");

//select a database to work with
$selected = mssql_select_db($myDB, $dbhandle)
  or die("Couldn't open database $myDB");

//declare the SQL statement that will query the database
$query = "SELECT [CompanyID],[Company] FROM [fics].[Company] ";


//execute the SQL query and return records
$result = mssql_query($query);

$numRows = mssql_num_rows($result);
echo "<h1>" . $numRows . " Row" . ($numRows == 1 ? "" : "s") . " Returned </h1>";

//display the results
while($row = mssql_fetch_array($result))
{
  echo "<li>" . $row["CompanyID"] . $row["Company"] . $row["CompanyID"] . "</li>";
}
//close the connection
mssql_close($dbhandle);
?>