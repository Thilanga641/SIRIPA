<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = "";     // Replace with your DB password
$dbname = "siripa_db"; // Replace with your DB name

// Start the session
session_start();

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(trim($data));
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = sanitizeInput($_POST['action']);

    if ($action === 'login') {
        // Login logic
        $username = sanitizeInput($_POST['username']);
        $password = sanitizeInput($_POST['password']);

        if (empty($username) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'Please fill in all fields.']);
            exit();
        }

        // Validate user credentials
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Successful login
            $_SESSION['username'] = $username; // Store username in session
            echo json_encode(['success' => true, 'message' => 'Login successful!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
        }

        $stmt->close();
    } elseif ($action === 'register') {
        // Registration logic
        $email = sanitizeInput($_POST['email']);
        $username = sanitizeInput($_POST['registerUsername']);
        $password = sanitizeInput($_POST['registerPassword']);
        $confirmPassword = sanitizeInput($_POST['confirmPassword']);

        if (empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
            echo json_encode(['success' => false, 'message' => 'Please fill in all fields.']);
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
            exit();
        }

        if ($password !== $confirmPassword) {
            echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
            exit();
        }

        // Check if username or email already exists
        $checkSql = "SELECT * FROM users WHERE username = ? OR email = ?";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bind_param("ss", $username, $email);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            echo json_encode(['success' => false, 'message' => 'Username or email already exists.']);
            exit();
        }

        // Insert new user into the database
        $insertSql = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("sss", $email, $username, $password);

        if ($insertStmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Registration successful!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: ' . $insertStmt->error]);
        }

        $insertStmt->close();
    }
}

// Logout logic
if (isset($_GET['logout'])) {
    session_destroy(); // Destroy the session to log out
    header("Location: index.php");
    exit();
}

// Close the database connection
$conn->close();
?>
