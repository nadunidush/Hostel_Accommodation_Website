<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['landlordId'])) {
        $landlordId = $_SESSION['landlordId'];
        
        // Check if property-id is set in the POST data
        if(isset($_POST['property_id'])) {
            $property_id = intval($_POST['property_id']);
        } else {
            echo "Property ID is missing.";
            exit();
        }
        
        // Retrieve other form data
        $property_name = htmlspecialchars($_POST['property-name']);
        $property_type = htmlspecialchars($_POST['property-type']);
        $num_students = intval($_POST['num-students']);
        $num_beds = intval($_POST['num-beds']);
        $num_bathrooms = intval($_POST['num-bathrooms']);
        $num_rooms = intval($_POST['num-rooms']);
        $address = htmlspecialchars($_POST['address']);
        $location_url = htmlspecialchars($_POST['location-url']);
        $price_per_month = floatval($_POST['price-per-month']);
        $property_photo_filename = ''; // Placeholder for the photo filename
        
        // Check if a new photo file has been uploaded
        if(isset($_FILES['property-photo']) && $_FILES['property-photo']['error'] === UPLOAD_ERR_OK) {
            $upload_dir = 'uploads/';
            $temp_file = $_FILES['property-photo']['tmp_name'];
            $new_filename = uniqid('property_photo_') . '.' . pathinfo($_FILES['property-photo']['name'], PATHINFO_EXTENSION);
            $target_file = $upload_dir . $new_filename;

            // Move the uploaded file to the uploads directory
            if(move_uploaded_file($temp_file, $target_file)) {
                $property_photo_filename = $new_filename;
            } else {
                echo "Failed to upload property photo.";
                exit();
            }
        }
        
        // Database connection and update query
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "accommodation";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to update property details
        $sql = "UPDATE properties SET property_name=?, property_type=?, num_students=?, num_beds=?, num_bathrooms=?, num_rooms=?, address=?, location_url=?, price_per_month=?, property_photo_filename=? WHERE landlordId=? AND propertyId=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiiiissisii", $property_name, $property_type, $num_students, $num_beds, $num_bathrooms, $num_rooms, $address, $location_url, $price_per_month, $property_photo_filename, $landlordId, $property_id);

        // Execute the update statement
        if ($stmt->execute()) {
            echo "Property updated successfully.";
            // Redirect to property management page
            header("Location: propertyManagement.php");
            exit();
        } else {
            echo "Error updating property: " . $conn->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        // Redirect if not logged in
        header("Location: login.html");
        exit();
    }
}
 
 
/*
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['landlordId'])) {
        $landlordId = $_SESSION['landlordId'];
        // Check if property-id is set in the POST data
        if(isset($_POST['property_id'])) {
            $property_id = intval($_POST['property_id']);
        } else {
            echo "Property ID is missing.";
            exit();
        }
        
        // Check if property-name is set in the POST data
        if(isset($_POST['property-name'])) {
            $property_name = htmlspecialchars($_POST['property-name']);
        } else {
            echo "Property name is missing.";
            exit();
        }

        // Retrieve other form data similarly...

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "accommodation";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to update property details
        $sql = "UPDATE properties SET property_name=?, property_type=?, num_students=?, num_beds=?, num_bathrooms=?, num_rooms=?, address=?, location_url=?, price_per_month=?, property_photo_filename=?, property_photo=?, property_description=? WHERE landlordId=? AND propertyId=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiiiissisbsii", $property_name, $property_type, $num_students, $num_beds, $num_bathrooms, $num_rooms, $address, $location_url, $price_per_month, $property_photo_filename, $property_photo, $property_description, $landlordId, $property_id);

        // Execute the update statement
        if ($stmt->execute()) {
            echo "Property updated successfully.";
            // Redirect to property management page
            header("Location: propertyManagement.php");
            exit();
        } else {
            echo "Error updating property: " . $conn->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        // Redirect if not logged in
        header("Location: login.html");
        exit();
    }
}
*/
?>
