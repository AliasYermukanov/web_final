<?php
session_start(); 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "c4u";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
        die("Connection failed: " . $conn->connect_error);
    


    if(isset($_GET['id'])){
    $id=$_GET['id'];
    echo $id;
    
               
    
    
    if($conn->query("delete from followed_courses where `id` = '$id'") == TRUE) {
    	echo "<script>location.href='home.php';</script>";
        }
    else {
        echo $conn->error;
    }

    
}
?>