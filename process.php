<?php
// Database connection settings
$host = 'localhost'; // Database host
$db = 'users'; // Change this to your actual database name
$user = 'root'; // Database username (default for local servers)
$pass = ''; // Database password (leave empty for XAMPP/WAMP/MAMP)

// Create a new PDO instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (name, email, phone) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $phone);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>