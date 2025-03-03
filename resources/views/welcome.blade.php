<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to Markoub</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
    <body class="antialiased bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
        <!-- Navigation -->
        <nav class="bg-white dark:bg-gray-800 shadow-md fixed w-full z-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="flex-shrink-0 flex items-center">
                            <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">Markoub</span>
                        </a>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="#features" class="border-transparent text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white inline-flex items-center px-1 pt-1 border-b-2 hover:border-indigo-500 text-sm font-medium">
                                Features
                            </a>
                            <a href="#services" class="border-transparent text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white inline-flex items-center px-1 pt-1 border-b-2 hover:border-indigo-500 text-sm font-medium">
                                Services
                            </a>
                            <a href="#about" class="border-transparent text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white inline-flex items-center px-1 pt-1 border-b-2 hover:border-indigo-500 text-sm font-medium">
                                About
                            </a>
                            <a href="#contact" class="border-transparent text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white inline-flex items-center px-1 pt-1 border-b-2 hover:border-indigo-500 text-sm font-medium">
                                Contact
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        @if (Route::has('login'))
                            <div class="hidden sm:flex items-center space-x-4">
                                @auth
                                    <a href="{{ url('/home') }}" class="font-medium text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="font-medium text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <div class="pt-16">
            <!-- Hero Section -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 text-center md:text-left">
                            <h1 class="text-4xl sm:text-6xl font-bold mb-6">
                                Your Journey, <br><span class="text-yellow-300">Our Priority</span>
                            </h1>
                            
                            <p class="text-xl mb-8 opacity-90">
                                Join Markoub for seamless, reliable transportation services that connect you to your destination with comfort and safety.
                            </p>

                            <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                                <a href="{{ route('register') }}?type=customer" 
                                class="px-8 py-4 text-lg font-medium text-indigo-600 bg-white rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600">
                                    Sign Up as Customer
                                </a>
                                
                                <a href="{{ route('register') }}?type=company" 
                                class="px-8 py-4 text-lg font-medium text-white bg-transparent border-2 border-white rounded-lg hover:bg-white hover:text-indigo-600 transition-all">
                                    Sign Up as Company
                                </a>
                            </div>
                        </div>
                        <div class="md:w-1/2 mt-12 md:mt-0 flex justify-center">
                            <img src="https://via.placeholder.com/500x400?text=Transportation" alt="Transportation" class="rounded-lg shadow-xl max-w-full h-auto">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div id="features" class="py-16 bg-white dark:bg-gray-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                            Why Choose Markoub?
                        </h2>
                        <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-400">
                            Experience transportation reimagined with our premium features
                        </p>
                    </div>

                    <div class="mt-16 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                        <!-- Feature 1 -->
                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-8 bg-gray-50 dark:bg-gray-900 hover:shadow-lg transition-all">
                            <div class="text-center">
                                <div class="inline-flex items-center justify-center p-2 bg-indigo-100 dark:bg-indigo-900 rounded-md text-indigo-600 dark:text-indigo-300">
                                    <i class="fas fa-route text-3xl"></i>
                                </div>
                                <h3 class="mt-5 text-lg font-medium text-gray-900 dark:text-white">Real-Time Tracking</h3>
                                <p class="mt-2 text-base text-gray-500 dark:text-gray-400">
                                    Track your ride in real-time and know exactly when your transport will arrive.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-8 bg-gray-50 dark:bg-gray-900 hover:shadow-lg transition-all">
                            <div class="text-center">
                                <div class="inline-flex items-center justify-center p-2 bg-indigo-100 dark:bg-indigo-900 rounded-md text-indigo-600 dark:text-indigo-300">
                                    <i class="fas fa-shield-alt text-3xl"></i>
                                </div>
                                <h3 class="mt-5 text-lg font-medium text-gray-900 dark:text-white">Safety First</h3>
                                <p class="mt-2 text-base text-gray-500 dark:text-gray-400">
                                    We prioritize your safety with verified drivers and real-time safety features.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-8 bg-gray-50 dark:bg-gray-900 hover:shadow-lg transition-all">
                            <div class="text-center">
                                <div class="inline-flex items-center justify-center p-2 bg-indigo-100 dark:bg-indigo-900 rounded-md text-indigo-600 dark:text-indigo-300">
                                    <i class="fas fa-wallet text-3xl"></i>
                                </div>
                                <h3 class="mt-5 text-lg font-medium text-gray-900 dark:text-white">Transparent Pricing</h3>
                                <p class="mt-2 text-base text-gray-500 dark:text-gray-400">
                                    Know the cost upfront with no hidden fees or surprise charges.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Section -->
            <div id="services" class="py-16 bg-gray-100 dark:bg-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                            Our Services
                        </h2>
                        <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-400">
                            Comprehensive transportation solutions for every need
                        </p>
                    </div>

                    <div class="mt-12">
                        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                                <div class="p-6">
                                    <h3 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">For Customers</h3>
                                    <ul class="mt-4 space-y-4">
                                        <li class="flex">
                                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                            <span class="text-gray-700 dark:text-gray-300">Quick and reliable transportation booking</span>
                                        </li>
                                        <li class="flex">
                                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                            <span class="text-gray-700 dark:text-gray-300">Multiple vehicle options to suit your needs</span>
                                        </li>
                                        <li class="flex">
                                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                            <span class="text-gray-700 dark:text-gray-300">Schedule rides in advance</span>
                                        </li>
                                        <li class="flex">
                                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                            <span class="text-gray-700 dark:text-gray-300">24/7 customer support</span>
                                        </li>
                                    </ul>
                                    <div class="mt-8">
                                        <a href="{{ route('register') }}?type=customer" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                            Get Started
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                                <div class="p-6">
                                    <h3 class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">For Companies</h3>
                                    <ul class="mt-4 space-y-4">
                                        <li class="flex">
                                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                            <span class="text-gray-700 dark:text-gray-300">Expand your transportation business</span>
                                        </li>
                                        <li class="flex">
                                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                            <span class="text-gray-700 dark:text-gray-300">Easy fleet management tools</span>
                                        </li>
                                        <li class="flex">
                                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                            <span class="text-gray-700 dark:text-gray-300">Analytics and reporting</span>
                                        </li>
                                        <li class="flex">
                                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                            <span class="text-gray-700 dark:text-gray-300">Partner support and resources</span>
                                        </li>
                                    </ul>
                                    <div class="mt-8">
                                        <a href="{{ route('register') }}?type=company" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                            Partner with Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial Section -->
            <div class="py-16 bg-white dark:bg-gray-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                            What Our Users Say
                        </h2>
                    </div>

                    <div class="mt-12 grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-lg shadow">
                            <div class="flex items-center mb-4">
                                <div class="text-amber-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 italic">"Markoub has transformed how I commute. The service is reliable, drivers are friendly, and the app is easy to use."</p>
                            <div class="mt-4">
                                <p class="font-medium text-gray-900 dark:text-white">Sarah M.</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Regular Customer</p>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-lg shadow">
                            <div class="flex items-center mb-4">
                                <div class="text-amber-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 italic">"As a business owner, partnering with Markoub has increased our revenue and streamlined our operations. Highly recommended!"</p>
                            <div class="mt-4">
                                <p class="font-medium text-gray-900 dark:text-white">Ahmed K.</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Transport Company Owner</p>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 dark:bg-gray-900 p-6 rounded-lg shadow">
                            <div class="flex items-center mb-4">
                                <div class="text-amber-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 italic">"The safety features give me peace of mind when my children need transportation. Customer service is exceptional too!"</p>
                            <div class="mt-4">
                                <p class="font-medium text-gray-900 dark:text-white">Fatima B.</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Family User</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div id="contact" class="py-16 bg-gray-100 dark:bg-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">
                            Get in Touch
                        </h2>
                        <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500 dark:text-gray-400">
                            Have questions? We're here to help.
                        </p>
                    </div>

                    <div class="mt-12 grid grid-cols-1 gap-8 md:grid-cols-2">
                        <div>
                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-map-marker-alt text-indigo-600 dark:text-indigo-400 text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-lg font-medium text-gray-900 dark:text-white">Address</p>
                                        <p class="text-gray-500 dark:text-gray-400">123 Transportation Blvd, City Center, Country</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-phone text-indigo-600 dark:text-indigo-400 text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-lg font-medium text-gray-900 dark:text-white">Phone</p>
                                        <p class="text-gray-500 dark:text-gray-400">+1 (555) 123-4567</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-envelope text-indigo-600 dark:text-indigo-400 text-xl"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-lg font-medium text-gray-900 dark:text-white">Email</p>
                                        <p class="text-gray-500 dark:text-gray-400">contact@markoub.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8 flex space-x-6">
                                <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <i class="fab fa-facebook-f text-2xl"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <i class="fab fa-twitter text-2xl"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <i class="fab fa-instagram text-2xl"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-gray-500">
                                    <i class="fab fa-linkedin-in text-2xl"></i>
                                </a>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <form action="#" method="POST" class="grid grid-cols-1 gap-y-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                                        <div class="mt-1">
                                            <input type="text" name="name" id="name" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Your name">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                        <div class="mt-1">
                                            <input type="email" name="email" id="email" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Your email">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                                        <div class="mt-1">
                                            <textarea id="message" name="message" rows="4" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Your message"></textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Send Message
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-2xl font-bold text-indigo-400 mb-4">Markoub</h3>
                        <p class="text-gray-300">Making transportation accessible, reliable, and safe for everyone.</p>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-white">Home</a></li>
                            <li><a href="#features" class="text-gray-300 hover:text-white">Features</a></li>
                            <li><a href="#services" class="text-gray-300 hover:text-white">Services</a></li>
                            <li><a href="#contact" class="text-gray-300 hover:text-white">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold mb-4">Legal</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-white">Privacy Policy</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">Terms of Service</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white">Cookie Policy</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold mb-4">Newsletter</h4>
                        <p class="text-gray-300 mb-4">Subscribe to get updates about our services</p>
                        <form class="flex"> (PHP v{{ PHP_VERSION }})

                    </p>
                </div>
            </div>
        </footer>
    </body>
</html>