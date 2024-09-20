<?php
session_start();

// Check if the student is logged in
if (!isset($_SESSION['studentId'])) {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}

$studentId = $_SESSION['studentId'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>All Properties</title>
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

 
        body {
          font-family: "Poppins", sans-serif;
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
        .moreDetailsBtn{
            padding: 7px 16px;
            background-color: #50C878;
            outline: none;
            border: none;
            border-radius: 5px;
            margin-left:0px ;
            transition: all ease-in-out .3s;
        }
        .moreDetailsBtn a{
            font-size: 16px;
            color: black;
            text-decoration: none;
            font-weight: 500;
        }
        .moreDetailsBtn:hover{
            background-color: black;
            border: 1px solid gray;
            color: black;
        }
        .moreDetailsBtn a:hover{
            color: #50C878;
        }
        .reserveBtn{
            background-color:purple;
            color:white;
        }
        .reserveBtn:hover{
            background-color: white;
            border: 1px solid purple;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
          <li><a href="allPropertyStudent.php">Properties</a></li>
          <li><a href="notifications.php">Notifications</a></li>
          <li><a href="createStudentFeedback.php">Feedbacks</a></li>
          <li><a href="#">Articles</a></li>
        </ul>
    </nav>

    <section class="feature-products">
        <h1>All Accommodations</h1>
        <div class="allfpimgs">
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
    
            // Fetch approved properties from the database
            $sql = "SELECT * FROM properties WHERE status = 'Approved'"; // Assuming 'approved' column stores approval status
            $result = $conn->query($sql);
    
            // Check if there are any approved properties
            if ($result->num_rows > 0) {
                // Output approved properties
                while($row = $result->fetch_assoc()) {
                    echo '<div class="fpimgs">';
                    echo '<img src="uploads/' . $row['property_photo_filename'] . '" alt="Property Photo">';
                    echo '<div class="roominfo">';
                    echo '<h3>' . $row['property_name'] . '</h3>';
                    echo '<p class="roomPrice"><span style="color:#088178; font-weight: 700;">$' . $row['price_per_month'] . '</span></p>';
                    echo '<p>Number of beds ' . $row['num_beds'] . '</p>';
                    echo '<p>Number of Students ' . $row['num_students'] . '</p>';
                    echo '<button class="moreDetailsBtn"><a href="FeedbackForm.html">Create A Feedback</a></button>'; 
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No approved properties found.</p>';
            }
    
            // Close the database connection
            $conn->close();
            ?>
        </div>
    </section>
</body>
</html>