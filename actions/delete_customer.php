<?php
session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    unset($_SESSION['customers'][$id]);
    foreach($_SESSION['customers'] as $index => $customer) {
        if($customer['id'] == $id) {
            unset($_SESSION['customers'][$index]);
            break;
        }
    }
    header('Location: ../index.php?tab=customers');
}
?>