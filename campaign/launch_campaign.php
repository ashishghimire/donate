<?php
	session_start();
	include "../connect.php";
	include "../includes/header.php";
	
	echo '<div class="content">';
	if(isset($_SESSION['campaign'])){
		header('Location:../home');
	}
	else{
		$form = '<table><form action="insert_campaign.php" enctype="multipart/form-data" name="UploadForm" id="myForm"  method="post"><br>';
		$form .='<tr><td>Campaign Name:</td><td> <input name="name" type="text"></td></tr>';
		$form .='<tr><td>Description:</td><td> <textarea name="description"></textarea></td></tr>';
		$form .='<tr><td>Required Fund:</td><td> <input name="req_fund" type="number"></td></tr>';		
		$form .='<tr><td>Fb link:</td><td> <input name="fb_link" type="text"></td></tr>';		
		$form .='<tr><td>Youtube:</td><td> <input name="y_link" type="text"></td></tr>';
		$form .='<td><b>Images</b></td><td><input type="file" name="photo"></td>';
		$form .='<input type="hidden" name="MAX_FILE_SIZE" value="524288" />';
		$form .='<tr><td>Expiry Date(YYYY-MM-DD):</td><td><input type="date" name="expiry_date" min="2014-11-03"></td></tr>';		
		$form .='<tr><td></td><td><input type="submit"></td></tr>';		
		$form .= '</form></table>';
		echo $form;
	}
	echo '</div>';
	
	include "../includes/footer.php";
?>