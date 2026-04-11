<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $studentId = $_POST['id'];
    
    
    $imagePath = ''; // Keep old image by default
    if (isset($_FILES['personal_image']) && $_FILES['personal_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['personal_image'];
        $uploadDir = __DIR__ . '/../images';
        
        // Create upload directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        // Generate unique filename
        $fileName = 'student_' . $studentId . '_' . time() . '_' . basename($file['name']);
        $targetPath = $uploadDir . '/' . $fileName;
        
        // Move uploaded file
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $imagePath = 'images/' . $fileName;
        }
    }
    // Update student data with form fields
    $updatedData = [
        'id' => $studentId,
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'studentId' => $_POST['studentId'],
        'phone' => $_POST['phone'],
        'gender' => $_POST['gender'],
        'address' => $_POST['address'],
        'status' => $_POST['status'],
        'image' => $imagePath,
        // Preserve fields not in form
        'dateOfBirth' => isset($existingStudent['dateOfBirth']) ? $existingStudent['dateOfBirth'] : ''
    ];
    
    // Find and update student in session
    if (isset($_SESSION['students'])) {
        foreach ($_SESSION['students'] as $key => $student) {
            if ($student['id'] == $studentId) {
                $_SESSION['students'][$key] = $updatedData;
                break;
            }
        }
    }
    
    // Redirect back to the main page
    header('Location: ../index.php?tab=students&success=updated');
    exit;
}
?>
