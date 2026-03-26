<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $studentId = $_POST['studentId'] ?? '';
    $course = $_POST['course'] ?? '';
    $year = $_POST['year'] ?? '';
    $gpa = $_POST['gpa'] ?? '';
    
    if (!empty($name) && !empty($email) && !empty($studentId) && !empty($course) && !empty($year) && !empty($gpa)) {
        $students = getStudents();
        
        // Check if student ID or email already exists
        foreach ($students as $student) {
            if ($student['studentId'] === $studentId) {
                $_SESSION['error'] = 'Student ID already exists!';
                header('Location: ../index.php');
                exit;
            }
            if ($student['email'] === $email) {
                $_SESSION['error'] = 'Email already exists!';
                header('Location: ../index.php');
                exit;
            }
        }
        
        $newStudent = [
            'id' => (string)(count($students) + 1),
            'name' => $name,
            'email' => $email,
            'studentId' => $studentId,
            'course' => $course,
            'year' => $year,
            'gpa' => $gpa,
            'enrollmentDate' => date('Y-m-d'),
            'status' => 'active'
        ];
        
        $students[] = $newStudent;
        saveStudents($students);
        
        $_SESSION['success'] = 'Student added successfully!';
    } else {
        $_SESSION['error'] = 'Please fill in all required fields.';
    }
}

header('Location: ../index.php');
exit;
?>
