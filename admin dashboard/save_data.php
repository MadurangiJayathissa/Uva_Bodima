<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use prepared statements to prevent SQL injection
    $select_query = "SELECT * FROM `boarding_details` WHERE id = ?";
    $stmt = $conn->prepare($select_query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Define the folder path where you want to save the image
        $imageFolder = 'uploads/'; // Replace with the actual folder path

        // Assuming $row['boardingPictures'] contains the filename
        $imagePath = '../home/uploaded_img/' . $row['boardingPictures'];
        $newImagePath = $imageFolder . basename($row['boardingPictures']);

        // Check if the file exists in the destination folder
        if (!file_exists($newImagePath)) {
            // If the file does not exist in the destination folder, copy it
            if (copy($imagePath, $newImagePath)) {
                // Insert the data into another table (e.g., 'save_table') in PHPMyAdmin
                $insert_query = "INSERT INTO `save_table` (owner_name, boarding_address, gender, students_count, price, contact_number, boardingPictures) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($insert_query);
                $stmt->bind_param("sssiiss", $row['owner_name'], $row['boarding_address'], $row['gender'], $row['students_count'], $row['price'], $row['contact_number'], $row['boardingPictures']);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    // Data insertion was successful
                    echo "Data and image saved successfully!";
                } else {
                    // Data insertion failed
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "Error copying the image to the folder.";
            }
        } else {
            echo "Image already exists in the destination folder.";
        }
    } else {
        echo "No data found with the provided ID.";
    }
} else {
    echo "ID not provided.";
}

// Close the database connection
$conn->close();
?>

