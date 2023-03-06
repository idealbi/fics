 <p>Nameee: <?php echo $_POST["companyid"]." ".$_POST["lname"]; ?></p>
    <p>E-mail: <?php echo $_POST["formCompnay"]; ?>
	<br>Cell Number : <?php 
	    echo $_POST["formDivision"]; ?></p>
  <?php 
$div= $_POST["formDivision"];
$array_divs = explode(',',$div);
$Ismulty = substr_count($div, ',');
echo "Number : ".$Ismulty;
echo "<br>";
echo "explode1 :".$array_divs[0];
echo "<br>";
?>
