<?php
	function single_product($pic,$name,$fund_left,$uid)
	{
		echo '<a href="../campaign/campaign_details.php?id='.$uid.'">
		<div class="single_product mp">
			<div class="img_holder">';
				echo '<img src="../'.$pic.'" class="pic">';
			echo '</div>
			<div class="info_holder">';
				echo '<div class="cam_name">'.$name.'</div>';
				echo '<div class="cam_category">'.$fund_left.'</div>
			</div>
		</div>
		</a>';
	
	}
?>