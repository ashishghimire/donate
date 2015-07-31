<?php
	session_start();
	include "../connect.php";
	include "../includes/header.php";
	echo '<div class="content">';
	echo '<table>';
	echo '<form name="registration" method="post" action="registration.php">
	<tr><td>FIRST NAME:</td><td><input type="text" name="fname" value=""></td></tr>
	<tr><td>MIDDLE NAME:</td><td><input type="text" name="mname" value=""></td></tr>
	<tr><td>LAST NAME:</td><td><input type="text" name="lname" value=""></td></tr>
	<tr><td>GENDER:</td><td><input type="text" name="gender" value=""></td></tr>
	<tr><td>PHONE NO.:</td><td><input type="number" name="phone" value=""></td></tr>
	<tr><td>EMAIL-ID:</td><td><input type="email" name="email" value=""></td></tr>
	<tr><td>ADDRESS:</td><td><input type="text" name="address" value=""></td></tr>
	<tr><td>USERNAME:</td><td><input type="text" name="username" value=""></td></tr>
	<tr><td>PASSWORD:</td><td><input type="password" name="password" value=""></td></tr>
	<tr><td>RE-PASSWORD:</td><td><input type="password" name="repassword" value=""></td></tr>
	
	<tr><td></td><td><input style="width:200px; font-size:20px;" type="submit" name="submit" value="submit"></td></tr>
	</form>';
	echo '</table>';
	echo '</div>';
	include "../includes/footer.php";
?>