<html>
    <head>
        <title>Add Table</title>
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
                <form action="add_table_result.php" method="post">
                    <p>Number of seats: <input type="number" step="1" name="no_of_seats" value = "" /></p>
                    <p><input type="submit" value = "Add Table"/></p>
                </form>

            <?php
            }
            $conn->close();

        }
        ?>

    </body>
</html>