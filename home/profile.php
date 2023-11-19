<?php
session_start();
include "config.php";

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    // Retrieve user information from the database
    $query_show_emp = "SELECT * FROM users WHERE id = $user_id";
    $result_show_emp = mysqli_query($conn, $query_show_emp);

    if ($result_show_emp && mysqli_num_rows($result_show_emp) > 0) {
        $user_data = mysqli_fetch_assoc($result_show_emp);
        $user_name = $user_data['name'];
        $user_email = $user_data['email'];
    } else {
        // Handle the case where user data is not found
        echo "User not found.";
    }
} else {
    // Handle the case where the user is not logged in
    echo "You are not logged in.";
    // You can add a login link here if needed.
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
    <div class="profile-container">
        <?php
        if (isset($user_name)) {
            // The user is logged in, so we can display their profile
            echo "Welcome, $user_name";
            echo "<br>Name: $user_name";
            echo "<br>Email: $user_email";
            echo "<br><a href='update_profile.php'>Update Profile</a>";
            echo "<br><a href='logout.php'>Logout</a>";
        }
        ?>
    </div>
</body>
</html>


