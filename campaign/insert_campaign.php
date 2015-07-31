<?php
	session_start();
	include "../connect.php";
	
	$name = mysql_real_escape_string($_POST['name']);
	$description = mysql_real_escape_string($_POST['description']);
	$description = str_replace( PHP_EOL,'<br />', $description);
	$req_fund = mysql_real_escape_string($_POST['req_fund']);
	$fb_link = mysql_real_escape_string($_POST['fb_link']);
	$y_link = mysql_real_escape_string($_POST['y_link']);
	$expiry_date = mysql_real_escape_string($_POST['expiry_date']);
	$expiry_date = strtotime($expiry_date);
	
	$length = 20;
	$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	
	$target = 'images/profile/';
	$target = $target.'map'.$randomString.'.jpg';
	$store_target = '../'.$target;
	
	date_default_timezone_set('Asia/Kathmandu');
	$timeStamp = strtotime(date('Y-m-d'));
	$user_id = $_SESSION['user'];
	$insert_query = mysql_query("INSERT INTO campaign (cid,user_id,name,description,uid,pic,req_fund,col_fund,fb_link,y_link,created_date,expiry_date,visibility)
	VALUES('','$user_id','$name','$description','$randomString','$target','$req_fund','0','$fb_link','$y_link','$timeStamp','$expiry_date','1');
	") OR DIE(mysql_error());
	
	if($insert_query){	
		//moves the uploaded image to targetted location
		$image_result = move_uploaded_file($_FILES['photo']['tmp_name'],$store_target);
		
		header('Location:../campaign/profile.php');
	}
?>