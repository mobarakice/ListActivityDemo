<?php 
$server_name = "localhost";
$user_name = "entry-user-name";
$pass = "entry-user-pass";
$db_name = "entry-db-name";
//$con = new mysqli($server_name,$user_name,$pass,$db_name) or die("Connection fail");
$con = mysqli_connect($server_name,$user_name,$pass,$db_name) or die("Connection failed");
//echo"Connection successfull";
?>
