<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '/../../data/students.php';
?>

<!-- Header -->
<div class="h-full">
    <div class="bg-gray-800 px-6 py-8">
        <div class="flex justify-between items-center py-4">
            <h2 class="text-white text-2xl font-semibold">Students</h2>
            <button class="bg-primary hover:opacity-80 text-white px-4 py-2 rounded-lg transition-colors flex items-center" onclick="openModal('addStudentModal')">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Student
            </button>
        </div>

        <div class="py-3">
            <div class="flex gap-3">
                <div class="flex-1">
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" class="w-full pl-10 pr-4 py-2 bg-gray-800 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-400" 
                            placeholder="Search by name, email, or student ID..." 
                            value="<?php //echo htmlspecialchars($searchQuery); ?>"
                            id="studentSearch">
                    </div>
                </div>
                <div class="w-48">
                    <select class="w-full px-4 py-2 bg-gray-800 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="courseFilter">
                        <option value="all" 
                        <?php //echo $filterCourse === 'all' ? 'selected' : ''; ?>>
                        All Courses</option>
                        <option value="Computer Science" <?php //echo $filterCourse === 'Computer Science' ? 'selected' : ''; ?>>Computer Science</option>
                        <option value="Business Administration" <?php //echo $filterCourse === 'Business Administration' ? 'selected' : ''; ?>>Business Administration</option>
                        <option value="Engineering" <?php //echo $filterCourse === 'Engineering' ? 'selected' : ''; ?>>Engineering</option>
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
                    <th class="text-left py-3 px-6 font-medium text-gray-300">Image</th>
                    <th class="text-center py-3 px-6 font-medium text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $students = $_SESSION['students']; 
                foreach ($students as $student) {
                    echo '<tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-student-id="' . $student['id'] . '">';
                    echo '<td class="py-3 px-6 font-semibold">' . $student['id'] . '</td>';
                    echo '<td class="py-3 px-6">' . $student['name'] . '</td>';
                    echo '<td class="py-3 px-6">' . $student['email'] . '</td>';
                    echo '<td class="py-3 px-6">';
                    echo '<img src="' . $student['image'] . '" alt="' . $student['name'] . '" class="w-12 h-12 rounded-full">';
                    echo '</td>';
                    echo '<td class="py-3 px-6 text-center">';
                    echo '<button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="viewStudent(\'' . $student['id'] . '\')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </button>';
                    echo '<button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="updateStudent(\'' . $student['id'] . '\')">';
                    echo '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                    echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>';
                    echo '</svg>';
                    echo '</button>';
                    echo '<button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteStudent(\'' . $student['id'] . '\')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


