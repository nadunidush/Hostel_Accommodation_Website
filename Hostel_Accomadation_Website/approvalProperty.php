<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Approval Property</title>
    <style>
        
        html { overflow-y: scroll; }
        body { 
            background: #eee url('https://i.imgur.com/eeQeRmk.png');  
            font-family: "Poppins", sans-serif;
            line-height: 1;
            color: #585858;
            padding: 22px 0px;
            margin: 0;
            padding-bottom: 55px;
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

        /*Nav Bar Section*/
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

        ::selection { background: #5f74a0; color: #fff; }
        ::-moz-selection { background: #5f74a0; color: #fff; }
        ::-webkit-selection { background: #5f74a0; color: #fff; }

        br { display: block; line-height: 1.6em; } 

        article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
        ol, ul { list-style: none; }

        input, textarea { 
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            outline: none; 
        }

        blockquote, q { quotes: none; }
        blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
        strong, b { font-weight: bold; } 

        table { border-collapse: collapse; border-spacing: 0; }
        img { border: 0; max-width: 100%; }

        h1 { 
            font-weight: bold;
            line-height: 1.7em;
            margin-bottom: 10px;
            text-align: center;
        }


        /** page structure **/
        #wrapper {
            display: block;
            width: 850px;
            background: #fff;
            margin: 50px auto;
            padding: 10px 17px;
            -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
        }

        #keywords {
            margin: 0 auto;
            margin-bottom: 15px;
        }


        #keywords thead {
            cursor: pointer;
            background: black;
            color: white;
        }
        #keywords tr:not(:last-child) {
            border-bottom: 1px solid #ddd; /* Add a bottom border to all rows except the last one */
        }
        #keywords thead tr th { 
            font-weight: bold;
            padding: 12px 30px;
            padding-left: 42px;
        }
        #keywords thead tr th span { 
            padding-right: 20px;
            background-repeat: no-repeat;
            background-position: 100% 100%;
        }

        #keywords thead tr th.headerSortUp, #keywords thead tr th.headerSortDown {
        background: #acc8dd;
        }

        #keywords thead tr th.headerSortUp span {
        background-image: url('https://i.imgur.com/SP99ZPJ.png');
        }
        #keywords thead tr th.headerSortDown span {
        background-image: url('https://i.imgur.com/RkA9MBo.png');
        }


        #keywords tbody tr {
           
        color: #555;
        }
        #keywords tbody tr td {
        text-align: center;
        padding: 15px 10px;
        }
        #keywords tbody tr td.lalign {
        text-align: left;
        }
        .fa-regular{
            font-size: 23px;
            margin-right: 15px;
            cursor: pointer;
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
            <li><a href="dashborad.php">DashBoard</a></li>
            <li><a href="approvalProperty.php">Approval Property</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Notification Center</a>
                <div class="dropdown-content">
                    <a href="studentNotifications.html">Student Notifications</a>
                    <a href="landlordNotifications.html">Landlord Notifications</a>
                </div>
            </li>
            <li><a href="#">Profile</a></li>
        </ul>
    </nav>

    <div id="wrapper">
        <h1>Approval Property</h1>
        
        <table id="keywords" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th><span>Property ID</span></th>
              <th><span>Property Name</span></th>
              <th><span>LandLord Name</span></th>
              <th><span>Price</span></th>
              <th><span>Approved Or Not</span></th>
              <th><span>Status</span></th>
            </tr>
          </thead>
          <tbody>
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

            // Fetch properties from the database
            $sql = "SELECT * FROM properties";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='lalign property-id'>" . $row["propertyId"] . "</td>";
                    echo "<td>" . $row["property_name"] . "</td>";
                    // Retrieve landlord name from another table using landlordId
                    $landlordId = $row["landlordId"];
                    $sql_landlord = "SELECT fullname FROM landlord_signup WHERE landlordId = $landlordId";
                    $result_landlord = $conn->query($sql_landlord);
                    if ($result_landlord->num_rows > 0) {
                        $row_landlord = $result_landlord->fetch_assoc();
                        echo "<td>" . $row_landlord["fullname"] . "</td>";
                    } else {
                        echo "<td>Unknown Landlord</td>";
                    }
                    echo "<td>" . $row["price_per_month"] . "</td>";
                    // Add approve and cancel buttons
                    echo "<td>";
                    echo "<button class='approve-btn' data-property-id='" . $row["propertyId"] . "'>Approve</button>";
                    echo "<button class='cancel-btn' data-property-id='" . $row["propertyId"] . "'>Cancel</button>";
                    echo "</td>";
                    // Add status column
                    echo "<td class='status'>" . $row["status"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No properties found</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
          </tbody>
        </table>
       </div> 

       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Function to handle approval
    $('.approve-btn').click(function() {
        var propertyId = $(this).data('property-id');
        updateStatus(propertyId, 'Approved', $(this).closest('tr').find('.status'));
    });

    // Function to handle cancellation
    $('.cancel-btn').click(function() {
        var propertyId = $(this).data('property-id');
        updateStatus(propertyId, 'Cancelled', $(this).closest('tr').find('.status'));
    });

    // Function to send AJAX request to update status
    function updateStatus(propertyId, status, statusElement) {
        $.ajax({
            url: 'updateStatus.php', // Change this to your PHP file which handles status update
            type: 'POST',
            data: { propertyId: propertyId, status: status },
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