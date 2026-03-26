<?php
// session_start();

// // Initialize demo user if not exists
// function initializeDemoUser() {
//     if (!file_exists('data/users.json')) {
//         $demoUser = [
//             'id' => '1',
//             'email' => 'demo@example.com',
//             'password' => 'demo123', // In production, this should be hashed
//             'name' => 'Demo User'
//         ];
        
//         if (!is_dir('data')) {
//             mkdir('data', 0755, true);
//         }
        
//         file_put_contents('data/users.json', json_encode([$demoUser]));
//     }
// }

// // Get all users
// // z

// // Save users
// function saveUsers($users) {
//     if (!is_dir('data')) {
//         mkdir('data', 0755, true);
//     }
//     file_put_contents('data/users.json', json_encode($users));
// }

// // Sign in function
// function signIn($email, $password) {
//     if (empty($email) || empty($password)) {
//         throw new Exception('Email and password are required');
//     }

//     $users = getUsers();
//     $foundUser = null;

//     foreach ($users as $user) {
//         if ($user['email'] === $email) {
//             $foundUser = $user;
//             break;
//         }
//     }

//     if (!$foundUser) {
//         throw new Exception('Invalid email or password');
//     }

//     if ($foundUser['password'] !== $password) {
//         throw new Exception('Invalid email or password');
//     }

//     $_SESSION['user'] = [
//         'id' => $foundUser['id'],
//         'email' => $foundUser['email'],
//         'name' => $foundUser['name']
//     ];

//     return true;
// }

// // Sign up function
// function signUp($email, $password, $name) {
//     if (empty($email) || empty($password) || empty($name)) {
//         throw new Exception('All fields are required');
//     }

//     if (strlen($password) < 6) {
//         throw new Exception('Password must be at least 6 characters');
//     }

//     $users = getUsers();

//     foreach ($users as $user) {
//         if ($user['email'] === $email) {
//             throw new Exception('Email already registered');
//         }
//     }

//     $newUser = [
//         'id' => (string)(count($users) + 1),
//         'email' => $email,
//         'password' => $password, // In production, this should be hashed
//         'name' => $name
//     ];

//     $users[] = $newUser;
//     saveUsers($users);

//     $_SESSION['user'] = [
//         'id' => $newUser['id'],
//         'email' => $newUser['email'],
//         'name' => $newUser['name']
//     ];

//     return true;
// }

// // Sign out function
// function signOut() {
//     unset($_SESSION['user']);
// }

// // Check if user is authenticated
function isAuthenticated() {
    return isset($_SESSION['user']);
}

// // Get current user
// function getCurrentUser() {
//     return $_SESSION['user'] ?? null;
// }
?>
