<?php


include('../control/PropertyAddValidation.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Property Add</title>
	<script src="../js/JSProperty.js"></script>
	<link rel="stylesheet" type="text/css" href="../Css/MyStyle.css">
</head>
<body>

	<h1 class="imgcontainer">Add Property</h1>
	<p id="mytext"></p>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validateForm()" method="POST" class="addPropertyform" enctype="multipart/form-data">

	<fieldset>
    <legend class="imgcontainer">Property Information </legend>
	<table>
	
     <tr>
	<td><label for="propertyName">Property Name : </label></td>
	<td><input type="text" id="propertyName" name="pname" value="<?php echo $propertyName ?>"></td>
	<td><p><?php echo $propertyNameErr; ?></p></td>
    </tr>

	
     
     <!-- propery Id -->
	 <tr>
       <td> <label for="pId">Property Id : </label></td>
		<td><input type="text" name="pid" id="pId" value="<?php echo $pId ?>"></td>
		<td><p><?php echo $pIdErr; ?></p></td>	
    </tr>
	

     

	<!-- Location  -->
	<tr>
		<td><label for="pLocation">Location : </label></td>
		<td><input type="text" name="plocation" id="pLocation" value="<?php echo $pLocation ?>"></td>
		<td><p><?php echo $pLocationErr; ?></p></td>
		</tr>
	

	

     

	<!-- Owner  -->
	<tr>
		<td><label for="pOwner">Owner Name : </label></td>
		<td><input type="text" name="powner" id="pOwner" value="<?php echo $pOwner ?>"></td>
		<td><p><?php echo $pOwnerErr; ?></p></td>
    </tr>
	

	<!-- Property Price -->
	<tr>
        <td><label for="pPrice">Property Price : </label></td>
		<td><input type="text" name="pprice" id="pPrice" value="<?php echo $pPrice ?>"></td>
		<td><p><?php echo $pPriceErr; ?></p></td>	

	</tr>	

	

	<!-- Property Quantity -->
	<tr>
       <td> <label for="pQuantity">Property Quantity : </label></td>
		<td><input type="text" name="pquantity" id="pQuantity" value="<?php echo $pQuantity ?>"></td>
		<td><p><?php echo $pQuantityErr; ?></p></td>
		</tr>
	<!-- Property Picture -->
	<tr>
        <td><label for="pPicture">Property Picture : </label></td>
		<td><input type="file" name="file" id="pPicture" value="<?php echo $pPicture ?>"></td>
		</tr>


     </table>
	</fieldset>

	
	<div>
	<button type="button"> <a href="Profile.php">Back!</a> </button>
	<input type="submit" name="submit" class="newbutton" >
	
</div>
    </form>

</body>
</html>