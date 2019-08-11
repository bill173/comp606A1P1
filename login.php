<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
.login{
    width:400px;
    margin:50px auto;
    border-radius:10px;
    padding:10px 40px 25px;
    margin-top:70px;
}
input[type=text], input[type=password]{
    width:95%;
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
    border-radius:10px;
}
body {background-color: powderblue;}
h1   {color: blue;}
</style>

<?php
$error='';//variable to store error message
if(isset($_POST['submit'])){
    if(empty($_POST['user']) || empty($_POST['pass'])){
    $error = "Username or Password is Invalid";
    }
    else
    {
        //define $user and $pass
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        //establishing connection with server by passing server_name, user_id and pass as a parameter
        $conn = mysqli_connect("localhost", "bill", "1234");
        //selecting database
        $db = mysqli_select_db($conn, "login_register");
        //sql query to fetch information of registered user and find user match.
        $query = mysqli_query($conn, "SELECT * FROM userpass WHERE pass='$pass' AND user='$user'");

        $rows = mysqli_num_rows($query);
        if($rows == 1){
            header("Location: welcome.php");//redircting to other page
        }
        else
        {
            $error = "Username or Password is Invalid.";
        }
        mysqli_close($conn);//closing connection
    }
}

?>

</head>
<body>
<div class="login">
<h1 align="center">User Login</h1>
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