<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_health = "localhost";
$database_health = "health";
$username_health = "root";
$password_health = "";
$health = mysql_pconnect($hostname_health, $username_health, $password_health) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db("health");
?>