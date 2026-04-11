<?php
session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    foreach($_SESSION['students'] as $index => $student) {
        if($student['id'] == $id) {
            unset($_SESSION['students'][$index]);
            break;
        }
    }   
    header('Location: ../index.php?tab=students');
}
?>