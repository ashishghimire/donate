<?php 
	include "../connect.php";
	if(isset($_REQUEST['submit'])!='')
	{
		if($_REQUEST['fname']=='' || $_REQUEST['lname']=='' || $_REQUEST['gender']=='' || $_REQUEST['phone']=='' || $_REQUEST['email']=='' || $_REQUEST['address']=='' || $_REQUEST['username']=='' || $_REQUEST['password']==''|| $_REQUEST['repassword']=='')
		{
			echo "please fill the empty field.";
		}
		else if($_REQUEST['password']!=$_REQUEST['repassword'])
		{
			echo "the passwords do not match";
		} 
		else
		{
			$jdate=date('Y-m-d');
			$sql="insert into user(fname, mname, lname, gender, phone, email, address, username, password, joineddate) values('".$_REQUEST['fname']."', '".$_REQUEST['mname']."', '".$_REQUEST['lname']."', '".$_REQUEST['gender']."', '".$_REQUEST['phone']."', '".$_REQUEST['email']."', '".$_REQUEST['address']."', '".$_REQUEST['username']."', '".$_REQUEST['password']."', '$jdate')";
			$res=mysql_query($sql);
			if($res)
			{
				echo "Record successfully inserted";
			}
			else
			{
				echo "There is some problem in inserting record";
			}

		}
	}

?>