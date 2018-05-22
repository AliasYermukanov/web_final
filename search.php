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
    $sql="select * from users LEFT JOIN roles ON roles.r_id = role_id where `id` = '$id' ";
                $res=$conn->query($sql);
                $count = mysqli_num_rows($res);
                $row = $res->fetch_assoc();
                $admin = $row['r_name'];
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
    <link href="style/album.css" rel="stylesheet">

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

        </ul>
        <ul class="nav justify-content-end">
          <li class="nav-item">
            
          </li>
          <?php 
            if(!empty($_SESSION['user'])){
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
              
            
            else{
              ?>
                  <form class="form-inline mt-2 mt-md-0" action="sign.php">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log in</button>
                  </form>
                  <?php        

            }
            ?>
        </ul>
       
      </div>
    </nav>
    <br><br><br><br>
<!-- About -->
<div class="album py-3 bg-light">
        <div class="container">

          <div class="row">
  <?php 
              if(isset($_POST['ttp']) && isset($_POST['type']) && isset($_POST['price']) ){
                    
                     $ttp=$_POST['ttp'];
                     $type=$_POST['type'];
                     $price=$_POST['price'];
 
                    $res3 = $conn->query("SELECT * FROM course");
                    $res2 = $conn->query("SELECT * FROM schedule");

                    
                     while($row3=$res3->fetch_assoc()){
                      while($row2=$res2->fetch_assoc()){
                            if(strtoupper($ttp) == strtoupper($row3['type']) && strtoupper($type)==strtoupper($row2['type']) && $price >$row3['price'] &&$row2['active']!=0  ){
                            ?>
                              

    <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="images/school.jpg"alt="Card image cap">
        <div class="card-body">
            <p class="card-text"><?php echo "Course name: " .$row3['name'] .", price: " . $row3['price'] .", type: ". $row2['type'] ." " ; ?></p>
            <p><?php echo " start time: " . $row2['start_time'] . " end time: " .$row2['end_time'] ; ?></p>
            <center><p><a href="/info.php?id=<?php echo $row3['id'];?>">More Info</a></p></center>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  
                  <?php if(!empty($_SESSION['user']) && $admin != "user"){ ?>
                            <a href="/editI.php?id=<?php echo $row2['id'] ?>&id2=<?php echo $row3['id'] ?>" class="card-link">Edit Item </a>
                            <a href="/delI.php?id=<?php echo $row2['id'] ?>" class="card-link">Delete Item </a>
                    <?php } ?>
                    <?php
                    $result = $conn->query("SELECT * FROM followed_courses");
                    $cou=0;
                     while($row_c=$result->fetch_assoc()){
                           
                            if($row_c['user_id'] == $id && $row_c['course_id'] == $row3['id']){
                                $cou++;
                                $idc=$row_c['id'];
                            }

                        }

                        ?>

                </div> 
                <?php if($cou!=0){?>
                <a href="/unfollow.php?id=<?php echo $idc ?>" class="card-link">Unfollow </a>
                <?php }
                else { ?>
                <a href="/follow.php?id=<?php echo $row3['id'] ?>" class="card-link">Follow Course </a>
                <?php } ?>
            </div>
        </div>
    </div>

            
                                   
                            <?php
                          }
                          }
                        }
                      }

                       ?>
                     </div></div></div>



<br><br><br><br>




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
  <script src="contactform/contactform.js"></script>
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