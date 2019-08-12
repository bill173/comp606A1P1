<?php
session_start();//user this function to start the session
unset($_SESSION['sess_user']);//remove the session
session_destroy();//destroy the session
header("Location: login.php");//redirect to login page
?>