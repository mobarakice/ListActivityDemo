<?php
require_once("connect.php");
 
$json = file_get_contents('php://input');
$obj = json_decode($json);

$sql_query = "SELECT * FROM user WHERE mobileNo = '".$obj->mobileNo."' AND password = '".$obj->password."';";
 
$result = mysqli_query($con, $sql_query);

$result_obj = array();
if(!$result){
	$result_obj['feeback'] = "Query did not execute";
}elseif(mysqli_num_rows($result)>0){
	$result_set = array();
	while($row = mysqli_fetch_assoc($result)){
		$result_set[] = $row;
	}
	$result_obj['feeback'] = "Succesfully login.";
	$result_obj['info'] = $result_set;
	 
}else{
	$result_obj['feeback'] = "Login failed. Try again.";
}
header('Content-type: application/json');
echo '{"result":';
echo json_encode($result_obj);
echo "}";

mysqli_close($con);

?>