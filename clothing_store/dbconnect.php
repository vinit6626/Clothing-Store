<?php
//session_start();
$host="localhost:3307";
$username="root";
$pass="";
$db="solosquad_clothingstore";
 
$conn=mysqli_connect($host,$username,$pass,$db);
if(!$conn){
	die("Database connection error");
}
?>