<?php 
$dPropertyid = $_POST['dPropertyid'];
$makeDiscount = $_POST['makeDiscount'];
if($dPropertyid!="" && $makeDiscount!="")
{
if($_SERVER['REQUEST_METHOD'] == "POST") {


            	if (empty($_POST['dPropertyid']) || empty($_POST['makeDiscount'])) {

					echo "Please Enter Property Id and Discount Pirce ";

				}
				else if(!preg_match('/^[0-9]*$/', $_POST['dPropertyid'])|| !preg_match('/^[0-9]*$/', $_POST['makeDiscount']))
				{
					echo "Enter Numeric Value";
				}
				else {

					session_start();

					$sellerid = $_SESSION['user'];

                  include('../control/db.php');

				$connection = new db();
		         $conobj=$connection->OpenCon();

		         $userQuery=$connection->CheckProperty($conobj,$sellerid,$_POST['dPropertyid']);

		         if($userQuery->num_rows > 0) {

		         	$connection = new db();
		           $conobj=$connection->OpenCon();


		         	$userQuery=$connection->CheckPropertyList1($conobj,$_POST['dPropertyid']);
		         	$user =$userQuery->fetch_assoc();

		         	$propertyprice=$user['pprice'];

		         	if($propertyprice <=0)
		         	{
		         		echo "Not able to makeDiscount ";
		         	}
		         	else
		         	{

		         		$newprice=$propertyprice-$_POST['makeDiscount'];

		         		$userQuery=$connection->UpdatePrice($conobj,$_POST['dPropertyid'],$newprice);

		         		

		         		$connection = new db();
					         $conobj=$connection->OpenCon();

					         $userQuery=$connection->CheckPropertyList($conobj,$sellerid);

					         if($userQuery->num_rows > 0) {
								 while($user = $userQuery->fetch_assoc()) { 

								 	if($user['pid'] ==$_POST['dPropertyid'])
								 	{
                                        echo "<fieldset>


                                        <legend><b>Property:</b></legend>";
                        
                                     echo '<img src="../uploads/'.$user['pid'].'.jpg" alt='.$user['pid'].' width="300" height="130">'."<br>";  
                        
                                     echo "Property Id : ".$user['pid']."<br>";
                                     echo "Property Title : ".$user['propertyname']."<br>";
                                     echo "Property Owner : ".$user['powner']."<br>";
                                     echo "Property Location : ".$user['plocation']."<br>";
                                     echo "Property Price : ".$user['pprice']."<br>";
                                     echo "Property Quantity : ".$user['pquantity']."<br>";
                                     echo "</fieldset>";
								}

								}
							} 



		         	}



		         }

		         else {

		         	 echo "your are not able to makediscount in this Property";

		         }



			 }
			     

                

         }

  }       
?>