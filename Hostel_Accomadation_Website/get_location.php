<?php
// Include database configuration
$servername = "localhost"; // Change this to your MySQL server name
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "accommodation"; // Change this to your database name
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get landlord ID from the request
$propertyId = $_GET['propertyId'];

// Fetch location URL from the database based on landlord ID
$sql = "SELECT location_url FROM properties WHERE propertyId  = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $landlordId);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($locationUrl);
    $stmt->fetch();
    echo $locationUrl;
} else {
    echo ""; // Return an empty string if location URL not found
}

// Close the database connection
$stmt->close();
$conn->close();
?>
