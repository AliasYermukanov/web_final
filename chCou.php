<?php
session_start(); 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "c4u";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    if(!empty($_SESSION['user'])){
    $id=$_SESSION['user'];
    $sql="select * from users where `id` = '$id' ";
                $res=$conn->query($sql);
                $count = mysqli_num_rows($res);
    }

    if(isset($_POST['name']) && isset($_POST['type']) && isset($_POST['price']) &&isset($_POST['id'])){
    $id = $_POST['id'];
    $name=$_POST['name'];
    $type=$_POST['type'];
    $price=$_POST['price'];
    
    // mysqli_query($conn, "INSERT INTO users (name, surname, e-mail, password, role_id) VALUES ('$name', '$surname', '$email', '$password', '$role')"); 
    if($conn->query("UPDATE `course` SET `name` = '$name' ,`type`='$type' ,`price` = $price where `id` = '$id'") == TRUE) {
        }
    else {
        echo $conn->error;
    }

    echo "<script>location.href='home.php';</script>";
}
?>