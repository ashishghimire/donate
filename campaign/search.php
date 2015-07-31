<?php
	session_start();
	include "../connect.php";
	include "../includes/functions.php";
	include "../includes/header.php";
	$key = mysql_real_escape_string($_GET['key']);
	echo '<div class="content">';
		$search_query = mysql_query("SELECT pic,name,req_fund,col_fund,uid FROM campaign WHERE name LIKE '%$key%'");
		if(mysql_num_rows($search_query) == 0)
		{
			echo "No results found";
		}
		else
		{
			while($search_details = mysql_fetch_assoc($search_query))
			{
				$pic = $search_details['pic'];
				$name = $search_details['name'];
				$fund_left = ($search_details['req_fund']-$search_details['col_fund']);
				$uid = $search_details['uid'];
				single_product($pic,$name,$fund_left,$uid);
			}
		}
	echo '</div>';
	include "../includes/footer.php";
?>