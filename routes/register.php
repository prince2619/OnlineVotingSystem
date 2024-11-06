<html>
    <head>
        <title>Online Voting System - Registration</title>
        <link rel ="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
        <style>
            #address{
                width:32%;
            }
            #imagepart{
                border: 2px solid black;
                border-radius: 5px;
                padding:10px;
                width:30%;
                
            }
            #role{
                border: 2px solid black;
                border-radius: 5px;
                padding:10px;
                width:30%;
            }
            #role select{
                border-radius: 5px;
                padding:10px;
            }
        </style>
        <center>
         <div id="headerSection"><h1>Online Voting System</h1></div>   
        
        <hr>
        <div id="bodysection">
        <h3>Registration</h3>
        <form action="../api/register.php" method ="POST" enctype="multipart/form-data">
            <input type="text"name="name"  placeholder ="Enter Name">
            <input type="number"name="VoterID" placeholder="Enter VoterID Number"><br><br>
            <input type="password"name="password" placeholder ="Enter Password">
            <input type="password"name="confirm_password" placeholder="Confirm Password"><br><br>
            <input id="address" type="Address"name="address" placeholder="Enter Address"><br><br>
            
            <div id="imagepart">
            Upload Image:<input type="file" name="photo">
            </div>
            <br>
            <div id="role">
            Select Role:<select name="role" >
                <option value="1">voter</option>
                <option value="2">Political Party</option>
            </select>
            </div>
            <br>
            <button
             style ="padding: 10px;
                     font-size: 15px;
                     background-color: #3498db;
                     color: white;
                     border-radius: 5px; "
            >
                Register
            </button><br><br>
          Already user? <a href="../index.php">Login here</a>
        </form>
        </div>
        </center>
    </body>
</html>