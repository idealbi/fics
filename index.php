<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
.tab {
  display: none;
}

button {
  background-color: #7b9374;
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
  background-color: #7b9374;
}

.tabyty {
    background-image: url('/img/fics_bg_sm.png');
}
div.relative {
  position: absolute;
  left: 20%;  z-index: 2;
  
    top: 15px;
}
div.logo {
  position: absolute;
  left: 10%;  z-index: 0;
  height:25%;
  width:15%;
    
    top: 5px;
}
img_logo {
  position: absolute;
  left: 200px;
  
  z-index: -1;
  border: 1px solid #aaaaaa;
}
</style>

<script type="text/javascript">
function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data_users.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response; 
 }
 });
}

</script>  
  </head>
  <body>
    
      <nav class="navbar navbar-light" style="background-color: #ffffff;">
          <div class ="logo"><img src="/img/fics_bg_sm.png" alt="" width="180" height="65"></div>
 <div class="container-md" style="height:50px;">


  </div>
</nav>

 <div class="relative">
<img src="/img/fics_bg_sm_1.png" alt="" width="200" height="120">
</div>
<div class="container">
   <form id="regForm" action="complete.php" method="post">
  <h1>Start Questionnaire</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab"><p class="fw-bold">Instructions :</p>
    <p>
In each question you are required to choose the sentence that best describes you, in order
of preference, down to the sentence that least describes you.</p>
<p>Indicate your choices in the column to the right as follows:
<ul>
<li><b>1</b>= your first preference (most describes you)</li>
<li><b>2</b>= your second preference</li>
<li><b>3</b>= your third preference</li>
<li><b>4</b>= your fourth preference (least describes you)</li>
</ul>
</p>
<div style="overflow:auto;">
    <div style="float:right;">
    
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Start</button>
    </div>
  </div>
  </div>
  <div class="tab"><p class="fw-bold">Contact Info:</p>
<div class="row">
	    <div class="col">
		<label for="dropdown1">Select a Company:</label>
<div id="select_box">
 <select class="form-control"  name="user_company" onchange="fetch_select(this.value);">
  <option Value="0000">Select Company</option>
  <?php
$connectionInfo = array("UID" => "web_app_user", "pwd" => "P@ss1234", "Database" => "fics_db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:srv-db-idealbi.database.windows.net,1433";
$conn_compny = sqlsrv_connect($serverName, $connectionInfo);

  $select_compny="SELECT [CompanyID] ,[Company] FROM  [fics].[Company] where IsActive=1";
  $result_select_compny=sqlsrv_query($conn_compny, $select_compny);
   while($row_compny = sqlsrv_fetch_array($result_select_compny, SQLSRV_FETCH_ASSOC))
  {
   echo "<option value='".$row_compny['CompanyID']."' >".$row_compny['Company']."</option>";
  }
 ?>
 </select>
	 </div>
 </div>
	<div class="col">
		<label for="new_select">Select a Division:</label>
		<br>
 <select name="user_division" class="form-control" id="new_select">
	  <option Value="0000">None</option>
 </select>
 </div>
  </div>
<br>
  <div class="row">
      
  <div class="col">
    <input type="text" class="form-control" name="fname" placeholder="First name" aria-label="First name">
  </div>
  <div class="col">
     
    <input type="text" class="form-control" name="lname" placeholder="Last name" aria-label="Last name">
  </div>
</div>
  <br>
  <div class="row">
  <div class="col">
      
    <input type="text" class="form-control" name="email" placeholder="E-mail" aria-label="email">
  </div>
  <div class="col">
     
    
    <input type="text" class="form-control" name="phone" placeholder="Contact Number" aria-label="Contact Number" not re>
  </div>
</div>
    <br>
<div style="overflow:auto;">
    <div style="float:right;">
    
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div> 

  
  </div>
<?php
 // Get the contents of the JSON file 
$filename = file_get_contents("data/questions.json");
$filename_2 = file_get_contents("data/questions_2.json");
$array = json_decode($filename, true);
//var_dump($filename_2); // show contents

foreach($array as $key=>$value){
     $qn  = explode("-",$key);
     $qnn  =  $qn[0] ;
    $int_qn = intval( $qnn );
    ?>
 <div class="tab"><p class="fw-bold">Question # :&nbsp;&nbsp;<?php 
  if ($int_qn < 5 ) {
 
 echo  $int_qn ;
 
 }
 
 else {
 echo  $int_qn."-".$qn[1] ;
 }; ?></p>
    <?php  if ($int_qn == 5 ) 
        {
           echo "<div class='selecter5'> 
           Indicate your preference in the table below:
<p style='font-size:8px;'> <ul><li><i>1 = your first being first preference</i></li>  
<li><i>2 = your second preference</i></li>   
<li><i>3 = your third preference </i></li>   
<li><i>4 = your fourth preference </i></li></ul> </p>

<br>
        <table class='table table-bordered border-secondary'>
        <tr><td style='width:50%'><img src='/img/image1.png'></td>
        <td><img src='/img/image2.png'></td><tr>
        <tr><td style='text-align: center; vertical-align: middle'><select name='sel5_1'>
 <option value='1'>1 </option>
 <option value='2'>2 </option>
  <option value='3'>3 </option>
 <option value='4'>4 </option>
</select></td>
<td style='text-align: center; vertical-align: middle'><select name='sel5_2'>
 <option value='1'>1 </option>
 <option value='2'>2 </option>
  <option value='3'>3 </option>
 <option value='4'>4 </option>
</select></td></tr>
        <tr><td style='width:50%'><img src='/img/image3.png'></td>
        <td><img src='/img/image4.png'></td></tr>
        <tr>
        <td style='text-align: center; vertical-align: middle'>
        <select name='sel5_3'>
             <option value='1'>1 </option>
             <option value='2'>2 </option>
              <option value='3'>3 </option>
             <option value='4'>4 </option>
            </select>
        </td>
<td style='text-align: center; vertical-align: middle'>
        <select name='sel5_4'>
         <option value='1'>1 </option>
         <option value='2'>2 </option>
          <option value='3'>3 </option>
         <option value='4'>4 </option>
        </select>
</td>
</tr>
        
        </table>
       </div>
        <div id='myDIV".$int_qn."' style='display: none'>
    <div style='overflow:auto;float:right'>
    <button class='btn btn-success btn-sm active' type='button' id='nextBtn' onclick='nextPrev(1)'>Next</button>
    </div>
</div>


  
 
 <script> 
  $('select').change(function(){
var sum".$int_qn." = 0; 
$('.selecter".$int_qn."').find(':selected').each(function(){
console.log($(this).val());
		sum".$int_qn." = sum".$int_qn." +  parseInt($(this).val());
    console.log(sum".$int_qn.");
   
    
    
   var x = document.getElementById('myDIV".$int_qn."');
  if (sum".$int_qn." == 10) {
    x.style.display = 'block';
  } else {
    x.style.display = 'none';
  }  
});
}); 
 </script>";
      }
        
        
        else
                {;?>
                
               
                     <?php echo "   <div class='row'>
  <div class='selecter".$int_qn."'>   ";

$i = 0;
            
                    while($i < count($value))
                    {
                        
                        $itemNum = $i + 1;
                        $itemName = "Q".$int_qn."_".$itemNum;
                    	echo $value[$i]."<div style='overflow:auto;float:right'><select  name='".$itemName."'>
                                    <option value='1'>1 </option>
                                    <option value='2'>2 </option>
                                    <option value='3'>3 </option>
                                    <option value='4'>4 </option>
                            </select></div><br>
                    
                    <hr>
                    ";
                    	$i++;
                    }    ;
      echo "</div>

  ";
    
       
       
    echo "
    <div id='myDIV1_".$int_qn."' style='display: block'>
    <div style='overflow:auto;float:right'>
    <button class='btn btn-secondary btn-sm active' type='button' id='_nextBtn' >Next</button>
    </div>
</div>
 <div id='myDIV".$int_qn."' style='display: none'>
    <div style='overflow:auto;float:right'>
    <button class='btn btn-success btn-sm active' type='button' id='nextBtn' onclick='nextPrev(1)'>Next</button>
    </div>
</div>


  
 
 <script> 
  $('select').change(function(){
var sum".$int_qn." = 0; 
$('.selecter".$int_qn."').find(':selected').each(function(){
console.log($(this).val());
		sum".$int_qn." = sum".$int_qn." +  parseInt($(this).val());
    console.log(sum".$int_qn.");
   
    
    
   var x = document.getElementById('myDIV".$int_qn."');
   var y = document.getElementById('myDIV1_".$int_qn."');
  if (sum".$int_qn." == 10) {
    x.style.display = 'block';
    y.style.display = 'none';
  } else {
    x.style.display = 'none';
    y.style.display = 'block';
  }  
});
}); 
 </script>
 

    
  
  
  
  </div>   ";
             };?>
            
            
            
            
  </div>

<?php };?>
<div class="tab"><p class="fw-bold">In this section please select Yes or No for each of the following questions:</p>
  <font face = "Verdana" size = "2">
  <table class="table table-striped table-sm">

  <?php 
    $array_2 = json_decode($filename_2, true);
    foreach($array_2 as $key=>$value){
   
    
     
  echo "<tr><td><b>".$key."</b></td><td>".$value."</td><td><div class='form-check form-check-inline'>
  <input class='form-check-input' type='radio' name='Options".$key."'  id='inlineRadio1_".$key."' value='1'  required>
  <label class='form-check-label' for='inlineRadio1_".$key."'>Yes</label>
</div>
<div class='form-check form-check-inline'>
  <input class='form-check-input' type='radio' name='Options".$key."'  id='inlineRadio2_".$key."' value='0'>
  <label class='form-check-label' for='inlineRadio2_".$key."'>No</label>
</div>

</td></tr>";
 }
    ?>
</table>
</font>  
 
  <div style="overflow:auto;">
    <div style="float:right;">
    
      <input type="submit" value="Finish">
    </div>
  </div>
  
  </div>  
<br>



   
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
     
      <span class="step"></span>
     <?php   
      foreach($array as $key=>$value){
    echo "<span class='step'></span>";
    
      }
    ?>
  </div>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </div>
  
  
  <script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
const firstSelect = document.getElementById('company');
const secondSelect = document.getElementById('division');

firstSelect.addEventListener('change', () => {
  const selectedCategory = firstSelect.value;
  
  // Remove all options from the second select element
  secondSelect.innerHTML = '';

  // Loop through all options in the second select element
  for (let i = 0; i < secondSelect.options.length; i++) {
    const option = secondSelect.options[i];
    
    // If the option's data-category attribute matches the selected category, add it to the second select element
    if (option.getAttribute('data-category') === selectedCategory) {
      const newOption = document.createElement('option');
      newOption.text = option.text;
      newOption.value = option.value;
      secondSelect.add(newOption);
    }
  }
});

</script>
  </body>
</html>
