<?php 
$server_name = "localhost";
$user_name = "atomap_db_user";
$pass = "AtomAP432!";
$db_name = "bloodbank";
//$con = new mysqli($server_name,$user_name,$pass,$db_name) or die("Connection fail");
$con = mysqli_connect($server_name,$user_name,$pass,$db_name) or die("Connection failed");
//echo"Connection successfull";
?>