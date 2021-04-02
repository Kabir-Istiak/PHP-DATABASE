<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
    </head>
    <body>
        <?php

            $username = $password ="";
            $usernameerr = $passworderr ="";

            if($_SERVER['REQUEST_METHOD'] == "POST") {

                if(empty($_POST['uname'])) {                    
                    $usernameerr = "Please Fill up the Username!";
                }

                else if(empty($_POST['pass'])) {                    
                    $passworderr = "Please Fill up the password!";
                }

                else {
                    $username = $_POST['uname'];
                    $password = $_POST['pass'];

                   
                   
                                                              
                
                
                                       
       
                   
                }
            }
        ?>
        
        <h1>Login Form</h1>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">


            <fieldset>
                <legend><b>Login</b></legend>
            
                <label for="username">Username:</label>
                <input type="text" name="uname" id="username">
                <?php echo $usernameerr; ?>

                <br>

                <label for="parmanent_address">Password:</label>
                <input type="password" name="pass" id="password">
                <?php echo $passworderr; ?>
                
                </fieldset>


            <input type="submit" value="Login"> 


             <?php  
    $hostname = "localhost";
    $userName = "task";
    $password = "123";
    $dbname = "wtj";

    // Mysqli Object-Oriented
    $conn1 = new mysqli($hostname, $userName, $password, $dbname);
    if($conn1->connect_errno) {
        echo "<br>";
        echo "1. Database Connection Failed!...";
        echo "<br>";
        echo $conn1->connect_error;
    }
    else {
        echo "<br>";
        echo "1. Database Connection Successful!";
        echo "<br>";

        

        $stmt = $conn1->prepare("select ID, firstName, lastName, email, userName, password from user where userName = ? AND password = ?");
        $stmt->bind_param("ss", $p1, $p2);
        $p1=$username;
        $p2 = $password;
        
        $stmt->execute();
        $res2 = $stmt->get_result();
        $user = $res2->fetch_assoc();

        echo "Login Successful";

        echo "<br>";
        echo "User Details: ";
        echo "<br>";
        echo "id: ". $user['ID'];
                    echo "<br>";
                    echo "username: ". $user['userName'];
                    echo "<br>";
                    
                    
                    echo "firstName: ". $user['firstName'];
                    echo "<br>";                    
                    echo "lastName: ". $user['lastName'];
                    echo "<br>";                    
                    echo "email: ". $user['email'];
                    echo "<br>";
                    echo "<br>";


       


        
    }
    $conn1->close();

    echo "<br>";






            ?>



        </form>
        
    </body>
</html>