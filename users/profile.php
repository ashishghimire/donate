<?php
	session_start();
	include "../connect.php";
	include "../includes/header.php";
	echo '<div class="content">';
		
	if(!isset($_SESSION['user'])){
	
	echo "You are not logged in please "; echo'<a href= "../users/login.php">login</a>'; echo " or ";  echo'<a href= "../users/registration_form.php">register</a>.';
	
}
else
{
	
    $id=$_SESSION['user'];
    $result = mysql_query("SELECT * FROM user where id='$id'");
    while($row = mysql_fetch_array($result))
    {
    $fname=$row['fname'];
	$mname=$row['mname'];
    $lname=$row['lname'];
    $address=$row['address'];
    $phone=$row['phone'];
    $joineddate=$row['joineddate'];
    $gender=$row['gender'];
    }
    
	echo "Name: $fname $mname $lname"; echo'<br>';
	echo "Joined on: $joineddate"; echo'<br>';
	echo "Address: $address"; echo'<br>';
	echo "Phone no.: $phone";
	$result1 = mysql_query("SELECT name, uid FROM campaign where user_id='$id'");
	$n= mysql_num_rows($result1);
		
	echo'<br>';
	echo"Campaigns:";
	echo'<br>';
	
	while ($row1= mysql_fetch_array($result1, MYSQL_ASSOC))
		{
			$cname=$row1['name'];
			$cid=$row1['uid'];
			echo'<a href="../campaign/campaign_details.php?id='.$cid.'">'.$cname.'</a><br>';
		}		
	
	echo'</div>';
  }
?>