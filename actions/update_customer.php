<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $customerId = $_POST['id'];
    
    // Debug: Log POST data
    error_log("Updating customer: ID=$customerId");
    error_log("POST data received: " . print_r($_POST, true));
    
    // Get existing customer data
    $existingCustomer = null;
    if (isset($_SESSION['customers'])) {
        error_log("Session customers count: " . count($_SESSION['customers']));
        foreach ($_SESSION['customers'] as $customer) {
            error_log("Checking customer: id={$customer['id']}, name={$customer['name']}");
            if ($customer['id'] == $customerId) {
                $existingCustomer = $customer;
                error_log("Found matching customer: " . print_r($existingCustomer, true));
                break;
            }
        }
    } else {
        error_log("Session customers not found");
    }
    
    if (!$existingCustomer) {
        error_log("Customer not found with id: $customerId");
    }
    
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
