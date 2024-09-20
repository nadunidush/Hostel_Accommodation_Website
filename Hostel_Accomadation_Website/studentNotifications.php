<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Student Notification</title>
    <style>
        body{
            margin: 0;
            padding: 0 0;
            font-family: "Poppins", sans-serif;
        }
         

        /*Nav Bar Section*/
        nav {
          background-color: #333;
          text-align: center;
          padding: 15px 0;
          position: fixed;
          top: 0;
          left: 0;
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
        .all-student-notifications{
            padding: 0 50px;
        }
        h1{
            margin-top: 70px;
        }

        /*Student Notification Box*/
        .feature-products{
            padding: 0px 80px;
        }
        .feature-products h1{
            font-size: 30px;
        }
        .feature-products > p{
            text-align: center;
            margin-bottom: 40px;
        }
        .feature-products .fpimgs{
            position: relative;
            width: 30%;
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
            left: 210px;
        }
        .roominfo table th{
            text-align: left;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="dashborad.html">DashBoard</a></li>
            <li><a href="approvalProperty.html">Approval Property</a></li>
            <li class="dropdown">
                <a href="" class="dropbtn">Notification Center</a>
                <div class="dropdown-content">
                    <a href="studentNotifications.html">Student Notifications</a>
                    <a href="landlordNotifications.html">Landlord Notifications</a>
                </div>
            </li>
            <li><a href="#">Profile</a></li>
        </ul>
    </nav>
    <?php
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "accommodation";

    // Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch all reservations
    $sql = "SELECT r.studentId, s.student_name, p.property_name, l.fullname, r.move_in_date, r.reservation_time, r.	reservation_status
            FROM reservations r 
            INNER JOIN students s ON r.studentId = s.studentId 
            INNER JOIN properties p ON r.propertyId = p.propertyId 
            INNER JOIN landlord_signup l ON p.landlordId = l.landlordId
            WHERE r.reservation_status = 'Approved'
            ";
            

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    ?>

    <div class="all-student-notifications feature-products">
    <h1>Student Notifications</h1>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo "<div class='allfpimgs'>";
        echo "  <div class='fpimgs'>";
        echo "    <div class='roominfo'>";
        echo "      <table>";
        echo "        <tr>";
        echo "          <th>Student Id: </th>";
        echo "          <td>" . $row["studentId"] . "</td>";
        echo "        </tr>";
        echo "        <tr>";
        echo "          <th>Student Name: </th>";
        echo "          <td>" . $row["student_name"] . "</td>";
        echo "        </tr>";
        echo "        <tr>";
        echo "          <th>Property Name:</th>";
        echo "          <td>" . $row["property_name"] . "</td>";
        echo "        </tr>";
        echo "        <tr>";
        echo "          <th>Landlord Name:</th>";
        echo "          <td>" . $row["fullname"] . "</td>";
        echo "        </tr>";
        echo "        <tr>";
        echo "          <th>Reserved Date:</th>";
        echo "          <td>" . $row["move_in_date"] . "</td>";
        echo "        </tr>";
        echo "        <tr>";
        echo "          <th>Time:</th>";
        echo "          <td>" . $row["reservation_time"] . "</td>";
        echo "        </tr>";
        echo "      </table>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        }
    } else {
        echo "No reservations found.";
    }
    ?>

    </div>

    <?php
    $conn->close();
    ?>
</body>
</html>