<?php
class ImageUploadController {
    private $uploadDir = __DIR__ . '/../../uploads/';

    // Constructor to create the upload directory if it doesn't exist
    public function __construct() {
        if (!file_exists($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }
    }

    // Image Upload Method
    public function uploadImage() {
        header("Content-Type: application/json");

        // Check if a file was uploaded
        if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(["status" => "error", "message" => "No image uploaded or an error occurred."]);
            return;
        }

        $image = $_FILES['image'];

        // Validate file size (e.g., max 2MB)
        if ($image['size'] > 2 * 1024 * 1024) { // 2MB
            echo json_encode(["status" => "error", "message" => "Image size exceeds 2MB limit."]);
            return;
        }

        // Validate file type (allow only JPG, PNG, GIF)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($image['type'], $allowedTypes)) {
            echo json_encode(["status" => "error", "message" => "Invalid image type. Only JPG, PNG, and GIF are allowed."]);
            return;
        }

        // Generate a unique file name
        $fileExtension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $uniqueFileName = uniqid('img_', true) . '.' . $fileExtension;

        // Move uploaded file to the target directory
        $filePath = $this->uploadDir . $uniqueFileName;
        if (move_uploaded_file($image['tmp_name'], $filePath)) {
            echo json_encode([
                "status" => "success",
                "message" => "Image uploaded successfully.",
                "image_url" => "/uploads/" . $uniqueFileName
            ]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to upload image."]);
        }
    }
}
?>
