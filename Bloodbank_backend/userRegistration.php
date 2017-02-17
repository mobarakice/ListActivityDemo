<?php
require_once("connect.php");
 
$json = file_get_contents('php://input');
$obj = json_decode($json);

$exist_query = "SELECT * FROM user WHERE mobileNo = '".$obj->mobileNo."';";

$result_exist = mysqli_query($con, $exist_query);

if(mysqli_num_rows($result_exist)>0){

	header('Content-type: application/json');
	echo '{"result":';
	echo '[{"registration":"This mobile number is already exist. Try another number"}]';
	echo "}";
	exit();
}

$sql_query = "INSERT INTO user(id, fullName, address, upazila, district, mobileNo, emailId,
	bloodGroup, gender, age, height, weight, beforDonation, donorStatus, photoUrl, password) 
	VALUES (NULL,'".$obj->fullName."',NULL,NULL,NULL,'".$obj->mobileNo."',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'".$obj->password."')";

$result = mysqli_query($con, $sql_query);
$result_set = array();
if(!$result){	
	$result_set['registration'] = "Registration failed. Try again.";
}else{
    $result_set['registration'] = "Registration successfull";
}

header('Content-type: application/json');
echo '{"result":';
echo json_encode($result_set);
echo "}";

mysqli_close($con);

?>