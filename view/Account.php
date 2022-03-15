<?php
  session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<script src="../js/JSAccount.js"></script>
	<link rel="stylesheet" type="text/css" href="../Css/MyStyle.css">
</head>
<body>

	<h1 class="imgcontainer">Account</h1>

	<button value="<?php echo $_SESSION["user"];?>" type="button" onclick="cureentbalance(this.value)" id="Currentbalance">Current Balance</button>
	<p id="text" class="imgcontainer"></p>

	<script>
	function cureentbalance(sellername) {
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {

		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("text").innerHTML = this.responseText;
		      document.getElementById("text").style.color = "green";
		    }
			else
			{
				 document.getElementById("text").innerHTML = this.status;
			}
		  };
		  xhttp.open("POST", "../control/CheckBalanceAjax.php", true);
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xhttp.send("sellername="+sellername);
		}

		function updatebalance(sellername) {
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {

		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("text1").innerHTML = this.responseText;
		      document.getElementById("text1").style.color = "green";
		    }
			else
			{
				 document.getElementById("text1").innerHTML = this.status;
			}
		  };
		  xhttp.open("POST", "../control/UpdateBalance.php", true);
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xhttp.send("sellername="+sellername);
		}

		function withdrawbalance() {
		  var WAmount = document.getElementById("WithrawAmount").value;
		  if(WAmount == "") {
				document.getElementById("text2").innerHTML = "Please Enter withdraw Amount";
				document.getElementById("text2").style.color = "red";
			}
			else
			{
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {

		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("text2").innerHTML = this.responseText;
		      document.getElementById("text2").style.color = "green";
		    }
			else
			{
				 document.getElementById("text2").innerHTML = this.status;
			}
		  };
		  xhttp.open("POST", "../control/WithdrawValidation.php", true);
		  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		  xhttp.send("WAmount="+WAmount);
		}
		}

		
	</script>
	

	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="accountform"  method="POST">
	<button value="<?php echo $_SESSION["user"];?>" type="button" onclick="updatebalance(this.value)" >Update Balance</button>
	
	
	<input type="submit" class= "newbutton" value="WithdrawHistory" name= "button">
	<p id="text1" class="imgcontainer"></p>


	</form>
	
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validateForm()" class="accountform" method="POST" >
        <br>
		<br>
		<input type="text" name="withdrawamount" id="WithrawAmount" placeholder="Enter Withdraw Amount">
		<button type="button" onclick="withdrawbalance()">Withdraw</button>
		<button type="button"> <a href="Profile.php">Back!</a> </button>
	    <p id="text2" class="imgcontainer"></p>
		<p id="mytext" class="imgcontainer"></p>
		
		
		</form>

        

         <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "WithdrawHistory") {
            	header('Location: ../view/WithdrawHistoryForm.php');
                
                }
        ?>

        

        
	


</body>
</html>