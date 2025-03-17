<?php
require_once "app/models/UserModel.php";

class ApiController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // API for Registration
    public function register() {
        header("Content-Type: application/json");

        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['name'], $data['email'], $data['password'])) {
            echo json_encode(["status" => "error", "message" => "Invalid input"]);
            return;
        }

        $name = $data['name'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_BCRYPT);

        $result = $this->userModel->register($name, $email, $password);

        if ($result) {
            echo json_encode(["status" => "success", "message" => "User registered successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to register user."]);
        }
    }

    // API for Login
    public function login() {
        header("Content-Type: application/json");

        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['email'], $data['password'])) {
            echo json_encode(["status" => "error", "message" => "Invalid input"]);
            return;
        }

        $email = $data['email'];
        $password = $data['password'];

        $user = $this->userModel->login($email);

        if ($user && password_verify($password, $user['password'])) {
            echo json_encode([
                "status" => "success",
                "message" => "Login successful.",
                "user" => ["id" => $user['id'], "name" => $user['name'], "email" => $user['email"]]
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid credentials."]);
        }
    }
}
?>
