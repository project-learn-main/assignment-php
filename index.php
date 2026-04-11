<?php
    session_start();
    if(!isset($_COOKIE['email'])) {
        header('Location: auth/signin.php');
    }
    
    // Include data files to initialize session data
    include_once 'data/customers.php';
    include_once 'data/students.php';
    include_once 'data/orders.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#155dfd',
                        secondary: '#0b1a33',
                        dark: '#1a1a1a',
                        light: '#f8f9fa'
                    }
                }
            }
        }
    </script>
   
</head>
<body class="bg-dark min-h-screen">
    <!-- Main Dashboard Container -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav class="w-64 bg-secondary flex-shrink-0">
            <div class="h-full flex flex-col">
                <!-- Logo -->
                    <div class="flex items-center gap-4 p-6 border-b border-slate-700">
                        <div class="bg-primary rounded-lg flex items-center justify-center w-10 h-10">
                            <span class="text-white font-bold text-lg"><?php echo $_COOKIE['name'][0]; ?></span>
                        </div>
                        <h1 class="text-white text-xl font-bold">Hello, <?php echo $_COOKIE['name']; ?></h1>
                    </div>

                <!-- Navigation -->
                <ul class="flex-1 px-3 py-2">
                    <li class="mb-1">
                        <a class="flex items-center px-3 py-2 text-white rounded-lg hover:bg-primary transition-colors <?php echo (isset($_SESSION['active_tab']) && $_SESSION['active_tab'] == 'orders') || (!isset($_SESSION['active_tab']) && (!isset($_GET['tab']) || $_GET['tab'] != 'customers' && $_GET['tab'] != 'students')) ? 'bg-primary' : ''; ?>" href="#" data-tab="orders">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"></path>
                            </svg>
                            Orders
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="flex items-center px-3 py-2 text-white rounded-lg hover:bg-primary transition-colors <?php echo (isset($_SESSION['active_tab']) && $_SESSION['active_tab'] == 'customers') || (isset($_GET['tab']) && $_GET['tab'] == 'customers') ? 'bg-primary' : ''; ?>" href="#" data-tab="customers">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                            </svg>
                            Customers
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="flex items-center px-3 py-2 text-white rounded-lg hover:bg-primary transition-colors <?php echo (isset($_SESSION['active_tab']) && $_SESSION['active_tab'] == 'students') || (isset($_GET['tab']) && $_GET['tab'] == 'students') ? 'bg-primary' : ''; ?>" href="#" data-tab="students">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                            </svg>
                            Students
                        </a>
                    </li>
                </ul>

                <!-- User Info -->
                <div class="flex justify-center px-3 py-4 bg-slate-700 rounded-lg">
                    <a href="auth/logout.php" class="flex items-center text-red-400 hover:opacity-80">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                        </svg>
                        Logout
                    </a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 bg-dark overflow-auto">
            <!-- Orders Tab -->
            <div id="orders-tab" class="tab-content <?php 
                $showOrders = (isset($_SESSION['active_tab']) && $_SESSION['active_tab'] == 'orders') || 
                             (!isset($_SESSION['active_tab']) && (!isset($_GET['tab']) || $_GET['tab'] != 'customers' && $_GET['tab'] != 'students'));
                echo $showOrders ? 'block' : 'hidden'; 
            ?> h-full">
                <?php include 'Element/orders/index.php'; ?>
            </div>

            <!-- Customers Tab -->      
            <div id="customers-tab" class="tab-content <?php 
                $showCustomers = (isset($_SESSION['active_tab']) && $_SESSION['active_tab'] == 'customers') || 
                                (isset($_GET['tab']) && $_GET['tab'] == 'customers');
                echo $showCustomers ? 'block' : 'hidden'; 
            ?> h-full">
                <?php include 'Element/customers/index.php'; ?>
            </div>

            <!-- Students Tab -->
            <div id="students-tab" class="tab-content <?php 
                $showStudents = (isset($_SESSION['active_tab']) && $_SESSION['active_tab'] == 'students') || 
                               (isset($_GET['tab']) && $_GET['tab'] == 'students');
                echo $showStudents ? 'block' : 'hidden'; 
            ?> h-full">
                <?php include 'Element/students/index.php'; ?>
            </div>

            <!-- Modals -->
            <?php include 'Element/modals.php'; ?>
        </main>
    </div>
 <script src="assets/js/dashboard.js"></script>
</body>
</html>
