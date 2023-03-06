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
	  
	  
<script>
function getDivision() {
  var dropdown1 = document.getElementById("dropdown1");
  var dropdown2 = document.getElementById("dropdown2");
  dropdown2.innerHTML = "";
<?php
$connectionInfo = array("UID" => "web_app_user", "pwd" => "P@ss1234", "Database" => "fics_db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:srv-db-idealbi.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo); 
	?>
  var selectedCompany = dropdown1.value 
	  <?php
  	$abc = "<script>document.write(selectedCompany)</script>" ;
	  $sql_div = "SELECT distinct  [Division],[DivisionID] FROM [fics].[Division] where CompanyID='325395622'";
	 $result_div = sqlsrv_query($conn, $sql_div);
  echo " dropdown2.add(new Option('". $abc."', '". $abc."'));";
	
	 while($row_div = sqlsrv_fetch_array($result_div, SQLSRV_FETCH_ASSOC))
		    {

	    echo " dropdown2.add(new Option('". $row_div['Division']."', '". $row_div['DivisionID']."'));";

		    }?> 

 
}


</script>	  
	  
	  
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
	$sql = "SELECT distinct  Division FROM [fics].[Division]";
	$result_p = sqlsrv_query($conn, $sql);
$array_ref = array();
 while($row_p = sqlsrv_fetch_array($result_p, SQLSRV_FETCH_ASSOC))
            {
	 
    $array_ref[] = $row['division'];
                
            }?>     
   <?php



$array_length = count($array_ref);
echo " Tests  results3 : ".$array_length."<br>";

echo " Tests  abc : ".$abc."<br>";
$fruits = array("apple", "banana", "orange");

$i = 0;
while ($i < count($fruits)) {
  echo $fruits[$i] . "<br>";
  $i++;
}

echo "test : ".$array_ref[0]

?>
<?php
$favcolor = "blue";

switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!";
    break;
  case "blue":
    echo "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
?>


<h1>Cascading Dropdown Example dynmic div test</h1>

<form name="form1" id="form1" action="/action_page.php">
<select id="dropdown1" onchange="getDivision()">>
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
</select>

<select id="dropdown2">
  <option value="a">Option a</option>
  <option value="b">Option b</option>
  <option value="c">Option c</option>
</select>

</form>  
 

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
