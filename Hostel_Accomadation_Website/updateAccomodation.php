<?php
session_start();

// Check if the 'email' session variable is set
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit(); // Terminate the script
}

// Check if property ID is provided in the URL
if (!isset($_GET['property_id'])) {
    // Redirect or display an error message
    exit("Property ID is missing.");
}

$property_id = $_GET['property_id'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accommodation";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch property details based on the property ID
$sql = "SELECT * FROM properties WHERE propertyId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $property_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the property exists
if ($result->num_rows > 0) {
    // Fetch property details
    $property = $result->fetch_assoc();
} else {
    // Property not found, redirect or display an error message
    exit("Property not found.");
}

// Close statement and connection
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Add A Accommodation</title>
    <style>

        
        /*Google fonts*/
        .poppins-thin {
        font-family: "Poppins", sans-serif;
        font-weight: 100;
        font-style: normal;
        }

        .poppins-extralight {
        font-family: "Poppins", sans-serif;
        font-weight: 200;
        font-style: normal;
        }

        .poppins-light {
        font-family: "Poppins", sans-serif;
        font-weight: 300;
        font-style: normal;
        }

        .poppins-regular {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: normal;
        }

        .poppins-medium {
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: normal;
        }

        .poppins-semibold {
        font-family: "Poppins", sans-serif;
        font-weight: 600;
        font-style: normal;
        }

        .poppins-bold {
        font-family: "Poppins", sans-serif;
        font-weight: 700;
        font-style: normal;
        }

        .poppins-extrabold {
        font-family: "Poppins", sans-serif;
        font-weight: 800;
        font-style: normal;
        }

        .poppins-black {
        font-family: "Poppins", sans-serif;
        font-weight: 900;
        font-style: normal;
        }

        .poppins-thin-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 100;
        font-style: italic;
        }

        .poppins-extralight-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 200;
        font-style: italic;
        }

        .poppins-light-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 300;
        font-style: italic;
        }

        .poppins-regular-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: italic;
        }

        .poppins-medium-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-style: italic;
        }

        .poppins-semibold-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 600;
        font-style: italic;
        }

        .poppins-bold-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 700;
        font-style: italic;
        }

        .poppins-extrabold-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 800;
        font-style: italic;
        }

        .poppins-black-italic {
        font-family: "Poppins", sans-serif;
        font-weight: 900;
        font-style: italic;
        }


        body {
          font-family: "Poppins", sans-serif;
          margin: 0;
          padding: 0;
          background-color: #f0f0f0;
        }
        
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
      </style>
</head>
<body>
  <div class="container">
      <h2>Update The Property</h2>
      <form action="updateAcom.php" method="post" enctype="multipart/form-data">
        <!-- Hidden input field for property ID -->
        <input type="hidden" id="property_id" name="property_id" value="<?php echo $_GET['property_id']; ?>">

          <div class="form-group">
              <label for="property-name">Property Name</label>
              <input type="text" id="property-name" name="property-name"  value="<?php echo $property['property_name']; ?>">
          </div>
          <div class="form-group">
              <label for="property-type">Property Type</label>
              <select id="property-type" name="property-type" value="<?php echo $property['property_type']; ?>">
                  <option value="">Select Property Type</option>
                  <option value="Apartment">Apartment</option>
                  <option value="House">House</option>
                  <option value="Condo">Condo</option>
                   
              </select>
          </div>
          <div class="form-group">
              <label for="num-students">Number of Students</label>
              <input type="number" id="num-students" name="num-students" value="<?php echo $property['num_students']; ?>">
          </div>
          <div class="form-group">
              <label for="num-beds">Number of Beds</label>
              <input type="number" id="num-beds" name="num-beds" value="<?php echo $property['num_beds']; ?>">
          </div>
          <div class="form-group">
              <label for="num-bathrooms">Number of Bathrooms</label>
              <input type="number" id="num-bathrooms" name="num-bathrooms" value="<?php echo $property['num_bathrooms']; ?>">
          </div>
          <div class="form-group">
              <label for="num-rooms">Number of Rooms</label>
              <input type="number" id="num-rooms" name="num-rooms" value="<?php echo $property['num_rooms']; ?>">
          </div>
          <div class="form-group">
              <label for="address">Address of the Property</label>
              <input type="text" id="address" name="address" value="<?php echo $property['address']; ?>">
          </div>
          <div class="form-group">
              <label for="location-url">Location URL</label>
              <input type="url" id="location-url" name="location-url" value="<?php echo $property['location_url']; ?>">
          </div>
          <div class="form-group">
              <label for="price-per-month">Per Month Price</label>
              <input type="number" id="price-per-month" name="price-per-month" value="<?php echo $property['price_per_month']; ?>">
          </div>
          <div class="form-group">
              <label for="property-photo">Property Photo</label>
              <input type="file" id="property-photo" name="property-photo" accept="image/*" value="<?php echo $property['property_photo']; ?>">
          </div>
          <div class="form-group">
              <label for="property-description">Property Description</label>
              <textarea id="property-description" name="property-description" rows="4" value="<?php echo $property['property_description']; ?>"></textarea>
          </div>
          <div class="form-group">
              <button type="submit">Add Property</button>
          </div>
      </form>
  </div>
</body>
</html>