<html>
    <head>
        <title>Delete Assignment Page</title>
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

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }else{

                // Update the record
                $sql = "DELETE FROM assignment WHERE ID = " . "'". $_GET['ID']."'";

                if ($conn->query($sql) === TRUE) {
                    echo "Assignment was deleted . <br />";
                    if($_SESSION['num']==2){

                    echo "<a href = 'homeheadwaiter.php'>Go back</a>";
                  }else{
                    echo "<a href = 'homeadmin.php'>Go back</a>";
                  }
                } else {
                    echo "Error deleting: " . $conn->error;
                }
            }
            $conn->close();
        }
        ?>

    </body>
</html>
