<?php
	session_start();
	include "../connect.php";
?>	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=418916974925983&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
<?php
	
	$uid = mysql_real_escape_string($_GET['id']);
	
	
	$campaign_details = mysql_fetch_assoc(mysql_query("SELECT * FROM campaign WHERE uid='$uid'")) or die(mysql_error());
	
	$name = $campaign_details['name'];
	$desc = $campaign_details['description'];
	$req_fund = $campaign_details['req_fund'];
	$col_fund = $campaign_details['col_fund'];
	$fb_link = $campaign_details['fb_link'];
	$y_link = $campaign_details['y_link'];
	$expiry_date = $campaign_details['expiry_date'];
	$expiry_date = date('Y-m-d', $expiry_date);
	$visibility = $campaign_details['visibility'];
	if($visibility == 1){
		echo '<h1>'.$name.'</h1>';
		echo "Description:".$desc."<hr>";
		echo "Expected Fund:".$req_fund."<hr>";
		echo "Collected Fund:".$col_fund."<hr>";
		
		if($fb_link!=''){
			echo "Facebook:".$fb_link."<hr>";
		}
		else{
			echo "Facebook: Not available.<hr>";	
		}
		if($y_link == ''){
			echo "Youtube:Not Available<hr>";
		}
		else{
			echo '<iframe title="YouTube video player" class="youtube-player" type="text/html" 
				width="225"  src="'.$y_link.'" frameborder="0" allowFullScreen></iframe><hr>';
		}
		echo "Expires on:".$expiry_date."<hr>";
		echo '<div class="fb-share-button" data-href="https://localhost/donate/campaign/campaign_details.php?id='.$uid.'" data-layout="button_count"></div>';
		echo '<hr>';
		echo '<a style="text-decoration:none;" href="../transaction/donate.php?id='.$uid.'"><div style="width:100px;  padding:10px;background-color:#333; color:white;">Donate Now</div></a>';
	}
	else{
		echo 'The link does not exist or you may not have the permission to view it';
	}
	
?>