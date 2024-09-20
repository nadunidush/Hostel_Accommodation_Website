<?php

session_start();

// Check if the 'UName' session variable is set
if(isset($_SESSION['email']) && isset($_SESSION['landlordId'])) {
    $email = $_SESSION['email'];
    $landlordId = $_SESSION['landlordId'];
    
} else {
    
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accommodation";
$conn = new mysqli($servername, $username, $password, $dbname);

$query="select * from properties where landlordId = $landlordId";
$result= mysqli_query($conn,$query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
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
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
        }
        
        nav {
          background-color: #333;
          text-align: center;
          padding: 15px 0;
        }
        
        nav ul {
          list-style: none;
          margin: 0;
          padding: 0;
        }
        
        nav ul li {
          display: inline;
          margin: 0 10px;
        }
        
        nav ul li a {
          text-decoration: none;
          color: #fff;
          padding: 10px 20px;
          border-radius: 5px;
          transition: background-color 0.3s ease;
        }
        
        nav ul li a:hover {
          background-color: #555;
        }
        
        @media (max-width: 768px) {
          nav ul li {
            display: block;
            margin: 10px 0;
          }
        }
        .feature-products{
            padding: 0px 80px;
        }
        .feature-products h1{
            font-size: 30px;
            text-align: center;
        }
        .feature-products > p{
            text-align: center;
            margin-bottom: 40px;
        }
        .feature-products .fpimgs{
            position: relative;
            width: 22%;
            box-shadow: 20px 20px 35px rgba(0, 0, 0, 0.08);
            border: 1px solid #cce7d0;
            border-radius: 16px;
            padding: 10px;
            line-height: 25px;
        }
        .feature-products .fpimgs img{
            width: 100%;
            border-radius: 16px;
            cursor: pointer;
        }
        .feature-products .fpimgs h3{
            font-size: 20px;
        }
        .feature-products .fa-star{
            color:darkgoldenrod;
        }
        .allfpimgs{
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 17px;
            margin-top: 40px;
        }
        .feature-products .fa-cart-shopping{
            position: absolute;
            bottom: 10px;
            right: 10px;
            padding: 10px;
            color: #088178;
            border: 2px solid #cce7d0;
            border-radius: 40px;
            cursor: pointer;
        }
        .feature-products .fpimgs p,h3{
            line-height: 10px;
        }
        .roominfo{
            position: relative;
        }
        .roomPrice{
            position: absolute;
            top: -18px;
            left: 180px;
        }
        .mangbtn{
            text-decoration: none;
            color: black;
            padding: 5px 15px;
            margin: 0 33px 20px 0;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
        }
        .updatebtn{
            background:rgb(159, 159, 247) ;
        }
        .deletebtn{
            background: rgb(255, 135, 135);
        }
        .addAccoma{
            color: white;
            text-decoration: none;
        }
        .addAccom{
            font-size: 17px;
            font-weight: 600;
            background: black;
            border-radius: 4px;
            padding:6px 18px;
            margin:20px 0 0 80px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .addAccom:hover{
            transform: scale(1.1);
        }
      </style>
</head>
<body>
    <nav>
        <ul>
          <li><a href="landlorad.php">Properties</a></li>
          <li><a href="propertyManagement.php">Property Management</a></li>
          <li><a href="ReservationsHandling.php">Reservations Handling</a></li>
          <li><a href="#">Profile</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <h1 style="text-align:center; font-size: 30px;">Accommodations Management</h1>
    <button class="addAccom"><a href="addProperty.html" class="addAccoma">Add An Accommodation</a></button>
    <?php 
    if(isset($_SESSION['email'])) {
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
    
        // Retrieve landlord's email from session
        $email = $_SESSION['email'];
    
        // Fetch properties data belonging to the landlord's email from the database
        $sql_properties = "SELECT p.*, ls.email 
                    FROM properties p
                    JOIN landlord_signup ls ON p.landlordId = ls.landlordID
                    WHERE ls.email = ?";
        $stmt_properties = $conn->prepare($sql_properties);
        $stmt_properties->bind_param("s", $email); // Bind the email instead of landlordId
        $stmt_properties->execute();
        $result_properties = $stmt_properties->get_result();

    
        // Check if there are any properties
        if ($result_properties->num_rows > 0) {
            // Output the feature-products section
            echo '<section class="feature-products">';
            echo '<div class="allfpimgs">';
            
            while ($row = $result_properties->fetch_assoc()) {
                echo '<div class="fpimgs">';
                echo '<img src="uploads/' . $row['property_photo_filename'] . '" alt="Property Photo">'; // Assuming 'property_photo' column contains image URLs
                echo '<div class="roominfo">';
                echo '<h3>' . $row['property_name'] . '</h3>'; // Assuming 'property_name' column contains property names
                echo '<p class="roomPrice"><span style="color:#088178; font-weight: 700;">$' . $row['price_per_month'] . '</span></p>'; // Assuming 'price_per_month' column contains prices
                echo '<p>Number of beds ' . $row['num_beds'] . '</p>'; // Assuming 'num_beds' column contains number of beds
                echo '<p>Number of Students ' . $row['num_students'] . '</p>'; // Assuming 'num_students' column contains number of students
                //echo '<p>' . $row['status'] . '</p>'; // Assuming 'status' column contains property status (e.g., Pending)
                if (isset($row['propertyId'])) {
                    // Construct the update link with propertyId
                    echo '<a href="updateAccomodation.php?property_id=' . $row['propertyId'] . '" class="updatebtn mangbtn">Update</a>';
                } else {
                    // Display an error message if propertyId is missing
                    echo '<p class="error">Error: Property ID is missing.</p>';
                }
                if (isset($row['propertyId'])) {
                    echo '<a href="deleteAcom.php?property_id='. $row['propertyId'] .'" class="deletebtn mangbtn">Delete</a>';
                }
                else {
                    // Display an error message if propertyId is missing
                    echo '<p class="error">Error: Property ID is missing.</p>';
                }
                echo '</div>';
                echo '</div>';
            }
            
            echo '</div>';
            echo '</section>';
        } else {
            // Output a message if there are no properties belonging to the landlord
             
        }
    
        // Close the database connection
        $stmt_properties->close();
        $conn->close();
    } else {
        // Redirect the landlord to the login page if not logged in
        header("Location: login.html");
        exit(); // Terminate the script
    }
    ?>
    <!--
    <section class="feature-products">
        <h1>Accommadations Management</h1>
        <button class="addAccom"><a href="" class="addAccom">Add An Accommodation</a></button>
        <div class="allfpimgs">
            <div class="fpimgs">
                <img src="https://addalock.com/wp-content/uploads/2017/03/hotel-1330841_1920-1200x801.jpg" alt="">
                <div class="roominfo">
                    <h3>The palace</h3>
                    <p class="roomPrice"><span style="color:#088178; font-weight: 700;">$78</span></p>
                    <p>Number of bed 2</p>
                    <p>Number of Student 2</p>
                    <a href="updateAccomodation.html" class="updatebtn mangbtn" target="_blank">Update</a>
                    <a href="" class="deletebtn mangbtn">Delete</a>
                </div>
            </div>

            <div class="fpimgs">
                <img src="https://addalock.com/wp-content/uploads/2017/03/hotel-1330841_1920-1200x801.jpg" alt="">
                <div class="roominfo">
                    <h3>The palace</h3>
                    <p class="roomPrice"><span style="color:#088178; font-weight: 700;">$78</span></p>
                    <p>Number of bed 2</p>
                    <p>Number of Student 2</p>
                    <a href="" class="updatebtn mangbtn">Update</a>
                    <a href="" class="deletebtn mangbtn">Delete</a>
                </div>
            </div>

            <div class="fpimgs">
                <img src="https://addalock.com/wp-content/uploads/2017/03/hotel-1330841_1920-1200x801.jpg" alt="">
                <div class="roominfo">
                    <h3>The palace</h3>
                    <p class="roomPrice"><span style="color:#088178; font-weight: 700;">$78</span></p>
                    <p>Number of bed 2</p>
                    <p>Number of Student 2</p>
                    <a href="" class="updatebtn mangbtn">Update</a>
                    <a href="" class="deletebtn mangbtn">Delete</a>
                </div>
            </div>

            <div class="fpimgs">
                <img src="https://www.hickstead.co.uk/media/bnup1uvo/sandman-gatwick.jpg?crop=0.0024504343951881617,0.24756589784455824,0,0.037625251080032562&cropmode=percentage&width=976&height=464&rnd=133198069317200000" alt="">
                <div class="roominfo">
                    <h3>The palace</h3>
                    <p class="roomPrice"><span style="color:#088178; font-weight: 700;">$78</span></p>
                    <p>Number of bed 2</p>
                    <p>Number of Student 2</p>
                </div>
            </div>

            <div class="fpimgs">
                <img src="https://www.oyster.com/wp-content/uploads/sites/35/2019/05/queen-room-v17431504-1440.jpg" alt="">
                <div class="roominfo">
                    <h3>The palace</h3>
                    <p class="roomPrice"><span style="color:#088178; font-weight: 700;">$78</span></p>
                    <p>Number of bed 2</p>
                    <p>Number of Student 2</p>
                </div>
            </div>

            <div class="fpimgs">
                <img src="https://media-cdn.tripadvisor.com/media/photo-s/0a/64/a5/15/sandman-signature-london.jpg" alt="">
                <div class="roominfo">
                    <h3>The palace</h3>
                    <p class="roomPrice"><span style="color:#088178; font-weight: 700;">$78</span></p>
                    <p>Number of bed 2</p>
                    <p>Number of Student 2</p>
                </div>
            </div>
        </div>
    </section>
    -->
</body>
</html>