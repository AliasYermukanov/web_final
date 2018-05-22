<?php
if(isset($_POST['data1']) ){
	session_start();
	$_SESSION['data1']=$_POST['data1'];
}
?>