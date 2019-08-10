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