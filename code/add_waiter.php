<html>
    <head>
        <title>Add waiter</title>
    </head>
    <body>

        <?php

            session_start();

                if(!isset($_SESSION['name'])||$_SESSION['num']==2){

                    $msg="Please <a href= 'http://localhost/proje3/login.php'>log in</a> to view this page";

                    echo $msg;
                }else {


            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "restaurant";

            
            $conn = new mysqli($servername, $username, $password, $dbname);

            
            if ($conn->connect_error) {

                die("Connection failed: " . $conn->connect_error);
            }else{
            ?>
                <form action="add_waiter_result.php" method="post">
                    <p>Name: <input type="text" name="name" value = "" /></p>
                    <p><input type="submit" value = "Add Waiter"/></p>
                </form>

            <?php
            }
            $conn->close();

        }
        ?>

    </body>
</html>