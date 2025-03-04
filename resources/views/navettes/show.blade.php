@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Navette Header -->
        <div class="bg-blue-600 text-white p-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold">{{ $navette->departure_city }} → {{ $navette->arrival_city }}</h1>
                    <p class="text-lg">{{ \Carbon\Carbon::parse($navette->departure_time)->format('d M Y, H:i') }}</p>
                </div>
                <div class="text-right">
                    <p class="text-3xl font-bold">{{ number_format($navette->price, 2) }} DH</p>
                    <p class="text-sm">{{ $navette->seats_available }} seats available</p>
                </div>
            </div>
        </div>

        <!-- Navette Details -->
        <div class="p-6">
            <div class="flex items-center mb-6">
                <img src="{{ $navette->company->logo_url ?? asset('images/default-company-logo.png') }}" alt="{{ $navette->company->name }}" class="h-16 w-16 object-contain mr-4">
                <div>
                    <h2 class="text-xl font-semibold">{{ $navette->company->name }}</h2>
                    <div class="flex items-center">
                        <div class="flex text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= ($navette->company->rating ?? 0))
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.799-2.034c-.784-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                @else
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                                @endif
                            @endfor
                        </div>
                        <span class="ml-1 text-gray-600">({{ $navette->company->reviews_count ?? 0 }} reviews)</span>
                    </div>
                </div>
            </div>

            <!-- Journey Details -->
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-semibold mb-4">Journey Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="flex items-start mb-4">
                            <div class="bg-blue-100 p-2 rounded-full mr-3 mt-1">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Departure</p>
                                <p class="font-medium">{{ $navette->departure_city }}</p>
                                <p>{{ $navette->departure_location }}</p>
                                <p class="text-blue-600 font-medium">{{ \Carbon\Carbon::parse($navette->departure_time)->format('H:i') }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-red-100 p-2 rounded-full mr-3 mt-1">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Arrival</p>
                                <p class="font-medium">{{ $navette->arrival_city }}</p>
                                <p>{{ $navette->arrival_location }}</p>
                                <p class="text-red-600 font-medium">{{ \Carbon\Carbon::parse($navette->arrival_time)->format('H:i') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Duration</p>
                            <p class="font-medium">
                                {{ \Carbon\Carbon::parse($navette->departure_time)->diffForHumans(\Carbon\Carbon::parse($navette->arrival_time), true) }}
                            </p>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Vehicle</p>
                            <p class="font-medium">{{ $navette->vehicle_type ?? 'Standard Shuttle' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Amenities</p>
                            <div class="flex flex-wrap gap-2 mt-1">
                                @if($navette->has_wifi)
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">WiFi</span>
                                @endif
                                @if($navette->has_ac)
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">Air Conditioning</span>
                                @endif
                                @if($navette->has_power_outlets)
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs">Power Outlets</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Button -->
            <div class="mt-8">
                <a href="#" class="block w-full md:w-auto md:inline-block bg-blue-600 text-white font-bold py-3 px-8 rounded-lg text-center hover:bg-blue-700 transition">
                    Book this Navette
                </a>
            </div>
        </div>
    </div>

    <!-- Similar Navettes -->
    @if($similarNavettes->count() > 0)
    <div class="mt-12">
        <h2 class="text-2xl font-bold mb-6">Similar Navettes</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($similarNavettes as $similar)
            <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                <div class="p-4">
                    <div class="flex items-center mb-3">
                        <img src="{{ $similar->company->logo_url ?? asset('images/default-company-logo.png') }}" alt="{{ $similar->company->name }}" class="h-8 w-8 object-contain mr-2">
                        <span class="font-medium">{{ $similar->company->name }}</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <div>
                            <p class="font-bold">{{ \Carbon\Carbon::parse($similar->departure_time)->format('H:i') }}</p>
                            <p class="text-sm">{{ $similar->departure_city }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-xs text-gray-500">
                                {{ \Carbon\Carbon::parse($similar->departure_time)->diffForHumans(\Carbon\Carbon::parse($similar->arrival_time), true) }}
                            </p>
                            <div class="border-t border-gray-300 my-2 w-16 mx-auto"></div>
                            <p class="text-xs">{{ \Carbon\Carbon::parse($similar->departure_time)->format('d M Y') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold">{{ \Carbon\Carbon::parse($similar->arrival_time)->format('H:i') }}</p>
                            <p class="text-sm">{{ $similar->arrival_city }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="font-bold text-lg">{{ number_format($similar->price, 2) }} DH</p>
                        <a href="{{ route('navettes.show', $similar) }}" class="bg-blue-100 text-blue-600 hover:bg-blue-200 px-4 py-2 rounded text-sm font-medium transition">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection