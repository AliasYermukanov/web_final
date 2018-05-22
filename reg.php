
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



<br><br><br><br>
<div class="p-x-1 p-y-3">
 <form class="card card-block m-x-auto bg-faded form-width" action="register.php" method="post">
 <legend class="m-b-1 text-xs-center">Registration</legend>
 
 <div class="form-group has-float-label">
 <input class="form-control" id="password" name="name" type="text" placeholder="Name"/>
 <label for="password">Name</label>
 </div>
 <div class="form-group has-float-label">
 <input class="form-control" id="password" name="surname" type="text" placeholder="SurName"/>
 <label for="password">SurName</label>
 </div>
 
 <div class="form-group has-float-label">
 <input class="form-control" id="password" name="email" type="email" placeholder="E-mail"/>
 <label for="password">E-mail</label>
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
 <button class="btn btn-block btn-primary" type="submit">Registration</button>
 </div>
 </form>
</div>




</body>
</html>