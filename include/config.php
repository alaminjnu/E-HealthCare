<?php

//connect to database
$link= mysql_connect("localhost","root","") or die("could not connect:" . mysql_error() );

//select database
mysql_select_db("health",$link) or die(mysql_error());

?>