<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('2.jpeg');
            background-size: cover;
            background-position: center;
            color: #333;
            padding: 20px;
            margin: 0;
            height: 100vh; /* Ensure full viewport height */
            position: relative; /* Set position relative for overlay */
        }

        .content {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
        }

        h2, h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            border-radius: 8px;
        }

        form label {
            display: block;
            margin-bottom: 8px;
        }

        form input, form select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            text-align: center;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .room-image {
            max-width: 150px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h2>Room Management</h2>
    <div id="home">
        <a href="dashboard.php"><img src="image/home.png" title="Go to Home" id="homeimg"></a>
    </div>

    <div class="content">
        <!-- Display existing rooms -->
        <h3>Available Rooms:</h3>
        <table>
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Price per Night ($)</th>
                    <th>Status</th>
                    <th>Room Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "hotel_management";

                $conn = new mysqli($servername, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch existing rooms
                $sql = "SELECT * FROM rooms";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['room_number']}</td>";
                        echo "<td>{$row['room_type']}</td>";
                        echo "<td>{$row['price_per_night']}</td>";
                        echo "<td>" . ($row['available'] ? 'Available' : 'Reserved') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No rooms found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
        <a href="reservenewroom.php" class="btn">Reserve Room</a>

    </div>
</body>
</html>
