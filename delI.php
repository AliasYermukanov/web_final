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
    $sql="delete from course where `id` = '$id' ";
               
    
    
    if($conn->query("update `schedule` set `active` = '0' where `id` = '$id'") == TRUE) {
    	echo "<script>location.href='home.php';</script>";
        }
    else {
        echo $conn->error;
    }

    
}
?>