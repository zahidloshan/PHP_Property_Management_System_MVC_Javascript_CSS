<?php

        include('../control/db.php');


        session_start();

        $sellerid = $_SESSION['user']; 


         $connection = new db();
         $conobj=$connection->OpenCon();

         $userQuery=$connection->CheckPropertyHis($conobj,$sellerid);

         if($userQuery->num_rows > 0) {
             while($user = $userQuery->fetch_assoc()) { 
                 echo "<fieldset>
                <legend><b>Property:</b></legend>";

             echo '<img src="uploads/'.$user['pid'].'.png" alt='.$user['pid'].' width="300" height="130">'."<br>";  

             echo "Propety Id : ".$user['pid']."<br>";
             echo "Propety Title : ".$user['propertyname']."<br>";
             echo "Property Price : ".$user['pprice']."<br>";
             echo "Property Quantity : ".$user['pquantity']."<br>";
             echo "</fieldset>";
            }
        }
         else
         {

             echo "History Not Available";

         }   
       

    ?>
<?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Back") {
                header('Location: ../view/Profile.php');
                
                }
    ?> 
    <!DOCTYPE html>
    <html>
    <head>
        <title>History </title>
    </head>
    <body>

        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <input type="submit" value="Back" name= "button">
            
        </form>
    
    </body>
    </html>    