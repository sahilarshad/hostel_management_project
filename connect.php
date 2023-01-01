<?php
$hostname="localhost"; //local server name default localhost
$username="root";  //mysql username default is root.
$password="";       //blank if no password is set for mysql.
$database="hostel_management_system";  //database name which you created
$con=new mysqli($hostname,$username,$password,$database);
if(! $con)
{
die('Connection Failed'.mysql_error());
}
//header("location: home.php")
//mysql_select_db($database,$con);
?>