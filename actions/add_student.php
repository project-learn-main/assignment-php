<?php
session_start();

if(isset($_POST['name']) && isset($_POST['dateOfBirth']) && isset($_POST['gender']) && isset($_POST['address']) 
    && isset($_POST['phone']) && isset($_POST['email']) && isset($_FILES['image'])) { 

    $name = $_POST['name'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $picture = $_FILES['image'];
    $path = __DIR__ . '/../images'; 
    
    if (!is_dir($path))
        mkdir($path);

    $targetPath = $path . '/' . $picture['name'];
    if (move_uploaded_file($picture['tmp_name'], $targetPath)) {
        $_SESSION['students'][] = [
     'id' => count($_SESSION['students']) + 1,
    'name' => $name,
    'dateOfBirth' => $dateOfBirth,
    'gender' => $gender,
    'phone' => $phone,
    'email' => $email,
    'address' => $address,
    'image' => 'images/' . $picture['name'],
];
} 


}
header('Location: ../index.php?tab=students');
exit;
?>
