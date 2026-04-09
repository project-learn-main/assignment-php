<!-- Add Order Modal -->
<div id="addOrderModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800  overflow-y-auto text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Add New Order</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('addOrderModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/add_order.php" class="max-h-[800px]">
            <div class="p-4">
                <div class="mb-4">
                    <label for="orderId" class="block text-gray-300 font-medium mb-2">Mã don</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="orderId" name="orderId" required placeholder="ORD-XXX">
                </div>
                <div class="mb-4">
                    <label for="orderCustomer" class="block text-gray-300 font-medium mb-2">Tên khách hàng</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="orderCustomer" name="customer" required>
                </div>
                <div class="mb-4">
                    <label for="orderDate" class="block text-gray-300 font-medium mb-2">Ngày mua</label>
                    <input type="date" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="orderDate" name="orderDate" required>
                </div>
                <div class="mb-4">
                    <label for="orderStatus" class="block text-gray-300 font-medium mb-2">Trang thái don hàng</label>
                    <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                            id="orderStatus" name="status" required>
                        <option value="processing">Đang xử lý</option>
                        <option value="processed">Đã xử lý</option>
                        <option value="shipping">Đang vận chuyển</option>
                        <option value="completed">Hoàn thành</option>
                        <option value="cancelled">Hủy đơn</option>
                    </select>
                </div>
                
                <!-- Product Information -->
                <div class="mb-4">
                    <label for="productId" class="block text-gray-300 font-medium mb-2">Mã sp</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="productId" name="productId" required placeholder="PRD-XXX">
                </div>
                <div class="mb-4">
                    <label for="productName" class="block text-gray-300 font-medium mb-2">Tên sp</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="productName" name="productName" required>
                </div>
                <div class="mb-4">
                    <label for="unitPrice" class="block text-gray-300 font-medium mb-2">Don giá</label>
                    <input type="number" step="0.01" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="unitPrice" name="unitPrice" required>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-300 font-medium mb-2">Sô luong</label>
                    <input type="number" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="quantity" name="quantity" required>
                </div>
                <div class="mb-4">
                    <label for="productImage" class="block text-gray-300 font-medium mb-2">Hình anh</label>
                    <input type="file" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:text-gray-400" 
                           id="productImage" name="productImage" accept="image/*">
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('addOrderModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Add Order</button>
            </div>
        </form>
    </div>
</div>

<!-- Update Order Modal -->
<div id="updateOrderModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Update Order</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('updateOrderModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/update_order.php">
            <input type="hidden" id="updateOrderId" name="id">
            <div class="p-4">
                <div class="mb-4">
                    <label for="updateOrderCustomer" class="block text-gray-300 font-medium mb-2">Customer Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="updateOrderCustomer" name="customer" required>
                </div>
                <div class="mb-4">
                    <label for="updateOrderAmount" class="block text-gray-300 font-medium mb-2">Amount</label>
                    <input type="number" step="0.01" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="updateOrderAmount" name="amount" required>
                </div>
                <div class="mb-4">
                    <label for="updateOrderItems" class="block text-gray-300 font-medium mb-2">Number of Items</label>
                    <input type="number" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="updateOrderItems" name="items" required>
                </div>
                <div class="mb-4">
                    <label for="updateOrderStatus" class="block text-gray-300 font-medium mb-2">Status</label>
                    <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="updateOrderStatus" name="status" required>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                    </select>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('updateOrderModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Update Order</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Order Modal -->
<div id="deleteOrderModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Delete Order</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('deleteOrderModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/delete_order.php">
            <input type="hidden" id="deleteOrderId" name="id">
            <div class="p-4">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white text-center mb-2">Delete Order</h3>
                <p class="text-gray-300 text-center mb-4">Are you sure you want to delete this order? This action cannot be undone.</p>
                <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
                    <p class="text-sm text-gray-400 mb-1">Order Information:</p>
                    <p class="text-white font-semibold" id="deleteOrderInfo"></p>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('deleteOrderModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Delete Order</button>
            </div>
        </form>
    </div>
</div>

<!-- Update Customer Modal -->
<div id="updateCustomerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Update Customer</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('updateCustomerModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/update_customer.php">
            <input type="hidden" id="updateCustomerId" name="id">
            <div class="p-4">
                <div class="mb-4">
                    <label for="updateCustomerName" class="block text-gray-300 font-medium mb-2">Full Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="updateCustomerName" name="name" required>
                </div>
                <div class="mb-4">
                    <label for="updateCustomerEmail" class="block text-gray-300 font-medium mb-2">Email Address</label>
                    <input type="email" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="updateCustomerEmail" name="email" required>
                </div>
                <div class="mb-4">
                    <label for="updateCustomerPhone" class="block text-gray-300 font-medium mb-2">Phone Number</label>
                    <input type="tel" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="updateCustomerPhone" name="phone" required>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('updateCustomerModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Update Customer</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Customer Modal -->
<div id="deleteCustomerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Delete Customer</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('deleteCustomerModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/delete_customer.php">
            <input type="hidden" id="deleteCustomerId" name="id">
            <div class="p-4">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white text-center mb-2">Delete Customer</h3>
                <p class="text-gray-300 text-center mb-4">Are you sure you want to delete this customer? This action cannot be undone.</p>
                <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
                    <p class="text-sm text-gray-400 mb-1">Customer Information:</p>
                    <p class="text-white font-semibold" id="deleteCustomerInfo"></p>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('deleteCustomerModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Delete Customer</button>
            </div>
        </form>
    </div>
</div>

<!-- Update Student Modal -->
<div id="updateStudentModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Update Student</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('updateStudentModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/update_student.php">
            <input type="hidden" id="updateStudentId" name="id">
            <div class="p-4">
                <div class="mb-4">
                    <label for="updateStudentName" class="block text-gray-300 font-medium mb-2">Full Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="updateStudentName" name="name" required>
                </div>
                <div class="mb-4">
                    <label for="updateStudentEmail" class="block text-gray-300 font-medium mb-2">Email Address</label>
                    <input type="email" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="updateStudentEmail" name="email" required>
                </div>
                <div class="mb-4">
                    <label for="updateStudentIdNum" class="block text-gray-300 font-medium mb-2">Student ID</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="updateStudentIdNum" name="studentId" required>
                </div>
                <div class="mb-4">
                    <label for="updateStudentCourse" class="block text-gray-300 font-medium mb-2">Course</label>
                    <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="updateStudentCourse" name="course" required>
                        <option value="">Select Course</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Business Administration">Business Administration</option>
                        <option value="Engineering">Engineering</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="updateStudentYear" class="block text-gray-300 font-medium mb-2">Year</label>
                    <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="updateStudentYear" name="year" required>
                        <option value="">Select Year</option>
                        <option value="1st Year">1st Year</option>
                        <option value="2nd Year">2nd Year</option>
                        <option value="3rd Year">3rd Year</option>
                        <option value="4th Year">4th Year</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="updateStudentGpa" class="block text-gray-300 font-medium mb-2">GPA</label>
                    <input type="number" step="0.1" min="0" max="4" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="updateStudentGpa" name="gpa" required>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('updateStudentModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Update Student</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Student Modal -->
<div id="deleteStudentModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Delete Student</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('deleteStudentModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/delete_student.php">
            <input type="hidden" id="deleteStudentId" name="id">
            <div class="p-4">
                <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.268 18.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white text-center mb-2">Delete Student</h3>
                <p class="text-gray-300 text-center mb-4">Are you sure you want to delete this student? This action cannot be undone.</p>
                <div class="bg-gray-900 p-4 rounded-lg border border-gray-700">
                    <p class="text-sm text-gray-400 mb-1">Student Information:</p>
                    <p class="text-white font-semibold" id="deleteStudentInfo"></p>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('deleteStudentModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">Delete Student</button>
            </div>
        </form>
    </div>
</div>

<!-- Add Customer Modal -->
<div id="addCustomerModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Add New Customer</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('addCustomerModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form method="POST" action="actions/add_customer.php">
            <div class="p-4">
                <div class="mb-4">
                    <label for="customerName" class="block text-gray-300 font-medium mb-2">Full Name</label>
                    <input type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="customerName" name="name" required>
                </div>
                <div class="mb-4">
                    <label for="customerEmail" class="block text-gray-300 font-medium mb-2">Email Address</label>
                    <input type="email" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="customerEmail" name="email" required>
                </div>
                <div class="mb-4">
                    <label for="customerPhone" class="block text-gray-300 font-medium mb-2">Phone Number</label>
                    <input type="tel" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           id="customerPhone" name="phone" required>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('addCustomerModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Add Customer</button>
            </div>
        </form>
    </div>
</div>

<!-- View Order Details Modal -->
<div id="viewOrderDetailsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-gray-800 text-white rounded-xl max-w-md w-full mx-4">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h5 class="text-lg font-semibold">Order Details</h5>
            <button type="button" class="text-gray-400 hover:text-white transition-colors" onclick="closeModal('viewOrderDetailsModal')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <!-- Order Information -->
            <div class="mb-6">
                <h6 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Order Information</h6>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-400">Order ID</p>
                        <p class="text-white font-semibold" id="viewOrderId"></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-400">Customer</p>
                        <p class="text-white font-semibold" id="viewOrderCustomer"></p>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="mb-6">
                <h6 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-3">Products</h6>
                <div class="space-y-3" id="viewOrderItems">
                    <!-- Items will be populated by JavaScript -->
                </div>
            </div>

            <!-- Order Total -->
            <div class="border-t border-gray-700 pt-4">
                <div class="flex justify-between items-center">
                    <span class="text-lg font-semibold text-white">Total:</span>
                    <span class="text-xl font-bold text-primary" id="viewOrderTotal"></span>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">

                <!-- Additional Fields (Hidden for now, can be expanded) -->
                <div class="mb-4">
                    <label for="orderAddress" class="block text-gray-300 font-medium mb-2">Shipping Address</label>
                    <textarea class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                              id="orderAddress" name="address" rows="3" placeholder="Enter shipping address"></textarea>
                </div>
                <div class="mb-4">
                    <label for="orderPayment" class="block text-gray-300 font-medium mb-2">Payment Method</label>
                    <select class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                            id="orderPayment" name="paymentMethod">
                        <option value="">Select Payment Method</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="debit_card">Debit Card</option>
                        <option value="paypal">PayPal</option>
                        <option value="cash_on_delivery">Cash on Delivery</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="orderNotes" class="block text-gray-300 font-medium mb-2">Order Notes</label>
                    <textarea class="w-full px-4 py-2 bg-gray-900 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                              id="orderNotes" name="notes" rows="2" placeholder="Additional order notes (optional)"></textarea>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 p-4 border-t border-gray-700">
                <button type="button" class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors" onclick="closeModal('addOrderModal')">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Add Order</button>
            </div>
        </form>
    </div>
</div>

