<?php require_once('../Connections/health.php'); ?>
<?php
$e = $_GET["expertness"];
//$d=$_GET["doctor_name"];
//$h=$_GET["hospital"];

mysql_select_db($database_health, $health);

$sql="SELECT distinct chamber 
		FROM doctor 
		WHERE expertness = '".$e."'";
		//AND hospital = '".$h."'   
		// AND doctor_name= '".$d."'

$result = mysql_query($sql);
?>
<select id="location_lists" name="location_list" >
	<option value="0">===SELECT LOCATION===</option>
<?php
while ($row = mysql_fetch_array($result)) {
?>
	<option ><?php echo $row['chamber']; ?></option>
<?php } ?>
</select>