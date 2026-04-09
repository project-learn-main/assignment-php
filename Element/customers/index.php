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
                    <th class="text-left py-3 px-6 font-medium text-gray-300">Email</th>
                    <th class="text-left py-3 px-6 font-medium text-gray-300">Phone</th>
                    <th class="text-center py-3 px-6 font-medium text-gray-300">Orders</th>
                    <th class="text-left py-3 px-6 font-medium text-gray-300">Total Spent</th>
                    <th class="text-left py-3 px-6 font-medium text-gray-300">Join Date</th>
                    <th class="text-left py-3 px-6 font-medium text-gray-300">Status</th>
                    <th class="text-center py-3 px-6 font-medium text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-customer-id="1">
                    <td class="py-3 px-6">1</td>
                    <td class="py-3 px-6 font-semibold">John Smith</td>
                    <td class="py-3 px-6">john.smith@example.com</td>
                    <td class="py-3 px-6">+1 (555) 123-4567</td>
                    <td class="py-3 px-6 text-center">3</td>
                    <td class="py-3 px-6 font-semibold">$899.97</td>
                    <td class="py-3 px-6">2024-01-15</td>
                    <td class="py-3 px-6">
                        <span class="inline-block px-2 py-1 text-xs font-semibold text-white rounded-full bg-green-500">
                            Active
                        </span>
                    </td>
                    <td class="py-3 px-6">
                        <div class="flex justify-center gap-2">
                            <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="updateCustomer(1)">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteCustomer(1)">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-customer-id="2">
                    <td class="py-3 px-6">2</td>
                    <td class="py-3 px-6 font-semibold">Sarah Johnson</td>
                    <td class="py-3 px-6">sarah.j@example.com</td>
                    <td class="py-3 px-6">+1 (555) 987-6543</td>
                    <td class="py-3 px-6 text-center">2</td>
                    <td class="py-3 px-6 font-semibold">$449.98</td>
                    <td class="py-3 px-6">2024-02-20</td>
                    <td class="py-3 px-6">
                        <span class="inline-block px-2 py-1 text-xs font-semibold text-white rounded-full bg-green-500">
                            Active
                        </span>
                    </td>
                    <td class="py-3 px-6">
                        <div class="flex justify-center gap-2">
                            <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="updateCustomer(2)">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteCustomer(2)">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-customer-id="3">
                    <td class="py-3 px-6">3</td>
                    <td class="py-3 px-6 font-semibold">Mike Davis</td>
                    <td class="py-3 px-6">mike.davis@example.com</td>
                    <td class="py-3 px-6">+1 (555) 456-7890</td>
                    <td class="py-3 px-6 text-center">5</td>
                    <td class="py-3 px-6 font-semibold">$1259.95</td>
                    <td class="py-3 px-6">2024-01-10</td>
                    <td class="py-3 px-6">
                        <span class="inline-block px-2 py-1 text-xs font-semibold text-white rounded-full bg-green-500">
                            Active
                        </span>
                    </td>
                    <td class="py-3 px-6">
                        <div class="flex justify-center gap-2">
                            <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="updateCustomer(3)">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteCustomer(3)">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


