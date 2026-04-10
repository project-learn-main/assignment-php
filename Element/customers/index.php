<?php
include_once __DIR__ . '/../../data/customers.php';

if (isset($_GET['idDelete']) && $_GET['idDelete'] != '') {
    foreach($_SESSION['customers'] as $index => $customer) {
        if($customer['id'] == $_GET['idDelete']) {
            unset($_SESSION['customers'][$index]);
            break;
        }
    }
}
?>
<!-- Header -->
<div class=" h-full">
    <div class="bg-gray-800 px-6 py-8">
        <div class="flex justify-between items-center py-4">
            <h2 class="text-white text-2xl font-semibold">Customers</h2>
            <button class="bg-primary hover:opacity-80 text-white px-4 py-2 rounded-lg transition-colors flex items-center" onclick="openModal('addCustomerModal')">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Customer
            </button>
        </div>
        <div class="py-3">
            <div class="flex gap-3">
                <div class="relative flex-1">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" class="w-full pl-10 pr-4 py-2 bg-gray-800 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-400" 
                        placeholder="Search by name or email..." 
                        value="<?php //echo htmlspecialchars($searchQuery); ?>"
                        id="customerSearch">
                </div>
                <div class="w-48">
                    <select class="w-full px-4 py-2 bg-gray-800 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="statusFilter">
                        <option value="all" <?php  
                        // echo $filterStatus === 'all' ? 'selected' : ''; ?>>
                        All Status</option>
                        <option value="active" <?php  //echo $filterStatus === 'active' ? 'selected' : ''; ?>>Active</option>
                        <option value="active" <?php  //echo $filterStatus === 'active' ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-white">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left py-3 px-6 font-medium text-gray-300">ID</th>
                    <th class="text-left py-3 px-6 font-medium text-gray-300">Name</th>
                    <th class="text-left py-3 px-6 font-medium text-gray-300">Phone</th>
                    <th class="text-center py-3 px-6 font-medium text-gray-300">Date of Birth</th>
                    <th class="text-left py-3 px-6 font-medium text-gray-300">Gender</th>
                    <th class="text-left py-3 px-6 font-medium text-gray-300">Address</th>
                    <th class="text-left py-3 px-6 font-medium text-gray-300">Personal Image</th>
                    <th class="text-center py-3 px-6 font-medium text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
             $dataCustomers = $_SESSION['customers']; 
             foreach ($dataCustomers as $customer) {
                echo '<tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-customer-id="' . $customer['id'] . '">';
                echo '<td class="py-3 px-6">' . $customer['id'] . '</td>';
                echo '<td class="py-3 px-6 font-semibold">' . $customer['name'] . '</td>';
                echo '<td class="py-3 px-6">' . $customer['phone'] . '</td>';
                echo '<td class="py-3 px-6">' . $customer['dateOfBirth'] . '</td>';
                echo '<td class="py-3 px-6">' . $customer['gender'] . '</td>';
                echo '<td class="py-3 px-6">' . $customer['address'] . '</td>';
                echo '<td class="py-3 px-6">';
                echo '<img src="' . $customer['image'] . '" alt="' . $customer['name'] . '" class="w-12 h-12 rounded-full">';
                echo '</td>';
                echo '<td class="py-3 px-6 text-center">';
                echo '<button class="px-3 py-1 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">Edit</button>';
                echo '<a href="index.php?tab=customers&idDelete=' . $customer['id'] . '" class="px-3 py-1 text-sm bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors ml-2">Delete</a>';
                echo '</td>';
                echo '</tr>';
             }
             ?>
                
            </tbody>
        </table>
    </div>
</div>


