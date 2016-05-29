<?php require_once('../Connections/health.php'); 
?>
<?php
$q=$_GET["q"];

mysql_select_db($database_health, $health);

$sql="SELECT distinct doctor_name FROM doctor WHERE expertness = '".$q."'";
$result = mysql_query($sql);
?>
<select id="doctor_lists" name="doctor_list" onchange="get_hospital()">
	<option value="0">===SELECT DOCTOR===</option>
	<?php
	while ($row = mysql_fetch_array($result)) {
	?>
	<option value="<?php echo $row['doctor_name']; ?>"><?php echo $row['doctor_name']; ?></option>
<?php } ?>
</select>