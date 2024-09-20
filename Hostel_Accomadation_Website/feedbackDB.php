<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];

    // Validate form data (you can add more validation as needed)
    if (empty($uname) || empty($email) || empty($phone) || empty($msg)) {
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
        $sql = "INSERT INTO feedback(uname, email, phone, msg) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $uname, $email, $phone,$msg);

        // Execute SQL statement
        if ($stmt->execute()) {
            echo "Sign up successful. Redirecting to login page...";
            // You can redirect the user to the login page or another page after successful sign-up
            header("Location: createStudentFeedback.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
} else {
    // Redirect user to the sign-up page if accessed directly without form submission
    header("Location: FeedbackForm.html");
    exit();
}
?>
