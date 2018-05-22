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

    if(isset($_POST['id']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['day']) && isset($_POST['type'])){
    $idcou=$_POST['id'];
    $start=$_POST['start'];
    $end=$_POST['end'];
    $day=$_POST['day'];
    $type=$_POST['type'];
    // mysqli_query($conn, "INSERT INTO users (name, surname, e-mail, password, role_id) VALUES ('$name', '$surname', '$email', '$password', '$role')"); 
    if($conn->query("UPDATE `schedule` SET `day_ow`='$day' ,`start_time`='$start',`end_time`='$end',`type`='$type' where `id` = '$idcou'") == TRUE) {
        echo "<script>location.href='profile.php';</script>";
        }
    else {
        echo $conn->error;
    }

    
}
?>