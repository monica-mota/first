<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$image = $_POST['image'];
                $name = $_POST['name'];
				$address = $_POST['address'];
				$mobileno = (int)$_POST['mobileno'];
				$feedback = $_POST['feedback'];
				$shopname = $_POST['shopname'];
				
		
		require_once('dbConnect.php');
		
		$sql ="SELECT id FROM data ORDER BY id ASC";
		
		$res = mysqli_query($con,$sql);
		
		$id = 0;
		
		while($row = mysqli_fetch_array($res)){
				$id = $row['id'];
		}
		$path = "uploads/$id.png";
		
		$actualpath = "http://192.168.1.106/uploading/$path";
		
		$sql = "INSERT INTO data (shopname,mobilenumber,address,feedback,photo,name) VALUES ('$shopname','$mobileno','$address','$feedback','$actualpath','$name')";
		
		if(mysqli_query($con,$sql)){
			file_put_contents($path,base64_decode($image));
			echo "Successfully Uploaded";
		}
		
		mysqli_close($con);
	}else{
		echo "Error";
	}
	?>