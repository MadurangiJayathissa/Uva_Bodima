<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boarding Details Form</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Heebo', sans-serif;
            background: #00B98E;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .payment-details {
            margin-top: 20px;
        }

        .payment-details p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Boarding Details Form</h1>
        <form id="boarding-form" method="post" action="proces_form.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="owner-name">Owner Name:</label>
                <input type="text" id="owner-name" name="ownerName" required>
            </div>
            <div class="form-group">
                <label for="boarding-address">Boarding Address:</label>
                <input type="text" id="boarding-address" name="boardingAddress" required>
            </div>
            <div class="form-group">
                <label for="gender">Girls or Boys:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select</option>
                    <option value="girls">Girls</option>
                    <option value="boys">Boys</option>
                </select>
            </div>
            <div class="form-group">
                <label for="students-count">Number of Students:</label>
                <input type="number" id="students-count" name="studentsCount" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="contact-number">Contact Number:</label>
                <input type="tel" id="contact-number" name="contactNumber" required>
            </div>
            <div class="form-group">
                <label for="boarding-pictures">Boarding Pictures:</label>
                <input type="file" id="boarding-pictures" name="boardingPictures" accept=".jpg, .jpeg, .png" >
            </div>
            <div class="form-group">
                <label for="payment-photo">Payment Clip Photo:</label>
                <input type="file" id="payment-photo" name="payment" accept=".jpg, .jpeg, .png">
            </div>
            <div class="payment-details">
                <p><b>Payment Details</b></p>
                <p>
                    Bank: BOC<br>
                    Account Number: 123456789<br>
                    Account Name: Uva Bodima<br>
                    Payment Amount: 200 LKR
                </p>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
