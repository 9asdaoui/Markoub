<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Markoub - Find Your Navette</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <header class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <h1 class="text-3xl font-bold">Markoub</h1>
                </div>
                <nav class="hidden md:block">
                    <ul class="flex space-x-8">
                        <li><a href="#" class="hover:text-blue-200">Home</a></li>
                        <li><a href="#" class="hover:text-blue-200">My Bookings</a></li>
                        <li><a href="#" class="hover:text-blue-200">Profile</a></li>
                    </ul>
                </nav>
                <div>
                    @auth
                        <div class="flex items-center space-x-4">
                            <span>Welcome, {{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100">Logout</button>
                            </form>
                        </div>
                    @else
                        <div class="space-x-2">
                            <a href="{{ route('login') }}" class="bg-transparent border border-white text-white px-4 py-2 rounded-lg hover:bg-white hover:text-blue-600">Login</a>
                            <a href="{{ route('register') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100">Register</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <section class="py-12 bg-blue-700 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-8 text-center">Find Your Next Navette</h2>
            <div class="max-w-4xl mx-auto bg-white rounded-lg p-6 shadow-lg">
                <form action="{{ route('navettes.search') }}" method="GET" class="grid md:grid-cols-5 gap-4">
                    <div class="md:col-span-2">
                        <label for="departure_city" class="block text-gray-700 mb-2">From</label>
                        <select id="departure_city" name="departure_city" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select departure city</option>
                            @foreach($cities ?? [] as $city)
                                <option value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label for="arrival_city" class="block text-gray-700 mb-2">To</label>
                        <select id="arrival_city" name="arrival_city" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select arrival city</option>
                            @foreach($cities ?? [] as $city)
                                <option value="{{ $city }}">{{ $city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="departure_date" class="block text-gray-700 mb-2">Date</label>
                        <input type="date" id="departure_date" name="departure_date" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" min="{{ date('Y-m-d') }}">
                    </div>
                    <div class="md:col-span-5">
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-bold hover:bg-blue-700 transition duration-300">
                            Search Navettes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="py-16 container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8">Popular Routes</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($popularNavettes ?? [] as $navette)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold text-gray-800">{{ $navette->departure_city }} to {{ $navette->arrival_city }}</h3>
                            <span class="text-sm font-medium bg-blue-100 text-blue-800 py-1 px-3 rounded-full">{{ $navette->company->name }}</span>
                        </div>
                        
                        <div class="flex justify-between mb-4 text-gray-600">
                            <div>
                                <p class="font-bold">{{ date('H:i', strtotime($navette->departure_time)) }}</p>
                                <p class="text-sm">{{ $navette->departure_city }}</p>
                            </div>
                            <div class="flex flex-col items-center">
                                <div class="border-t-2 border-gray-300 w-16 my-2"></div>
                                <span class="text-xs">{{ \Carbon\Carbon::parse($navette->departure_time)->diffInHours($navette->arrival_time) }}h journey</span>
                            </div>
                            <div class="text-right">
                                <p class="font-bold">{{ date('H:i', strtotime($navette->arrival_time)) }}</p>
                                <p class="text-sm">{{ $navette->arrival_city }}</p>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-sm text-gray-500">
                                    <i class="fas fa-chair mr-1"></i>
                                    {{ $navette->seats_total - $navette->seats_booked }} seats available
                                </p>
                            </div>
                            <a href="{{ route('navettes.show', $navette->id) }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="md:col-span-3 text-center text-gray-500">
                    <p class="text-xl">No popular navettes available at the moment. Try searching for a specific route.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center">Why Choose Markoub?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-search text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Easy Search</h3>
                    <p class="text-gray-600">Find the perfect navette for your journey with our intuitive search system.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-ticket-alt text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Instant Booking</h3>
                    <p class="text-gray-600">Book your tickets online instantly without any hassle or waiting in line.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-building text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Top Companies</h3>
                    <p class="text-gray-600">Access services from the best transport companies all in one platform.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Markoub</h3>
                    <p class="text-gray-400">Finding your next navette has never been easier. Book with confidence and travel comfortably.</p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Search Navettes</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">My Bookings</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Popular Routes</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Casablanca - Marrakech</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Rabat - Tangier</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Fes - Agadir</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Meknes - Oujda</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2"></i>
                            <span>123 Transport Avenue, Casablanca, Morocco</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            <span>+212 522 123 456</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            <span>contact@markoub.ma</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Markoub. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>