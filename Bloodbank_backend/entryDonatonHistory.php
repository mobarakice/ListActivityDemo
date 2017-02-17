<?php
require_once("connect.php");

$json_data =file_get_contents('php://input');
$data = json_decode($json_data);

$dDate= ".$obj->donationDate.";
$date = new DateTime($rDate);
$ddate = $date->format('Y-m-d');

$sql_query = "INSERT INTO donor_history(id, donorId, donationDate, location) 
			VALUES(NULL,'".$obj->donorId."', '$ddate','".$obj->location."');";
			
$result = mysqli_query($con, $sql_query);
$result_set = array();

if(!$result){	
	$result_set['feedback'] = "Query did not execute";
}else{
    $result_set['feedback'] = "Donation history is successfully inserted";
}

header('Content-type: application/json');
echo '{"result":';
echo json_encode($result_set);
echo "}";
 
mysqli_close($con);

?>