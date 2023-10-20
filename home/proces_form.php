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

// ... Your previous code ...

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $ownerName = $_POST["ownerName"];
    $boardingAddress = $_POST["boardingAddress"];
    $gender = $_POST["gender"];
    $studentsCount = $_POST["studentsCount"];
    $price = $_POST["price"];
    $contactNumber = $_POST["contactNumber"];

    // Check if the file was uploaded successfully
    if (isset($_FILES['boardingPictures']) && $_FILES['boardingPictures']['error'] === UPLOAD_ERR_OK) {
        $boardingPictures = $_FILES['boardingPictures']['name'];
        $boardingPictures_temp = $_FILES['boardingPictures']['tmp_name'];  // Temporary file path
        $boardingPictures_folder = 'uploaded_img/' . $boardingPictures;

        // Move the uploaded file to the desired location
        if (move_uploaded_file($boardingPictures_temp, $boardingPictures_folder)) {
            echo "Boarding pictures uploaded and stored successfully!";
        } else {
            echo "Error uploading and storing boarding pictures.";
        }
    } else {
        // Handle the case where the file upload failed
        // You might want to display an error message to the user
        $boardingPictures = null;
        $boardingPictures_folder = null;
    }

    // Prepare the SQL statement with placeholders
    if ($boardingPictures === null) {
        // Bind parameters to the prepared statement excluding the boardingPictures
        $stmt = $conn->prepare("INSERT INTO boarding_details (owner_name, boarding_address, gender, students_count, price, contact_number) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisd", $ownerName, $boardingAddress, $gender, $studentsCount, $price, $contactNumber);
    } else {
        // Bind parameters to the prepared statement with boardingPictures
        $stmt = $conn->prepare("INSERT INTO boarding_details (owner_name, boarding_address, gender, students_count, price, contact_number, boardingPictures) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisds", $ownerName, $boardingAddress, $gender, $studentsCount, $price, $contactNumber, $boardingPictures);
    }

        // Check if the file was uploaded successfully
        if (isset($_FILES['payment']) && $_FILES['payment']['error'] === UPLOAD_ERR_OK) {
            $payment = $_FILES['payment']['name'];
            $payment_temp = $_FILES['payment']['tmp_name'];  // Temporary file path
            $payment_folder = 'uploaded_img/' . $payment;
    
            // Move the uploaded file to the desired location
            if (move_uploaded_file($payment_temp, $payment_folder)) {
                echo "Payment pictures uploaded and stored successfully!";
            } else {
                echo "Error uploading and storing Payment pictures.";
            }
        } else {
            // Handle the case where the file upload failed
            // You might want to display an error message to the user
            $payment = null;
            $payment = null;
        }
    
        // Prepare the SQL statement with placeholders
        if ($payment === null) {
            // Bind parameters to the prepared statement excluding the boardingPictures
            $stmt = $conn->prepare("INSERT INTO boarding_details (owner_name, boarding_address, gender, students_count, price, contact_number) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssisd", $ownerName, $boardingAddress, $gender, $studentsCount, $price, $contactNumber);
        } else {
            // Bind parameters to the prepared statement with boardingPictures
            $stmt = $conn->prepare("INSERT INTO boarding_details (owner_name, boarding_address, gender, students_count, price, contact_number, boardingPictures, payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssisdss", $ownerName, $boardingAddress, $gender, $studentsCount, $price, $contactNumber, $boardingPictures, $payment);
        }

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Boarding details inserted successfully!";
    } else {
        // Check if the error is due to null value in boardingPictures column
        if (strpos($stmt->error, "Column 'boardingPictures' cannot be null") !== false) {
            echo "Error: Boarding pictures were not uploaded.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close the statement
    $stmt->close();
}

?>
