
<?php


include('../control/ChangePasswordValidation.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<script src="../js/JSChangePassword.js"></script>
	<link rel="stylesheet" type="text/css" href="../Css/MyStyle.css">
</head>
</head>
<body>

	<h1 class="imgcontainer">Change PassWord</h1>
	<p id="mytext" class="imgcontainer"></p>

	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validateForm()" method="POST">
	    <table>
		<tr>
     <!--  Id -->
       <td> <label for="sellerId">Enter Seller Email : </label></td>
		<td><input type="text" name="sid" id="sellerId" value="<?php echo $sellerId ?>"></td>
		<td><p><?php echo $sellerIdErr; ?></p></td>
		</tr>
        

        
       <!-- Current Password -->
	   <tr>
       <td> <label for="sPassword">Enter Your Current Password : </label></td>
		<td><input type="text" name="spass" id="sPassword" value="<?php echo $sPassword ?>"></td>
		<td><p><?php echo $sPasswordErr; ?></p></td>
		</tr>
		</table>
        <br>
        
         <input type="submit"  class= "newbutton" value="Continue" name= "button">
		 <button type="button"> <a href="Profile.php">Back!</a> </button>

            
        </form>

        

	    

</body>
</html>