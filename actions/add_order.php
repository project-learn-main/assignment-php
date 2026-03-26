<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer = $_POST['customer'] ?? '';
    $amount = $_POST['amount'] ?? '';
    $items = $_POST['items'] ?? '';
    $status = $_POST['status'] ?? 'pending';
    
    if (!empty($customer) && !empty($amount) && !empty($items)) {
        $orders = getOrders();
        
        $newOrder = [
            'id' => (string)(count($orders) + 1),
            'orderNumber' => '#ORD-' . str_pad(count($orders) + 1, 3, '0', STR_PAD_LEFT),
            'customer' => $customer,
            'amount' => $amount,
            'items' => (int)$items,
            'status' => $status,
            'date' => date('Y-m-d'),
            'createdAt' => date('Y-m-d')
        ];
        
        $orders[] = $newOrder;
        saveOrders($orders);
        
        $_SESSION['success'] = 'Order added successfully!';
    } else {
        $_SESSION['error'] = 'Please fill in all required fields.';
    }
}

header('Location: ../index.php');
exit;
?>
