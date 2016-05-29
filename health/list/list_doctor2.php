<?php require_once('../Connections/health.php'); ?>
<?php

//$r=$_GET['date'];
$s = $_GET["expertness"];
$d=$_GET["doctor_name"];

mysql_select_db($database_health, $health);

$sql="SELECT distinct hospital 
		FROM doctor 
		WHERE expertness = '".$s."' 
		 OR doctor_name= '".$d."'";

$result = mysql_query($sql);
?>
<select id="hospital_list" name="hospital_list" >
	<option value="0">===SELECT Hospital===</option>
<?php
while ($row = mysql_fetch_array($result)) {
?>
	<option value="<?php echo $row['hospital']; ?>"><?php echo $row['hospital']; ?></option>
<?php } ?>
</select>