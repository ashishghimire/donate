<?php
	session_start();
	include "../connect.php";

	if(isset($_GET['id'])){
		$uid = mysql_real_escape_string($_GET['id']);
		$campaign_query = mysql_query("SELECT * FROM campaign WHERE uid='$uid'");
		if(mysql_num_rows($campaign_query) == 0){
			$response['success'] = 0;
		}
		else
		{	
			$campaign_details = mysql_fetch_assoc($campaign_query) or die(mysql_error());
			$visibility = $campaign_details['visibility'];
			
			$response['campaign_details'] = array();
			
			if($visibility == 1){			
				$details = array();
			
				$details['name'] = $campaign_details['name'];
				$details['desc'] = $campaign_details['description'];
				$details['req_fund'] = $campaign_details['req_fund'];
				$details['col_fund'] = $campaign_details['col_fund'];
				$details['fb_link'] = $campaign_details['fb_link'];
				$details['y_link'] = $campaign_details['y_link'];
				$expiry_date = $campaign_details['expiry_date'];
				$details['exp_date'] = date('Y-m-d', $expiry_date);
				$visibility = $campaign_details['visibility'];	

				array_push($response['campaign_details'],$details);
			}
			else{
				$response['success'] = 0;
			}
		}
	}
	else{
		$response['success'] = 0;
	}
	echo json_encode($response);

?>