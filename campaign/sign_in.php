<?php
	session_start();
	include "../connect.php";
	include "../includes/header.php";
	
	if(isset($_SESSION['campaign'])){
		header('Location:../home');
	}
	else{
		$form = '<table><form action="auth.php" method="post"><br>';
		$form .='<tr><td>Username:</td><td> <input name="username" type="text"></td></tr>';
		$form .='<tr><td>Password:</td><td> <input name="passwd" type="password"></td></tr>';
				
		$form .='<tr><td></td><td><input type="submit"></td></tr>';		
		$form .= '</form></table>';
		echo $form;
	}
	
	include "../includes/footer.php";
?>