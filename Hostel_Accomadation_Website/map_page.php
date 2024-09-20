<?php
// Retrieve propertyId and landlordId from the URL parameters
$propertyId = $_GET['propertyId'];
$landlordId = $_GET['landlordId'];

// Now you can use these IDs to fetch necessary data from your database
// For demonstration purpose, let's assume you have a MySQL database and you want to fetch the location URL from it
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accommodation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch the location URL from the properties table based on the propertyId
$sql = "SELECT location_url FROM properties WHERE propertyId = $propertyId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  $row = $result->fetch_assoc();
  $locationUrl = $row["location_url"];
} else {
  $locationUrl = "Location not found";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map Page</title>
</head>
<body>
    <!-- Display the embedded map using the location URL -->
    <iframe width="1200" height="500" frameborder="0" style="border:0" src="<?php echo $locationUrl; ?>" allowfullscreen></iframe>
</body>
</html>
