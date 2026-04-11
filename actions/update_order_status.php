<?php
session_start();
if (isset($_POST["orderId"]) && isset($_POST["status"])) {
    $id = $_POST['orderId'];
    $status = $_POST['status'];
    foreach ($_SESSION['orders'] as $index => $order) {
        if ($order['orderId'] == $id) {
            $_SESSION['orders'][$index]['status'] = $status;
            break;
        }
    }
    header('Location: ../index.php?tab=order&status_updated=success');
} else {
    echo ("error");
}
