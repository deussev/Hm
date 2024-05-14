<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'hotel_management';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into HotelRoom table
$sqlHotelRoom = "INSERT INTO HotelRoom (roomNumber, price) VALUES (101, 80)";
$conn->query($sqlHotelRoom);

// Insert data into SuiteRoom table
$sqlSuiteRoom = "INSERT INTO SuiteRoom (roomNumber, price, amenities) VALUES (201, 150, 'King-size bed, Jacuzzi, Ocean view')";
$conn->query($sqlSuiteRoom);

echo "Data inserted successfully";

// Close connection
$conn->close();
?>
