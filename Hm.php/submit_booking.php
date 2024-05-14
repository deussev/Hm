<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customerName = $_POST["customerName"];
    $email = $_POST["email"];
    $checkInDate = $_POST["checkInDate"];
    $checkOutDate = $_POST["checkOutDate"];
    $roomType = $_POST["roomType"];

    // Database connection (replace with your database credentials)
    $host = 'localhost';
    $dbname = 'hotel_management';
    $username = 'root';
    $password = '';

    try {
        // Create a new PDO instance
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement for inserting booking details
        $sql = "INSERT INTO bookings (customer_name, email, check_in_date, check_out_date, room_type) 
                VALUES (:customerName, :email, :checkInDate, :checkOutDate, :roomType)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters and execute the statement
        $stmt->bindParam(':customerName', $customerName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':checkInDate', $checkInDate);
        $stmt->bindParam(':checkOutDate', $checkOutDate);
        $stmt->bindParam(':roomType', $roomType);

        // Execute the prepared statement
        $stmt->execute();

        // Redirect to success page (BookedSuccessful.php)
        header("Location: bookedSuccessful.php");
        exit(); // Ensure no further output is sent to the browser after redirection

    } catch (PDOException $e) {
        // Handle database connection or query errors
        echo "Error: " . $e->getMessage();
    } finally {
        // Close database connection
        $pdo = null;
    }
} else {
    // Redirect to booking page if accessed directly
    header("Location: Booking.php");
    exit();
}
?>
