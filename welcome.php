<?php
session_start();//start the session
if(!isset($_SESSION["sess_user"])){
    header("Location: login.php");//if the session is not set correctly, it will stay in login page
}
else
{
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8"><!--If the session is set correctly, things below will show up-->
<title>Welcome</title>
</head>
<h1>Welcome back my man</h1>
<?=$_SESSION['sess_user'];?><br/><br/><!--show the specific username here-->
<a href="logout.php">Logout</a>
<body>
</body>
</html>
<?php
}