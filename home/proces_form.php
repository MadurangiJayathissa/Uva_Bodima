<?php
$conn = mysqli_connect('localhost','root','','user_db');
// Database connection parameters
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

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

    // Perform data validation if needed

    // Insert data into the database
    $sql = "INSERT INTO boarding_details (owner_name, boarding_address, gender, students_count, price, contact_number)
            VALUES ('$ownerName', '$boardingAddress', '$gender', $studentsCount, $price, '$contactNumber')";

    if ($conn->query($sql) === TRUE) {
        echo "Boarding details inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
