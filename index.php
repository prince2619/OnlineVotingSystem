<html>
    <head>
        <title>Online Voting System</title>
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>

    <body>
        <center>
        <div id="headerSection">
            <h1>Online Voting System </h1>
        </div>
        <hr>
        <div id="bodySection">
        <form action="api/login.php" method="POST">
            <h3>Login</h3>
            <input type="number" name ="VoterID" placeholder ="Enter VoterId Number"><br><br>
            <input type="password" name ="password" Placeholder ="Enter password"><br><br>
            <select id= "dropbox" name="role" >
                <option value="1">Voter</option>
                <option value="2">Political Party</option>
            </select><br><br>
            <button id="loginbtn" type="submit">Login</button><br><br>
            New User ? <a href="routes/register.php">Register here</a>
        </form>
        </div>
        </center>
        
    </body>
</html>