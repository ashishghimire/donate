<html>
	<head>
		<link href="../css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<div class="header_line"></div>
	<div class="header">
		<div class="header_holder">
			<div class="logo">Donate<span style="color:#6699ff;"> Aid</span></div>
			<?php 
			echo '<div class="navigation">';
			if (!isset($_SESSION['user'])) {
				echo '
					<div class="nav_butt">How it works</div>
					<a href="../users/registration_form.php"><div class="nav_butt">Sign Up</div></a> 
					<a href="../users/login.php"><div class="nav_butt">Login</div></a>';
			}
			else{
				echo '<a href="../campaign/logout.php">Hello user! Logout?</a>';
			}
			?>
			</div>
		</div>
	</div>