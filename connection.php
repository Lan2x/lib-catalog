<?php
$server="localhost";
$username="admin";
$password="hadouken123";
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