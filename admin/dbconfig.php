<?php
/* Database connection settings */
	$servername = "localhost";
    $username = "captaine_counteradmin";		//put your phpmyadmin username.(default is "root")
    $password = "admin@counter";			//if your phpmyadmin has a password put it here.(default is "root")
    $dbname = "captaine_counter";
    
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
?>