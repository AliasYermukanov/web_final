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
    }
    if($count == 1){
                 $row = $res->fetch_assoc();
             }

    $sql1="select * from course ";
                $res1=$conn->query($sql1);
                $count1 = mysqli_num_rows($res1);
    
   
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
    <link href="style/prof.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="style/font.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     
    


</head>

<body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <a class="navbar-brand" href="home.php#carouselExampleControls">
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
            
            <form class="form-inline mt-2 mt-md-0" action="signout.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log out</button>
            </form>
        </div>
    </nav>
        <br><br><br><br><br>
    <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">  
<div class="container">
    <div class="row user-menu-container square">
        <div class="col-md-7 user-details">
            <div class="row coralbg white">
                <div class="col-md-6 no-pad">
                    <div class="user-pad">
                        <h2>Welcome back </h2>
                        
                        <h3 class="white"><i class="fa fa-check-circle-o"></i> <?php echo "\n". $row['name'] . " " .$row['surname']; ?></h3>
                        <h3 class="white"><i class="fa fa-drivers-license-o"></i> <?php echo $row['r_name']; ?></h3>
                        
                    </div>
                </div>
                <div class="col-md-6 no-pad">
                    <div class="user-image">
                        <!-- <img src="https://farm7.staticflickr.com/6163/6195546981_200e87ddaf_b.jpg" class="img-responsive thumbnail"> -->
                    </div>
                </div>
            </div>
            <div class="row overview">
                <div class="col-md-4 user-pad text-center">
                    <h3><br><form  action="edit.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">edit personal info</button>
            </form></h3>
                    
                </div>
                <div class="col-md-4 user-pad text-center">

                    <h3>FOLLOWING COURSES</h3>
                    <?php
                    $result = $conn->query("SELECT * FROM followed_courses");
                    $cou=0;
                     while($row_c=$result->fetch_assoc()){
                           
                            if($row_c['user_id'] == $id){
                                $cou++;
                                $id123 = $row_c['course_id'];
                            }

                        }

                        ?>
                    <h4><?php echo $cou; ?></h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3><br><form  action="signout.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log out</button>
            </form></h3>
                </div>
            </div>
        </div>
        <?php if($row['r_name']!="user"){  ?>
        <div class="col-md-1 user-menu-btns">
            <div class="btn-group-vertical square" id="responsive">
                <a href="#" class="btn btn-block btn-default active">
                  <i class="fa fa-bell-o fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-envelope-o fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-laptop fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-cloud-upload fa-3x"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4 user-menu user-pad">
            <div class="user-menu-content active">
                <form class="card card-block m-x-auto bg-faded form-width" action="addSch.php" method="post">
                     <legend class="m-b-1 text-xs-center">Add school</legend>
                     
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="name" type="text" />
                     <label for="password">Name</label>
                     </div>
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="address" type="text"/>
                     <label for="password">Address</label>
                     </div>
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="info" type="text"/>
                     <label for="password">info</label>
                     </div>
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="mail" type="text"/>
                     <label for="password">e-mail</label>
                     </div>
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="num" type="text"/>
                     <label for="password">Mobile</label>
                     </div>
                     
                     <div class="text-xs-center">
                     <button class="btn btn-block btn-primary" type="submit">Register</button>
                     </div>
                     </form>
            </div>
            <div class="user-menu-content">
                <form class="card card-block m-x-auto bg-faded form-width" action="addCou.php" method="post">
                     <legend class="m-b-1 text-xs-center">Add courses</legend>
                     
                     <select class="form-control form-group has-float-label" id="mySelect" name="idsch" onchange="myFunction()">

                    <option>Choose school</option>
                    <?php
                     
 
                    $res2 = $conn->query("SELECT * FROM schools");
 
                     while($row2=$res2->fetch_assoc()){
                           
                            $value = $row2[id];
                            $data = $row2[s_name];
                            echo "<option value=" .$value. ">" . $data . "</option>";

                        }

                        ?>
                        
                     
                    </select>
                    

                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="name" type="text" />
                     <label for="password">Name</label>
                     </div>
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="type" type="text"/>
                     <label for="password">type</label>
                     </div>
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="price" type="text"/>
                     <label for="password">price</label>
                     </div>
                     
                     
                     <div class="text-xs-center">
                     <button class="btn btn-block btn-primary" type="submit">Add</button>
                     </div>
                     </form>
            </div>
            <div class="user-menu-content">
                <form class="card card-block m-x-auto bg-faded form-width" action="schedule.php" method="post">
                     <legend class="m-b-1 text-xs-center">Add schedule</legend>
                     <select class="form-control form-group has-float-label" id="mySelect" name="idcou" >

                    <option>Choose course</option>
                    <?php
                     
 
                    $res3 = $conn->query("SELECT * FROM course");
 
                     while($row3=$res3->fetch_assoc()){
                           
                            $value = $row3[id];
                            $data = $row3[name];
                            echo "<option value=" .$value. ">" . $data . "</option>";

                        }

                        ?>
                        
                     
                    </select>
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="start" type="text" />
                     <label for="password">Start time</label>
                     </div>
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="end" type="text"/>
                     <label for="password">End time</label>
                     </div>
                     
                     <select class="form-control form-group has-float-label" name="day">
                    <option>Day of the week</option>
                    <option value="1">Monday</option>
                    <option value="2">Tuesday</option>
                    <option value="3">Wednesday</option>
                    <option value="4">Thursday</option>
                    <option value="5">Friday</option>
                    <option value="6">Saturday</option>
                    <option value="7">Sunday</option>

                    </select>
                     <select class="form-control form-group has-float-label" name="type">
                    <option>type</option>
                    <option value="individual">individual</option>
                    <option value="group">group</option>
                    </select>
                     
                     <div class="text-xs-center">
                     <button class="btn btn-block btn-primary" type="submit">Add </button>
                     </div>
                     </form>
            </div>
            <div class="user-menu-content">
                <?php
                   
                            $result11 = $conn->query("SELECT * FROM followed_courses");
                                while($row_c1=$result11->fetch_assoc()){
                           
                                if($row_c1['user_id'] == $id){
                                
                                $id123 = $row_c1['course_id'];
                                $result12 = $conn->query("SELECT * FROM course where `id` = '$id123' ");
                                while($row12=$result12->fetch_assoc()){
                                echo "you followed course " . " ". $row12['name'] ; 
                            }
                            }
                               
                            }
                            

                        

                        ?>
            </div>
            </div>
            <?php } else {
                $result11 = $conn->query("SELECT * FROM followed_courses");
                                while($row_c1=$result11->fetch_assoc()){
                           
                                if($row_c1['user_id'] == $id){
                                
                                $id123 = $row_c1['course_id'];
                                $result12 = $conn->query("SELECT * FROM course where `id` = '$id123' ");
                                while($row12=$result12->fetch_assoc()){
                                echo "you followed course " . " ". $row12['name'] ; 
                            }
                            }
                               
                            }


            }?>
        
    </div>
</div>
<br><br>


<hr>

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
    <script type="text/javascript">
        $(document).ready(function() {
    var $btnSets = $('#responsive'),
    $btnLinks = $btnSets.find('a');
 
    $btnLinks.click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.user-menu>div.user-menu-content").removeClass("active");
        $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
    });
});

$( document ).ready(function() {
    $("[rel='tooltip']").tooltip();    
 
    $('.view').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
});
    </script>

</body>

</html>