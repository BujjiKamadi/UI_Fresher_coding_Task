<?php 
$dbhost="localhost";
$dbuser="bujji";
$dbpwd="bujji";
$dbname="sample";
$dbconnection=mysqli_connect($dbhost,$dbuser,$dbpwd,$dbname);
if(mysqli_connect_error())
{
	die("db connection failed");
}
?>