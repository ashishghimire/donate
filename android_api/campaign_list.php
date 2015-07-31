<?php
	session_start();
	include "../connect.php";
	
	$campaign_query = mysql_query("SELECT name,uid,user_id,col_fund,req_fund,pic FROM campaign WHERE visibility='1'") or die(mysql_error());
	if(mysql_num_rows($campaign_query) == 0)
	{
		$response['success'] = 0;
	}
	else
	{	
		$response['campaign_list'] = array();
		while($campaign_details = mysql_fetch_assoc($campaign_query))
		{
			
			$details = array();
			$user_id = $campaign_details['user_id'];
			
			$user_details = mysql_fetch_assoc(mysql_query("SELECT fname,mname,lname FROM user WHERE id='$user_id'"));
			$fname = $user_details['fname'];
			$mname = $user_details['mname'];
			$lname = $user_details['lname'];
			
			
			$details['user_name'] = $fname." ".$mname." ".$lname;
			$details['name'] = $campaign_details['name'];
			$details['uid'] = $campaign_details['uid'];
			$details['pic'] = "http://192.168.0.103/donate/".$campaign_details['pic'];
			$details['col_fund'] = intval($campaign_details['col_fund']);
			$details['req_fund'] = intval($campaign_details['req_fund']);
			
			array_push($response['campaign_list'],$details);
		}
		$response['success'] = 1;
	}
	echo json_encode($response);
?>