<?php

include('db.php');

	$sellerName=$sPhone= $Gender=$Email=$password=$rPassword=$streetAddress=$sArea=$sCity=$sZipCode=$tradelicense=$trade="";
	$sellerNameErr=$sPhoneErr= $GenderErr=$EmailErr=$passwordErr=$rPsswordErr=$streetAddressErr=$sAreaErr=$sCityErr=$sZipCodeErr=$notavailable = $v= $tradelicenseErr= "";
	$errors = array();
	

	if($_SERVER['REQUEST_METHOD'] == "POST") {


		if (empty($_POST['sname']) && !preg_match("/[a-zA-Z]/", $sname)) {

			$sellerNameErr="Please Enter Name";
			
		}
		else {
			$sellerName=$_POST['sname'];
		}

		if (empty($_POST['tradelicense']) && !preg_match('/^[0-9]*$/', $tradelicense)) {

			$tradelicenseErr="Enter tradelicense properly";
			
		}
		else {
			$tradelicense=$_POST['tradelicense'];
		}

		if (empty($_POST['sphone'])) {

			$sPhoneErr="Please Enter Phone Number";
			
		}
		else {
			$sPhone=$_POST['sphone'];
		}


		if (empty($_POST['email']) && !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)) {

			$EmailErr="Please Enter Email";
			
		}
		else {
			$Email=$_POST['email'];
		}


		if(empty($_POST['gender']) ) {
				$GenderErr = "Please Select Gender";
			}
		else {
					$Gender = $_POST['gender'];
			}

		if (empty($_POST['pass'])) {

			$passwordErr="Please Enter Password";
			
		}
		else {
			$password=$_POST['pass'];
		}

		if (empty($_POST['rpass'])) {

			$rPasswordErr="Please Enter Password";
			
		}
		else {
			$rPassword=$_POST['rpass'];
		}


		if (empty($_POST['streetaddress'])) {

			$streetAddressErr="Please Enter address";
			
		}
		else {
			$streetAddress=$_POST['streetaddress'];
		}


		if (empty($_POST['sarea'])  && !preg_match("/^[a-zA-Z-' ]*$/",$sarea)) {

			$sAreaErr="Please Enter area";
			
		}
		else {
			$sArea=$_POST['sarea'];
		}


		if (empty($_POST['scity'])  && !preg_match("/^[a-zA-Z-' ]*$/",$scity)) {

			$sCityErr="Please Enter ciry";
			
		}
		else {
			$sCity=$_POST['scity'];
		}

		if (empty($_POST['szipcode']) && !preg_match('/^[0-9]*$/', $szipcode)) {

			$sZipCodeErr="Please Enter zipcode";
			
		}
		else {
			$sZipCode=$_POST['szipcode'];
		}



		if ($sellerNameErr=="" &&$sPhoneErr=="" && $GenderErr=="" && $passwordErr== "" &&$rPsswordErr=="" && $EmailErr== "" && $streetAddressErr== "" && $sAreaErr=="" && $sCityErr=="" && $sZipCodeErr=="") {



			$connection = new db();
				$conobj=$connection->OpenCon();

				$userQuery=$connection->CheckUser1($conobj,"user",$Email);

				if ($userQuery->num_rows > 0) {

					echo "You have already an Account!!";
				   }
				 else {


				$userQuery=$connection->CheckTrade($conobj,"registration",$tradelicense);

				if ($userQuery->num_rows > 0) {

					echo "You have already an Account using this tradelicense";
				   }
				   else
				   {
				   	$InsertQuery=$connection->InsertUser($conobj, $sellerName, $Email,$Gender, $sPhone, $streetAddress,$sArea, $sCity,$sZipCode,$tradelicense);
			        if(!empty($InsertQuery))
			        {
			        $connection = new db();
		            $conobj=$connection->OpenCon();


		    
			        $InsertQuery=$connection->InsertUser1($conobj,$Email,$password);
			        $connection->CloseCon($conobj);
			        header('Location: ../view/login.php');
				   }

				 }
				       }


				   }
			     
				}

?>