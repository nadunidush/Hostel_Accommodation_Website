<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $company = $_POST['company'];

    // Validate form data (you can add more validation as needed)
    if (empty($fullname) || empty($email) || empty($password) || empty($confirm_password) || empty($phone) || empty($address)) {
        echo "Please fill in all required fields.";
    } else {
        // Connect to your database
        $servername = "localhost"; // Change this to your MySQL server name
        $username = "root"; // Change this to your MySQL username
        $Password = ""; // Change this to your MySQL password
        $dbname = "accommodation"; // Change this to your database name
        $conn = new mysqli($servername, $username, $Password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to insert data into the users table
        $sql = "INSERT INTO landlord_signup(fullname, email, password,confirm_password, phone, address, company) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssiss", $fullname, $email, $password,$confirm_password, $phone, $address, $company);

        // Execute SQL statement
        if ($stmt->execute()) {
            echo "Sign up successful. Redirecting to login page...";
            // You can redirect the user to the login page or another page after successful sign-up
            header("Location: addProperty.html");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
} else {
    // Redirect user to the sign-up page if accessed directly without form submission
    header("Location: signUpPage.html");
    exit();
}
?>
