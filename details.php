<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
div.relative {
  position: absolute;
  left: 300px;  z-index: 2;
  
    top: 15px;
}
img_logo {
  position: absolute;
  left: 200px;
  
  z-index: -1;
  border: 1px solid #aaaaaa;
}
</style>
  </head>
  <body>
      <nav class="navbar navbar-light" style="background-color: #ffffff;">
 <div class="container-md">
<a class="navbar-brand" href="#">
      <img src="/img/fics_bg_sm.png" alt="" width="160" height="50">
    </a>
    
      <a class="btn btn-success btn-sm" href="logout.php" role="button">Logout</a><br>
	  
  </div>
</nav>
<div class="relative">
<img src="/img/fics_bg_sm_1.png" alt="" width="200" height="120">
</div>
<div class="container">
     
  
   <div class="card ">
      <div class="row">
    <div class="col-sm-3"> 
	<?php 
	$link_id =  $_POST["ref"];
list($ref_id, $company,$division) = explode('-', $link_id);
$back_link_id= $company."-".$division;


echo "<form   action='results.php' method ='post' class='row gy-2 gx-3 align-items-center'>
 							 <div class='col-auto'>
 							  <input type=text' class='form-control' id='autoSizingInputGroup' name ='ref' value='".$back_link_id."'hidden  >
    							  <button type='submit' class='btn btn-success btn-sm'>Back</button>
  							</div> 
 						 </form>";
    
   ?>
          <font face = "Verdana" size = "2">
      <?php
$connectionInfo = array("UID" => "web_app_user", "pwd" => "P@ss1234", "Database" => "fics_db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:srv-db-idealbi.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);


if ($conn->connect_error)
{
echo "Failed to connect to MySQL: " ;
}
	$sql = "SELECT * FROM fics.Results  where qnr_data_ref='".$ref_id."'";
	$result_p = sqlsrv_query($conn, $sql);

 while($row_p = sqlsrv_fetch_array($result_p, SQLSRV_FETCH_ASSOC))
            {
	 
              $Name=$row_p['FullName'];
              $Cellnum=$row_p['contactnumber'];
              $Language = $row_p['Language'];
            $Languagefile = "/img_data/".$row_p['Language']."_SW4Languageindicator.png";
			$Languagepdffile = "/data/".$row_p['Language']."_SW4Languageindicator.pdf";
               $Behavioural= $row_p['Behavioural'];
             $Behaviouralfile = "/img_data/".$row_p['Behavioural']."_FICSBehaviourPattern.png";
			  $Behaviouralpdffile = "/data/".$row_p['Behavioural']."_FICSBehaviourPattern.png";
            $QnsDate=$row_p['QnsDate'];
                
            }?> 
           
<?php  $LanguageDownFileName = $Name."_".$ref_id."_".$QnsDate."_".$Language."_Languageindicator.pdf";
$BehaviouralDownFileName=$Name."_".$ref_id."_".$QnsDate."_".$Behavioural."_BehaviourPattern.pdf" ;?>            
      <ul class="list-group">
  <li class="list-group-item"><b>Full Name : <?php echo $Name; ?></b></li>
  <li class="list-group-item">Cellphone : <?php echo $Cellnum; ?></li>
  <li class="list-group-item">Ref :<?php echo $ref_id; ?></li>

</ul>
</font>
 

     <br>
    
    
    <font face = "Verdana" size = "1">
    <table class="table table-bordered table-sm">
 <thead class="table-light">
    <tr>
      <th scope="col" style="font-size:12px;text-align: center; vertical-align: middle">#</th>
      <th scope="col" style="font-size:12px;text-align: center; vertical-align: middle">Red (I)</th>
      <th scope="col" style="font-size:12px;text-align: center; vertical-align: middle">Blue (C)</th>
      <th scope="col" style="font-size:12px;text-align: center; vertical-align: middle">Yellow (S)</th>
      <th scope="col" style="font-size:12px;text-align: center; vertical-align: middle">Green-(F)</th>
    </tr>
  </thead>
  <tbody>
    <?php

// Check connection
if ($conn->connect_error)
{
echo "Failed to connect to MySQL: " ;
}



 
$red_1= array(1,2,3,4,8,11,19,20,23,30,33); 
$yellow_1= array(9,10,18,22,25,27);
$blue_1 = array(7,12,16,17,21,28,32,34,36,37);
$red_2= array(6,9,10,12,13,15,17);
$yellow_2= array(5,7,14,16);
$blue_2= array(1,2,3,4,8,11);
$red_3= array(5,7,16,17);
$yellow_3= array(1,2,3,4,11,13,14,15);
$blue_3 = array(6,9);
$red_4= array(14);
$yellow_4 = array(6,8,12);
$blue_4 = array(5,10,13,15);

 $sql_p = "SELECT * FROM fics.[Qnr_Data]  where qnr_data_ref='".$ref_id."'";

$result = sqlsrv_query($conn, $sql_p);

 while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
            {
                $q_num = $row['Question'];
                if($q_num <18)
                    {
                    echo "<tr>";
                    echo "<td style='text-align: center; vertical-align: middle'><b>" . $row['Question'] . "</b></td>";
                    if (in_array($q_num, $red_1))
                          {
                          echo "<td style='text-align: center;background-color:#FF0000; vertical-align: middle'>" . $row['Red'] . "</td>";
                          }
                        elseif (in_array($q_num, $yellow_1))
                          {
                          echo "<td style='text-align: center;background-color:#FFFF00; vertical-align: middle'>" . $row['Red'] . "</td>";
                          }
                          elseif (in_array($q_num, $blue_1))
                          {
                          echo "<td style='text-align: center;background-color:#00BFFF; vertical-align: middle'>" . $row['Red'] . "</td>";
                          }else
                          {
                          echo "<td style='text-align: center;background-color:#32CD32; vertical-align: middle'>" . $row['Red'] . "</td>";
                          }
  
                    if (in_array($q_num, $red_2))
                          {
                          echo "<td style='text-align: center;background-color:#FF0000; vertical-align: middle'>" . $row['Blue'] . "</td>";
                          }
                        elseif (in_array($q_num, $yellow_2))
                          {
                          echo "<td style='text-align: center;background-color:#FFFF00; vertical-align: middle'>" . $row['Blue'] . "</td>";
                          }
                          elseif (in_array($q_num, $blue_2))
                          {
                          echo "<td style='text-align: center;background-color:#00BFFF; vertical-align: middle'>" . $row['Blue'] . "</td>";
                          }else
                          {
                          echo "<td style='text-align: center;background-color:#32CD32; vertical-align: middle'>" . $row['Blue'] . "</td>";
                          }                 

                    if (in_array($q_num, $red_3))
                          {
                          echo "<td style='text-align: center;background-color:#FF0000; vertical-align: middle'>" . $row['Yellow'] . "</td>";
                          }
                        elseif (in_array($q_num, $yellow_3))
                          {
                          echo "<td style='text-align: center;background-color:#FFFF00; vertical-align: middle'>" . $row['Yellow'] . "</td>";
                          }
                          elseif (in_array($q_num, $blue_3))
                          {
                          echo "<td style='text-align: center;background-color:#00BFFF; vertical-align: middle'>" . $row['Yellow'] . "</td>";
                          }else
                          {
                          echo "<td style='text-align: center;background-color:#32CD32; vertical-align: middle'>" . $row['Yellow'] . "</td>";
                          } 

                    if (in_array($q_num, $red_4))
                          {
                          echo "<td style='text-align: center;background-color:#FF0000; vertical-align: middle'>" . $row['Yellow'] . "</td>";
                          }
                        elseif (in_array($q_num, $yellow_4))
                          {
                          echo "<td style='text-align: center;background-color:#FFFF00; vertical-align: middle'>" . $row['Green'] . "</td>";
                          }
                          elseif (in_array($q_num, $blue_4))
                          {
                          echo "<td style='text-align: center;background-color:#00BFFF; vertical-align: middle'>" . $row['Green'] . "</td>";
                          }else
                          {
                          echo "<td style='text-align: center;background-color:#32CD32; vertical-align: middle'>" . $row['Green'] . "</td>";
                          }                     
                  
                    echo "</tr>";
                        
                    }
                else
                    {
                        echo "<tr>";
                    echo "<td style='text-align: center; vertical-align: middle'><b>" . $row['Question'] . "</b></td>";
                    if (in_array($q_num, $red_1))
                          {
                          echo "<td style='text-align: center;background-color:#FF0000; vertical-align: middle'>" . $row['Red'] . "</td>";
                          }
                        elseif (in_array($q_num, $yellow_1))
                          {
                          echo "<td style='text-align: center;background-color:#FFFF00; vertical-align: middle'>" . $row['Red'] . "</td>";
                          }
                          elseif (in_array($q_num, $blue_1))
                          {
                          echo "<td style='text-align: center;background-color:#00BFFF; vertical-align: middle'>" . $row['Red'] . "</td>";
                          }else
                          {
                          echo "<td style='text-align: center;background-color:#32CD32; vertical-align: middle'>" . $row['Red'] . "</td>";
                          }
                    echo " <td colspan ='3'></td> </tr>";
                        
                    }
                 
   
            }
            
  
?>
         </tbody>
             </table>
</font></div>
    <div class="col-9">
       <div class="d-flex justify-content-between bg-light">
			<div ><?php echo $BehaviouralDownFileName;?></div>
			<div><a href="<?php echo $Behaviouralpdffile;?>" class="btn btn-info btn-sm" role="button" download="<?php echo $BehaviouralDownFileName;?>">Download : <?php echo $Behavioural ?></a>
			
	  </div>
 
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    
<img src=" <?php echo $Behaviouralfile;?>" alt="" width="70%" height="400">

</div>

<hr>

     <div class="d-flex justify-content-between bg-light">
			<div ><?php echo $LanguageDownFileName;?></div>
			<div><a href="<?php echo $Languagepdffile;?>" class="btn btn-info btn-sm" role="button btn-sm "download="<?php echo $LanguageDownFileName;?>" >Download: <?php echo $Language;?></a>
</div>
	  </div>
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
<img src="<?php echo $Languagefile;?>" alt="" width="70%" height="400">
</div>


</div>
  </div>



     </div>
  </div>
  




  </div>
<br>

  </body>
</html>
