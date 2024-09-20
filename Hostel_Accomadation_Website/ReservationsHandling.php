<?php
session_start();

// Check if the landlord is logged in
if (!isset($_SESSION['landlordId'])) {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}

$landlordId = $_SESSION['landlordId'];

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

// Fetch reservations made by students for properties owned by the landlord
$sql = "SELECT r.reservationId, s.student_name, s.contact_number, p.property_name, p.price_per_month,p.landlordId,r.reservation_status
        FROM reservations r 
        INNER JOIN students s ON r.studentId = s.studentId 
        INNER JOIN properties p ON r.propertyId = p.propertyId 
        WHERE p.landlordId = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $landlordId);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Reservations Handling</title>
    <style>
      *{
        font-family: "Poppins", sans-serif;
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

        /*Table Of Reservations Handling*/
        .container {
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 10px;
            padding-right: 10px;
        }

        h2 {
            font-size: 26px;
            margin: 20px 0;
            text-align: center;
            small {
                font-size: 0.5em;
            }
        }

        .responsive-table {
        li {
            border-radius: 3px;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
        }
        .table-header {
            background-color: #95A5A6;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }
        .table-row {
            background-color: #ffffff;
            box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
        }
        .col-1 {
            flex-basis: 10%;
        }
        .col-2 {
            flex-basis: 10%;
        }
        .col-3 {
            flex-basis: 10%;
        }
        .col-4 {
            flex-basis: 10%;
        }
        .col-5 {
            flex-basis: 10%;
        }
        .col-6 {
            flex-basis: 10%;
        }
        .col-7 {
            flex-basis: 10%;
        }
        .col-8 {
            flex-basis: 10%;
        }
        
        @media all and (max-width: 767px) {
            .table-header {
            display: none;
            }
            li {
            display: block;
            }
            .col {
            
            flex-basis: 100%;
            
            }
            .col {
            display: flex;
            padding: 10px 0;
            &:before {
                color: #6C7A89;
                padding-right: 10px;
                content: attr(data-label);
                flex-basis: 50%;
                text-align: right;
            }
            }
        }
        }
        .fa-regular{
            font-size: 23px;
            margin-right: 15px;
            cursor: pointer;
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

    
    <div class="container">
        <h2>Reservations From Students</h2>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Reservations Id</div>
                <div class="col col-2">Student Name</div>
                <div class="col col-3">Student Contact Number</div>
                <div class="col col-4">Property Name</div>
                <div class="col col-5">Price</div>
                <div class="col col-6">Approve Or Not</div>
                <div class="col col-7">Status</div>
            </li>

            <?php
            // Check if there are any reservations
            if ($result->num_rows > 0) {
                // Output reservations
                while ($row = $result->fetch_assoc()) {
                    echo '<li class="table-row">';
                    echo '<div class="col col-1 lalign property-id" data-label="Reservations Id">' . $row['reservationId'] . '</div>';
                    echo '<div class="col col-2" data-label="Student Name">' . $row['student_name'] . '</div>';
                    echo '<div class="col col-3" data-label="Student Contact Number">' . $row['contact_number'] . '</div>';
                    echo '<div class="col col-4" data-label="Property Name">' . $row['property_name'] . '</div>';
                    echo '<div class="col col-5" data-label="Price">' . $row['price_per_month'] . '</div>';
                    echo '<div class="col col-6" data-label="Status">';
                    echo "<button class='approve-btn' data-reservation-id='" . $row["reservationId"] . "'>Approve</button>";
                    echo "<button class='cancel-btn' data-reservation-id='" . $row["reservationId"] . "'>Cancel</button>";
                    echo '</div>';
                    echo '<div class="col col-7 status" data-label="Reservations Status">'. $row['reservation_status'] . '</div>';
                    echo '</li>';
                }
            } else {
                echo '<li class="table-row"><div class="col col-1" colspan="7">No reservations found.</div></li>';
            }

            // Close the database connection
            $conn->close();
            ?>

        </ul>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Function to handle approval
        $('.approve-btn').click(function() {
            var reservationId = $(this).data('reservation-id');
            updateStatus(reservationId, 'Approved', $(this).closest('li').find('.status'));
        });

        // Function to handle cancellation
        $('.cancel-btn').click(function() {
            var reservationId = $(this).data('reservation-id');
            updateStatus(reservationId, 'Cancelled', $(this).closest('li').find('.status'));
        });

        // Function to send AJAX request to update status
        function updateStatus(reservationId, status, statusElement) {
            $.ajax({
                url: 'updateStatusReserve.php',
                type: 'POST',
                data: { reservationId: reservationId, status: status },
                success: function(response) {
                    // Update status column in the table
                    statusElement.text(status);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(error);
                }
            });
        }
    });
    </script>
</body>
</html>