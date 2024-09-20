<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['landlordId'])) {
        $landlordId = $_SESSION['landlordId'];
        $property_name = htmlspecialchars($_POST['property-name']);
        $property_type = htmlspecialchars($_POST['property-type']);
        $num_students = intval($_POST['num-students']);
        $num_beds = intval($_POST['num-beds']);
        $num_bathrooms = intval($_POST['num-bathrooms']);
        $num_rooms = intval($_POST['num-rooms']);
        $address = htmlspecialchars($_POST['address']);
        $location_url = htmlspecialchars($_POST['location-url']);
        $price_per_month = floatval($_POST['price-per-month']);
        $property_photo_filename = basename($_FILES["property-photo"]["name"]);
        $property_photo_tmp = $_FILES['property-photo']['tmp_name'];
        $property_description = htmlspecialchars($_POST['property-description']);

        if (empty($property_name) || empty($property_type) || empty($address) || empty($price_per_month) || empty($property_photo_filename) || empty($property_description)) {
            die("Please fill in all required fields.");
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "accommodation";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO properties (landlordId, property_name, property_type, num_students, num_beds, num_bathrooms, num_rooms, address, location_url, price_per_month, property_photo_filename, property_photo, property_description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isiiiissisbss", $landlordId, $property_name, $property_type, $num_students, $num_beds, $num_bathrooms, $num_rooms, $address, $location_url, $price_per_month, $property_photo_filename, $property_photo, $property_description);

        if ($_FILES["property-photo"]["size"] == 0) {
            echo "Please select a file.";
            exit();
        }

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["property-photo"]["name"]);

        if (move_uploaded_file($_FILES["property-photo"]["tmp_name"], $target_file)) {
            $property_photo = file_get_contents($target_file);

            // Bind the property_photo_filename to the prepared statement
            $stmt->bind_param("issiiiissisbs", $landlordId, $property_name, $property_type, $num_students, $num_beds, $num_bathrooms, $num_rooms, $address, $location_url, $price_per_month, $property_photo_filename, $property_photo, $property_description);

            if ($stmt->execute()) {
                echo "Property added successfully.";
                header("Location: propertyManagement.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Failed to upload file.";
        }

        $stmt->close();
        $conn->close();
    } else {
        header("Location: addProperty.html");
        exit();
    }
}
?>
