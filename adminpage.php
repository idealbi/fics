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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
.tab {
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

 
.step.finish {
  background-color: #04AA6D;
}

.tabyty {
    background-image: url('/img/fics_bg_sm.png');
}
div.relative {
  position: absolute;
  left: 20%;  z-index: 2;
  
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
      <nav class="navbar navbar-light " style="background-color: #ffffff;">
 <div class="container-md ">
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
<br>
<div class="card">
  <div class="card-body">
<input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
 
    <?php
$connectionInfo = array("UID" => "web_app_user", "pwd" => "P@ss1234", "Database" => "fics_db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:srv-db-idealbi.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
$ref_id =  $_POST["ref"];
if ($conn->connect_error)
{
echo "Failed to connect to MySQL: " ;
}
	$sql = "SELECT distinct [companyid] as companyid FROM [fics].[Company]";
	$result_p = sqlsrv_query($conn, $sql);
$array_ref = array();
 while($row_p = sqlsrv_fetch_array($result_p, SQLSRV_FETCH_ASSOC))
            {
	 
    $array_ref[] = $row['companyid'];
                
            }?>     
   <?php



$array_length = count($array_ref);



  
     
echo " Tests  tabs : ".$array_length."<br>";
?>
<div class="container">
  <div class="row g-2">
    <div class="col-6">
      <div class="p-3 border bg-light"><div class="card">
  <h5 class="card-header">Set Up Client Company</h5>
  <div class="card-body">
    
    <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Example label</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Another label</label>
  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
</div>
  </div>
</div></div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light"><div class="card">
  <h5 class="card-header">Featured</h5>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div></div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light"><div class="card">
  <h5 class="card-header">Featured</h5>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div></div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light"><div class="card">
  <h5 class="card-header">Featured</h5>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div></div>
    </div>
  </div>
</div>
  
 

  </div>
   </div>
 </div>
   </div>   
   
   
   <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

  </body>
</html>
