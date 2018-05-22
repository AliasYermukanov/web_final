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
    if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['surname'])){
    echo '<h1>wait</h1>';
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    $email=$_POST['email'];
    $role=3;
    // mysqli_query($conn, "INSERT INTO users (name, surname, e-mail, password, role_id) VALUES ('$name', '$surname', '$email', '$password', '$role')"); 
    if($conn->query("INSERT INTO users (`name`, `surname`, `e-mail`, `password`, `role_id`) VALUES ('$name', '$surname', '$email', '$password', '$role')") == TRUE) {
        }
    else {
        echo $conn->error;
    }
    
    $sql="select id from users where `e-mail`='$email' and `password`='$password'";
    $res=$conn->query($sql);
    

    $count = mysqli_num_rows($res);

    if($count == 1){
        $row = $res->fetch_assoc();
        $_SESSION['user']=$row['id'];
        echo "<script>location.href='home.php';</script>";
        die();
    } 
    
}
?>