<?php
session_start();

if(isset($_POST['update'])){
    // Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    include 'config.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Update the user's information in the database
    $update_query = "UPDATE user_form SET name = '$name', email = '$email' WHERE user_type = 'user' AND name = '$_SESSION[user_name]'";
    
    if(mysqli_query($conn, $update_query)){
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        header('Location: index.php');
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
