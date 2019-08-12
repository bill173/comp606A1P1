<!doctype html>
<html>
<head>
<meta charset="UTF-8"><!--set the Character Encoding as utf8-->
<title>Login</title>
<style>/*set my html styles in this tag*/
.login{/*Select and style the elements with class named login defined below*/
    width:400px;
    margin:50px auto;
    border-radius:10px;
    padding:10px 40px 25px;
    margin-top:70px;
}
input[type=text], input[type=password]{/*style the elements defined below*/
    width:95%;
    padding:10px;
    margin-top:8px;
    padding-left:5px;
    font-size:16px;
}
input[type=submit]{/*style the elements defined below*/
    width:100%;
    background-color:#009;
    color:red;
    padding:6px;
    font-size:20px;
    cursor:pointer;
    border-radius:10px;
}
body {background-color: powderblue;}/*style the background color*/
h1   {color: blue;}/*style the h1 color*/
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
        $user=$_POST['user'];//use superglobals $_POST to collect form-data and make it invisible in the url
        $pass=$_POST['pass'];
        //establishing connection with server by passing server_name, user_id and password
        $conn = mysqli_connect("localhost", "bill", "1234");
        //selecting the exact database show in the phpmyadmin
        $db = mysqli_select_db($conn, "login_register");
        //sql query to fetch information of registered user and find user match.
        $query = mysqli_query($conn, "SELECT * FROM userpass WHERE pass='$pass' AND user='$user'");

        $rows = mysqli_num_rows($query);
        if($rows == 1){
            session_start();//If we match the specific user, we start the session
            $_SESSION['sess_user'] = $user;
            header("Location: welcome.php");//redircting to welcome page
        }
        else
        {
            $error = "Username or Password is Invalid.";//if it can not match, we show the error message
        }
        mysqli_close($conn);//closing connection
    }
}

?>

</head>
<body>
<div class="login"><!--define a class in this section-->
<h1 align="center">User Login</h1>
<form action="" method="post">
<!--choose the proper input type,placeholder attribute specifies a short hint-->
<input type="text" placeholder="Username" id="user" name="user"><br/><br/>
<!--characters in a password field are masked-->
<input type="password" placeholder="Password" id="pass" name="pass"><br/><br/>
<input type="submit" value="Login" name="submit"><br/>
<!-- New User Register Link -->
<p><a href="register.php">Register</a></p>
</form>
<!-- showing the error message -->
<span><?php echo $error; ?></span>
</div>
</body>
</html>