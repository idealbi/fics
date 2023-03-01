
<?php


  
$ref =  $_POST["ref"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$phone =  $_POST["phone"];

echo "Tessst : ".$ref,",-",$fname,",",$lname,"<br>";
echo $email .", ".$phone."<br>".$num;

$conn = mysqli_connect("localhost","questionnairekar_app","questionnairekar_app","questionnairekar_fics");

 if (mysqli_connect_errno())
{
echo "Connection Failed; " . mysqli_connect_error();
}
else
{
    echo "<br> Connectned ";
    $p_info_data_insert = "INSERT INTO qnr_person_info(qnr_data_ref,first_name,	last_name,email,contactnumber)
 VALUES ('". $ref."','".$fname."','".$lname."','".$email."','".$phone."')";
mysqli_query( $conn,$p_info_data_insert);




$i = 1;
while($i < 38)
          {
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
              $data_insert = "INSERT INTO qnr_data (qnr_data_ref,Question,Red,Blue,Yellow,Green)
VALUES (".$ref.",".$i.",".$valueItem1.",".$valueItem2.",".$valueItem3.",".$valueItem4.")" ;
mysqli_query( $conn,$data_insert);
              
              
                        	$i++;
                  
                    	
                    }
                    
                    

echo "data saved <br>";
header("Location: https://www.google.com");
die();
};
?>