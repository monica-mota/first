<?php
$hostname = "localhost";         
$username = "hubliroot";
$password = "hubli@123";
$dbname = "hublidb";
 
 $con = mysqli_connect($hostname,$username,$password,$dbname);
 
 $mainids_id= $_POST['mainid_id'];
				$emails= $_POST['emailid'];
				$ratings= (int)$_POST['count'];
				$reviews= $_POST['reviews'];
				
if(mysqli_connect_error())
{
	$response["success"] = 0;
	$response["message"] = "Database error!";
	die(json_encode($response));
	echo "fail to connect MySql : " .mysqli_connect_error();
}
try
{		
		mysqli_query($con, "INSERT INTO rate (id,mainid_id,emailid,count,reviews) VALUES ('$','$mainids_id','$emails','$ratings','$reviews')");
		$response["success"] = 1;
	$response["message"] = "insertation success!";
	die(json_encode($response));
}
catch(Exception $e)
{
	$response["success"] = 0;
	$response["message"] = "cannot Add!";
	die(json_encode($response));
}
mysqli_close($con);
?>