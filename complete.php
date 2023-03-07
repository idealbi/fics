<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>FICS-Profile Questionnaire</title>
    <style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
  background-image: url("/img/fics_bg_sm.png");
   background-repeat: no-repeat;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tammb {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}

.tabyty {
    background-image: url('/img/fics_bg_sm.png');
}
</style>
  </head>
  <body>
      <nav class="navbar navbar-light" style="background-color: #ffffff;">
 <div class="container-md">
<a class="navbar-brand" href="#">
      <img src="/img/fics_bg_sm.png" alt="" width="160" height="67">
    </a>
  </div>
</nav>
<div class="container">
   
 
  <!-- One "tab" for each step in the form: -->
  <div  id="regForm" class="tabb">
   <h4>You have Complated the Questionnaire</h4>
<?php
   $num = rand();
    $user_division=$_POST['user_division'];
    $user_company=$_POST['user_company'];
    $connectionInfo = array("UID" => "web_app_user", "pwd" => "P@ss1234", "Database" => "fics_db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:srv-db-idealbi.database.windows.net,1433";
    $conn_division= sqlsrv_connect($serverName, $connectionInfo);
    $find_sql_division = "select Company, Division from fics.Company c join [fics].[Division] d on c.CompanyID=d.CompanyID where c.CompanyID='".$user_company."' and DivisionID = ".$user_division;
    $result_select_division=sqlsrv_query($conn_division, $find_sql_division);
   while($row_division= sqlsrv_fetch_array($result_select_division, SQLSRV_FETCH_ASSOC))
     {
      $user_company_name= $row_division['Company'];
      $user_division_name= $row_division['Division'];
     }
  ?>

    
    <p>Name: <?php echo $_POST["fname"]." ".$_POST["lname"]; ?></p>
    <p>E-mail: <?php echo $_POST["email"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cell Number : <?php echo $_POST["phone"]; ?></p>
     <p>Company  : <?php echo $user_company_name; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Division  : <?php echo $user_division_name; ?></p>
    <p>Reference Number : <?php echo $num; ?></p>
   
   
    
    <!-- qnr_data_ref,Question,Red,Blue,Yellow,Green	qnr_data_date -->
   <?php
    
    
    
    
    $ref = $num;


    
    $a5_1 = $_POST["sel5_1"];
    $a5_2=$_POST["sel5_2"];
    $a5_3=$_POST["sel5_3"];
    $a5_4=$_POST["sel5_4"];
?>
<form name="data_submit" action="submit_page.php" method ="POST">
<input type="text"  name="fname" value="<?php echo $_POST["fname"]?> "hidden>
<input type="text"  name="lname" value="<?php echo $_POST["lname"]?> "hidden>
<input type="text"  name="email" value="<?php echo $_POST["email"]?> "hidden>
<input type="text"  name="ref" value="<?php echo $ref?> "hidden>
<input type="text"  name="phone" value="<?php echo $_POST["phone"]?> "hidden>
<input type="text"  name="user_company" value="<?php echo $user_company;?> "hidden>
<input type="text"  name="user_division" value="<?php echo $user_division;?> "hidden>
<table  >
    
    
    
<?php

    $i = 1;
            
                    while($i < 38)
                    {
                        
                        $itemNum = $i ;
                        
                          if ($i < 18) 
                                {
                                    if ($i ==5){
                                         $itemName = "Q".$i;
                                        $item1=$a5_1;
                                        $item2=$a5_2;
                                        $item3=$a5_3;
                                        $item4= $a5_4;
                                        $item1_1= "Q5_1";
                                        $item2_1="Q5_2";
                                        $item3_1="Q5_3";
                                        $item4_1="Q5_4";                                          
                                    }
                                    else {
                                        $itemName = "Q".$i;
                                        $item1_1= $itemName."_1";
                                        $item2_1=$itemName."_2";
                                        $item3_1=$itemName."_3";
                                        $item4_1=$itemName."_4";
                                     
                                        $item1=$_POST[$item1_1];
                                        $item2=$_POST[$item2_1];
                                        $item3=$_POST[$item3_1];
                                       $item4= $_POST[$item4_1];                                       
                                    }
                                    

echo "<tr>
     <td><input type= 'text'  name= '".$itemName ."' value= '".$itemName ."'> </td>
     <td><input type= 'text'  name= '".$item1_1."' value= '".$item1."'> </td>
     <td><input type= 'text'  name= '".$item2_1."' value= '".$item2."'> </td>
     <td><input type= 'text'  name= '".$item3_1."' value= '".$item3."' > </td>
     <td><input type= 'text'  name= '".$item4_1."' value= '".$item4."'></td>
 </tr> "
 ;}

                                
            
                        else 
                                {
                                    $itemName = "Options".$i;
                                     $Option= $_POST[$itemName];
                                     $no_data = 0;
                     
echo "<tr>
     <td><input type= 'text'  name='Q".$itemNum."' value='".$itemNum."'></td>
     <td><input type= 'text'  name='".$itemName ."' value='". $Option."'></td>
     <td><input type= 'text'  name='non' value='". $i ."'></td>
     <td><input type= 'text'  name='non' value='". $Option ."'></td>
     <td><input type= 'text'  name='non' value='".$no_data."'></td>
 </tr>";

                                };
                    
                    	$i++;
                  
                    	
                    }
   
   
    ?>
    
 </table>
     <input type="submit" value="Submit" onclick="submit_form();" >
</form>   
 
  </div>
  
<script>
    function submit_form() {
document.data_submit.submit();
document.data_submit.reset(); 
}
</script>



  </div>
<br>

  </body>
</html>
