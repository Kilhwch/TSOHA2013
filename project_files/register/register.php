<html>
    <link rel="stylesheet" type="text/css" href="../style/main.css">
    <body>

        <h1>Register</h1>

        <form action="registerSearch.php" method="POST">
            Username: <input type="text" name="username"><br>
            <font size="1">(3-10 characters)</font><br>
            Password: <input type="password" name="password1"><br>
            Re-enter: <input type="password" name="password2"><br>
            <font size="1">(6-25 characters and must contain 1 number)</font><br><br>
            
            <input type="submit" value="Register">
        </form>
        
        <form action="../views/index.php">
            <input type="submit" value="Back">
        </form>

    </body>
</html>

