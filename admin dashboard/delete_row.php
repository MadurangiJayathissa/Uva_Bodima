<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the ID of the row to delete
    $id = $_POST["id"];

    // Perform database connection and deletion operation here
    // Replace 'your_database_name', 'your_table_name', and 'your_id_column' with appropriate values
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "user_db";
    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL query to delete the row
    $sql = "DELETE FROM boarding_details WHERE id = $id";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the main page after successful deletion
        header("Location: details.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
