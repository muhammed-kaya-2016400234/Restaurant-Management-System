<html>
    <head>
        <title>Add Assignment</title>
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
                <form action="add_assignment_result.php" method="post">
                    <p>Table ID: <input type="number" step="1" name="tableid" value = "" /></p>
                    <p>Waiter: <input type="text" name="name" value = "" /></p>
                    <p>Begin time: <input type="datetime" name="begtime" value = "" /></p>
                    <p>End time: <input type="datetime" name="endtime" value = "" /></p>
                    <p><input type="submit" value = "Add Assignment"/></p>
                </form>

            <?php
            }
            $conn->close();

        }
        ?>

    </body>
</html>