
<!DOCTYPE html>
<html>
<head>
	<title>Update Property</title>
	<script src="../js/JSUpdate.js"></script>
	<link rel="stylesheet" type="text/css" href="../Css/MyStyle.css">
</head>
<body>
	<h1 class="imgcontainer">Update Property</h1>
	<p id="mytext" class="imgcontainer"></p>

	<script>
		function updateproperty() {

		  var pid = document.getElementById("pId").value;
		  var pquantity = document.getElementById("pQuantity").value;
		  var pprice = document.getElementById("pPrice").value;
		  if(pid == "" || pquantity=="" || pprice=="") {
				document.getElementById("textupdate").innerHTML = "Please Enter Property Id,Quantity and Price";
				document.getElementById("textupdate").style.color = "red";
			}
			else
			{
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {

		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("textupdate").innerHTML = this.responseText;
		      document.getElementById("textupdate").style.color = "green";
		    }
			else
			{
				 document.getElementById("textupdate").innerHTML = this.status;
			}
		  };
		  xhttp.open("POST", "../control/UpdatePropertyAjax.php", true);
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xhttp.send("pid="+pid+"&pquantity="+pquantity+"&pprice="+pprice);
		}
		}
	</script>

	 <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validateForm()"  method="POST">
	 <table>
	    
     <!-- Property Id -->
	 <tr>
       <td> <label for="pId">Enter Property Id : </label></td>
		<td><input type="text" name="pid" id="pId" ></td>
	  
		</tr>
        

        
	   
     <!-- Property Quantity -->
	 <tr>
      <td>  <label for="pQuantity">Enter Update Quantity : </label></td>
		<td><input type="text" name="pquantity" id="pQuantity"></td>
		
		</tr>
        <br>
		<tr>
       <td> <label for="pPrice">Enter Update Price: </label></td>
		<td><input type="text" name="pprice" id="pPrice" ></td>
		
		</tr>
		</table>
        <br>
         <div>
		<button  type="button" onclick="updateproperty()" class="buttonpropertydelete">Update</button>
	    
	    <button type="button" class="buttonpropertydelete"> <a href="UpdateProperty.php">Refresh</a> </button>

	    <button type="button" class="buttonpropertydelete"> <a href="Profile.php">Back!</a> </button>
		
	</div>

        </form>
		<p id="textupdate" class="imgcontainer"></p>

		


</body>
</html>

<?php

	   

	    
        session_start();
		include('../control/db.php');

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

