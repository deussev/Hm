<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Room</title>
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
        h2 {
            text-align: center;
            color: #000;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Add New Room</h2>
    <form id="addRoomForm" action="added_room.php" method="post">
        <label for="room_number">Room Number:</label>
        <select id="room_number" name="room_number" required>
            <option value="101">101</option>
            <option value="102">102</option>
            <option value="201">201</option>
            <option value="202">202</option>
        </select><br>

        <label for="room_type">Room Type:</label>
        <select id="room_type" name="room_type" required>
            <option value="Standard Single">Standard Single</option>
            <option value="Standard Double">Standard Double</option>
            <option value="Deluxe Single">Deluxe Single</option>
            <option value="Deluxe Double">Deluxe Double</option>
        </select><br>

        <label for="price_per_night">Price per Night ($):</label>
        <input type="number" id="price_per_night" name="price_per_night" step="0.01" required readonly><br>

        <input type="submit" value="Add Room">
    </form>

    <script>
        // Define room type prices (can be fetched from database in real application)
        const roomPrices = {
            'Standard Single': 80.00,
            'Standard Double': 120.00,
            'Deluxe Single': 120.00,
            'Deluxe Double': 180.00
        };

        // Function to update price based on selected room type
        document.getElementById('room_type').addEventListener('change', function() {
            const selectedRoomType = this.value;
            const priceInput = document.getElementById('price_per_night');
            priceInput.value = roomPrices[selectedRoomType].toFixed(2); // Set price with 2 decimal places
        });
    </script>
</body>
</html>
