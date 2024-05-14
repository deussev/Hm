<?php
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

// Process form data
$room_number = $_POST['room_number'];
$room_type = $_POST['room_type'];
$occupancy = $_POST['occupancy'];
$price_per_night = $_POST['price_per_night'];
$available = $_POST['available'];

// Insert new room into the database
$sql = "INSERT INTO rooms (room_number, room_type, occupancy, price_per_night, available)
        VALUES ($room_number, '$room_type', $occupancy, $price_per_night, $available)";

if ($conn->query($sql) === TRUE) {
    echo "New room added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
