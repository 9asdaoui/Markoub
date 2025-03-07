@extends('admin.layout.admin')

@section('content')
    <div class="container mx-auto px-4">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">User Management</h1>
            </div>

            <!-- Filter -->
            <div class="mb-6 flex justify-end">
                <div class="flex gap-3 w-full sm:w-auto">
                    <select id="roleFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <option value="">All Roles</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Users Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($user->role)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $user->role->name === 'Admin' ? 'bg-red-100 text-red-800' : 
                                               ($user->role->name === 'Manager' ? 'bg-blue-100 text-blue-800' : 
                                                'bg-green-100 text-green-800') }}">
                                            {{ $user->role->name }}
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            No Role
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button 
                                            onclick="openRoleModal({{ $user->id }}, '{{ $user->name }}')"
                                            class="text-blue-600 hover:text-blue-900">
                                            <i class="fas fa-user-tag mr-1"></i> Assign Role
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">No users found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <!-- Role Assignment Modal -->
    <div id="roleModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900">Assign Role to <span id="userName"></span></h3>
                <button onclick="closeRoleModal()" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form id="roleForm" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="user_id" id="userId">
                
                <div class="mb-4">
                    <label for="role_id" class="block text-sm font-medium text-gray-700 mb-1">Select Role</label>
                    <select name="role_id" id="role_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="flex justify-end space-x-3 mt-5">
                    <button type="button" onclick="closeRoleModal()" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openRoleModal(userId, userName) {
            document.getElementById('userId').value = userId;
            document.getElementById('userName').textContent = userName;
            document.getElementById('roleModal').classList.remove('hidden');
            document.getElementById('roleForm').action = "{{ route('admin.users.update-role', '') }}/" + userId;
        }

        function closeRoleModal() {
            document.getElementById('roleModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('roleModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeRoleModal();
            }
        });

        // Role filter
        document.getElementById('roleFilter').addEventListener('change', function() {
            const roleId = this.value;
            const rows = document.querySelectorAll('tbody tr');
            
            if (roleId === '') {
                rows.forEach(row => {
                    row.style.display = '';
                });
                return;
            }
            
            rows.forEach(row => {
                const roleCell = row.querySelector('td:nth-child(4)');
                const showRow = roleCell.querySelector('span').textContent.trim() === 
                    this.options[this.selectedIndex].text.trim();
                
                row.style.display = showRow ? '' : 'none';
            });
        });

    </script>
@endsection