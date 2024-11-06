<?php 
// Including the database connection file
include("connect.php");

// Getting the form data
$name = $_POST['name'];
$VoterID = $_POST['VoterID'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$address = $_POST['address'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

// Check if voter_id already exists
$check_query = mysqli_query($connect, "SELECT * FROM user WHERE voter_id = '$VoterID'");

if (mysqli_num_rows($check_query) > 0) {
    // If voter_id exists, display an alert and redirect to the login page
    echo '
      <script>
      alert("Data already exists, please login.");
      window.location = "../api/login.php";
      </script>
    ';
} else {
    // Proceed only if the passwords match
    if ($password == $confirm_password) {
        // Move uploaded image to the uploads folder
        move_uploaded_file($tmp_name, "../uploads/$image");

        // Insert data into the database
        $insert = mysqli_query($connect, "INSERT INTO user (name, voter_id, password, address, photo, role, status, votes) VALUES ('$name', '$VoterID', '$password', '$address', '$image', '$role', 0, 0)");

        if ($insert) {
            echo '
              <script>
              alert("Registration Successful 😊");
              window.location = "../";
              </script>
            ';
        } else {
            echo '
              <script>
              alert("Oops! Some error occurred 😞");
              window.location = "../routes/register.php";
              </script>
            ';
        }
    } else {
        // If passwords don't match, show an alert
        echo '
          <script>
          alert("Password and Confirm password do not match 😞");
          window.location = "../routes/register.php";
          </script>
        ';
    }
}
?>
