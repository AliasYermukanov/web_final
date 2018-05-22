<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='style/bootstrap.min.css' rel='stylesheet'>
    <link href='style/floating-labels.css' rel='stylesheet'>
    <?php echo "<link rel='icon' href='images/logo.png'>"; ?>
    
    <title>Sign in</title>

    <!-- Bootstrap core CSS -->
    <?php echo "<link href='style/bootstrap.min.css' rel='stylesheet'>"; ?>

    <!-- Custom styles for this template -->
    <?php echo "<link href='style/floating-labels.css' rel='stylesheet'>"; ?>
    
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

?>

  </head>

  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#demo">
        <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Courses for you</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
                    <a class="nav-link" href="home.php#search">Search</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="home.php#demo">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php#about">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php#team">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php#contact">Contacts</a>
                </li>
          
        
            
          
      </div>
    </nav>

  <form action="" method="post">
    <form class="form-signin" action="home.php">
      <div class="text-center mb-4">
        <img class="mb-4" src="images/logo1.png" alt="" width="100" height="120">
        
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address"  autofocus>
        <label for="inputEmail">Email address</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
        <label for="inputPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
       
          <center>
          <a href="reg.php">registration</a>
        </center>
        
        
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

      <p class="mt-5 mb-3 text-muted text-center">&copy;C4U 2018</p>
    </form>
    </form>

  </body>
</html>

<?php

if((isset($_POST['password']))&&(isset($_POST['email']))){
    $password=$_POST['password'];
    $email=$_POST['email'];
    

    $sql="select id from users where `e-mail`='$email' and `password`='$password'";
    $res=$conn->query($sql);
    

    $count = mysqli_num_rows($res);

    if($count == 1){
        $row = $res->fetch_assoc();
        $_SESSION['user']=$row['id'];
        echo "<script>location.href='home.php';</script>";
        die();
    } else{
      echo "WRONG!";
    }
    }
?>
