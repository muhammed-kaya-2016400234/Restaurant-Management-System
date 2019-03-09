<html>
    <head>
        <title>Procedure Result</title>
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
                $sql = "CALL number_waiter ('" .
                     $_POST['tableid'] . "','"  .$_POST['dattime'].  "')";

                    $result = $conn->query($sql);
               
                    while($row = $result->fetch_assoc()) {
                        echo "There are ". $row["COUNT(waitername)"]. " waiters assigned at that time.";


                    }
                    if($_SESSION['num']==2){

                    echo "<a href = 'homeheadwaiter.php'>Go back</a>";
                  }else{
                    echo "<a href = 'homeadmin.php'>Go back</a>";
                  }
                
            }
            $conn->close();

        }
        ?>

    </body>
</html>
