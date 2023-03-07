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
  ?>

    
    <p>Name: <?php echo $_POST["fname"]." ".$_POST["lname"]; ?></p>
    <p>E-mail: <?php echo $_POST["email"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cell Number : <?php echo $_POST["phone"]; ?></p>
    <p>Reference Number : <?php echo $num; ?></p>
    <p>Company Number : <?php echo $user_company; ?></p>
    <p>Division Number : <?php echo $user_division; ?></p>
    
    <!-- qnr_data_ref,Question,Red,Blue,Yellow,Green	qnr_data_date -->
   
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
