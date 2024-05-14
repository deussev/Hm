<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BidaBest Hotel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            color: #333;
            overflow: hidden; /* Prevent background image overflow */
            margin: 0;
        }

        .slideshow-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Place behind other content */
            animation: slideshow 10s infinite;
            background-size: cover;
            background-position: center;
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.5em;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        @keyframes slideshow {
            0% {
                background-image: url('1.jpeg');
            }
            25% {
                background-image: url('2.jpeg');
            }
            50% {
                background-image: url('3.jpeg');
            }
            75% {
                background-image: url('4.jpeg');
            }
            100% {
                background-image: url('5.jpeg'); /* Loop back to first image */
            }
        }
    </style>
</head>
<body>
    <!-- Slideshow Container -->
    <div class="slideshow-container"></div>

    <!-- Form Content -->
    <div class="content">
        <h1>Enjoy and Feel at home here in BidaBest Hotel </h1>
        
        <?php
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate and sanitize input data
            $room_number = $_POST["room_number"];
            $room_type = $_POST["room_type"];
            $price_per_night = $_POST["price_per_night"];

            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "hotel_management";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare SQL statement to insert new room into database
            $sql = "INSERT INTO rooms (room_number, room_type, price_per_night, available)
                    VALUES (?, ?, ?, 1)"; // Set 'available' to 1 (available) by default

            // Prepare and bind parameters for the SQL statement
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $room_number, $room_type, $price_per_night);

            // Execute the prepared statement to insert new room
            if ($stmt->execute()) {
                // Room added successfully
                echo "<p>New room added successfully!</p>";
            } else {
                // Error occurred while adding room
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            // Close prepared statement and database connection
            $stmt->close();
            $conn->close();
        } else {
            // If the form was not submitted via POST method, redirect to the form page
            header("Location: add_room_form.php");
            exit;
        }
        ?>

        <!-- Button to navigate back to form page -->
        <a href="Booking.php" class="btn">Reservation</a>
        <a href="room_management.php" class="btn">Rooms</a>
        <a href="billing.php" class="btn">Room price</a>
    </div>
</body>
</html>
