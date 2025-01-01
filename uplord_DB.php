<?php
header('Content-Type: application/json');
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'uplord';

// Database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]));
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';
    $uploadedFiles = [];

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    foreach ($_FILES['files']['name'] as $key => $name) {
        $tempPath = $_FILES['files']['tmp_name'][$key];
        $filePath = $uploadDir . time() . '-' . basename($name);

        if (move_uploaded_file($tempPath, $filePath)) {
            $uploadedFiles[] = ['name' => $name, 'path' => $filePath];

            // Save file details to the database
            $stmt = $conn->prepare("INSERT INTO files (filename, filepath) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $filePath);
            $stmt->execute();
        }
    }

    echo json_encode(['success' => true, 'files' => $uploadedFiles]);
    exit;
}

// Handle fetching uploaded files
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $conn->query("SELECT filename, filepath FROM files ORDER BY uploaded_at DESC");
    $files = [];

    while ($row = $result->fetch_assoc()) {
        $files[] = $row;
    }

    echo json_encode(['success' => true, 'files' => $files]);
    exit;
}

// Invalid request method
echo json_encode(['success' => false, 'message' => 'Invalid request']);
?>
