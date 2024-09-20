<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Dashoboard</title>
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
        }
        
        nav {
          background-color: #333;
          text-align: center;
          padding: 15px 0;
          position: fixed;
          top: 0;
          width: 100%;
          z-index: 1000;
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


        .main-heading{
          padding-top: 40px;
        }
        .all-accommodation-list{
         
        }
        #accommodationList {
          display: flex;
  padding: 10px;
  border-bottom: 1px solid #ccc;
  cursor: pointer;
  transition: background-color 0.3s ease;
  flex-basis: 33.33%; /* Each item takes up 1/3 of the available space */
  flex-grow: 0; /* Prevent items from growing */
  box-sizing: border-box; /* Include padding and border in the width */
  flex-wrap: wrap; /* Allow items to wrap to the next row */
        }
        
        #mapContainer {
          
        }
        
        #map {
           
        }
        
        .accommodationItem {
          display: flex;
          padding: 10px;
         
          cursor: pointer;
          transition: background-color 0.3s ease;
          flex-basis: 33.33%; /* Each item takes up 1/3 of the available space */
          flex-grow: 0; /* Prevent items from growing */
          box-sizing: border-box; /* Include padding and border in the width */
          flex-wrap: wrap; /* Allow items to wrap to the next row */
        }
        
        .accommodationItem:hover {
          background-color:rgb(203, 231, 240);
        }
        .img-accom{
          width: 170px;
          margin: 30px 0 0 35px;
        }
        .left-info p{
          line-height: 5px;
          font-size: 14px;
        }
        #price-left{
          font-size: 16px;
          margin-top: 30px;
        }
        .left-heading{
          color: rgb(104, 81, 81);
        }
        .list-accom{
          flex-grow: 1;
        }

        /* Dropdown button */
        .dropbtn {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            top: 90%;
            left: 52%;
            background-color: #333;
            min-width: 160px;
            z-index: 1;
             /* Position the dropdown below the dropdown button */
           
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: #fff;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #555;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Style the active/current link */
        .active {
            background-color: #555;
        }

    </style>
</head>
<body>
<nav>
    <ul>
      <li><a href="dashboard.php">DashBoard</a></li>
      <li><a href="approvalProperty.php">Approval Property</a></li>
      <li class="dropdown">
          <a href="#" class="dropbtn">Notification Center</a>
          <div class="dropdown-content">
              <a href="studentNotifications.php">Student Notifications</a>
              <a href="landlordNotifications.php">Landlord Notifications</a>
          </div>
      </li>
      <li><a href="#">Profile</a></li>
  </ul>
  </nav>
    <h1 class="main-heading">DashBoard</h1>
    <div class="all-accommodation-list">
      <div id="accommodationList">
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

      // Fetch property data from the database
      $sql_properties = "SELECT * FROM properties";
      $stmt = $conn->prepare($sql_properties);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
             
              // Output HTML for each property
              echo '<div class="accommodationItem" data-propertyid="' . $row["propertyId"] . '">';
              echo '<div class="list-accom left-info">';
              echo '<h3 class="left-heading">' . $row["property_name"] . '</h3>';
              echo '<p>' . $row["property_type"] . '</p>';
              echo '<p>Student ' . $row["num_students"] . '</p>';
              echo '<p>BedRoom ' . $row["num_beds"] . '</p>';
              echo '<p id="price-left"><strong>Rs. ' . $row["price_per_month"] . '</strong></p>';
              echo '</div>';
              echo '<div class="list-accom right-img">';
              echo '<a href="propertDetails.php?id=' . $row["propertyId"] . '"><img src="uploads/' . $row["property_photo_filename"] . '" class="img-accom" alt=""></a>';
              echo '</div>';
              echo '</div>';
          }
      } else {
          echo "No properties found.";
      }

      // Close the database connection
      $conn->close();
      ?>
      </div>
            
      <div id="mapContainer">
          <div id="map"></div>
      </div>
      </div>


      <script>
    // Add click event listener to accommodation items
    var accommodationItems = document.querySelectorAll('.accommodationItem');
    accommodationItems.forEach(function(item) {
        item.addEventListener('click', function() {
            // Get property ID and landlord ID from data-attributes
            var propertyId = this.getAttribute('data-propertyid');
            var landlordId = this.getAttribute('data-landlordid');

            // Redirect to new page with propertyId and landlordId parameters
            window.location.href = "map_page.php?propertyId=" + propertyId + "&landlordId=" + landlordId;
        });
    });
</script>



</body>
</html>