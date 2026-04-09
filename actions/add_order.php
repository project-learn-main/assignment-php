<?php
if(isset($_POST['customer']) && isset($_POST['amount']) && isset($_POST['items'])
    && isset($_POST['orderId']) && isset($_POST['orderDate']) 
&& isset($_POST['status']) && isset($_POST['productId']) && isset($_POST['productName']) && isset($_POST['unitPrice']) && isset($_POST['quantity'])
// && isset($_POST['productImage'])
){
    session_start();
    $customer = $_POST['customer'];
    $amount = $_POST['amount'];
    $items = $_POST['items'];
    $orderId = $_POST['orderId'];
    $orderDate = $_POST['orderDate'];
    $status = $_POST['status'];
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $unitPrice = $_POST['unitPrice'];
    $quantity = $_POST['quantity'];

    $_SESSION['order'][] = [
        'customer' => $customer,
        'amount' => $amount,
        'items' => $items,
        'orderId' => $orderId,
        'orderDate' => $orderDate,
        'status' => $status,
        'productId' => $productId,
        'productName' => $productName,
        'unitPrice' => $unitPrice,
        'quantity' => $quantity
    ];
    echo "Order added successfully";
    
    header('Location: ../index.php');
    exit();
}

