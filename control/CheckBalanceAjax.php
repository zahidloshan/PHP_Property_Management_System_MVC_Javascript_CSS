<?php 
$sellername = $_POST['sellername'];


if($sellername!="")
{
    
	          include('../control/db.php');

            	//session_start();

				$sellerid = $sellername;

            	$connection = new db();
		         $conobj=$connection->OpenCon();

		         $userQuery=$connection->CurrentBalance($conobj,$sellerid);

		         if($userQuery->num_rows > 0) {

		         	$user =$userQuery->fetch_assoc();
		         	 echo "Balance : ".$user['currentbalance'];

		         }

		         else
		         {

		         	echo "Balance Not Available";

		         }
}

?>