<?php
	session_start();
	include "../connect.php";
	$key = mysql_real_escape_string($_GET['key']);
	
	$search_query = mysql_query("SELECT pic,name,user_id,req_fund,col_fund,uid FROM campaign WHERE name LIKE '%$key%'");
	if(mysql_num_rows($search_query) == 0)
	{
		$response['success'] = 0;
	}
	else
	{
		while($search_details = mysql_fetch_assoc($search_query))
		{
			$user_id = 
			$pic = $search_details['pic'];
			$name = $search_details['name'];
			$req_fund = $search_details['req_fund'];
			$col_fund = $search_details['col_fund'];
			$uid = $search_details['uid'];
			
		}
	}
?>