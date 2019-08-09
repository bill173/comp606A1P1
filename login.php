<!DOCTYPE html>
<html>
<head>
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="frm">
        <form action="process.php" method="POST">
        <P>
            <label>Username:</label>
            <input type="text" id="user" name="pass" />
        </P>
        <P>
            <label>Password:</label>
            <input type="password" id="pass" name="pass" />
        </P>
        <P>
            <input type="submit" id="btn" name="Login" value="Login" />
        </P>
        
        <div class="register" style="margin-top: -10px">
        <P>
            <a href="register.php" id="lk">Register</a>
        </P>
        </div>
    </form>

</body>
</html>