<!-- Header -->
<div class="relative h-full ">
<div class="bg-gray-800 px-6 py-8">
<div class="flex justify-between items-center py-4">
    <h2 class="text-white text-2xl font-semibold">Orders</h2>
    <button class="bg-primary hover:opacity-80 text-white px-4 py-2 rounded-lg transition-colors flex items-center" 
    onclick="openModal('addOrderModal')">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        New Order
    </button>
</div>

<!-- Filters -->
<div class="py-3">
    <div class="flex gap-3">
        <div class="flex-1">
            <div class="relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" class="w-full pl-10 pr-4 py-2 bg-gray-800 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-400" 
                       placeholder="Search by order ID or customer..." 
                       value="<?php //echo htmlspecialchars($searchQuery); ?>"
                       id="orderSearch">
            </div>
        </div>
        <div class="w-48">
            <select class="w-full px-4 py-2 bg-gray-800 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="statusFilter">
                <option value="all" <?php  
                // echo $filterStatus === 'all' ? 'selected' : ''; ?>>
                All Status</option>
                <option value="pending">Pending</option>
                <option value="processing">>Processing</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
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
                <th class="text-left py-3 px-6 font-medium text-gray-300">Order ID</th>
                <th class="text-left py-3 px-6 font-medium text-gray-300">Customer</th>
                <th class="text-left py-3 px-6 font-medium text-gray-300">Date</th>
                <th class="text-left py-3 px-6 font-medium text-gray-300">Amount</th>
                <th class="text-center py-3 px-6 font-medium text-gray-300">Items</th>
                <th class="text-left py-3 px-6 font-medium text-gray-300">Status</th>
                <th class="text-center py-3 px-6 font-medium text-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-order-id="ORD-001">
                <td class="py-3 px-6 font-semibold">#ORD-001</td>
                <td class="py-3 px-6">John Smith</td>
                <td class="py-3 px-6">2024-03-15</td>
                <td class="py-3 px-6 font-semibold">$299.99</td>
                <td class="py-3 px-6 text-center">3</td>
                <td class="py-3 px-6">
                    <select class="px-2 py-1 text-xs font-semibold text-white rounded-full bg-green-500 border-0 focus:ring-2 focus:ring-blue-500" 
                            onchange="updateOrderStatus('ORD-001', this.value)">
                        <option value="pending" class="bg-gray-800">Pending</option>
                        <option value="processing" class="bg-gray-800">Processing</option>
                        <option value="shipped" class="bg-gray-800">Shipped</option>
                        <option value="delivered" selected class="bg-gray-800">Delivered</option>
                        <option value="cancelled" class="bg-gray-800">Cancelled</option>
                    </select>
                </td>
                <td class="py-3 px-6">
                    <div class="flex justify-center gap-2">
                        <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="viewDetailOrder('ORD-001')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="updateOrder('ORD-001')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteOrder('ORD-001')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
            <tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-order-id="ORD-002">
                <td class="py-3 px-6 font-semibold">#ORD-002</td>
                <td class="py-3 px-6">Sarah Johnson</td>
                <td class="py-3 px-6">2024-03-14</td>
                <td class="py-3 px-6 font-semibold">$149.99</td>
                <td class="py-3 px-6 text-center">2</td>
                <td class="py-3 px-6">
                    <select class="px-2 py-1 text-xs font-semibold text-white rounded-full bg-primary border-0 focus:ring-2 focus:ring-blue-500" 
                            onchange="updateOrderStatus('ORD-002', this.value)">
                        <option value="pending" class="bg-gray-800">Pending</option>
                        <option value="processing" class="bg-gray-800">Processing</option>
                        <option value="shipped" selected class="bg-gray-800">Shipped</option>
                        <option value="delivered" class="bg-gray-800">Delivered</option>
                        <option value="cancelled" class="bg-gray-800">Cancelled</option>
                    </select>
                </td>
                <td class="py-3 px-4">
                    <div class="flex justify-center gap-2">
                        <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="viewDetailOrder('ORD-002')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="updateOrder('ORD-002')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteOrder('ORD-002')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
            <tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-order-id="ORD-003">
                <td class="py-3 px-6 font-semibold">#ORD-003</td>
                <td class="py-3 px-6">Mike Davis</td>
                <td class="py-3 px-6">2024-03-13</td>
                <td class="py-3 px-6 font-semibold">$459.99</td>
                <td class="py-3 px-6 text-center">5</td>
                <td class="py-3 px-6">
                    <select class="px-2 py-1 text-xs font-semibold text-white rounded-full bg-yellow-500 border-0 focus:ring-2 focus:ring-blue-500" 
                            onchange="updateOrderStatus('ORD-003', this.value)">
                        <option value="pending" class="bg-gray-800">Pending</option>
                        <option value="processing" selected class="bg-gray-800">Processing</option>
                        <option value="shipped" class="bg-gray-800">Shipped</option>
                        <option value="delivered" class="bg-gray-800">Delivered</option>
                        <option value="cancelled" class="bg-gray-800">Cancelled</option>
                    </select>
                </td>
                <td class="py-3 px-4">
                    <div class="flex justify-center gap-2">
                        <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="viewDetailOrder('ORD-003')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="updateOrder('ORD-003')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteOrder('ORD-003')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
            <tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-order-id="ORD-004">
                <td class="py-3 px-6 font-semibold">#ORD-004</td>
                <td class="py-3 px-6">Emma Wilson</td>
                <td class="py-3 px-6">2024-03-12</td>
                <td class="py-3 px-6 font-semibold">$199.99</td>
                <td class="py-3 px-6 text-center">1</td>
                <td class="py-3 px-6">
                    <select class="px-2 py-1 text-xs font-semibold text-white rounded-full bg-gray-500 border-0 focus:ring-2 focus:ring-blue-500" 
                            onchange="updateOrderStatus('ORD-004', this.value)">
                        <option value="pending" selected class="bg-gray-800">Pending</option>
                        <option value="processing" class="bg-gray-800">Processing</option>
                        <option value="shipped" class="bg-gray-800">Shipped</option>
                        <option value="delivered" class="bg-gray-800">Delivered</option>
                        <option value="cancelled" class="bg-gray-800">Cancelled</option>
                    </select>
                </td>
                <td class="py-3 px-4">
                    <div class="flex justify-center gap-2">
                        <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="viewDetailOrder('ORD-004')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="updateOrder('ORD-004')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteOrder('ORD-004')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
            <tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-order-id="ORD-005">
                <td class="py-3 px-6 font-semibold">#ORD-005</td>
                <td class="py-3 px-6">Alex Brown</td>
                <td class="py-3 px-6">2024-03-11</td>
                <td class="py-3 px-6 font-semibold">$349.99</td>
                <td class="py-3 px-6 text-center">4</td>
                <td class="py-3 px-6">
                    <select class="px-2 py-1 text-xs font-semibold text-white rounded-full bg-green-500 border-0 focus:ring-2 focus:ring-blue-500" 
                            onchange="updateOrderStatus('ORD-005', this.value)">
                        <option value="pending" class="bg-gray-800">Pending</option>
                        <option value="processing" class="bg-gray-800">Processing</option>
                        <option value="shipped" class="bg-gray-800">Shipped</option>
                        <option value="delivered" selected class="bg-gray-800">Delivered</option>
                        <option value="cancelled" class="bg-gray-800">Cancelled</option>
                    </select>
                </td>
                <td class="py-3 px-6">
                    <div class="flex justify-center gap-2">
                        <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="viewDetailOrder('ORD-005')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="updateOrder('ORD-005')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteOrder('ORD-005')">
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

<!-- Footer -->
<div class="absolute bottom-0 left-0 right-0 flex justify-between items-center p-6 border-t border-gray-700">
    <span class="text-gray-400">
        Showing 5 of 5 orders
    </span>
    <div class="flex gap-2">
        <button class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors">Previous</button>
        <button class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Next</button>
    </div>
</div>
</div>

<script>
// Static search functionality - no backend
document.getElementById('orderSearch').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});

document.getElementById('statusFilter').addEventListener('change', function() {
    const filterValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        if (filterValue === 'all') {
            row.style.display = '';
        } else {
            const statusSelect = row.querySelector('td:nth-child(6) select');
            const status = statusSelect.value.toLowerCase();
            row.style.display = status.includes(filterValue) ? '' : 'none';
        }
    });
});

// Function to update order status
function updateOrderStatus(orderId, newStatus) {
    // Update select background color based on status
    const select = event.target;
    select.className = 'px-2 py-1 text-xs font-semibold text-white rounded-full border-0 focus:ring-2 focus:ring-blue-500';
    
    switch(newStatus) {
        case 'pending':
            select.classList.add('bg-gray-500');
            break;
        case 'processing':
            select.classList.add('bg-yellow-500');
            break;
        case 'shipped':
            select.classList.add('bg-primary');
            break;
        case 'delivered':
            select.classList.add('bg-green-500');
            break;
        case 'cancelled':
            select.classList.add('bg-red-500');
            break;
    }
    
    // Here you would normally send an AJAX request to update the backend
    console.log(`Order ${orderId} status updated to: ${newStatus}`);
    
    // Show success message (optional)
    const originalBg = select.style.backgroundColor;
    select.style.backgroundColor = '#10b981';
    setTimeout(() => {
        select.style.backgroundColor = originalBg;
    }, 500);
}
</script>
