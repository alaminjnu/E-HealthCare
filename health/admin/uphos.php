<?php
$link = mysql_connect("localhost","root","");
if (!$link)
{
die('Could not connect: ' . mysql_error());
}
 
// Create database
if (mysql_query("CREATE DATABASE alamin",$link))
{
echo "Database created";
}
else
{
echo "Error creating database: " . mysql_error();
}
 
// Create table
mysql_select_db("alamin", $link);
$sql = "CREATE TABLE hospital
(
id int ,
location varchar(15),
name varchar(15),
address varchar(15),
primary key(id)
)";
 
// Execute query
mysql_query($sql,$link);
//data insert
mysql_select_db("alamin", $link); 
$sql="INSERT INTO hospital (id,
location, name,address)VALUES
('$_POST[id]','$_POST[location]',
'$_POST[name]','$_POST[address]')";
 
if (!mysql_query($sql,$link))
{
die('Error: ' . mysql_error());
}
echo "1 record added";
?>