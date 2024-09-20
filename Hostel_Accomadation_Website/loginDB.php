<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $Password = "";
    $dbname = "accommodation";
    $conn = new mysqli($servername, $username, $Password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve email and password from the login form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement to fetch landlord information based on email and password
    $sql_landlord = "SELECT landlordId FROM landlord_signup WHERE email = ? AND password = ?";
    $stmt_landlord = $conn->prepare($sql_landlord);
    $stmt_landlord->bind_param("ss", $email, $password);
    $stmt_landlord->execute();
    $result_landlord = $stmt_landlord->get_result();

    // Prepare SQL statement to fetch student information based on email and password
    $sql_student = "SELECT studentId FROM students WHERE student_name = ? AND student_password = ?";
    $stmt_student = $conn->prepare($sql_student);
    $stmt_student->bind_param("ss", $email, $password);
    $stmt_student->execute();
    $result_student = $stmt_student->get_result();


    // Prepare SQL statement to fetch warden information based on email and password
    $sql_warden = "SELECT wardenId FROM warden WHERE warden_name = ? AND warden_password = ?";
    $stmt_warden = $conn->prepare($sql_warden);
    $stmt_warden->bind_param("ss", $email, $password);
    $stmt_warden->execute();
    $result_warden = $stmt_warden->get_result();


    // Check if a matching landlord is found
    if ($result_landlord->num_rows == 1) {
        // Fetch landlord ID
        $row_landlord = $result_landlord->fetch_assoc();
        $landlordId = $row_landlord['landlordId'];

        // Store landlord ID in session
        $_SESSION['email'] = $email;
        $_SESSION['landlordId'] = $landlordId;

        // Redirect to property management page
        header("Location: propertyManagement.php");
        exit();
    } elseif ($result_student->num_rows == 1) {
        // Fetch student ID
        $row_student = $result_student->fetch_assoc();
        $studentId = $row_student['studentId'];

        // Store student ID in session
        $_SESSION['email'] = $email;
        $_SESSION['studentId'] = $studentId;

        // Redirect to property management page for students
        header("Location: allPropertyStudent.php");
        exit();
    } elseif ($result_warden->num_rows == 1) {
        // Fetch student ID
        $row_warden = $result_warden->fetch_assoc();
        $wardenId = $row_warden['wardenId'];

        // Store student ID in session
        $_SESSION['email'] = $email;
        $_SESSION['wardenId'] = $wardenId;

        // Redirect to property management page for students
        header("Location: dashborad.php");
        exit();
    } else {
        // Display login error if no matching landlord or student is found
        echo "Login error. Please check your email and password.";
    }

    // Close database connection
    $stmt_landlord->close();
    $stmt_student->close();
    $conn->close();
} else {
    // Redirect to login page if accessed directly without form submission
    header("Location: login.html");
    exit();
}
?>