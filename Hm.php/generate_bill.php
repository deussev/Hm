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
$reservation_id = $_POST['reservation_id'];
$total_amount = $_POST['total_amount'];
$issue_date = $_POST['issue_date'];
$due_date = $_POST['due_date'];

// Insert new invoice into the database
$sql = "INSERT INTO invoices (reservation_id, total_amount, issue_date, due_date)
        VALUES ($reservation_id, $total_amount, '$issue_date', '$due_date')";

if ($conn->query($sql) === TRUE) {
    echo "New invoice generated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
