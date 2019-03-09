<html>
    <head>
        <title>Add Table Result</title>
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

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }else{

                // Insert the record
                $sql = "INSERT INTO tables(no_of_seats) " .
                    "VALUES('" . $_POST['no_of_seats'] ."')" ;

                if ($conn->query($sql) === TRUE) {
                    echo "Table was added <br />";
                    echo "<a href = 'homeadmin.php'>Go back</a>";
                } else {
                    echo "Error adding: " . $conn->error;
                }
            }
            $conn->close();

        }
        ?>

    </body>
</html>
