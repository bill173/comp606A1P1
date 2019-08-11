<?php
session_start();
if(!isset($_SESSION["sess_user"])){
    header("Location: login.php");
}
else
{
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome</title>
</head>
<h1>Welcome</h1>
<p>This course is super cool</p>
<?=$_SESSION['sess_user'];?><br/><br/>
<a href="logout.php">Logout</a>
<body>
</body>
</html>
<?php
}