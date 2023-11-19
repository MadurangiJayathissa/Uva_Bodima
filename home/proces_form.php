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

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $ownerName = $_POST["ownerName"];
    $boardingAddress = $_POST["boardingAddress"];
    $gender = $_POST["gender"];
    $homeTypes = $_POST["Home_Types"];
    $bathroomTypes = $_POST["Bathroom_Types"];
    $studentsCount = $_POST["studentsCount"];
    $price = $_POST["price"];
    $kPrice = $_POST["K_price"];
    $contactNumber = $_POST["contactNumber"];

    // Check if the file was uploaded successfully for boardingPictures
    if (isset($_FILES['boardingPictures']) && $_FILES['boardingPictures']['error'] === UPLOAD_ERR_OK) {
        $boardingPictures = $_FILES['boardingPictures']['name'];
        $boardingPictures_temp = $_FILES['boardingPictures']['tmp_name'];  // Temporary file path
        $boardingPictures_folder = 'uploaded_img/' . $boardingPictures;

        // Move the uploaded file to the desired location
        if (move_uploaded_file($boardingPictures_temp, $boardingPictures_folder)) {
            echo "";
        } else {
            echo "Error uploading and storing boarding pictures.";
        }
    } else {
        // Handle the case where the file upload failed
        $boardingPictures = null;
    }

    // Check if the file was uploaded successfully for payment
    if (isset($_FILES['payment']) && $_FILES['payment']['error'] === UPLOAD_ERR_OK) {
        $payment = $_FILES['payment']['name'];
        $payment_temp = $_FILES['payment']['tmp_name'];  // Temporary file path
        $payment_folder = 'uploaded_img/' . $payment;

        // Move the uploaded file to the desired location
        if (move_uploaded_file($payment_temp, $payment_folder)) {
            echo "";
        } else {
            echo "Error uploading and storing Payment pictures.";
        }
    } else {
        // Handle the case where the file upload failed
        $payment = null;
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO boarding_details (owner_name, boarding_address, gender, home_types, bathroom_types, students_count, price, 
        k_price, contact_number, boardingPictures, payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters to the prepared statement
    $stmt->bind_param("sssssssssss", $ownerName, $boardingAddress, $gender, $homeTypes, $bathroomTypes, $studentsCount, $price, $kPrice, $contactNumber, $boardingPictures, $payment);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo '<div class="success-box"><div class="success-message">Boarding details inserted successfully!<div class="checkmark">&#10004;</div></div></div>';
    } else {
        // Handle the error
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<script>
function goToAdminHomePage() {
    // Redirect to the admin home page
    window.location.href = 'index.php'; // Replace 'admin_home.php' with the actual path to your admin home page
}
</script>
