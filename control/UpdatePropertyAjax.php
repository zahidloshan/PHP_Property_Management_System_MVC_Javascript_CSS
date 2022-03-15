<?php 

$apropertyid = $_POST['pid'];
$apropertyquantity = $_POST['pquantity'];
$apropertyprice = $_POST['pprice']; 
if($apropertyid!="" && $apropertyquantity!="" && $apropertyprice!="")
{

    $pQuantity=$pPrice=$pId="";
    $pQuantityErr=$pPriceErr=$pIdErr="";
    session_start();
    include('../control/db.php');


if($_SERVER['REQUEST_METHOD'] == "POST") {

	if (empty($_POST['pquantity']) && !preg_match('/^[0-9]*$/', $pquantity)) {

			$pQuantityErr="Please Enter Quantity";		
	}
	else {
			$pQuantity=$_POST['pquantity'];
	}

	if (empty($_POST['pprice'])) {

			$pPriceErr="Please Enter Price";		
	}
	else {
			$pPrice=$_POST['pprice'];
	}

	if (empty($_POST['pid']) && !preg_match('/^[0-9]*$/', $pid)) {

			$pIdErr="Please Enter Property Id";		
	}
	else {
			$pId=$_POST['pid'];
	}

	if ($pQuantityErr=="" && $pPriceErr==""&&$pIdErr=="")
	{

		  
			$sellerid = $_SESSION['user'];



		$connection = new db();
		$conobj=$connection->OpenCon();

		$userQuery=$connection->CheckProperty($conobj,$sellerid,$pId);

		if($userQuery->num_rows > 0) {

			$userQuery=$connection->UpdateProperty($conobj,$pId,$pPrice,$pQuantity);

			echo "Update Succesfull";

            $sellerid = $_SESSION['user']; 


            $connection = new db();
            $conobj=$connection->OpenCon();
   
            $userQuery=$connection->CheckPropertyList($conobj,$sellerid);
   
            if($userQuery->num_rows > 0) {
                while($user = $userQuery->fetch_assoc()) { 
                    if($user['pid'] ==$_POST['pid'])
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

		else 
		{

			echo "You are not able Update this Property";

		}

	}
}
}

?>

