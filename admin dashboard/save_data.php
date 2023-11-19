<style>
.success-box {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.success-message {
    background-color: #4CAF50; /* Green background color */
    color: #fff; /* White text color */
    padding: 20px; /* Add some padding to the message */
    border-radius: 5px; /* Rounded corners */
    text-align: center; /* Center-align the text */
    font-size: 25;
}
.checkmark {
    position: relative;
    top: 50%; /* Align the top of the checkmark to the vertical center of the box */
    left: 50%; /* Align the left of the checkmark to the horizontal center of the box */
    transform: translate(-50%, -50%); /* Center the checkmark within the box */
    font-size: 60px; /* Adjust the checkmark size */
    margin-top: 70px; /* Add some space between the message and the checkmark */
    border: 2px solid #fff; /* Green border for the circle */
    border-radius: 50%; /* Make it a circle */
    width: 80px; /* Adjust the circle size */
    height: 80px; /* Adjust the circle size */
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>


<?php
echo '<div style="position: absolute; top: 10px; right: 10px;">';
echo '<button type="button" class="btn btn-success" onclick="goToAdminHomePage()">Dashboard</button>';
echo '</div>';
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
                $insert_query = "INSERT INTO `save_table` (owner_name, boarding_address, gender, home_types, bathroom_types, students_count, price, k_price, contact_number, boardingPictures) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($insert_query);
                $stmt->bind_param("ssssssssss", $row['owner_name'], $row['boarding_address'], $row['gender'], $row['home_types'], $row['bathroom_types'], $row['students_count'], $row['price'], $row['k_price'], $row['contact_number'], $row['boardingPictures']);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    // Data insertion was successful
                    echo '<div class="success-box"><div class="success-message">Details saved successfully!<div class="checkmark">&#10004;</div></div></div>';
                } else {
                    // Data insertion failed
                    echo "Error: " . $stmt->error;
                }
            } else {
                echo "Error copying the image to the folder.";
            }
        } else {
            // Add a debugging statement to see the paths
            echo "Debug: Image already exists - Existing: $newImagePath, Source: $imagePath";
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

<script>
function goToAdminHomePage() {
    // Redirect to the admin home page
    window.location.href = 'payments.php'; // Replace 'admin_home.php' with the actual path to your admin home page
}
</script>

