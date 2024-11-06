<?php 
session_start();
// Establishing Connection
include("connect.php");

// Collecting Values
$VoterID = $_POST['VoterID'];
$password = $_POST['password'];
$role = $_POST['role'];

// Query to check if user data exists in the database
$check = mysqli_query($connect, "SELECT * FROM user WHERE voter_id='$VoterID' AND password='$password' AND role='$role'");

if (mysqli_num_rows($check) > 0) {
    // Fetch user data and group data if login is successful
    $userdata = mysqli_fetch_array($check);
    $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");

    // Fix typo: correct function name to mysqli_fetch_all
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    // Store data in session
    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupsdata'] = $groupsdata;

    echo '
        <script>
        window.location = "../routes/dashboard.php";
        </script>
    ';
} else {
    echo '
        <script>
        alert("Invalid Credentials or User not found 😞");
        window.location = "../";
        </script>
    ';
}
?>