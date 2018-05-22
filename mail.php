<?php
if(isset($_POST['name']) && isset($_POST['email']) )
	$headers =  'MIME-Version: 1.0' . "\r\n"; 
	$headers .= 'From: Your name <info@address.com>' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
	$to="ermukanovalias@mail.ru";
	$message = "name: " . $_POST['name'] . "from: " . $_POST['email'] . "message: " . $_POST['message']; 
  mail($to, '=?UTF-8?B?'.base64_encode("mail from C4U").'?=', $message,$headers);

?>