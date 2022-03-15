
<!DOCTYPE html>
<html>
<head>
	<title>Delete Property</title>
	<script src="../js/JSDelete.js"></script>
	<link rel="stylesheet" type="text/css" href="../Css/MyStyle.css">
</head>
<body>
	<h1 class="imgcontainer">Delete Property</h1>
	<script>
		function deleteproperty() {

		  var pid = document.getElementById("pId").value;
		  if(pid == "") {
				document.getElementById("textdelete").innerHTML = "Please Enter Property Id";
				document.getElementById("textdelete").style.color = "red";
			}
			else
			{
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {

		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("textdelete").innerHTML = this.responseText;
		      document.getElementById("textdelete").style.color = "green";
		    }
			else
			{
				 document.getElementById("textdelete").innerHTML = this.status;
			}
		  };
		  xhttp.open("POST", "../control/DeletePropertyAjax.php", true);
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xhttp.send("pid="+pid);
		}
		}
	</script>

	<p id="mytext" class="imgcontainer"></p>

     <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validateForm()" class="deletepropertyform" method="POST">
	   <br>
     <!-- Property Id -->
        <label for="pId">Enter Property Id Which you want to delete : </label>
		<input type="text" name="pid" id="pId" >
		<div>
	    <button type="button" class="buttonpropertydelete"> <a href="../view/Profile.php">Back!</a> </button>
		<button  type="button" onclick="deleteproperty()" class="buttonpropertydelete">Delete</button>
	
	    <button type="button" class="buttonpropertydelete"> <a href="DeleteProperty.php">Refresh</a> </button>
		<p id="textdelete"></p>
	</div>
		
        <br>
    
        </form>
		
	  

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




