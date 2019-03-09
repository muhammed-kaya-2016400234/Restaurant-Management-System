<html>
    <head>
        <title>Stored Procedure</title>
    </head>
    <body>

        <?php

            session_start();

                if(!isset($_SESSION['name'])){

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
                <form action="procedure_result.php" method="post">
                    <p>Table ID: <input type="text"  name="tableid" value = "" /></p>
                    <p>Time: <input type="datetime" name="dattime" value = "" /></p>
                    <p><input type="submit" value = "See Result"/></p>
                </form>

            <?php
            }
            $conn->close();

        }
        ?>

    </body>
</html>