<?php

        include('../control/db.php');


        session_start();

        $sellerid = $_SESSION['user']; 


         $connection = new db();
         $conobj=$connection->OpenCon();

         $userQuery=$connection->CheckWithdrawHistory($conobj,$sellerid);

         if($userQuery->num_rows > 0) {
             while($user = $userQuery->fetch_assoc()) { 
                 echo "<fieldset>
                <legend><b>Withdraw History:</b></legend>";

              echo "Current Balance : ".$user['currentbalance']."<br>";
             echo "After Withdraw Balance : ".$user['afterwithdrawbal']."<br>";
             echo "Withdraw Time : ".$user['withdrawtime']."<br>";
             echo "</fieldset>";
            }
        } 
       

    ?>
   <?php
            if($_SERVER['REQUEST_METHOD'] == "POST" && $_REQUEST['button'] == "Back") {
                header('Location: Account.php');
                
                }
    ?> 
    <!DOCTYPE html>
    <html>
    <head>
        <title>With Draw History </title>
    </head>
    <body>

        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <input type="submit" value="Back" name= "button">
            
        </form>
    
    </body>
    </html>