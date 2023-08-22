<?php
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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $ownerName = $_POST["ownerName"];
    $boardingAddress = $_POST["boardingAddress"];
    $gender = $_POST["gender"];
    $studentsCount = $_POST["studentsCount"];
    $price = $_POST["price"];
    $contactNumber = $_POST["contactNumber"];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO boarding_details (owner_name, boarding_address, gender, students_count, price, contact_number ) VALUES (?, ?, ?, ?, ?, ?)");
    
    //Bind parameters to the prepared statement
    $stmt->bind_param("sssids", $ownerName, $boardingAddress, $gender, $studentsCount, $price, $contactNumber );

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Boarding details inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
