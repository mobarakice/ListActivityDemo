<?php
require_once("connect.php");

//$json_data =file_get_contents('php://input');
//$data = json_decode($json_data);

$sql_query = "SELECT * FROM user";
$result = mysqli_query($con, $sql_query);

if(!$result){
 echo "Query did not execute";
}elseif(mysqli_num_rows($result)==0){
 echo "0 records";
}else{
 $result_set = array();
 while($row = mysqli_fetch_assoc($result)){
  $result_set[] = $row;
 }
 header('Content-type: application/json');
 echo '{"result":';
 echo json_encode($result_set);
 echo "}";
}
mysqli_close($con);

?>