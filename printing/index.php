<?php 
require_once('../Connections/health.php'); 
/*echo $_POST['doctor_id'];
echo $_POST['user'];*/
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
	session_start();
}  
$user = $_SESSION['user_id'];  
$doc = $_GET['doctor_id'];
$name = $_GET['user_name'];
$doctor_name = $_GET['doctor_name'];
$qualification = $_GET['qualification'];
$hospital = $_GET['hospital'];
$location = $_GET['location'];
$visit = $_GET['visit'];
$tnr = rand(1000,1000000);
$date = $_GET['aDate'];


mysql_select_db($database_health, $health);
$query_insertData = "INSERT into reservation (user_id, doctor_id,date)
VALUES ('$user', '$doc','$date')";
$success_insertData = mysql_query($query_insertData, $health) or die(mysql_error());
?>

<!DOCTYPE html>
<html>
<head>
	<script src="jquery-1.9.0.js" type="text/JavaScript" language="javascript"></script>
	<script src="jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>

	<link type="text/css" rel="stylesheet" href="PrintArea.css" />
	<link type="text/css" rel="" href="empty.css" />
	<link type="text/css" rel="noPrint" href="noPrint.css" />
	<title>Thank you</title>
</head>

<!-------------------HEADER START---------------------->

<!-------------------HEADER END----------------------> 

<!-------------------BODY START---------------------->
<body>
	<div class="PrintArea p1">
		<p>
			<center>
				About Reservation Info
			</center><br />
			Ticket Cupon: <?php echo $tnr; ?><br />
			Doctor Name : <?php echo $doctor_name; ?><br />
			Expertise : <?php echo $qualification; ?><br />
			Hospital : <?php echo $hospital; ?><br />
			Date : <?php echo $date; ?><br />
			Location : <?php echo $location; ?><br />
			Visit : <?php echo $visit; ?><br />
		</p>
	</div>
	<div class="button b1">Print / Save</div>

	<script>
	$(document).ready(function(){
		$("div.b1").click(function(){

			var mode = $("input[name='mode']:checked").val();
			var close = mode === "popup" && $("input#closePop").is(":checked");

			var options = { mode : mode, popClose : close };

			$("div.PrintArea.p1").printArea( options );
		});

		$("input[name='mode']").click(function(){
			if ( $(this).val() === "iframe" ) $("#closePop").attr( "checked", false );
		});
	});

	</script>
</fieldset>
</div>
</div>
</body>

<!-------------------BODY END---------------------->

<!-------------------FOOTER START-------------------->
<!-------------------FOOTER END---------------------->

</html>