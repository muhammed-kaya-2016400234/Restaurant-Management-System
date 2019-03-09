<html>
    <head>
        <title>Headwaiter Home Page</title>
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

                ?>

                <a href = "add_assignment.php">Add assignment</a><br />
                
                

                <?php

                // List records
                $sql = "SELECT * FROM assignment";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    
                    ?>
                    <table border = 1>
                        <tr>
                            <th>Operations</th>
                            <th>Assignment ID</th>
                            <th>Table ID</th>
                            <th>Waiter</th>
                            <th>Begin Time</th>
                            <th>End Time</th>
                            
                    <?php

                    
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td>
                                <a href = "delete_assignment.php?ID=<?php echo $row["ID"]; ?>">Delete</a>
                            </td>
                            <td><?php echo $row["ID"]; ?></td>
                            <td><?php echo $row["tableid"]; ?></td>
                            <td><?php echo $row["waitername"]; ?></td>
                            <td><?php echo $row["begintime"]; ?></td>
                            <td><?php echo $row["endtime"]; ?></td>
                            
                        </tr>
                        <?php
                    }

                    ?>
                    </table>
                    <?php
                } else {
                    echo "There are no assignments in the system";
                }

                ?>
                <br />
                    <br />

                <?php
                    $sql2 = "SELECT name FROM waiter";
                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {
                    
                    ?>
                    <table border = 1>
                        <tr>
                            
                            <th>Waiter Name</th>
                            
                    <?php

                    // output data of each row
                    while($row = $result2->fetch_assoc()) {
                        ?>
                        <tr>
                            
                            <td><?php echo $row["name"]; ?></td>
                            
                        </tr>
                        <?php
                    }
                    ?>

                    </table>

                    <?php
                } else {
                    echo "There are no waiters in the system";
                }

                ?>

                <br />
                <br />
                
                
                <?php

                    $sql3 = "SELECT id,no_of_seats FROM tables";
                $result3 = $conn->query($sql3);

                if ($result3->num_rows > 0) {
                    
                    ?>
                    <table border = 1>
                        <tr>
                            
                            <th>Table ID</th>
                            <th>Number of seats</th>
                            
                    <?php

                    // output data of each row
                    while($row = $result3->fetch_assoc()) {
                        ?>
                        <tr>
                            
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["no_of_seats"]; ?></td>
                        </tr>
                        <?php
                    }

                    ?>

                    </table>

                    <?php
                } else {
                    echo "There are no tables in the system";
                }



                
            }
            $conn->close();
        ?>


               
        

                    <br />
                    <br />
                    <br />
                    <br />

                    Click <a href="http://localhost/proje3/logout.php">here</a> to log out.


                    <?php
                }

                ?>
           

    </body>
</html>