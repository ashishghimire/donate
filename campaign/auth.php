<?php
	session_start();
	include "../connect.php";
	
	$username = mysql_real_escape_string($_POST['username']);
	$passwd = mysql_real_escape_string($_POST['passwd']);
	
	$auth_query  = mysql_query("SELECT name, uid FROM campaign WHERE username='$username' AND passwd='$passwd'");
	if(mysql_num_rows($auth_query) == 0){
		header('Location:sign_in.php?status=0');
	}
	else
	{
		$campaign_details = mysql_fetch_assoc($auth_query);
		$_SESSION['name'] = $campaign_details['name'];
		$_SESSION['campaign'] = $campaign_details['uid'];
		header('Location:profile.php');
	}	
?>	