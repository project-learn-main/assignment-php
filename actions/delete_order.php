<?php
session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    foreach ($_SESSION['orders'] as $index => $order) {
        if ($order['orderId'] == $id) {
            unset($_SESSION['orders'][$index]);
            break;
        }
    }
    header('Location: ../index.php?tab=orders');
}
