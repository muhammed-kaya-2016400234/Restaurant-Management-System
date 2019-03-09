<?php
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
            	$id=$_POST["id"];
            	$pass=$_POST["pass"];

            	$sql1="SELECT name FROM admins_pass WHERE name= '" . $id ." 'AND password= '" . $pass ."' ";
            	$sql2="SELECT name FROM headwaiters WHERE name= '" . $id ." 'AND password= '" . $pass ."' ";
            	
            	$result1=$conn->query($sql1);
            	$result2=$conn->query($sql2);

            	if( $result1->num_rows>0){

            		session_start();
            		$_SESSION['name']=$id;
                        $_SESSION['num']=1;

            		header("Location:http://localhost/proje3/homeadmin.php");
            		die();

            	}elseif ($result2->num_rows>0) {
            		session_start();
            		$_SESSION['name']=$id;
                        $_SESSION['num']=2;
            		header("Location:http://localhost/proje3/homeheadwaiter.php");
            		die();	
            		
            	}else{
                        echo "a". $result1->num_rows;
            		$conn->close();
            		die("Wrong id or password");




            	}

            }
            ?>