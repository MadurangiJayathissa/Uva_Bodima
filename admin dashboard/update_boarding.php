<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get the updated data from the form
  $id = $_POST["id"];
  $owner_name = $_POST["owner_name"];
  $boarding_address = $_POST["boardingAddress"];
  $gender = $_POST["gender"];
  $students_count = $_POST["studentsCount"];
  $price = $_POST["price"];
  $contact_number = $_POST["contactNumber"];

  // Database connection details
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "user_db";

  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare the SQL query to update the boarding details
  $sql = "UPDATE boarding_details SET 
              owner_name = '$owner_name',
              boarding_address = '$boarding_address',
              gender = '$gender',
              students_count = $students_count,
              price = $price,
              contact_number = '$contact_number'
          WHERE id = $id";

  // Execute the query
  if (mysqli_query($conn, $sql)) {
    // Redirect back to the main page after successful update
    header("Location: details.php");
    exit();
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
