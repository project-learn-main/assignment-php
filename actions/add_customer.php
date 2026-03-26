<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    
    if (!empty($name) && !empty($email) && !empty($phone)) {
        $customers = getCustomers();
        
        // Check if email already exists
        foreach ($customers as $customer) {
            if ($customer['email'] === $email) {
                $_SESSION['error'] = 'Email already exists!';
                header('Location: ../index.php');
                exit;
            }
        }
        
        $newCustomer = [
            'id' => (string)(count($customers) + 1),
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'orders' => 0,
            'totalSpent' => '0.00',
            'joinDate' => date('Y-m-d'),
            'status' => 'active'
        ];
        
        $customers[] = $newCustomer;
        saveCustomers($customers);
        
        $_SESSION['success'] = 'Customer added successfully!';
    } else {
        $_SESSION['error'] = 'Please fill in all required fields.';
    }
}

header('Location: ../index.php');
exit;
?>
