<?php
$withdrawam = $_POST['WAmount'];

if($withdrawam!="")
{
$withdrawAmount=""; 
$withdrawAmountErr=""; 


if($_SERVER['REQUEST_METHOD'] == "POST") {


	if (empty($_POST['WAmount'])) {

			$withdrawAmountErr="Please Enter withdraw Amount ";	
				
	}
	else {
			$withdrawAmount=$_POST['WAmount'];
		 }
    	

    if ($withdrawAmountErr=="") {
    	include('../control/db.php');
        $afterwithdraw=$cbalance=0;


    	          session_start();

	               $sellerid = $_SESSION['user'];
                   $connection = new db();
		           $conobj=$connection->OpenCon();

		           $userQuery=$connection->CurrentBalance($conobj,$sellerid);

		         if($userQuery->num_rows > 0) {

		         	$user =$userQuery->fetch_assoc();
		         	$afterwithdraw=$user['currentbalance']-$withdrawAmount;
		         	$cbalance=$user['currentbalance'];
		         	if($afterwithdraw<=0)
		         	{
		         		echo "Your Balance is not Enough";
		         	}
		         	else
		         	{
		         		$userQuery=$connection->DeleteCurrentBalance($conobj,$sellerid);

		         	    $userQuery=$connection->InsertCurrentBalance($conobj,$sellerid,$afterwithdraw);
		         	    $date=date("Y-m-d h:i:sa");

		         	    $userQuery=$connection->InsertWithdrawHistory($conobj,$sellerid,$cbalance,$afterwithdraw,$date);

		         	    echo "Balance Withdraw Completed";
		         	}
		         }

		         else
		         {
		         	echo "Balance Not Available";
		         }

    }
}

}

 ?>