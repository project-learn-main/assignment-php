<?php
$customer = [
    [
        'id' => '1', 
        'name' => 'John Smith',
        'phone' => '123-456-7890',
        'dateOfBirth' => '1990-05-15',
        'gender' => 'Male',
        'address' => '123 Main St, City, State',
        'image' => ''
    ],
    [
        'id' => '2', 
        'name' => 'Sarah Johnson',
        'phone' => '098-765-4321',
        'dateOfBirth' => '1985-08-22',
        'gender' => 'Female',
        'address' => '456 Oak Ave, City, State',
        'image' => ''
    ],
    [
        'id' => '3', 
        'name' => 'Mike Davis',
        'phone' => '555-123-4567',
        'dateOfBirth' => '1992-12-03',
        'gender' => 'Male',
        'address' => '789 Pine St, City, State',
        'image' => ''
    ],
    // [
    //     'id' => '4', 
    //     'name' => 'Emma Wilson',
    //     'phone' => '444-987-6543',
    //     'dateOfBirth' => '1988-03-10',
    //     'gender' => 'Female',
    //     'address' => '321 Elm St, City, State',
    //     'image' => ''
    // ],
    // [
    //     'id' => '5', 
    //     'name' => 'Alex Brown',
    //     'phone' => '333-555-1234',
    //     'dateOfBirth' => '1995-07-18',
    //     'gender' => 'Male',
    //     'address' => '654 Maple Dr, City, State',
    //     'image' => ''
    // ],
    // [
    //     'id' => '6', 
    //     'name' => 'Lisa Chen',
    //     'phone' => '222-444-5555',
    //     'dateOfBirth' => '1993-11-05',
    //     'gender' => 'Female',
    //     'address' => '987 Cedar St, City, State',
    //     'image' => ''
    // ],
    // [
    //     'id' => '7', 
    //     'name' => 'James Miller',
    //     'phone' => '111-222-3333',
    //     'dateOfBirth' => '1987-09-12',
    //     'gender' => 'Male',
    //     'address' => '147 Birch St, City, State',
    //     'image' => ''
    // ],
    // [
    //     'id' => '8', 
    //     'name' => 'Sarah Davis',
    //     'phone' => '666-777-8888',
    //     'dateOfBirth' => '1991-02-28',
    //     'gender' => 'Female',
    //     'address' => '258 Spruce St, City, State',
    //     'image' => ''
    // ],
    // [
    //     'id' => '9', 
    //     'name' => 'Tom Wilson',
    //     'phone' => '777-888-9999',
    //     'dateOfBirth' => '1989-06-14',
    //     'gender' => 'Male',
    //     'address' => '369 Willow St, City, State',
    //     'image' => ''
    // ],
    // [
    //     'id' => '10', 
    //     'name' => 'Amy Johnson',
    //     'phone' => '888-999-0000',
    //     'dateOfBirth' => '1994-04-20',
    //     'gender' => 'Female',
    //     'address' => '741 Oak St, City, State',
    //     'image' => ''
    // ]
    
    
];
if (!isset($_SESSION['customers'])) {
    $_SESSION['customers'] = $customer;
}

?>