 <p>Nameee: <?php echo $_POST["companyid"]." ".$_POST["lname"]; ?></p>
    <p>E-mail: <?php echo $_POST["formCompnay"]; ?>
	<br>Cell Number : <?php 
	    echo $_POST["formDivision"]; ?></p>
  <?php 
$companyid =strval($_POST["companyid"]);
$company =$_POST["formCompnay"];
$div= $_POST["formDivision"];
$array_divs = explode(',',$div);
$Ismulty = substr_count($div, ',');
echo "Number : ".$Ismulty+1;
echo "<br>";
echo "explode1 :".$array_divs[0];
echo "<br>";
for ($x = 0; $x <= $Ismulty; $x++) {
  echo "The number is: $array_divs[$x] <br>";
}
?>
 <?php
$connectionInfo = array("UID" => "web_app_user", "pwd" => "P@ss1234", "Database" => "fics_db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:srv-db-idealbi.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
 

if ($conn)
{
$p_info_data_insert = "INSERT INTO [fics].[Company] ([CompanyID],[Company])VALUES ('".$companyid."','".$company."')";
sqlsrv_query( $conn,$p_info_data_insert);
	echo "saveeed";
}
?>
