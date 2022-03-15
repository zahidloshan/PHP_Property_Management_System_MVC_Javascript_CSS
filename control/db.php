<?php
class db{
 
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "propertydb";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
 
 return $conn;
 }
 function CheckUser($conn,$table,$username,$password)
 {
$result = $conn->query("SELECT * FROM ". $table." WHERE username='". $username."' AND password='". $password."'");
 return $result;
 }

 function CheckUser1($conn,$table,$username)
 {
$result = $conn->query("SELECT * FROM `user` WHERE username='".$username."';");
 return $result;
 }

 function CheckPropertyList($conn,$username)
 {
       $result = $conn->query("SELECT `propertyname`, `pid`, `powner`, `plocation`, `pprice`, `email`, `pquantity` FROM `property` WHERE email='".$username."';");
        
        return $result;

 

 }

  function CheckPropertyList1($conn,$propertyid)
 {
     

        $stmt = $conn->prepare("SELECT `propertyname`, `pid`, `powner`, `plocation`, `pprice`, `email`, `pquantity` FROM `property` WHERE pid=?;");
        $stmt->bind_param("s", $p1);
        $p1 = $propertyid;
        $stmt->execute();
        $res2 = $stmt->get_result();
        
        return $res2;

 }

 function CheckProperty($conn,$username,$propertyid)
 {
       $result = $conn->query("SELECT `propertyname`, `pid`, `powner`, `plocation`, `pprice`, `email`, `pquantity` FROM `property` WHERE email='".$username."' and pid='".$propertyid."';");
        
        return $result;

 }


 function InsertUser1($conn,$Email,$password)
 {
    //echo $name;
    $result= $conn->query("INSERT INTO `user`(`username`, `password`) VALUES ('$Email','$password')");
    
    if ($result === TRUE) 
    {
        echo "New record created successfully";
    } 
      else {
        echo $conn->error;
      }
      return $result;
 }

 function InsertUser($conn, $sellerName, $Email,$Gender, $sPhone, $streetAddress,$sArea, $sCity,$sZipCode,$tradelicense)
 {
   // echo $name;
    $result= $conn->query("INSERT INTO `registration`(`sellername`, `email`, `gender`, `phone`, `streetaddress`, `area`, `city`, `zipcode`, `tradelicense`) VALUES ('$sellerName','$Email','$Gender', '$sPhone', '$streetAddress','$sArea', '$sCity','$sZipCode','$tradelicense');");
    
    if ($result === TRUE) 
    {
        echo "New record created successfully";
    } 
      else {
        echo $conn->error;
      }
      return $result;
 }

 function CheckTrade($conn,$table,$tradelicense)
{
$result = $conn->query("SELECT * FROM `".$table."` WHERE tradelicense='".$tradelicense."';");
return $result;
}

function CheckProfile($conn,$username)
{
$stmt = $conn->prepare("SELECT `sellername`, `email`, `gender`, `phone`, `streetaddress`, `area`, `city`, `zipcode`, `tradelicense` FROM `registration` WHERE email=?;");
$stmt->bind_param("s", $p1);
$p1 = $username;
$stmt->execute();
$res2 = $stmt->get_result();

return $res2;



}

function CheckPropertyId($conn,$table,$username)
{
$result = $conn->query("SELECT * FROM `".$table."` WHERE pid='".$username."';");
return $result;
}

function InsertProperty($conn, $propertyname, $pid,$powner, $plocation,$pprice, $email, $pquantity)
{
$result= $conn->query("INSERT INTO `property`(`propertyname`, `pid`, `powner`, `plocation`, `pprice`, `email`, `pquantity`) 
VALUES ('$propertyname','$pid','$powner','$plocation','$pprice','$email','$pquantity');");
if ($result === TRUE)
{
echo "New Property Added successfully";
}
else {
echo $conn->error;
}
return $result;
}

function UpdatePrice($conn,$propertyid,$propertyprice)
 {
       $result = $conn->query("UPDATE `property` SET `pprice`='".$propertyprice."' WHERE pid='".$propertyid."';");
        
        return $result;

 }

 function UpdateProperty($conn,$propeprtyid,$propertyprice,$propertyquantity)
 {
       $result = $conn->query("UPDATE `property` SET `pprice`='".$propertyprice."',`pquantity`='".$propertyquantity."' WHERE pid='".$propeprtyid."';");
        
        return $result;

 }

 function DeleteProperty($conn,$propertyid)
 {
       $result = $conn->query("DELETE FROM `property` WHERE pid='".$propertyid."';");
        
        return $result;

 }


function CheckPropertyHistory($conn,$username)
 {
   $result = $conn->query("SELECT * FROM `propertyhistory` WHERE sellerid='".$username."';");
 return $result;
 }

 function DeleteBalance($conn,$sellerid)
 {
       $result = $conn->query("DELETE FROM `propertyhistory` WHERE sellerid='".$sellerid."';");
        
        return $result;

 }

 function CurrentBalance($conn,$sellerid)
 {
       $result = $conn->query("SELECT `sellerid`, `currentbalance` FROM `accountbalance` WHERE sellerid='".$sellerid."';");
        
        return $result;

 }

 function DeleteCurrentBalance($conn,$sellerid)
 {
       $result = $conn->query("DELETE FROM `accountbalance` WHERE sellerid='".$sellerid."';");
        
        return $result;

 }

 function InsertCurrentBalance($conn,$username,$updatebanlace)
 {
       $result = $conn->query("INSERT INTO `accountbalance` (`sellerid`, `currentbalance`) VALUES ('".$username."', '".$updatebanlace."');");
        
        return $result;

 }

 function InsertWithdrawHistory($conn,$username,$currentbanlace,$afterwithdrawbal,$withdrawtime)
 {
       $result = $conn->query("INSERT INTO `withdrawhistory`(`sellerid`, `currentbalance`, `afterwithdrawbal`, `withdrawtime`) VALUES ('".$username."','".$currentbanlace."','".$afterwithdrawbal."','".$withdrawtime."');");
        
        return $result;

 }

 function CheckWithdrawHistory($conn,$username)
 {
       $result = $conn->query("SELECT `sellerid`, `currentbalance`, `afterwithdrawbal`, `withdrawtime` FROM `withdrawhistory` WHERE sellerid='".$username."';");
        
        return $result;

 }

 function ChangePassword($conn,$sellerid,$nspassword)
 {
       $result = $conn->query("UPDATE `user` SET `password`='".$nspassword."' WHERE username='".$sellerid."';");
        
        return $result;

 }


 function CheckPropertyHis($conn,$sellerid)
 {
       $result = $conn->query("SELECT * FROM `propertyhistory` WHERE sellerid='".$sellerid."';");
        
        return $result;

 }


 function ShowAll($conn,$table)
 {
$result = $conn->query("SELECT * FROM  $table");
 return $result;
 }


function CloseCon($conn)
 {
 $conn -> close();
 }
}
?>