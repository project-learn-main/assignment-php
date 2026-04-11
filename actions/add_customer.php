<?php
session_start();
if(isset($_POST['name']) && isset($_POST['dateOfBirth']) && isset($_POST['gender']) && isset($_POST['address']) 
   && isset($_POST['phone']) && isset($_FILES['image'])) {
    $name = $_POST['name'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
   
    
    $picture = $_FILES['image'];
    $path = __DIR__ . '/../images';
    
    if (!is_dir($path))
        mkdir($path);
     // Hàm di chuy?n file
    $targetPath = $path . '/' . $picture['name'];
    if (move_uploaded_file($picture['tmp_name'], $targetPath)) {
        $_SESSION['customers'][] = [
            'id' => count($_SESSION['customers']) + 1,
            'name' => $name,
            'phone' => $phone,
            'dateOfBirth' => $dateOfBirth,
            'gender' => $gender,
            'address' => $address,
            'image' => 'images/' . $picture['name']
        ];
    } 
   
}

header('Location: ../index.php?tab=customers'); 
exit;
?>
