<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'db_connection.php';

// Get input data
$input = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!isset($input['name'], $input['email'], $input['password'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Name, email, and password are required."
    ]);
    exit;
}

$name = $input['name'];
$email = $input['email'];
$password = $input['password'];

// Check if the user already exists
$query = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode([
        "status" => "error",
        "message" => "Email is already registered."
    ]);
    exit;
}

// Insert the new user into the database
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $name, $email, $hashedPassword);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "message" => "User registered successfully."
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Failed to register user."
    ]);
}
?>
