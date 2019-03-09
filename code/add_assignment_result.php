<html>
    <head>
        <title>Add Assignment Result</title>
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

                // Insert the record
                $sql = "INSERT INTO assignment(tableid,waitername,begintime,endtime) " .
                    "VALUES('" . $_POST['tableid'] . "','"  .$_POST['name']  ."','"  . $_POST['begtime']."','"  . $_POST['endtime'] .  "')";

                    
               if ($conn->query($sql) === TRUE) {
                    echo "Assignment was added <br />";
                    if($_SESSION['num']==2){

                    echo "<a href = 'homeheadwaiter.php'>Go back</a>";
                  }else{
                    echo "<a href = 'homeadmin.php'>Go back</a>";
                  }
                } else {
                    
                    echo "Error adding: " . $conn->error;
                }
            }
            $conn->close();

        }
        ?>

    </body>
</html>
