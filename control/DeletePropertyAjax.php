<?php 

$apropertyid = $_POST['pid'];

if($apropertyid!="")
{
	
    $pId="";
    $pIdErr="";
    session_start();
    include('../control/db.php');
    
    if($_SERVER['REQUEST_METHOD'] == "POST") {
    
        if (empty($_POST['pid']) && !preg_match('/^[0-9]*$/', $pid)) {
    
                $pIdErr="Please Enter Property Id";		
        }
        else {
                $pId=$_POST['pid'];
        }
    
        if ($pIdErr=="")
        {
    
                 $sellerid = $_SESSION['user'];
    
    
    
            $connection = new db();
            $conobj=$connection->OpenCon();
    
            $userQuery=$connection->CheckProperty($conobj,$sellerid,$pId);
    
            if($userQuery->num_rows > 0) {
    
                $userQuery=$connection->DeleteProperty($conobj,$pId);
    
                echo "Delete Completed";
    
            }
            else
            {
    
                echo "You are not able to  Delete this Property";
    
            }
    
        }
    }
}

?>