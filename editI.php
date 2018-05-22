<?php session_start(); ?>
<?php echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css' />" ?>
<?php echo "<link rel='icon' href='images/logo.png'>" ?>
<?php
    echo "<link rel='stylesheet' type='text/css' href='style/bootstrap.min.css'>";
    echo "<link rel='stylesheet' type='text/css' href='style/floating-labels.css'>";
    echo "";
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







<br><br><br><br>

<div class="p-x-1 p-y-3">
    <?php
                     
                    if(isset($_GET['id2'])){
                        $id2=$_GET['id2'];
                        $res3 = $conn->query("SELECT * FROM course where `id` = '$id2' ");
                        $row3=$res3->fetch_assoc();
                        
                    }
                        ?>
                    <form class="card card-block m-x-auto bg-faded form-width" action="chCou.php" method="post">
                    <legend class="m-b-1 text-xs-center">Change course info</legend>
                     
                   
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="name" type="text" placeholder="<?php echo $row3['name']; ?>" value="<?php echo $row3['name']; ?>" />
                     <label for="password"><?php echo $row3['name']; ?></label>
                     </div>
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="type" type="text" placeholder="<?php echo $row3['type'];?>" value="<?php echo $row3['type'];?>" />
                     <label for="password"><?php echo $row3['type'];?></label>
                     </div>
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="price" type="text" placeholder="<?php echo $row3['price'];?>" value="<?php echo $row3['price'];?>" />
                     <label for="password"><?php echo $row3['price'];?></label>
                     </div>
                     <input type="text" name="id" value="<?php echo$row3['id'];?>" hidden>
                     
                     <div class="text-xs-center">
                     <button class="btn btn-block btn-primary" type="submit">Change</button>
                     </div>
                     </form>
    </div>
    <div class="p-x-1 p-y-3">
<form class="card card-block m-x-auto bg-faded form-width" action="ChangeSchedule.php" method="post">
                     <legend class="m-b-1 text-xs-center">Change schedule</legend>
                     <select class="form-control form-group has-float-label" id="mySelect" name="" >

                    <?php
                     
 
                        
                            echo "<option value=" .$row3['id']. ">" . $row3['name'] . "</option>";

                        

                        ?>
                    </select>
                    <?php 
                    if(isset($_GET['id'])){
                        $id=$_GET['id'];
                        $res2 = $conn->query("SELECT * FROM schedule where `id` = '$id' ");
                        $row2=$res2->fetch_assoc();
                      
                    }
                    ?>
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="start" type="text" placeholder="<?php echo $row2['start_time']; ?>" value="<?php echo $row2['start_time']; ?>"/>
                     <label for="password">Start time</label>
                     </div>
                     <div class="form-group has-float-label">
                     <input class="form-control" id="password" name="end" type="text" placeholder="<?php echo $row2['end_time']; ?>" value="<?php echo $row2['end_time']; ?>" />
                     <label for="password">End time</label>
                     </div>
                     
                     <select class="form-control form-group has-float-label" name="day">
                    <option value="1" selected>Monday</option>
                    <option value="2">Tuesday</option>
                    <option value="3">Wednesday</option>
                    <option value="4">Thursday</option>
                    <option value="5">Friday</option>
                    <option value="6">Saturday</option>
                    <option value="7">Sunday</option>

                    </select>
                     <select class="form-control form-group has-float-label" name="type">
                    <option value="individual" selected>individual</option>
                    <option value="group">group</option>
                    </select>
                     <input type="text" name="id" value="<?php echo$row2['id'];?>" hidden>
                     <div class="text-xs-center">
                     <button class="btn btn-block btn-primary" type="submit">Change </button>
                     </div>
                     </form>
</div>

</body>
</html>