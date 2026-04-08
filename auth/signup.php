
<?php
session_start();

$error = "";

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $emailExists = false;
        foreach($_SESSION['danhsachAdmin'] as $index => $admin) {
            if($admin[0] == $email) {
                $emailExists = true;
                break;
            }
        }
        
        if ($emailExists) {
            $error = "Email already exists!";
        } elseif ($password !== $confirmPassword) {
            $error = "Password does not match!";
        } else {
            $_SESSION['danhsachAdmin'][] = [$email, $password, $name];
            echo '<script>alert("Sign up successfully!");</script>';
            header('Location: signin.php');
            exit();
        }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1f3b63',
                        secondary: '#0b1a33',
                        dark: '#1a1a1a',
                        light: '#f8f9fa'
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-secondary via-primary to-secondary flex items-center justify-center">
    <div class="w-full max-w-md mx-auto px-4">
                <!-- Logo/Title -->
                <div class="text-center mb-6">
                    <h1 class="text-white text-4xl font-bold mb-2">Admin Dashboard</h1>
                    <p class="text-gray-400">Create your account</p>
                </div>

                <!-- Card -->
                <div class="bg-gray-800 bg-opacity-90 backdrop-blur-lg rounded-xl border border-gray-700 shadow-2xl">
                    <?php if ($error): ?>
                                <div class="bg-red-900 bg-opacity-20 border border-red-800 text-red-300 rounded-lg p-3 mb-4 flex items-center animate-pulse">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    <div><?php echo htmlspecialchars($error); ?></div>
                                </div>
                    <?php endif; ?>   
                <div class="p-6">
                        <form method="POST">
                            <!-- Name Field -->
                            <div class="mb-4">
                                <label for="name" class="block text-gray-300 font-medium mb-2">Full Name</label>
                                <input type="text" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-gray-500" 
                                       id="name" name="name" placeholder="John Doe" required>
                            </div>

                            <!-- Email Field -->
                            <div class="mb-4">
                                <label for="email" class="block text-gray-300 font-medium mb-2">Email Address</label>
                                <input type="email" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-gray-500" 
                                       id="email" name="email" placeholder="you@example.com" required>
                            </div>

                            <!-- Password Field -->
                            <div class="mb-6">
                                <label for="password" class="block text-gray-300 font-medium mb-2">Password</label>
                                <input type="password" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-gray-500" 
                                   minlength="6" id="password" name="password" placeholder="••••••••" required>
                                <p class="text-gray-400 text-sm mt-2">Password must be at least 6 characters</p>
                            </div>

                            <div class="mb-6">
                                <label for="confirmPassword" class="block text-gray-300 font-medium mb-2">Confirm Password</label>
                                <input type="password" class="w-full px-4 py-3 bg-gray-900 border border-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-gray-500" 
                                   minlength="6" id="confirmPassword" name="confirmPassword" placeholder="••••••••" required>
                                <p class="text-gray-400 text-sm mt-2">Password must be at least 6 characters</p>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium py-3 px-4 rounded-lg transition-all transform hover:-translate-y-0.5 hover:shadow-lg mb-4">
                                Create Account
                            </button>
                        </form>

                        <!-- Divider -->
                        <div class="relative my-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-700"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-gray-800 text-gray-400">Already have an account?</span>
                            </div>
                        </div>

                        <!-- Sign In Link -->
                        <a href="signin.php" class="block w-full text-center border border-gray-600 text-gray-300 hover:bg-gray-700 hover:text-white hover:border-gray-500 font-medium py-3 px-4 rounded-lg transition-all transform hover:-translate-y-0.5">
                            Sign In
                        </a>
                    </div>
                </div>
    </div>
</body>
</html>
