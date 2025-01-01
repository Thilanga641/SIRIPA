<?php
// Start the session
session_start();

// Database connection
$host = 'localhost';
$dbname = 'ContactDB';
$username = 'root';
$password = ''; // Add your database password here

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into the database
    $sql = "INSERT INTO ContactMessages (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Set success message
        $_SESSION['message'] = "Thank you! Your message has been sent successfully.";
        header("Location: index.php"); // Redirect to the home page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
