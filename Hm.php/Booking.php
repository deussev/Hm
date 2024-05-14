<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Reservation</title>
    <link rel="stylesheet" href="booking.css">
</head>
<body>
<div id="home">
        <a href="dashboard.php"><img src="home.png" title="Go to Home" id="homeimg"></a>
    </div>
    <div class="slideshow-container">
        <div class="content">
            <h2>Hotel Reservation</h2>
            <form id="bookingForm" action="submit_booking.php" method="post" onsubmit="return validateForm()">
                <label for="customerName">Customer Name:</label>
                <input type="text" id="customerName" name="customerName" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="checkInDate">Check-in Date:</label>
                <input type="date" id="checkInDate" name="checkInDate" required>

                <label for="checkOutDate">Check-out Date:</label>
                <input type="date" id="checkOutDate" name="checkOutDate" required>

                <label for="roomType">Room Type:</label>
                <select id="roomType" name="roomType" required>
                    <option value="standard">Standard</option>
                    <option value="deluxe">Deluxe</option>
                    <option value="suite">Suite</option>
                </select>

                <button type="submit">Reserve</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
