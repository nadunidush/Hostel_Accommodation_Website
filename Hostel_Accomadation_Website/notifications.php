<?php
session_start();

// Check if the landlord is logged in
if (!isset($_SESSION['studentId'])) {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}

$studentId = $_SESSION['studentId'];

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
$sql = "SELECT p.property_name, l.fullname , p.price_per_month, r.reservation_status 
        FROM reservations r 
        INNER JOIN students s ON r.studentId = s.studentId 
        INNER JOIN properties p ON r.propertyId = p.propertyId 
        INNER JOIN landlord_signup l ON p.landlordId = l.landlordId  
        WHERE s.studentId = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $studentId);
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
    <title>Landlord Notifications</title>
    <style>
        *{
          font-family: "Poppins", sans-serif;
        }
        body {
          font-family: "Poppins", sans-serif;
          margin: 0;
          padding: 0;
          background: #fafafa url(https://jackrugile.com/images/misc/noise-diagonal.png);
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

        /*Table Style*/
strong {
  font-weight: bold; 
}

em {
  font-style: italic; 
}

table {
  background: #f5f5f5;
  border-collapse: separate;
  box-shadow: inset 0 1px 0 #fff;
  font-size: 12px;
  line-height: 24px;
  margin: 30px auto;
  text-align: left;
  width: 800px;
} 

th {
  background: url(https://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
  border-left: 1px solid #555;
  border-right: 1px solid #777;
  border-top: 1px solid #555;
  border-bottom: 1px solid #333;
  box-shadow: inset 0 1px 0 #999;
  color: #fff;
  font-weight: bold;
  padding: 10px 15px;
  position: relative;
  text-shadow: 0 1px 0 #000;  
}

th:after {
  background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
  content: '';
  display: block;
  height: 25%;
  left: 0;
  margin: 1px 0 0 0;
  position: absolute;
  top: 25%;
  width: 100%;
}

th:first-child {
  border-left: 1px solid #777;  
  box-shadow: inset 1px 1px 0 #999;
}

th:last-child {
  box-shadow: inset -1px 1px 0 #999;
}

td {
  border-right: 1px solid #fff;
  border-left: 1px solid #e8e8e8;
  border-top: 1px solid #fff;
  border-bottom: 1px solid #e8e8e8;
  padding: 10px 15px;
  position: relative;
  transition: all 300ms;
}

td:first-child {
  box-shadow: inset 1px 0 0 #fff;
} 

td:last-child {
  border-right: 1px solid #e8e8e8;
  box-shadow: inset -1px 0 0 #fff;
} 

tr {
  background: url(https://jackrugile.com/images/misc/noise-diagonal.png); 
}

tr:nth-child(odd) td {
  background: #f1f1f1 url(https://jackrugile.com/images/misc/noise-diagonal.png); 
}

tr:last-of-type td {
  box-shadow: inset 0 -1px 0 #fff; 
}

tr:last-of-type td:first-child {
  box-shadow: inset 1px -1px 0 #fff;
} 

tr:last-of-type td:last-child {
  box-shadow: inset -1px -1px 0 #fff;
} 

tbody:hover td {
  color: transparent;
  text-shadow: 0 0 3px #aaa;
}

tbody:hover tr:hover td {
  color: #444;
  text-shadow: 0 1px 0 #fff;
}
    </style>
</head>
<body>
    <nav>
        <ul>
          <li><a href="allPropertyStudent.php">Properties</a></li>
          <li><a href="notifications.php">Notifications</a></li>
          <li><a href="#">Favorites</a></li>
          <li><a href="#">Articles</a></li>
        </ul>
    </nav>
    <?php
    // ... your existing code to fetch data ...

    if ($result->num_rows > 0) {
      echo "<table>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Property Name</th>";
      echo "<th>Landlord Name</th>";
      echo "<th>Property Price</th>";
      echo "<th>Status</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["property_name"] . "</td>";
        echo "<td>" . $row["fullname"] . "</td>";
        echo "<td>Rs. " . $row["price_per_month"] . "</td>";  // Assuming price is stored numerically
        echo "<td>" . $row["reservation_status"] . "</td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
    } else {
      echo "No reservations found.";
    }

    $conn->close();
    ?>
      
</body>
</html>