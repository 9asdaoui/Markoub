@extends('admin.layout.admin')

@section('content')
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="text-2xl font-bold mb-6">Edit Role</h1>

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Role Name:</label>
                <input type="text" name="name" id="name" value="{{ $role->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required placeholder="Enter role name">
                <input type="hidden" name="role_id" id="role_id" value="{{ $role->role_id }}" >
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Permissions:</label>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($permissions as $permission)
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" 
                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }} class="mr-2">
                            <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('permissions')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Role
                </button>
                <a href="{{ route('roles.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection