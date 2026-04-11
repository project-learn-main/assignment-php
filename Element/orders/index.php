<?php
include_once __DIR__ . '/../../data/orders.php';
if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = $dataOrders;
}
foreach ($_SESSION['orders'] as &$order) {
    $order['total'] = $order['unitPrice'] * $order['quantity'];
}
unset($order);
?>
<!-- Header -->
<div class="h-full ">
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
                            value="<?php //echo htmlspecialchars($searchQuery); 
                                    ?>"
                            id="orderSearch">
                    </div>
                </div>
                <div class="w-48">
                    <select class="w-full px-4 py-2 bg-gray-800 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="statusFilter">
                        <option value="all" <?php
                                            // echo $filterStatus === 'all' ? 'selected' : ''; 
                                            ?>>
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
                    <th class="text-center py-3 px-6 font-medium text-gray-300">Total</th>
                    <th class="text-center py-3 px-6 font-medium text-gray-300">Status</th>
                    <th class="text-center py-3 px-6 font-medium text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dataOrders = $_SESSION['orders'];

                foreach ($dataOrders as $order) {
                    echo '<tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-order-id="' . $order['orderId'] . '">';
                    echo '<td class="py-3 px-6 font-semibold">' . $order['orderId'] . '</td>';
                    echo '<td class="py-3 px-6">' . $order['customer'] . '</td>';
                    echo '<td class="py-3 px-6">' . $order['orderDate'] . '</td>';
                    echo '<td class="py-3 px-6 font-semibold">$' . number_format($order['unitPrice'], 2) . '</td>';
                    echo '<td class="py-3 px-6 text-center">' . $order['quantity'] . '</td>';
                    echo '<td class="py-3 px-6 text-center">$' . number_format($order['unitPrice'] * $order['quantity'], 2) . '</td>';
                    echo '<td class="py-3 px-4">';
                    $status = $order['status'] ?? 'Pending';
                    echo '<form method="POST" action="actions/update_order_status.php" style="margin: 0;">';
                    echo '<input type="hidden" name="orderId" value="' . $order['orderId'] . '">';
                    echo '<select class="w-full px-2 py-1 bg-gray-700 border border-gray-600 text-white rounded text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                 name="status" onchange="this.form.submit()">';
                    echo '<option value="Đang xử lý"' . ($status === 'Đang xử lý' ? ' selected' : '') . '>Đang xử lý</option>';
                    echo '<option value="Đã xử lý"' . ($status === 'Đã xử lý' ? ' selected' : '') . '>Đã xử lý</option>';
                    echo '<option value="Vận Chuyển"' . ($status === 'Vận Chuyển' ? ' selected' : '') . '>Vận Chuyển</option>';
                    echo '<option value="Hoàn thành"' . ($status === 'Hoàn thành' ? ' selected' : '') . '>Hoàn thành</option>';
                    echo '<option value="Hủy đơn"' . ($status === 'Hủy đơn' ? ' selected' : '') . '>Hủy đơn</option>';
                    echo '</select>';
                    echo '</form>';
                    echo '</td>';
                    echo '<td class="py-3 px-6">';
                    echo '<div class="flex justify-center gap-2">';
                    echo '<button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="viewDetailOrder(\'' . $order['orderId'] . '\')">';
                    echo '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                    echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>';
                    echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
                    echo '</svg>';
                    echo '</button>';
                    echo '<button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteOrder(\'' . $order['orderId'] . '\')">';
                    echo '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                    echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>';
                    echo '</svg>';
                    echo '</button>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                }

                ?>
            </tbody>
        </table>
    </div>
</div>