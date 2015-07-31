<?php
	session_start();
	include "../connect.php";
	
	$campaign_query = mysql_query("SELECT name,uid,col_fund,req_fund FROM campaign WHERE visibility='1'") or die(mysql_error());
	while($campaign_details = mysql_fetch_assoc($campaign_query))
	{
		$name = $campaign_details['name'];
		$uid = $campaign_details['uid'];
		$col_fund = $campaign_details['col_fund'];
		$req_fund = $campaign_details['req_fund'];
		echo $name;
		echo '<a href="campaign_details.php?id='.$uid.'">'.$name.'</a><br>';
		echo 'Collected Fund:'.$col_fund.'<br>';
		echo 'Expected Fund:'.$req_fund."<hr>";
		
	}
	
?>