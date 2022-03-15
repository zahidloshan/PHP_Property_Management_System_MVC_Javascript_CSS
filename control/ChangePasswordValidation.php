<?php 


include('../control/db.php');

$sellerId=$sPassword="";
$sellerIdErr=$sPasswordErr="";

if($_SERVER['REQUEST_METHOD'] == "POST") {

	if (empty($_POST['sid'])) {

			$sellerIdErr="Please Enter Email";		
	}
	else {
			$sellerId=$_POST['sid'];
	}

	if (empty($_POST['spass'])) {

			$sPasswordErr="Please Enter Password";		
	}
	else {
			$sPassword=$_POST['spass'];
	}

	
	if ($sellerIdErr=="" && $sPasswordErr=="")
	{


		  $connection = new db();
				$conobj=$connection->OpenCon();

				$userQuery=$connection->CheckUser($conobj,"user",$sellerId,$sPassword);

				if ($userQuery->num_rows > 0) {

					 session_start();
                    $_SESSION['user'] = $_POST['sid'];
			        header('Location: ../view/ChangePasswordForm.php');
				   }
				 else {
				echo "<br>";
				echo "Password and Email is not correct";
				echo "<br>";
				}


	}
}


 ?>