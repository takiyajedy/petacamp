@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">

        <!-- Main Content -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Image Section -->
            <div class="relative h-96 w-full">
                <img src="{{ asset('storage/' . $camp->image) }}" 
                     alt="{{ $camp->name }}" 
                     class="w-full h-full object-cover">
                <div class="absolute top-4 right-4 flex gap-2">
                    @if($camp->has_river)
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                            Ada Sungai
                        </span>
                    @else
                        <span class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                            Tiada Sungai
                        </span>
                    @endif
                    
                    @if($camp->has_toilet)
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                            Ada Tandas
                        </span>
                    @else
                        <span class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                            Tiada Tandas
                        </span>
                    @endif
                </div>
            </div>

            <!-- Details Section -->
            <div class="p-8">
                <!-- Title and Location -->
                <div class="">
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $camp->name }}</h1>
                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-lg">{{ $camp->address }}</span>
                    </div>
                </div>

                <!-- Price -->
                @if($camp->price_per_night)
                <div class="mb-6 p-4 bg-green-50 rounded-lg inline-block">
                    <div class="text-sm text-gray-600">Harga per Malam</div>
                    <div class="text-3xl font-bold text-green-600">
                        RM {{ number_format($camp->price_per_night, 2) }}
                    </div>
                </div>
                @endif

                <!-- Tabbed Navigation -->
                <div class="mt-2">
                    <!-- Tab Headers -->
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <button class="tab-button border-green-500 text-green-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" data-tab="overview">
                                <svg class="w-5 h-5 inline-block mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                                </svg>
                                Gambaran Keseluruhan
                            </button>
                            <button class="tab-button border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" data-tab="facilities">
                                <svg class="w-5 h-5 inline-block mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                    <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path>
                                </svg>
                                Kemudahan
                            </button>
                            <button class="tab-button border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" data-tab="location">
                                <svg class="w-5 h-5 inline-block mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                </svg>
                                Lokasi
                            </button>
                            <button class="tab-button border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" data-tab="contact">
                                <svg class="w-5 h-5 inline-block mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                </svg>
                                Review
                            </button>
                        </nav>
                    </div>

                    <!-- Tab Content -->
                    <div class="mt-6">
                        <!-- Overview Tab -->
                        <div class="tab-content" id="overview-tab">
                            <div class="mb-8">
                                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Penerangan</h2>
                                <p class="text-gray-700 leading-relaxed">{{ $camp->description }}</p>
                            </div>

                            <!-- Quick Info Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                                <div class="p-4 bg-blue-50 rounded-lg">
                                    <div class="flex items-center">
                                        <svg class="w-8 h-8 text-blue-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                        <div>
                                            <div class="text-sm text-gray-600">Status</div>
                                            <div class="text-lg font-semibold text-gray-900">Tersedia</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4 bg-green-50 rounded-lg">
                                    <div class="flex items-center">
                                        <svg class="w-8 h-8 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                        </svg>
                                        <div>
                                            <div class="text-sm text-gray-600">Check-in</div>
                                            <div class="text-lg font-semibold text-gray-900">2:00 PM</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4 bg-yellow-50 rounded-lg">
                                    <div class="flex items-center">
                                        <svg class="w-8 h-8 text-yellow-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                        </svg>
                                        <div>
                                            <div class="text-sm text-gray-600">Check-out</div>
                                            <div class="text-lg font-semibold text-gray-900">12:00 PM</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4 bg-purple-50 rounded-lg">
                                    <div class="flex items-center">
                                        <svg class="w-8 h-8 text-purple-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                                        </svg>
                                        <div>
                                            <div class="text-sm text-gray-600">Kapasiti</div>
                                            <div class="text-lg font-semibold text-gray-900">20 Orang</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Facilities Tab -->
                        <div class="tab-content hidden" id="facilities-tab">
                            @if($camp->facilities && count($camp->facilities) > 0)
                            <div class="mb-8">
                                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Kemudahan Tersedia</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach($camp->facilities as $facility)
                                    <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-200">
                                        <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700 font-medium">{{ $facility }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <p class="text-gray-500">Tiada maklumat kemudahan tersedia</p>
                            </div>
                            @endif

                            <!-- Additional Amenities -->
                            <div class="mt-8">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">Peraturan & Arahan</h3>
                                <ul class="space-y-2 text-gray-700">
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-green-600 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        Sila jaga kebersihan kawasan
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-green-600 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        Dilarang membawa haiwan peliharaan
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-green-600 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        Api unggun dibenarkan di kawasan yang ditetapkan sahaja
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-green-600 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        Sila patuhi masa senyap 10:00 PM - 7:00 AM
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Location Tab -->
                        <div class="tab-content hidden" id="location-tab">
                            @if($camp->latitude && $camp->longitude)
                            <div class="mb-8">
                                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Peta Lokasi</h2>
                                <div class="h-96 rounded-lg overflow-hidden shadow-md">
                                    <iframe 
                                        width="100%" 
                                        height="100%" 
                                        frameborder="0" 
                                        scrolling="no" 
                                        marginheight="0" 
                                        marginwidth="0" 
                                        src="https://maps.google.com/maps?q={{ $camp->latitude }},{{ $camp->longitude }}&hl=ms&z=14&output=embed">
                                    </iframe>
                                </div>
                                <div class="mt-4 flex gap-3">
                                    <a href="https://www.google.com/maps?q={{ $camp->latitude }},{{ $camp->longitude }}" 
                                       target="_blank" 
                                       class="flex-1 text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg inline-flex items-center justify-center transition duration-200">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                        </svg>
                                        Buka di Google Maps
                                    </a>
                                    <a href="https://waze.com/ul?ll={{ $camp->latitude }},{{ $camp->longitude }}&navigate=yes" 
                                       target="_blank" 
                                       class="flex-1 text-center bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-3 px-4 rounded-lg inline-flex items-center justify-center transition duration-200">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                        </svg>
                                        Buka di Waze
                                    </a>
                                </div>
                            </div>

                            <!-- Directions -->
                            <div class="mt-8">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">Cara Ke Sini</h3>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="text-gray-700 leading-relaxed">
                                        Gunakan aplikasi navigasi untuk mendapatkan arahan terkini ke {{ $camp->name }}. 
                                        Klik butang di atas untuk membuka lokasi di Google Maps atau Waze.
                                    </p>
                                </div>
                            </div>
                            @else
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                                </svg>
                                <p class="text-gray-500">Tiada maklumat lokasi tersedia</p>
                            </div>
                            @endif
                        </div>

                        <!-- Contact Tab -->
                        <div class="tab-content hidden" id="contact-tab">
                            <div class="mb-8">
                                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Maklumat Hubungan</h2>
                                <div class="space-y-4">
                                    @if($camp->contact_number)
                                    <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-200">
                                        <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <div class="text-sm text-gray-600">Nombor Telefon</div>
                                            <a href="tel:{{ $camp->contact_number }}" class="text-lg font-semibold text-green-600 hover:text-green-700">
                                                {{ $camp->contact_number }}
                                            </a>
                                        </div>
                                        <a href="tel:{{ $camp->contact_number }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200">
                                            Panggil
                                        </a>
                                    </div>
                                    @endif
                                    
                                    @if($camp->contact_email)
                                    <div class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-200">
                                        <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <div class="text-sm text-gray-600">Emel</div>
                                            <a href="mailto:{{ $camp->contact_email }}" class="text-lg font-semibold text-blue-600 hover:text-blue-700">
                                                {{ $camp->contact_email }}
                                            </a>
                                        </div>
                                        <a href="mailto:{{ $camp->contact_email }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                                            Email
                                        </a>
                                    </div>
                                    @endif

                                    @if(!$camp->contact_number && !$camp->contact_email)
                                    <div class="text-center py-12">
                                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <p class="text-gray-500">Tiada maklumat hubungan tersedia</p>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Contact Form -->
                            <div class="mt-8">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">Hantar Pertanyaan</h3>
                                <form class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Nama anda">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Emel</label>
                                        <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="emel@contoh.com">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Mesej</label>
                                        <textarea rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Tulis pertanyaan anda di sini..."></textarea>
                                    </div>
                                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">
                                        Hantar Mesej
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 mt-8">
                    <button class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">
                        Tempah Sekarang
                    </button>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg transition duration-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg transition duration-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tab Switching Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');

            // Remove active classes from all buttons
            tabButtons.forEach(btn => {
                btn.classList.remove('border-green-500', 'text-green-600');
                btn.classList.add('border-transparent', 'text-gray-500');
            });

            // Add active classes to clicked button
            this.classList.remove('border-transparent', 'text-gray-500');
            this.classList.add('border-green-500', 'text-green-600');

            // Hide all tab contents
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });

            // Show target tab content
            document.getElementById(targetTab + '-tab').classList.remove('hidden');
        });
    });
});
</script>
@endsection