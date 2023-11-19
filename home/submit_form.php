<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Form Submission</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .success-message {
            color: #4caf50;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .error-message {
            color: #e74c3c;
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <?php
    // Establish database connection (replace these variables with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert data into the database
    $sql = "INSERT INTO contact_us (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo 'Form submitted successfully!</p></br>
        <div class="back-to-home">
            <a href="index.php">Back to Home</a>
        </div>
    <p class="success-message">';
    } else {
        echo ' 
<p class="error-message">Error: ' . $sql . '<br>' . $conn->error . '</p>';
    }


    // Close the database connection
    $conn->close();
    ?>

</body>

</html>

