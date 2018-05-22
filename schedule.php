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

    if(isset($_POST['idcou']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['day']) && isset($_POST['type'])){
    $idcou=$_POST['idcou'];
    $start=$_POST['start'];
    $end=$_POST['end'];
    $day=$_POST['day'];
    $type=$_POST['type'];
    // mysqli_query($conn, "INSERT INTO users (name, surname, e-mail, password, role_id) VALUES ('$name', '$surname', '$email', '$password', '$role')"); 
    if($conn->query("INSERT INTO schedule (`day_ow`, `start_time`, `end_time`, `type`, `course_id`,`active`) VALUES ('$day', '$start', '$end', '$type', '$idcou','1')") == TRUE) {
        }
    else {
        echo $conn->error;
    }

    echo "<script>location.href='profile.php';</script>";
}
?>