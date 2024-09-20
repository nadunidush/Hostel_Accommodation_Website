<?php
// Include database configuration
$servername = "localhost"; // Change this to your MySQL server name
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "accommodation"; // Change this to your database name

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve reservation ID and status from AJAX request
$reservationId = $_POST['reservationId'];
$status = $_POST['status'];

// Update status in the database
$sql = "UPDATE reservations SET reservation_status = ? WHERE reservationId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $status, $reservationId);
if ($stmt->execute()) {
    echo "Status updated successfully";
} else {
    echo "Error updating status: " . $stmt->error;
}

// Close the database connection
$stmt->close();
$conn->close();
?>
