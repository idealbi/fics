
<?php


  
$ref =  $_POST["ref"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$phone =  $_POST["phone"];
$user_division =  $_POST["user_division"];
$user_company =  $_POST["user_company"];
$date = date('Y-m-d H:i:s');
echo "Tessst : ".$ref,",-",$fname,",",$lname,"<br>";
echo $email .", ".$phone."<br>".$num;

$connectionInfo = array("UID" => "web_app_user", "pwd" => "P@ss1234", "Database" => "fics_db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:srv-db-idealbi.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
 if ($conn)
{
   $p_info_data_insert = "INSERT INTO [fics].[Persons] ([qnr_data_ref],[FirstName],[LastName],[email],[contactnumber],[CompanyID] ,[DivisionID])
  VALUES ('". $ref."','".$fname."','".$lname."','".$email."','".$phone."','".$user_company."','".$user_division."')";
  sqlsrv_query( $conn,$p_info_data_insert);
}
 if ($conn)
{
   echo "new conn<br>";
   $i = 1;
while($i < 38)
          {
  echo "new conn".$i."<br>";
      }
 }                 


?>
