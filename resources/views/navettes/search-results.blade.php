@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Markoub - Search Results</title>
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
                        <li><a href="/" class="hover:text-blue-200">Home</a></li>
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

    <section class="py-8 bg-blue-700 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-6 text-center">Search Navettes</h2>
            <div class="max-w-4xl mx-auto bg-white rounded-lg p-6 shadow-lg">
                <form action="{{ route('navettes.search') }}" method="GET" class="grid md:grid-cols-5 gap-4">
                    <div class="md:col-span-2">
                        <label for="departure_city" class="block text-gray-700 mb-2">From</label>
                        <select id="departure_city" name="departure_city" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select departure city</option>
                            @foreach($cities as $city)
                                <option value="{{ $city }}" {{ $searchParams['departure_city'] == $city ? 'selected' : '' }}>{{ $city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label for="arrival_city" class="block text-gray-700 mb-2">To</label>
                        <select id="arrival_city" name="arrival_city" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select arrival city</option>
                            @foreach($cities as $city)
                                <option value="{{ $city }}" {{ $searchParams['arrival_city'] == $city ? 'selected' : '' }}>{{ $city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="departure_date" class="block text-gray-700 mb-2">Date</label>
                        <input type="date" id="departure_date" name="departure_date" 
                               value="{{ $searchParams['departure_date'] ?? '' }}" 
                               class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               min="{{ date('Y-m-d') }}">
                    </div>
                    <div class="md:col-span-5">
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-bold hover:bg-blue-700 transition duration-300">
                            Update Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="py-10 container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold">Search Results</h2>
            <div class="text-gray-600">
                {{ $navettes->total() }} navettes found
                @if($searchParams['departure_city'] || $searchParams['arrival_city'] || $searchParams['departure_date'])
                    for 
                    @if($searchParams['departure_city'] && $searchParams['arrival_city'])
                        {{ $searchParams['departure_city'] }} to {{ $searchParams['arrival_city'] }}
                    @elseif($searchParams['departure_city'])
                        from {{ $searchParams['departure_city'] }}
                    @elseif($searchParams['arrival_city'])
                        to {{ $searchParams['arrival_city'] }}
                    @endif
                    
                    @if($searchParams['departure_date'])
                        on {{ \Carbon\Carbon::parse($searchParams['departure_date'])->format('d M, Y') }}
                    @endif
                @endif
            </div>
        </div>

        @if($navettes->count() > 0)
            <div class="space-y-6">
                @foreach($navettes as $navette)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex flex-wrap md:flex-nowrap justify-between items-center">
                                <div class="w-full md:w-1/4 mb-4 md:mb-0">
                                    <div class="flex items-center">
                                        <img src="{{ $navette->company->logo_url ?? 'https://via.placeholder.com/60' }}" alt="{{ $navette->company->name }}" class="w-12 h-12 object-contain rounded-full mr-3">
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-800">{{ $navette->company->name }}</h3>
                                            <div class="flex items-center text-sm text-yellow-500">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="w-full md:w-2/5 mb-4 md:mb-0">
                                    <div class="flex justify-between items-center">
                                        <div class="text-center">
                                            <p class="text-xl font-bold">{{ date('H:i', strtotime($navette->departure_time)) }}</p>
                                            <p class="text-sm text-gray-600">{{ $navette->departure_city }}</p>
                                        </div>
                                        <div class="flex flex-col items-center px-4">
                                            <div class="text-xs text-gray-500 mb-1">{{ \Carbon\Carbon::parse($navette->departure_time)->diffInHours($navette->arrival_time) }}h journey</div>
                                            <div class="w-20 h-0.5 bg-gray-300 relative">
                                                <div class="absolute -top-1 left-0 w-2 h-2 rounded-full bg-blue-600"></div>
                                                <div class="absolute -top-1 right-0 w-2 h-2 rounded-full bg-blue-600"></div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <p class="text-xl font-bold">{{ date('H:i', strtotime($navette->arrival_time)) }}</p>
                                            <p class="text-sm text-gray-600">{{ $navette->arrival_city }}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="w-full md:w-1/5 mb-4 md:mb-0 text-center">
                                    <div class="bg-blue-50 rounded-lg p-2">
                                        <p class="text-sm text-gray-600">Available Seats</p>
                                        <p class="text-xl font-bold text-blue-600">{{ $navette->seats_total - $navette->seats_booked }} / {{ $navette->seats_total }}</p>
                                    </div>
                                </div>
                                
                                <div class="w-full md:w-1/5 flex flex-col items-end">
                                    <p class="text-2xl font-bold text-blue-600 mb-2">{{ number_format($navette->price, 2) }} MAD</p>
                                    <a href="{{ route('navettes.show', $navette->id) }}" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300 text-center">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                            
                            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between text-sm text-gray-500">
                                <div>
                                    <span class="mr-4"><i class="fas fa-calendar-alt mr-1"></i> {{ \Carbon\Carbon::parse($navette->departure_time)->format('d M, Y') }}</span>
                                    <span><i class="fas fa-map-marker-alt mr-1"></i> {{ $navette->pickup_point ?? 'Main Station' }}</span>
                                </div>
                                <div>
                                    @if($navette->wifi)
                                        <span class="mr-3"><i class="fas fa-wifi mr-1"></i> WiFi</span>
                                    @endif
                                    @if($navette->ac)
                                        <span class="mr-3"><i class="fas fa-snowflake mr-1"></i> A/C</span>
                                    @endif
                                    @if($navette->usb)
                                        <span><i class="fas fa-plug mr-1"></i> USB</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-8">
                {{ $navettes->appends($searchParams)->links() }}
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md p-8 text-center">
                <div class="text-blue-500 text-5xl mb-4">
                    <i class="fas fa-search"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">No navettes found</h3>
                <p class="text-gray-600 mb-6">We couldn't find any navettes matching your search criteria.</p>
                <div class="flex justify-center">
                    <a href="/" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                        Go Back Home
                    </a>
                </div>
            </div>
        @endif
    </section>

    <footer class="bg-gray-800 text-white py-12 mt-12">
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
@endsection