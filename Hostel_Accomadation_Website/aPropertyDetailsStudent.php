<?php
// Include database configuration
$servername = "localhost"; // Change this to your MySQL server name
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "accommodation"; // Change this to your database name

// Check if property ID is provided in the URL
if(isset($_GET['id'])) {
    $propertyId = $_GET['id'];
    
    // Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to fetch property details
    $sql = "SELECT p.*, l.fullname, l.phone, l.email
            FROM properties p
            INNER JOIN landlord_signup l ON p.landlordId = l.landlordId
            WHERE p.propertyId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $propertyId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Property details found, display them
        $row = $result->fetch_assoc();
        $propertyName = $row['property_name'];
        $propertyPrice = $row['price_per_month'];
        $landlordName = $row['fullname']; // Assuming you have a column named landlord_name in your properties table
        $contactNumber = $row['phone']; // Assuming you have a column named contact_number in your properties table
        $email = $row['email']; // Assuming you have a column named email in your properties table
        $location = $row['location_url'];

        // You can retrieve and display other property details similarly
    } else {
        // No property found with the provided ID
        $errorMessage = "Property not found.";
    }

    // Close the database connection
    $conn->close();
} else {
    // Property ID is not provided in the URL
    $errorMessage = "Property ID is missing.";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Property Details</title>
    <style> 
        body{
            font-family: "Poppins", sans-serif;
            padding: 20px 40px;
        }
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

        h1{
            text-align: center;
        }
        .img-property-details{
            width: 500px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        p{
            text-align: justify;
        }
        table th{
            text-align: left;
        }

        .moreDetailsBtn{
            padding: 7px 16px;
            background-color: black;
            outline: none;
            border: none;
            border-radius: 5px;
            margin-left:0px ;
            transition: all ease-in-out .3s;
        }
        .moreDetailsBtn a{
            font-size: 16px;
            color: white;
            text-decoration: none;
        }
        .moreDetailsBtn:hover{
            background-color: white;
            border: 1px solid black;
            color: black;
        }
        .moreDetailsBtn a:hover{
            color: black;
        }
        .reserveBtn{
            background-color:purple;
        }
        .reserveBtn:hover{
            background-color: white;
            border: 1px solid purple;
        }
        .propertyMap{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
</head>
<body>
<h1><?php echo isset($errorMessage) ? $errorMessage : $propertyName; ?></h1>
<?php if(!isset($errorMessage)) : ?>
    <img src="uploads/<?php echo $row['property_photo_filename']; ?>" class="img-property-details" alt="">
    <p><?php echo $row['property_description']; ?></p>
    <button class="moreDetailsBtn reserveBtn"><a href="">Reserve</a></button>
    <h2>Information</h2>
    <div class="property-info">
        <table>
            <tr>
                <th>Landlord Name:</th>
                <td><?php echo $landlordName; ?></td>
            </tr>
            <tr>
                <th>Property Price:</th>
                <td><?php echo $propertyPrice; ?></td>
            </tr>
            <tr>
                <th>Contact Number:</th>
                <td><?php echo $contactNumber; ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo $email; ?></td>
            </tr>
        </table>
    </div>
    <h1>Property Map</h1>
    <?php
    // Fetch the location URL from the database
    $location = $row['location_url'];

    // Check if $location is not empty
    if (!empty($location)) :
        // Embed the location URL into the iframe src attribute
        $iframeSrc = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.834426268452!2d79.84613487350725!3d6.91039221854953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25963a3454407%3A0xc8db851055016fba!2sGranbell%20Hotel%20Colombo!5e0!3m2!1sen!2slk!4v1709607821621!5m2!1sen!2slk&location=" . urlencode($location);
    ?>
    <iframe class="propertyMap" src="<?php echo $iframeSrc; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <?php endif; ?>
<?php endif; ?>


</body>
</html>