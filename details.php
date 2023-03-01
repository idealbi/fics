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
    
      <a class="btn btn-success btn-sm" href="logout.php" role="button">Logout</a>
  </div>
</nav>
<div class="relative">
<img src="/img/fics_bg_sm_1.png" alt="" width="200" height="120">
</div>
<div class="container">
     
  
   <div class="card ">
      <div class="row">
    <div class="col-sm-3"> 
    <a class="btn btn-success btn-sm" href="results.php" role="button">Back</a>
   
          <font face = "Verdana" size = "2">
      <?php
$con=mysqli_connect("localhost","questionnairekar_app","questionnairekar_app","questionnairekar_fics");
$ref_id =  $_POST["ref"];
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result_p = mysqli_query($con,"SELECT * FROM `fics_result_vw` where qnr_data_ref='".$ref_id."'  ORDER BY `qnr_data_ref` ASC");
while($row_p = mysqli_fetch_array($result_p))
            {
              $Name=$row_p['FullName'];
              $Cellnum=$row_p['contactnumber'];
              $Language = $row_p['CheckedLanguage'];
            $Languagefile = "data/".$row_p['CheckedLanguage']."_SW4Languageindicator.pdf";
               $Behavioural= $row_p['Behavioural'];
             $Behaviouralfile = "data/".$row_p['Behavioural']."_FICSBehaviourPattern.pdf";
            $QnsDate=$row_p['QnsDate'];
                
            }?> 
            
<?php  $LanguageDownFileName = $Name."_".$ref_id."_".$QnsDate."_".$Language."_Languageindicator.pdf";
$BehaviouralDownFileName=$Name."_".$ref_id."_".$QnsDate."_".$Behavioural."_BehaviourPattern.pdf" ;?>            
      <ul class="list-group">
  <li class="list-group-item"><b>Full Name : <?php echo $Name; ?></b></li>
  <li class="list-group-item">Cellphone : <?php echo $Cellnum; ?></li>
  <li class="list-group-item">Ref :<?php echo $_POST["ref"]; ?></li>

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
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
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

$result = mysqli_query($con,"SELECT * FROM `qnr_data` where qnr_data_ref='".$ref_id."'  ORDER BY `Question` ASC");
while($row = mysqli_fetch_array($result))
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
            
     mysqli_close($con);
?>
         </tbody>
             </table>
</font></div>
    <div class="col-9">
       
        <a href="<?php echo $Behaviouralfile;?>" class="btn btn-info btn-sm" role="button" download="<?php echo $BehaviouralDownFileName;?>">Download : <?php echo $Behavioural ?></a>



<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    
    <embed
    src="<?php echo $Behaviouralfile;?>#toolbar=0&navpanes=0&scrollbar=0"
    type="application/pdf"
    frameBorder="0"
    scrolling="auto"
    height="600"
    width="100%"
></embed>



<br> 
<a href="<?php echo $Languagefile;?>" class="btn btn-info btn-sm" role="button btn-sm "download="<?php echo $LanguageDownFileName;?>" >Download: <?php echo $Language;?></a>

<embed
    src="<?php echo $Languagefile;?>#toolbar=0&navpanes=0&scrollbar=0"
    type="application/pdf"
    frameBorder="0"
    
    height="600"
    width="100%"
></embed>
</div>


</div>
  </div>



     </div>
  </div>
  




  </div>
<br>

  </body>
</html>