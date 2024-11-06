<?php
session_start();
include("connect.php");

// Get vote and user data
$votes = $_POST['gvotes'];
$total_votes = $votes + 1;
$gid = $_POST['gid'];
$uid = $_SESSION['userdata']['id'];

// Check if the user has already voted
$user_check = mysqli_query($connect, "SELECT status FROM user WHERE id='$uid'");
$user_data = mysqli_fetch_assoc($user_check);

if ($user_data['status'] == 1) {
    echo '
    <script>
        alert("You have already voted.");
        window.location = "../routes/dashboard.php";
    </script>';
} else {
    // Proceed to update votes and user status
    $update_votes = mysqli_query($connect, "UPDATE user SET votes='$total_votes' WHERE id='$gid'");
    $update_user_status = mysqli_query($connect, "UPDATE user SET status=1 WHERE id='$uid'");

    if ($update_votes && $update_user_status) {
        $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
        $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

        $_SESSION['userdata']['status'] = 1; // Update session to show user has voted
        $_SESSION['groupsdata'] = $groupsdata;

        echo '
        <script>
            alert("Voted successfully.");
            window.location = "../routes/dashboard.php";
        </script>';
    } else {
        echo '
        <script>
            alert("An error occurred.");
            window.location = "../routes/dashboard.php";
        </script>';
    }
}
?>
