<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $studentId = $_POST['id'];
    
   
    
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
            if ($student['id'] === $studentId) {
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
