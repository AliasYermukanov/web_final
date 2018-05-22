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
              ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="C4U">
    <meta name="author" content="Alias Yermukanov">
    <link rel="icon" href="images/logo.png">
    <title>Product example for Bootstrap</title>
   


    <!-- Bootstrap core CSS -->
    <link href="style/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style/product.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="style/font.css" rel="stylesheet">

   
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width:  100%;
      height: 100%;
  }
  </style>
  
  
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
          <li class="nav-item active">
            <a class="nav-link" href="#demo">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#search">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#team">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contacts</a>
          </li>
          
        </ul>
        <?php 
            if(!empty($_SESSION['user'])){
                if($count == 1){
                 $row = $res->fetch_assoc();
                 ?>
                 <ul class="nav justify-content-end">
                  <li class="nav-item">
                  <a class='nav-link' href="profile.php"><?php echo $row['name']; ?>   </a>
                  </li>
                  </ul>
                  <form class="form-inline mt-2 mt-md-0" action="signout.php">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log out</button>
                  </form>
                  <?php
                }
              }
            
            else{
              ?>
                  <form class="form-inline mt-2 mt-md-0" action="sign.php">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log in</button>
                  </form>
                  <?php        

            }
            ?>
            
          
      </div>
    </nav>

    <?php  ?>
    <div class="col-8 mx-auto ">
                    <div class="card" style="width: 40rem;">
                        <div class="card-body justify-content-between">
                            <h4 class="card-title"><% out.print(u.getName()); %></h4>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <span>Universal Product Code is <%out.print(u.getUpc());%></span>
                                <small>amounts of <%out.print(u.getAmounts());%></small>
                            </h6>

                            <p class="card-text">Price is <%out.print(u.getPrice());%> $</p>

                            <a href="/editI?id=<%=u.getId()%>" class="card-link">Edit Item</a>
                            <a href="/delI?id=<%=u.getId()%>" class="card-link">Delete Item</a>

                        </div>
                    </div>
                    <br>

                </div>






    <!-- footer -->
<footer class="container py-5">
  <div class="row">
    <div class="col-12 col-md">
      <img src="images/logo.png" alt="" width="30" height="30">
      <small class="d-block mb-3 text-muted">&copy; 2018</small>
    </div>
    <div class="col-6 col-md">
      <h5>Features</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Cool stuff</a></li>
        <li><a class="text-muted" href="#">Random feature</a></li>
        <li><a class="text-muted" href="#">Team feature</a></li>
        <li><a class="text-muted" href="#">Stuff for developers</a></li>
        <li><a class="text-muted" href="#">Another one</a></li>
        <li><a class="text-muted" href="#">Last time</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Resource</a></li>
        <li><a class="text-muted" href="#">Resource name</a></li>
        <li><a class="text-muted" href="#">Another resource</a></li>
        <li><a class="text-muted" href="#">Final resource</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Resources</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Business</a></li>
        <li><a class="text-muted" href="#">Education</a></li>
        <li><a class="text-muted" href="#">Government</a></li>
        <li><a class="text-muted" href="#">Gaming</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>About</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Team</a></li>
        <li><a class="text-muted" href="#">Locations</a></li>
        <li><a class="text-muted" href="#">Privacy</a></li>
        <li><a class="text-muted" href="#">Terms</a></li>
      </ul>
    </div>
  </div>
  <div class="container">
      <div class="copyright">
        <center>
        &copy; Copyright <strong>C4U</strong>. All Rights Reserved
        </center>
        
      </div>
    </div>
</footer>

<!-- footer -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <script src="js/main.js"></script>
  <script>
  $(document).ready(function(){
    $("a[href*=#]").on("click", function(e){
        var anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $(anchor.attr('href')).offset().top
        }, 777);
        e.preventDefault();
        return false;
    });
});
</script>
<script src="js/jquery.min.js"></script>

</body>
</html>