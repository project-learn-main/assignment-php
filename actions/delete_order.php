<?php
session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    foreach ($_SESSION['orders'] as $index => $order) {
        if ($order['orderId'] == $id) {
            unset($_SESSION['orders'][$index]);
            setcookie('order_delete_success', 'true', time() + 10, "/");
            break;
        }
    }
    header('Location: ../index.php?tab=orders');
}
