<?php


include('../control/RegValidation.php');

?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<script src="../js/JSRegistration.js"></script>
	<link rel="stylesheet" type="text/css" href="../Css/MyStyle.css">
</head>
<body>

<h1 class="imgcontainer">Registration</h1>
	<p id="mytext" class="imgcontainer"></p>
    <div>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="regform" onsubmit="return validateForm()" method="POST">


	<fieldset>
	
    <legend class="imgcontainer">Basic Information </legend>
	<table>
    <tr>
	<td><label for="sellerName">Seller Name : </label></td>
	<td><input type="text" id="sellerName" name="sname" value="<?php echo $sellerName ?>"> </td>
	<td><p><?php echo $sellerNameErr; ?></p><td>
	</tr>
	
    

     

	<!-- Phone  -->
	<tr>
		<td><label for="sPhone">Phone Number : </label></td>
		<td><input type="text" name="sphone" id="sPhone" value="<?php echo $sPhone ?>"></td>
		<td><p><?php echo $sPhoneErr; ?></p> </td>
    </tr>
	
	<tr>
       <td>
		<!-- Gender  -->
		<label>Gender : </label>
		<input type="Radio" name="gender" value="Male" id="male">
		<label for="male">Male</label>
		<input type="Radio" name="gender" value="Female" id="female">
		<label for="female">Female</label>
		<p><?php echo $GenderErr; ?></p>
		</td>
		</tr>
       
    

	<!-- tradelicense -->
	<tr>
       <td>  <label for="tradelicense">Trade Number : </label> </td>
	   <td>	<input type="text" name="tradelicense" id="tradelicense" value="<?php echo $tradelicense ?>"> </td>
		<td><p><?php echo $tradelicenseErr; ?></p>	</td>	
     </tr>

	

	<!-- Address  -->
	<tr>
       <td> <label for="streetAddress">Street Address : </label> </td>
		<td><input type="text" name="streetaddress" id="streetAddress" value="<?php echo $streetAddress ?>"> </td>
		<td><p><?php echo $streetAddressErr; ?></p> </td>
		</tr>


	<!-- Area -->
	<tr>
       <td> <label for="sArea">Area : </label> </td>
		<td><input type="text" name="sarea" id="sArea" value="<?php echo $sArea ?>"> </td>
		<td><p><?php echo $sAreaErr; ?></p>	</td>
     </tr>
	<br>

	<!-- City -->
	<tr>
       <td> <label for="sCity">City : </label> </td>
		<td><input type="text" name="scity" id="sCity" value="<?php echo $sCity ?>"> </td>
		<td><p><?php echo $sCityErr; ?></p> </td>
		</tr>	

	<br>

	<!-- Postal Zip code -->
	<tr>
       <td> <label for="sZipCode">Zip Code : </label></td>
		<td><input type="text" name="szipcode" id="sZipCode" value="<?php echo $sZipCode ?>"> </td>
		<td><p><?php echo $sZipCodeErr; ?></p></td>
		</tr>	
		</table>

	</fieldset>

     
	<fieldset>
		
	   <legend class="imgcontainer">User Information </legend>
	   <table>

        <!-- Email  -->
		<tr>
		<td><label for="Email"> Enter the use Validate Email  : </label></td>
		<td><input type="email" name="email" id="Email" value="<?php echo $Email ?>"></td>
		<td><p><?php echo $EmailErr; ?></p></td>
		</td>
		</tr>
	    
        <!-- Password  -->
		<tr>
		<td><label for="password">Enter the validate Password : </label></td>
		<td><input type="password" name="pass" id="password" value="<?php echo $password ?>"></td>
		<td><p><?php echo $passwordErr; ?></p></td>
		</tr>
		
        <!-- Reenter Password  -->
		<tr>
		<td><label for="rpassword">Confirm Password : </label></td>
		<td><input type="password" name="rpass" id="rpassword" value="<?php echo $rPassword ?>"></td>
		<td><p><?php echo $rPsswordErr; ?></p></td>
		</tr>
		</table>
        
    </fieldset>
    <div>
    <button type="button"> <a href="Login.php">Back!</a> </button>
	<input type="submit"  name="submit"  class="newbutton">	
    </div>
    </form>
</div>

</body>
</html>