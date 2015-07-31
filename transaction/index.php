<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple PayPal Integration code using PHP by Asif18.com - Ready to use script</title>
<style>
.as_wrapper{
	margin:0 auto;
	width:500px;
	font-family:Arial;
	color:#333;
	font-size:14px;
}
.as_country_container{
	padding:20px;
	border:2px dashed #17A3F7;
	margin-bottom:10px;
}
</style>
</head>

<body>
<div class="as_wrapper">
	<h1>Simple paypal integration using PHP - Ready to use script</h1>
    <form action="paypal.php?sandbox=1" method="post"> <?php // remove sandbox=1 for live transactions ?>
    <input type="hidden" name="action" value="process" />
    <input type="hidden" name="cmd" value="_cart" /> <?php // use _cart for cart checkout ?>
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="invoice" value="<?php echo date("His").rand(1234, 9632); ?>" />
    <table>
    <tr>
        <td><label>Product ID</label></td>
        <td><input type="text" name="product_id" value="<?php echo rand(1111, 99999); ?>" /></td>
    </tr>
    <tr>
        <td><label>ProductName</label></td>
        <td><input type="text" name="product_name" value="Crocodile Shoes" /></td>
    </tr>
    <tr>
        <td><label>Product Quantity</label></td>
        <td><input type="text" name="product_quantity" value="<?php echo rand(1, 4); ?>" /></td>
    </tr>
    <tr>
        <td><label>Product Amount</label></td>
        <td><input type="text" name="product_amount" value="40.00" /></td>
    </tr>
    <tr>
        <td><label>Payer First Name</label></td>
        <td><input type="text" name="payer_fname" value="Mohamed" /></td>
    </tr>
    <tr>
        <td><label>Payer Last Name</label></td>
        <td><input type="text" name="payer_lname" value="Asif" /></td>
    </tr>
    <tr>
        <td><label>Payer Address</label></td>
        <td><input type="text" name="payer_address" value="Address of me" /></td>
    </tr>
    <tr>
        <td><label>Payer City</label></td>
        <td><input type="text" name="payer_city" value="City of me" /></td>
    </tr>
    <tr>
        <td><label>Payer State</label></td>
        <td><input type="text" name="payer_state" value="State of me" /></td>
    </tr>    
    <tr>
        <td><label>Payer Zip</label></td>
        <td><input type="text" name="payer_zip" value="123456" /></td>
    </tr>
    <tr>
        <td><label>Payer Country</label></td>
        <td><input type="text" name="payer_country" value="US" /></td>
    </tr> 
    <tr>
        <td><label>Payer Email</label></td>
        <td><input type="text" name="payer_email" value="asif18@asif18.com" /></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="submit" value="Submit" /></td>
    </tr>
    </table>
    </form>
</table>
</div>
</body>
</html>s