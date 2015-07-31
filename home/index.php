<?php
	session_start();
	include "../connect.php";
	include "../includes/functions.php";
	include "../includes/header.php";
?>

	<div class="content">
		<div class="search_holder">
			<form action="../search/index.php" method="get">
				<input disabled="disabled" class="differently_abled" style="width:50px; background-color:#CACACA;">
					<input type="text" class="search_box" name="search" placeholder="Search For A Cause">
			</form>
		</div>
		<div class="campaign_box">
	<?php
		$cam_query = mysql_query("SELECT * FROM campaign WHERE visibility='1'");
		while($cam_detail = mysql_fetch_assoc($cam_query))
		{
			$name = $cam_detail['name'];
			$pic = $cam_detail['pic'];
			$uid = $cam_detail['uid'];
			$fund_left = ($cam_detail['req_fund'] - $cam_detail['col_fund']);
			single_product($pic,$name,$fund_left,$uid);
		}
	?>
		</div>
	</div>
<?php
	include "../includes/footer.php";
?>