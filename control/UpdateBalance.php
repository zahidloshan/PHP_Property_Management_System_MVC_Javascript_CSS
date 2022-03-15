<?php
$sellername = $_POST['sellername'];

if($sellername!="")
{
            if($_SERVER['REQUEST_METHOD'] == "POST") {




            	 include('../control/db.php');

			    
		        session_start();

			    $sellerid = $_SESSION['user']; 
			    $newbalance=0;

			    $updateBalance=0;


			     $connection = new db();
		         $conobj=$connection->OpenCon();

		         $userQuery=$connection->CheckPropertyHistory($conobj,$sellerid);

		         if($userQuery->num_rows > 0) {
					 while($user = $userQuery->fetch_assoc()) {
					 	$newbalance=$newbalance+$user['pprice'];
					 }
                 $userQuery=$connection->DeleteBalance($conobj,$sellerid);




                 $userQuery=$connection->CurrentBalance($conobj,$sellerid);

		         if($userQuery->num_rows > 0) {

		         	$user =$userQuery->fetch_assoc();
		         	$updateBalance=$newbalance+$user['currentbalance'];

		         	$userQuery=$connection->DeleteCurrentBalance($conobj,$sellerid);

		         	$userQuery=$connection->InsertCurrentBalance($conobj,$sellerid,$updateBalance);

		         	echo "Balance Updated";

		         }

		     }

		     else
		     {
		     	echo "You have not able to update the Balance ";
		     }


			   
                
            } 
            } 
            
  ?>