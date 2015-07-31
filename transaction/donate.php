<?php
	session_start();
	include "../connect.php";
	
	$uid = mysql_real_escape_string($_GET['id']);
	
	$campaign_details = mysql_fetch_assoc(mysql_query("SELECT name FROM campaign WHERE uid='$uid'"));
	$name = $campaign_details['name'];
	
	echo '
	<form action="paypal.php?sandbox=1" method="post">
	    <input type="hidden" name="action" value="process" />
		<input type="hidden" name="cmd" value="_cart" /> 
		<input type="hidden" name="currency_code" value="USD" />
		<input type="hidden" name="campaign_id" value="'.$uid.'" />

		<input type="hidden" name="invoice" value="'.date("His").rand(1234, 9632).'" />
		<table>	
		<tr>
			<td><label>Donate Amount</label></td>
			<td><input type="text" name="amount" placeholder="Donate Amount" /></td>
		</tr>
		<tr>
			<td><label>Donor First Name</label></td>
			<td><input type="text" name="donor_fname" placeholder="First Name" /></td>
		</tr>
		<tr>
			<td><label>Donor Last Name</label></td>
			<td><input type="text" name="donor_lname" placeholder="Last Name" /></td>
		</tr>
		<tr>
			<td><label>Donor Address</label></td>
			<td><input type="text" name="donor_address" placeholder="Address" /></td>
		</tr>
		<tr>
			<td><label>Donor City</label></td>
			<td><input type="text" name="donor_city" placeholder="City" /></td>
		</tr>
		<tr>
			<td><label>Donor State</label></td>
			<td><input type="text" name="donor_state" placeholder="State" /></td>
		</tr>    
		<tr>
			<td><label>Donor Zip</label></td>
			<td><input type="text" name="donor_zip" placeholder="Zip code" /></td>
		</tr>
		<tr>
			<td><label>Donor Country</label></td>
			<td><input type="text" name="donor_country" placeholder="Country" /></td>
		</tr> 
		<tr>
			<td><label>Donor Email</label></td>
			<td><input type="text" name="donor_email" placeholder="Email"/></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Submit" /></td>
		</tr>
		</table>
	</form>';
?>