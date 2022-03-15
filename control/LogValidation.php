<?php
include('db.php');



if(isset($_POST['submit'])) {




     if (empty($_POST['username']) || empty($_POST['password'])) {

			echo "Please Enter username or password";

		}
		else {

			   $username=$_POST['username'];
               $password=$_POST['password'];
			    $connection = new db();
				$conobj=$connection->OpenCon();

				$userQuery=$connection->CheckUser($conobj,"user",$username,$password);

				if ($userQuery->num_rows > 0) {

					session_start();
				 
				    $_SESSION['user'] = $_POST['username'];
			        header('Location: ../view/Profile.php');
				   }
				 else {
			    echo "<br>";
				echo "Username or Password is invalid";
				echo "<br>";
				}
				$connection->CloseCon($conobj);



		}
	}


?>