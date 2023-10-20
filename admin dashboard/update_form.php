<!-- update_form.php -->
<!DOCTYPE html>
<html>

<head>
  <title>Update Boarding Details</title>
</head>

<body>
  <h1>Update Boarding Details</h1>

  <?php
  // Check if the 'id' parameter is present in the URL
  if (isset($_GET['id'])) {
    // Get the ID of the row to update
    $id = $_GET['id'];

    // Perform database connection and query to retrieve the boarding details
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "user_db";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL query to retrieve the boarding details
    $sql = "SELECT * FROM boarding_details WHERE id = $id";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Fetch the boarding details as an associative array
    $boarding_details = mysqli_fetch_assoc($result);

    // Close the database connection
    mysqli_close($conn);
  ?>

    <form method="post" action="update_boarding.php"> <!-- Update form action -->
      <input type="hidden" name="id" value="<?php echo $boarding_details['id']; ?>">
      <label for="owner_name">Owner Name:</label>
      <input type="text" name="owner_name" value="<?php echo $boarding_details['owner_name']; ?>"><br>
        <label for="boarding_address">Boarding Address:</label>
        <input type="text" id="boarding_address" name="boardingAddress" value="<?php echo $boarding_details['boarding_address']; ?>"><br>
        <label for="gender">Girls or Boys:</label>
        <select id="gender" name="gender" required>
            <option value="<?php echo $boarding_details['gender']; ?>">Select</option><br>
            <option value="girls">Girls</option>
            <option value="boys">Boys</option>
        </select>
        <label for="students-count">Number of Students:</label>
        <input type="number" id="students-count" name="studentsCount" value="<?php echo $boarding_details['students_count']; ?>"><br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?php echo $boarding_details['price']; ?>"><br>
        <label for="contact-number">Contact Number:</label>
        <input type="tel" id="contact-number" name="contactNumber" value="<?php echo $boarding_details['contact_number']; ?>"><br>
      <input type="submit" value="Update Boarding">
    </form>

  <?php
  } else {
    echo "Invalid Request. Please go back and try again.";
  }
  ?>

</body>

</html>
