    <div>
        <h2 class="main-title">Manage Tags</h2>
        <div class="container mx-auto p-4">
            <!-- Filter tabs -->
            <div class="flex flex-wrap gap-2 mb-6">
                <button class="px-4 py-2 bg-white rounded-full text-gray-700 font-medium shadow-sm flex items-center">
                    All Users <span class="ml-2 bg-gray-200 text-gray-700 text-xs px-2 py-0.5 rounded-full">283</span>
                </button>
                <button class="px-4 py-2 bg-white rounded-full text-gray-700 font-medium shadow-sm flex items-center">
                    Active <span class="ml-2 bg-gray-200 text-gray-700 text-xs px-2 py-0.5 rounded-full">206</span>
                </button>
                <button class="px-4 py-2 bg-white rounded-full text-gray-700 font-medium shadow-sm flex items-center">
                    Premium <span class="ml-2 bg-gray-200 text-gray-700 text-xs px-2 py-0.5 rounded-full">15</span>
                </button>
                <button class="px-4 py-2 bg-white rounded-full text-gray-700 font-medium shadow-sm flex items-center">
                    New <span class="ml-2 bg-gray-200 text-gray-700 text-xs px-2 py-0.5 rounded-full">15</span>
                </button>
            </div>

            <!-- Search and actions bar -->
            <div class="flex flex-col sm:flex-row justify-between gap-4 mb-4">
                <div class="relative w-full sm:w-64">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" id="searchInput" class="pl-10 pr-4 py-2 border border-gray-300 rounded-md w-full" placeholder="Search users...">
                </div>
                <div class="relative">
                    <button id="actionButton" class="bg-white border border-gray-300 rounded-md px-4 py-2 inline-flex items-center text-gray-700">
                        Actions
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="actionDropdown" class="hidden absolute right-0 mt-1 w-48 bg-white rounded-md shadow-lg z-10">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Export Selected</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete Selected</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Change Status</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left">
                            <input type="checkbox" id="selectAll" class="h-4 w-4 text-purple-600 rounded">
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                            User Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="userTableBody">
                    <!-- User data will be populated here by JavaScript -->
                    @foreach($tags as $tag)
                        <tr>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" class="userCheckbox h-4 w-4 text-purple-600 rounded">
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$tag->name}}</td>


                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-left">
                                <button class="text-gray-400 p-3 hover:text-gray-700">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    <div class="flex items-center">
                        <select id="rowsPerPage" class="mr-4 pl-3 pr-8 py-1 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> - <span class="font-medium">10</span> of <span class="font-medium">100</span>
                    </span>
                    </div>
                    <div class="flex justify-between sm:justify-end">
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">

                            <button class="relative inline-flex items-center px-2 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                                1
                            </button>
                            <button data-label="1" class="relative inline-flex items-center px-2 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        // Sample user data
        const users = [
            { id: 'USR79084', name: 'John Smith', role: 'Admin', joinDate: '12-03-2023', status: 'Active' },
            { id: 'USR79085', name: 'Sarah Johnson', role: 'User', joinDate: '14-03-2023', status: 'Active' },
            { id: 'USR79086', name: 'Michael Brown', role: 'Premium', joinDate: '15-03-2023', status: 'Active' },
            { id: 'USR79087', name: 'Emily Davis', role: 'User', joinDate: '18-03-2023', status: 'Active' },
            { id: 'USR79088', name: 'Robert Wilson', role: 'Premium', joinDate: '20-03-2023', status: 'Disabled' },
            { id: 'USR79089', name: 'Jennifer Lee', role: 'User', joinDate: '22-03-2023', status: 'Disabled' },
            { id: 'USR79090', name: 'David Martinez', role: 'User', joinDate: '25-03-2023', status: 'Active' },
            { id: 'USR79091', name: 'Lisa Robinson', role: 'Admin', joinDate: '27-03-2023', status: 'Active' }
        ];

        // Function to render users table
        function renderUsers() {
            const tableBody = document.getElementById('userTableBody');
            tableBody.innerHTML = '';

            users.forEach(user => {
                const row = document.createElement('tr');

                // Create status badge class based on status
                const statusClass = user.status === 'Active'
                    ? 'bg-green-100 text-green-800'
                    : 'bg-orange-100 text-orange-800';

                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap">
                        <input type="checkbox" class="userCheckbox h-4 w-4 text-purple-600 rounded">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-semibold">
                                    ${user.name.split(' ').map(n => n[0]).join('')}
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">${user.name}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${user.id}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${user.role}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="text-indigo-600 hover:text-indigo-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </button>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${user.joinDate}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                            ${user.status}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button class="text-gray-400 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Toggle action dropdown
        document.getElementById('actionButton').addEventListener('click', function() {
            document.getElementById('actionDropdown').classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            if (!document.getElementById('actionButton').contains(e.target)) {
                document.getElementById('actionDropdown').classList.add('hidden');
            }
        });

        // Handle select all checkbox
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.userCheckbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Initialize the table
        document.addEventListener('DOMContentLoaded', function() {
            renderUsers();
        });
    </script>


