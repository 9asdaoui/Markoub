@extends('admin.layout.admin')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Users Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-500 text-white mr-4">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Users</p>
                        <p class="text-2xl font-bold">{{ $userCount ?? 0 }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="" class="text-blue-500 hover:underline text-sm">View all users →</a>
                </div>
            </div>
            
            <!-- Navettes Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-500 text-white mr-4">
                        <i class="fas fa-shuttle-van text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Navettes</p>
                        <p class="text-2xl font-bold">{{ $navetteCount ?? 0 }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="" class="text-green-500 hover:underline text-sm">View all navettes →</a>
                </div>
            </div>
            
            <!-- Roles Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-500 text-white mr-4">
                        <i class="fas fa-user-shield text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">User Roles</p>
                        <p class="text-2xl font-bold">{{ $roleCount ?? 0 }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="" class="text-purple-500 hover:underline text-sm">Manage roles →</a>
                </div>
            </div>
            
            <!-- Tags Card -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-500 text-white mr-4">
                        <i class="fas fa-tags text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Total Tags</p>
                        <p class="text-2xl font-bold">{{ $tagCount ?? 0 }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="" class="text-yellow-500 hover:underline text-sm">Manage tags →</a>
                </div>
            </div>
        </div>
        
        <!-- Users Table Section -->
        <div class="mt-8 bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Users</h2>
            <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">Name</th>
                    <th class="py-2 px-4 border-b text-left">Email</th>
                    <th class="py-2 px-4 border-b text-left">Role</th>
                    <th class="py-2 px-4 border-b text-left">Joined Date</th>
                    <th class="py-2 px-4 border-b text-left">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users ?? [] as $user)
                    <tr>
                    <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->role->name ?? 'No Role' }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->created_at->format('M d, Y') }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="" class="text-blue-500 hover:underline mr-2">Edit</a>
                        <a href="" class="text-green-500 hover:underline">View</a>
                    </td>
                    </tr>
                @empty
                    <tr>
                    <td colspan="5" class="py-4 text-center text-gray-500">No users found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            </div>
            @if(isset($users) && method_exists($users, 'links'))
            <div class="mt-4">
                {{ $users->links() }}
            </div>
            @endif
        </div>
    </div>
@endsection