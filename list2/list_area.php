<?php require_once('../Connections/health.php'); ?>
<?php
$f = $_GET["facility"];
mysql_select_db($database_health, $health);

$sql="SELECT distinct area 
		FROM service 
		WHERE facility = '".$f."'";
$result = mysql_query($sql);
?>
<select id="area_lists" name="area_list" >
	<option value="0">===SELECT AREA===</option>
<?php
while ($row = mysql_fetch_array($result)) {
?>
	<option value="<?php echo $row['area']; ?>"><?php echo $row['area']; ?></option>
<?php } ?>
</select>