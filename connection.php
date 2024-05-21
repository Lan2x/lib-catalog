<?php
$server="localhost";
$username="root";
$password="";
$databasename="library";

$data = mysqli_connect($server, $username, $password, $databasename);


if(!$data)
{
	die("disconnect");
}
else
{
	
}
?>