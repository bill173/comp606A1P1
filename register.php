<!doctype html><!--define the document type-->
<html>
<head>
<title>User Registration</title>
<style>
.register{/*Select and style the elements with class named register defined below*/
    width:350px;
    margin:50px auto;
    border-radius:10px;
    padding:10px 40px 25px;
    margin-top:40px;
}
input[type=text], input[type=password]{/*style the elements defined below*/
    width:95%;
    padding:5px;
    margin-top:8px;
    padding-left:5px;
    font-size:10px;
}
input[type=submit]{/*style the elements defined below*/
    width:95%;
    background-color:#007;
    color:#fff;
    padding:4px;
    font-size:20px;
    cursor:pointer;
    border-radius:5px;
}
body {background-color: powderblue;}/*style the background color*/
h1   {color: blue;}/*style the h1 color*/
</style>
</head>
<body>
<div class="register"><!--define a class in this section-->
<h1 align="center">User Registration</h1>
<form action="" method="post">
<!--choose the proper input type-->
<label>Username:</label><input type="text" name="user"><br/><br/>
<label>Password:</label><input type="password" name="pass"><br/><br/>
<label>Email:</label><input type="text" name="email"><br/><br/>
<input type="submit" value="Register" name="submit"><br/><br/>
<!-- set a link to go back to login page if you want-->
<a href="login.php">Go Back and login</a>
</form>
<?php
   isset($_POST["submit"]);//to checks if the $_POST variable is empty
    if(!empty($_POST['user']) && !empty($_POST['pass'])){// if both of these two are not empty
        $user = $_POST['user'];//use superglobals $_POST to collect form-data and make it invisible in the url
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $conn = mysqli_connect('localhost', 'bill', '1234') or die(mysqli_error());//establish the database connection
        $db = mysqli_select_db($conn, "login_register") or die("Database error");//select db from database
        // Perform queries
        $query = mysqli_query($conn, "SELECT * FROM userpass WHERE user='".$user."'");
        //Return the number of rows for the $query
        $rows = mysqli_num_rows($query);
        if($rows == 0)//if there's no match result
        {
            //insert to mysqli query
            $sql = "INSERT INTO userpass(user,pass,email) VALUES('$user', '$pass', '$email')";
            $result = mysqli_query($conn, $sql);
            //return message
            if($result){//if successfully inserted, then start the session
                session_start();
                $_SESSION['sess_user'] = $user;
                echo "Hello " .$user."! Welcome to my world!<br/><br/>";
                echo "Your Account Created successfully";
            }
            else
            {
                echo "Failure!";//if not, show error message
            }
        }
        else
        {
            echo "That Username already exist! Please try another one.";//if there's a match result, show error message
        }
        mysqli_close($conn);//closing connection
    }
?>
</body>
</html>