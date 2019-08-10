<!doctype html>
<html>
<head>
<title>User Registration</title>
<style>
body {background-color: powderblue;}
h1   {color: blue;}
</style>
</head>
<body>
<h1>User Registration</h1>
<form action="" method="post">
<label>Username: </label><input type="text" name="user"><br/><br/>
<label>Password: </label><input type="password" name="pass"><br/><br/>
<label>Email: </label><input type="text" name="email"><br/><br/>
<input type="submit" value="Register" name="submit"><br/><br/>
<!-- Login Link-->
<a href="login.php">Go Back</a>
</form>
<?php
   isset($_POST["submit"]);
    if(!empty($_POST['user']) && !empty($_POST['pass'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $conn = new mysqli('localhost', 'bill', '1234') or die (mysqli_error());//db connection
        $db = mysqli_select_db($conn, "login_register") or die("DB error");//select db from database
        //selecting database
        $query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$user."'");
        $numrows = mysqli_num_rows($query);
        if($numrows == 0)
        {
            //insert to mysqli query
            $sql = "INSERT INTO userpass(user,pass,email) VALUES('$user', '$pass', '$email')";
            $result = mysqli_query($conn, $sql);
            //return message
            if($result){
                echo "Your Account Created successfully";
            }
            else
            {
                echo "Failure!";
            }
        }
        else
        {
            echo "That Username already exist! Please try again.";
        }
        mysqli_close($conn);//closing connection
    }
?>