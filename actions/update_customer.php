<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $customerId = $_POST['id'];
    
    
    // Handle image upload
    $imagePath = isset($existingCustomer['image']) ? $existingCustomer['image'] : ''; // Keep old image by default
    if (isset($_FILES['personal_image']) && $_FILES['personal_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['personal_image'];
        $uploadDir = __DIR__ . '/../images';
        
        // Create upload directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        // Generate unique filename
        $fileName = 'customer_' . $customerId . '_' . time() . '_' . basename($file['name']);
        $targetPath = $uploadDir . '/' . $fileName;
        
        // Move uploaded file
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $imagePath = 'images/' . $fileName;
        }
    }
    
    $updatedData = [
        'id' => $customerId,
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
        'dateOfBirth' => $_POST['dateOfBirth'],
        'gender' => $_POST['gender'],
        'address' => $_POST['address'],
        'image' => $imagePath
    ];
    
    // Find and update customer in session
    if (isset($_SESSION['customers'])) {
        foreach ($_SESSION['customers'] as $key => $customer) {
            if ($customer['id'] == $customerId) {
                $_SESSION['customers'][$key] = $updatedData;
                break;
            }
        }
    }
    
    // Redirect back to the main page
    header('Location: ../index.php?tab=customers&success=updated');
    exit;
}
?>
