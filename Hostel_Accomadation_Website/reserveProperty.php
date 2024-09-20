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

// Check if the propertyId is set in the POST request
if(isset($_POST['propertyId'])) {
    $propertyId = $_POST['propertyId'];
    
    // Assuming you have a table named 'reservations' with the appropriate columns
    $sql = "INSERT INTO reservations (studentId, propertyId, move_in_date, reservation_time, reservation_status) 
            VALUES (
                (SELECT studentId FROM students WHERE studentId = ?), 
                (SELECT propertyId FROM properties WHERE propertyId = ?), 
                CURRENT_DATE(), 
                CURRENT_TIME(), 
                'due'
            )
    ";
    
    $stmt = $conn->prepare($sql);
    // Assuming studentId and propertyId are integers
    $stmt->bind_param("ii", $studentId, $propertyId); 

    // Assuming you have studentId available in your context, replace it with the actual studentId value
    $studentId = $_POST['studentId']; 
    
    if ($stmt->execute()) {
        echo "Reservation successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
} else {
    echo "Property ID not provided";
}

// Close the database connection
$conn->close();
?>
