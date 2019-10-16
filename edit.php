<?php session_start(); ?>
<?php echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css' />" ?>
<?php echo "<link rel='icon' href='images/logo.png'>" ?>
<?php
    echo "<link rel='stylesheet' type='text/css' href='style/bootstrap.min.css'>";
    echo "<link rel='stylesheet' type='text/css' href='style/floating-labels.css'>";
    echo "";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab01</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/floating-labels.css">
    <style>
.form-width {max-width: 25rem;}
.has-float-label {
 position: relative; }
 .has-float-label label {
 position: absolute;
 left: 0;
 top: 0;
 cursor: text;
 font-size: 75%;
 opacity: 1;
 -webkit-transition: all .2s;
 transition: all .2s;
 top: -.5em;
 left: 0.75rem;
 z-index: 3;
 line-height: 1;
 padding: 0 1px; }
 .has-float-label label::after {
 content: " ";
 display: block;
 position: absolute;
 background: white;
 height: 2px;
 top: 50%;
 left: -.2em;
 right: -.2em;
 z-index: -1; }
 .has-float-label .form-control::-webkit-input-placeholder {
 opacity: 1;
 -webkit-transition: all .2s;
 transition: all .2s; }
 .has-float-label .form-control:placeholder-shown:not(:focus)::-webkit-input-placeholder {
 opacity: 0; }
 .has-float-label .form-control:placeholder-shown:not(:focus) + label {
 font-size: 150%;
 opacity: .5;
 top: .3em; }

.input-group .has-float-label {
 display: table-cell; }
 .input-group .has-float-label .form-control {
 border-radius: 0.25rem; }
 .input-group .has-float-label:not(:last-child) .form-control {
 border-bottom-right-radius: 0;
 border-top-right-radius: 0; }
 .input-group .has-float-label:not(:first-child) .form-control {
 border-bottom-left-radius: 0;
 border-top-left-radius: 0;
 margin-left: -1px; }
</style>
</head>
<body>



<?php

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
    $sql="select * from users LEFT JOIN roles ON roles.r_id = role_id where `id` = '$id' ";
                $res=$conn->query($sql);
                $count = mysqli_num_rows($res);
    }
    if($count == 1){
                 $row = $res->fetch_assoc();
             }
              ?>



<br><br><br><br>
<div class="p-x-1 p-y-3">
 <form class="card card-block m-x-auto bg-faded form-width" action="edit.php" method="post">
 <legend class="m-b-1 text-xs-center">Registration</legend>
 <?php  
 if(!empty($_SESSION['user'])){
    ?>
 <div class="form-group has-float-label">
 <input class="form-control" id="password" name="name" type="text" placeholder="<?php echo $row['name']; ?>" value="<?php echo $row['name']; ?>"/>
 <label for="password"><?php echo $row['name']; ?></label>
 </div>
 <div class="form-group has-float-label">
 <input class="form-control" id="password" name="surname" type="text" placeholder="<?php echo $row['surname']; ?>" value="<?php echo $row['surname']; ?>"/>
 <label for="password"><?php echo $row['surname']; ?></label>
 </div>
 
 <div class="form-group has-float-label">
 <input class="form-control" id="password" name="email" type="email" placeholder="<?php echo $row['e-mail']; ?>" value="<?php echo $row['e-mail']; ?>"/>
 <label for="password"><?php echo $row['e-mail']; ?></label>
 </div>
 <div class="form-group has-float-label">
 <input class="form-control" id="password" name="password" type="password" />
 <label for="password">Password</label>
 </div>
 <div class="form-group has-float-label">
 <input class="form-control" id="password" name="password2" type="password"/>
 <label for="password">Password 2</label>
 </div>
 <div class="form-group">
 <label class="custom-control custom-checkbox">
 <input class="custom-control-input" type="checkbox"/>
 <span class="custom-control-indicator"></span>
 <span class="custom-control-description">receive a newsletter</span>
 </label>
 </div>
 <div class="text-xs-center">
 <button class="btn btn-block btn-primary" type="submit">Change</button>
 </div>
 </form>
</div>
<?php }?>
<?php

if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['surname'])){
    echo '<h1>test</h1>';
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    $email=$_POST['email'];
    $role=3;
    $id=$row['id'];

    // mysqli_query($conn, "INSERT INTO users (name, surname, e-mail, password, role_id) VALUES ('$name', '$surname', '$email', '$password', '$role')"); 
    if($conn->query("Update users Set `name` = '$name' ,`surname` = '$surname' , `e-mail` = '$email' , `password` = '$password' where `id` = '$id' ") == TRUE) {
        echo "<script>location.href='profile.php';</script>";
        header('Location:/profile.php');
        }
    else {
        //echo $conn->error;
    }
   
}

?> 


</body>
</html>