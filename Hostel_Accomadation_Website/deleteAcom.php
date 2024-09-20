<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['landlordId'])) {
    header("Location: login.html");
    exit();
}

// Check if property ID is provided
if (!isset($_GET['property_id'])) {
    echo "Property ID is missing.";
    exit();
}

// Get the property ID from the request
$property_id = intval($_GET['property_id']);

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accommodation";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL delete statement
$sql = "DELETE FROM properties WHERE propertyId = ? AND landlordId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $property_id, $_SESSION['landlordId']);

if ($stmt->execute()) {
    // Deletion successful
    header("Location: propertyManagement.php");
} else {
    // Deletion failed
    echo "Error deleting property: " . $conn->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
