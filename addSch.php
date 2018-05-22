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

    if(isset($_POST['name']) && isset($_POST['address']) && isset($_POST['info']) && isset($_POST['mail']) && isset($_POST['num'])){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $info=$_POST['info'];
    $mail=$_POST['mail'];
    $num=$_POST['num'];
    // mysqli_query($conn, "INSERT INTO users (name, surname, e-mail, password, role_id) VALUES ('$name', '$surname', '$email', '$password', '$role')"); 
    if($conn->query("INSERT INTO schools (`s_name`, `address`, `info`, `e-mail`, `mobile`) VALUES ('$name', '$address', '$info', '$mail', '$num')") == TRUE) {
        }
    else {
        echo $conn->error;
    }

    echo "<script>location.href='profile.php';</script>";
}
?>