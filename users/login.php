<?php
session_start();
include "../connect.php";
include "../includes/header.php";

if (isset($_REQUEST['Submit'])) 
{

    if($_REQUEST['user_id']=="" || $_REQUEST['password']=="")
    {
    echo " Field must be filled";
    }
    else
    {
		$username = $_POST['user_id'];
		$passwd = $_POST['password'];
		$user_detail = mysql_fetch_assoc(mysql_query("SELECT id FROM user WHERE username='$username' AND password='$passwd'"));
		$user_id = $user_detail['id'];
		$_SESSION['user'] = $user_id;
		header('location:../users/profile.php');
	}
}  
echo '<div class="content">';
if(!isset($_SESSION['user'])){
	echo '<table>';
		echo '<form name="form_login" method="post" action="login.php" role="form">
		<tr><td></td><td style="text-align:left;"><h2>Please Sign In</h2></td></tr>
		<tr><td>Username</td><td><input name="user_id" type="text" id="user_id" placeholder="User Name"></td></tr>
		<tr><td>Password</td><td><input type="password" name="password" id="password" placeholder="Password"></td></tr>
		<tr><td> </td><td><input style="width:200px;" type="submit" name="Submit" value="Login"></td></tr>
		</form>
	</table>';
}
else{
	echo 'You are already logged in';
}

echo '</div>';
include "../includes/footer.php";
?>