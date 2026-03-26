<?php
// Initialize data files
function initializeDataFiles() {
    $dataDir = 'data';
    
    if (!is_dir($dataDir)) {
        mkdir($dataDir, 0755, true);
    }

    // Initialize orders file if not exists
    if (!file_exists($dataDir . '/orders.json')) {
        file_put_contents($dataDir . '/orders.json', json_encode([]));
    }

    // Initialize customers file if not exists
    if (!file_exists($dataDir . '/customers.json')) {
        file_put_contents($dataDir . '/customers.json', json_encode([]));
    }

    // Initialize students file if not exists
    if (!file_exists($dataDir . '/students.json')) {
        file_put_contents($dataDir . '/students.json', json_encode([]));
    }
}

// Get orders
function getOrders() {
    initializeDataFiles();
    
    if (file_exists('data/orders.json')) {
        $orders = json_decode(file_get_contents('data/orders.json'), true);
        return $orders ?: [];
    }
    return [];
}

// Save orders
function saveOrders($orders) {
    initializeDataFiles();
    file_put_contents('data/orders.json', json_encode($orders));
}

// Get customers
function getCustomers() {
    initializeDataFiles();
    
    if (file_exists('data/customers.json')) {
        $customers = json_decode(file_get_contents('data/customers.json'), true);
        return $customers ?: [];
    }
    return [];
}

// Save customers
function saveCustomers($customers) {
    initializeDataFiles();
    file_put_contents('data/customers.json', json_encode($customers));
}

// Get students
function getStudents() {
    initializeDataFiles();
    
    if (file_exists('data/students.json')) {
        $students = json_decode(file_get_contents('data/students.json'), true);
        return $students ?: [];
    }
    return [];
}

// Save students
function saveStudents($students) {
    initializeDataFiles();
    file_put_contents('data/students.json', json_encode($students));
}
?>
