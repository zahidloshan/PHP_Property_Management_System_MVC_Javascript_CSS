<!DOCTYPE html>
<html>
<head>
	<title>Property List</title>
	<script src="../js/JSPropertylist.js"></script>
	<link rel="stylesheet" type="text/css" href="../Css/MyStyle.css">
</head>

<body>

	<h1 class="imgcontainer">Property List</h1>

	<p id="mytext" class="imgcontainer"></p>
	<script >
		function makediscount() {

		  var dPropertyid = document.getElementById("pPropertyid").value;
		  var makeDiscount = document.getElementById("makeDiscount").value;
		  if(dPropertyid == "" || makeDiscount=="") {
				document.getElementById("textmakediscount").innerHTML = "Please Enter Property Id and Discount Pirce";
				document.getElementById("textmakediscount").style.color = "red";
			}
			else
			{
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {

		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("textmakediscount").innerHTML = this.responseText;
		      document.getElementById("textmakediscount").style.color = "green";
		    }
			else
			{
				 document.getElementById("textmakediscount").innerHTML = this.status;
			}
		  };
		  xhttp.open("POST", "../control/MakeDiscount.php", true);
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xhttp.send("dPropertyid="+dPropertyid+"&makeDiscount="+makeDiscount);
		}
		}
	</script>



      

	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validateForm()" method="POST">
	<table>
	<tr>
	<td><label for="pPropertyid">Discount Property Id : </label></td>
	<td><input type="text" id="pPropertyid" name="ppropertyid" placeholder="Enter Discount Property Id" ></td>
	</tr>
	<tr>
	<td><label for="makeDiscount">Discount Amount : </label></td>
	<td><input type="text" id="makeDiscount" name="makediscount" placeholder="Enter Discount Price amount" ></td>
	</tr>
	</table>
	<div>
	<button type="button"> <a href="Profile.php" class="buttonpropertydelete">Back!</a> </button>
	
	<button type="button"> <a href="../view/PropertyList.php" class="buttonpropertydelete">Refresh</a> </button>
	</div>
	

	</form>
	<button  type="button" onclick="makediscount()" id= "makediscount">Make Discount</button>

	
	<p id="textmakediscount" class="imgcontainer"></p>

	
	

	

	<?php



	include('../control/db.php');

	    
        session_start();

	    $sellerid = $_SESSION['user']; 


	     $connection = new db();
         $conobj=$connection->OpenCon();

         $userQuery=$connection->CheckPropertyList($conobj,$sellerid);

         if($userQuery->num_rows > 0) {
			 while($user = $userQuery->fetch_assoc()) { 
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

		
    ?> 
	

	          

</body>
</html>