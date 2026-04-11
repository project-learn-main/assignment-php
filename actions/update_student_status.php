<?php
session_start();

if(isset($_POST["id"]) && isset($_POST["status"])) {
    echo("update student status");
    $id = $_POST['id'];
    $status = $_POST['status'];
    foreach($_SESSION['students'] as $index => $student) {
        if($student['id'] == $id) {
            $_SESSION['students'][$index]['status'] = $status;
            break;
        }
    }   
    header('Location: ../index.php?tab=students&status_updated=success');
} else {
    echo("error");
}