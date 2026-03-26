<!-- Header -->
<div class="relative h-full">
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

<!-- Filters -->
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
                <th class="text-left py-3 px-6 font-medium text-gray-300">Student ID</th>
                <th class="text-left py-3 px-6 font-medium text-gray-300">Name</th>
                <th class="text-left py-3 px-6 font-medium text-gray-300">Email</th>
                <th class="text-left py-3 px-6 font-medium text-gray-300">Course</th>
                <th class="text-left py-3 px-6 font-medium text-gray-300">Year</th>
                <th class="text-left py-3 px-6 font-medium text-gray-300">GPA</th>
                <th class="text-left py-3 px-6 font-medium text-gray-300">Enrollment Date</th>
                <th class="text-left py-3 px-6 font-medium text-gray-300">Status</th>
                <th class="text-center py-3 px-6 font-medium text-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-student-id="STU001">
                <td class="py-3 px-6 font-semibold">STU001</td>
                <td class="py-3 px-6">Alice Johnson</td>
                <td class="py-3 px-6">alice.j@school.edu</td>
                <td class="py-3 px-6">Computer Science</td>
                <td class="py-3 px-6">3rd Year</td>
                <td class="py-3 px-6">
                    <span class="inline-block px-2 py-1 text-xs font-semibold text-white rounded-full bg-green-500">
                        3.8
                    </span>
                </td>
                <td class="py-3 px-6">2022-09-01</td>
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
                        <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="updateStudent('STU001')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteStudent('STU001')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
            <tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-student-id="STU002">
                <td class="py-3 px-6 font-semibold">STU002</td>
                <td class="py-3 px-6">Bob Smith</td>
                <td class="py-3 px-6">bob.smith@school.edu</td>
                <td class="py-3 px-6">Business Administration</td>
                <td class="py-3 px-6">2nd Year</td>
                <td class="py-3 px-6">
                    <span class="inline-block px-2 py-1 text-xs font-semibold text-white rounded-full bg-primary">
                        3.5
                    </span>
                </td>
                <td class="py-3 px-6">2023-09-01</td>
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
                        <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="updateStudent('STU002')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteStudent('STU002')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
            <tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-student-id="STU003">
                <td class="py-3 px-6 font-semibold">STU003</td>
                <td class="py-3 px-6">Carol Williams</td>
                <td class="py-3 px-6">carol.w@school.edu</td>
                <td class="py-3 px-6">Engineering</td>
                <td class="py-3 px-6">4th Year</td>
                <td class="py-3 px-6">
                    <span class="inline-block px-2 py-1 text-xs font-semibold text-white rounded-full bg-green-500">
                        3.9
                    </span>
                </td>
                <td class="py-3 px-6">2021-09-01</td>
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
                        <button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="updateStudent('STU003')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteStudent('STU003')">
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
        Showing 3 of 3 students
    </span>
    <div class="flex gap-2">
        <button class="px-4 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors">Previous</button>
        <button class="px-4 py-2 bg-primary text-white rounded-lg hover:opacity-80 transition-colors">Next</button>
    </div>
</div>
</div>

<script>
// Static search and filter functionality - no backend
document.getElementById('studentSearch').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});

document.getElementById('courseFilter').addEventListener('change', function() {
    const filterValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        if (filterValue === 'all') {
            row.style.display = '';
        } else {
            const courseCell = row.querySelector('td:nth-child(4)');
            const course = courseCell.textContent.toLowerCase();
            row.style.display = course.includes(filterValue) ? '' : 'none';
        }
    });
});
</script>
