<?php
include ("connections/health.php");
?>

<?php
$username=$_POST['username'];
$password=$_POST['password'];
$sql="SELECT * 
FROM user 
WHERE username='$username' 
and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $username and $password, table row must be 1 row

if($count==1){

// Register $username, $password and redirect to file "login_success.php"
//session_register("username");
//session_register("password");
	session_start();
	$_SESSION['user_id'] = $_POST['username'];;
	header("location:login_successful.php");
}
else {
	echo "Wrong Username or Password";
}
?>
