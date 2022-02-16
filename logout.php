<?php
//Start the session
session_start();
// is the user is already logged in then redirect user to welcome page
if (session_destroy()){
	//redirect to the login page
	header("location:  index.php");
	exit;
}
?>
