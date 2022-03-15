<?php

include('../control/db.php');

$nsPassword=$csPassword="";
$nsPasswordErr=$csPasswordErr="";

if($_SERVER['REQUEST_METHOD'] == "POST") {

	if (empty($_POST['nspass']) || empty($_POST['cspass']) ) {

			$nsPasswordErr="Enter Password Properly";
			$csPasswordErr="Enter Password Properly";		
	}

	else {
			$nsPassword=$_POST['nspass'];
			$csPassword=$_POST['nspass'];
	}

	if($_POST['nspass'] != $_POST['cspass']) {
	$csPasswordErr = "Both password have to match";
    }
    else
    {
    	$nsPassword=$_POST['nspass'];
    }




	if ($nsPasswordErr==""&&$csPasswordErr=="")
	{


		session_start();
        $user=$_SESSION['user'];
		$connection = new db();
		$conobj=$connection->OpenCon();

		$userQuery=$connection->ChangePassword($conobj,$user,$nsPassword);

		echo "Password has been Changed ";

	}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password Form</title>
	<script src="../js/JSChangePasswordForm.js"></script>
	<link rel="stylesheet" type="text/css" href="../Css/MyStyle.css">
</head>
<body>

	<h1 class="imgcontainer">Change PassWord From </h1>
	<p id="mytext" class="imgcontainer"></p>

	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validateForm()" method="POST">
	<table>
	  <br>
     <!--  Id -->
	 <tr>
        <td><label for="nsPassword"> New Password : </label></td>
		<td><input type="text" name="nspass" id="nsPassword" value="<?php echo $nsPassword ?>"></td>
		<td><p><?php echo $nsPasswordErr; ?></p></td>
		</tr>
        

        
	   
       <!-- Current Password -->
	   <tr>
       <td> <label for="csPassword">Comfirm Password : </label></td>
		<td><input type="text" name="cspass" id="csPassword" value="<?php echo $csPassword ?>"></td>
		<td><p><?php echo $csPasswordErr; ?></p></td>
		</tr>
		</table>
        <br>
        
         <input type="submit" class= "newbutton" value="Change Password" name= "button">
		 <button type="button"> <a href="ChangePassword.php">Back!</a> </button>

            
        </form>

        <br>

	    <br>

	    
</body>
</html>