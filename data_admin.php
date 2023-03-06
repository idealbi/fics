 <p>Nameee: <?php echo $_POST["companyid"]." ".$_POST["lname"]; ?></p>
    <p>E-mail: <?php echo $_POST["formCompnay"]; ?>
	<br>Cell Number : <?php 
	    echo $_POST["formDivision"]; ?></p>
  <?php 
$div= $_POST["formDivision"];
$Ismulty = substr_count($div, ',');
echo "Number : ".$Ismulty;
?>
