<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Initialize an empty array to store errors
    $errors = [];

    if (empty($name) || empty($password)) {
        $errors[] = "Username and password are required.";
    }

    if (empty($errors)) {
        // Retrieve user data from the database
        $sql = "SELECT id, name, password FROM users WHERE name=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->bind_result($id, $dbName, $dbPassword);
        $stmt->fetch();

        if (password_verify($password, $dbPassword)) {
            // Passwords match, user is authenticated
            $_SESSION["user_id"] = $id;
            // Redirect to a dashboard or user profile page
            header("Location: ../home/index.php");
            exit();
        } else {
            $errors[] = "Invalid username or password.";
        }

        $stmt->close();
    }

    // Close the database connection
    $conn->close();
}
?>
