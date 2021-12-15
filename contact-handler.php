<?php
if (isset($_POST['submit'])){
	
	$first_name = $_POST['first_name']; 
	$last_name = $_POST['last_name']; 
	$mailFrom = $_POST['mail'];
	$message = $_POST['message']; 

	
	$mailTo ="aditi.munda@outlook.com";
	$headers .="From: ".$mailFrom;
	$txt = "You have received an e-mail from ".$first_name.".\n\n".$message;
	
	mail($mailTo, $message, $txt, $headers);
	header("Location: contact.html?mailsend");

}	
?>
