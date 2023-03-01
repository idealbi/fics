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
 <table class="table table-bordered table-striped">

    <tbody id="myTable">
     
     
   <?php
$phpconnect = mysqli_connect("localhost","questionnairekar_app","questionnairekar_app","questionnairekar_fics");
 
if (mysqli_connect_errno())
{
echo "Connection Failed; " . mysqli_connect_error();
}
else
{

 
$phpdatabase = "select  * from fics_new_result_vw";
$result = mysqli_query($phpconnect, $phpdatabase);
 
 
 
 if ($result->num_rows > 0)
{
while($row = $result->fetch_assoc()) 
{
   echo "  <tr>
        <td>
            
        <div class='card'>
                <div class='card-body'>
                    <p class='fw-bold'>" . $row["FullName"]. "</p>
                   
                    <div class='row'>
                    
                        <div class='col'>Behavioural : <b>" .$row["Behavioural"]."</b> - (".$row["BehaviouralValue"].")</div>
                    <div class='col'> Language : <b>".$row["Language"]."</b> - (".$row["LanguageValue"].")</div>
                    <div class='col'>
                        <form   action='details.php' method ='post' class='row gy-2 gx-3 align-items-center'>
  <div class='col-auto'>
   <input type=text' class='form-control' id='autoSizingInputGroup' name ='ref' value='".$row["qnr_data_ref"]."'hidden  >
   
    <button type='submit' class='btn btn-success btn-sm'>View Details</button>
  </div> 
  </form>
                    </div>
                  </div>
                  <font style='font-size:12px;color:gray'>
                  <strong>Q1-Q4 :</strong>".$row["Behavioural"]."- (".$row["BehaviouralValue"].")&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Q1-37 : </strong>".$row["Language"]."- (".$row["LanguageValue"]." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
                  <strong>Q11 : </strong>".$row["CheckedLanguageValue"]."- (".$row["CheckedLanguage"].")<br>
                       Date:". $row["QnsDate"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email :" . $row["email"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reference ID : ".$row["qnr_data_ref"]."</font>
                </div>
        </div>
 </td>
        
      </tr>";
}
}
else 
{
	echo "No resurrlts";
}
}

mysqli_close($phpconnect);

?>  
     
     
 

    </tbody>
  </table>
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