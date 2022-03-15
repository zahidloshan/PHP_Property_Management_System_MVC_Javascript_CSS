 <?php
    include('db.php');
$propertyName=$pId= $pOwner=$pLocation=$pPrice=$pQuantity=$v="";
$propertyNameErr=$pIdErr= $pOwnerErr=$pLocationErr=$pPriceErr=$pQuantityErr="";


if($_SERVER['REQUEST_METHOD'] == "POST") {


	if (empty($_POST['pname']) && !preg_match("/[A-Za-z0-9]+/", $pname )) {

			$propertyNameErr="Please Enter Property Name";		
	}
	else {
			$propertyName=$_POST['pname'];
		 }
    if (empty($_POST['pid']) && !preg_match('/^[0-9]*$/', $pid)) {

			$pIdErr="Please Enter Property Id";		
	}
	else {
			$pId=$_POST['pid'];
	}	

	if (empty($_POST['powner']) && !preg_match("/[A-Za-z]+/", $powner )) {

			$pOwnerErr="Please Enter Owner";		
	}
	else {
			$pOwner=$_POST['powner'];
	}

	if (empty($_POST['plocation']) && !preg_match("/[A-Za-z]+/", $plocation)) {

			$pLocationErr="Please Enter Location";		
	}
	else {
			$pLocation=$_POST['plocation'];
		 }
	
	if (empty($_POST['pprice']) && !preg_match('/^[0-9]*$/', $pprice)) {

			$pEditionErr="Please Enter Price";		
	}
	else {
			$pPrice=$_POST['pprice'];
		 }
	if (empty($_POST['pquantity']) && !preg_match('/^[0-9]*$/', $pquantity)) {

			$pQuantityErr="Please Enter Quantity";		
	}
	else {
			$pQuantity=$_POST['pquantity'];
		 }	

    if ($propertyNameErr==""&&$pIdErr=="" &&$pOwnerErr==""&&$pLocationErr==""&&$pPriceErr==""&&$pQuantityErr=="") {
       

		$connection = new db();
		$conobj=$connection->OpenCon();

		$userQuery=$connection->CheckPropertyId($conobj,"property",$pId);

		if ($userQuery->num_rows > 0) {

			echo "You have already a propery using this Id!!";
		   }
		 else {

			session_start();

			$userid = $_SESSION['user'];

			$InsertQuery=$connection->InsertProperty($conobj, $propertyName, $pId,$pOwner, $pLocation,$pPrice, $userid, $pQuantity);

			if(!empty($InsertQuery))
			{
				$target_dir="../uploads/";

					  $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
												  
					  $propertyId = $pId;

				if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_dir.$pId.".".$extension))
				{
				echo "file upload";
				echo "<br>";
				}
				else
				{
					echo "<br>";	
				echo "Sorry";
				}

			}

    }		  	 	 	 


}
	
}



  ?>