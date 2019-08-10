<?php
require("loginserv.php");//Include loginserv for checking username and password
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
.login{
    width:360px;
    margin:50px auto;
    border-radius:10px;
    padding:10px 40px 25px;
    margin-top:70px;
}
input[type=text], input[type=password]{
    width:99%;
    padding:10px;
    margin-top:8px;
    padding-left:5px;
    font-size:16px;
}
input[type=submit]{
    width:100%;
    background-color:#007;
    color:#fff;
    padding:6px;
    font-size:20px;
    cursor:pointer;
    border-radius:5px;
}
body {background-color: powderblue;}
h1   {color: blue;}
</style>

</head>
<body>
<div class="login">
<h1 align="center">Hello</h1>
<form action="" method="post">
<input type="text" placeholder="Username" id="user" name="user"><br/><br/>
<input type="password" placeholder="Password" id="pass" name="pass"><br/><br/>
<input type="submit" value="Login" name="submit"><br/>
<!-- New User Register Link -->
<p><a href="register.php">Register</a></p>
</form>
<!-- Error Message -->
<span><?php echo $error; ?></span>
</body>
</html>