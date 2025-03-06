<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard - {{ config('app.name') }}</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white">
            <div class="p-4 font-bold text-xl">Admin Dashboard</div>
            <nav class="mt-6">
                <ul>
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="{{ route('dashboard') }}" class="flex items-center">
                            <i class="fas fa-users mr-3"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>                    
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="" class="flex items-center">
                            <i class="fas fa-users mr-3"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="{{ route('roles.index') }}" class="flex items-center">
                            <i class="fas fa-user-shield mr-3"></i>
                            <span>Roles</span>
                        </a>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="" class="flex items-center">
                            <i class="fas fa-tags mr-3"></i>
                            <span>Tags</span>
                        </a>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="" class="flex items-center">
                            <i class="fas fa-shuttle-van mr-3"></i>
                            <span>Navettes</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow p-6">
            @yield('content')
        </main>
    </div>

    <!-- Alpine.js (useful for interactive components) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>