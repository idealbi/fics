
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
    




$i = 1;
while($i < 38)
          {
            echo "Tessst : ".$ref,",-",$fname,",",$lname,"<br>";
              if ($i < 18) 
                                {
                                     $itemName = "Q".$i;
                                     $item1= $itemName."_1";
                                        $item2=$itemName."_2";
                                        $item3=$itemName."_3";
                                        $item4=$itemName."_4";
                                        
                                        $valueItem1=$_POST[$item1];
                                        $valueItem2=$_POST[$item2];
                                        $valueItem3=$_POST[$item3];
                                        $valueItem4=$_POST[$item4];
                                }
              else {
                  $itemName ="Q".$i;
                 $item1= "Options".$i;
            
                $valueItem1=$_POST[$item1];
                $valueItem2=0;
                $valueItem3=0;
                $valueItem4=0;                
              }
  
  echo "(".$ref.",".$i.",".$valueItem1.",".$valueItem2.",".$valueItem3.",".$valueItem4."','".$date."')<br>" ;
              $data_insert = "INSERT INTO [fics].[Qnr_Data] (qnr_data_ref,Question,Red,Blue,Yellow,Green,qnr_data_date)
VALUES (".$ref.",".$i.",".$valueItem1.",".$valueItem2.",".$valueItem3.",".$valueItem4."','".$date."')" ;
sqlsrv_query( $conn,$data_insert);
              
              
                        	$i++;
                  
                    	
                    }
                    
                    

echo "data saved <br>";
header("Location: https://www.google.com");
die();
};
?>
