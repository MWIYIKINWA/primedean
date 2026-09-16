<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Improved Dashboard Header -->
            <div class="mb-8 bg-primedean-purple p-8 rounded-xl shadow-sm border-t-4 border-primedean-purple flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-white tracking-tight mb-1">
                        Hello, {{ Auth::user()->name ?? 'Admin' }}!
                    </h1>
                    <p class="text-gray-300 text-base">This is your Primedean admin panel. Manage your content here.</p>
                </div>
                <div class="bg-gray-50 px-4 py-2 rounded-lg border border-gray-100">
                    <span class="text-sm font-medium text-gray-600">
                        {{ now()->format('l, F j, Y') }}
                    </span>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Services Card -->
                <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between group">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="p-3 bg-red-50 text-primedean-purple rounded-lg group-hover:bg-primedean-purple group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Services</h3>
                    </div>
                    <div>
                        <div class="flex justify-between items-end mb-4">
                            <div class="flex items-baseline space-x-1">
    <span class="text-4xl font-light text-gray-900">{{ $serviceCount }}</span>
    <span class="text-sm text-gray-500 font-medium">Posts</span>
</div>
                            <a href="{{ route('services.index') }}" class="text-sm font-semibold text-primedean-purple hover:text-red-700 flex items-center transition-colors">
                                Manage 
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                        <div class="w-full h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-primedean-purple w-full rounded-full"></div>
                        </div>
                    </div>
                </div>

                       <!-- inquired Card -->
                <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between group">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="p-3 bg-red-50 text-primedean-purple rounded-lg group-hover:bg-primedean-purple group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Inquiries</h3>
                    </div>
                    <div>
                        <div class="flex justify-between items-end mb-4">
                            <div class="flex items-baseline space-x-1">
    {{-- <span class="text-4xl font-light text-gray-900">{{ $serviceCount }}</span> --}}
    <span class="text-sm text-gray-500 font-medium">Inquiries</span>
</div>
                            <a href="{{ route('inquiries.index') }}" class="text-sm font-semibold text-primedean-purple hover:text-red-700 flex items-center transition-colors">
                                Manage 
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                        <div class="w-full h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-primedean-purple w-full rounded-full"></div>
                        </div>
                    </div>
                </div>

                <!-- Sector News Card -->
                <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between group">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="p-3 bg-red-50 text-primedean-purple rounded-lg group-hover:bg-primedean-purple group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">News/Updates</h3>
                    </div>
                    <div>
                        <div class="flex justify-between items-end mb-4">
                    
                            <div class="flex items-baseline space-x-1">
                                <span class="text-4xl font-light text-gray-900">{{ $newsCount }}</span>
                                <span class="text-sm text-gray-500 font-medium">Posts</span>
                            </div>
                            <a href="{{ route('news.index') }}" class="text-sm font-semibold text-primedean-purple hover:text-red-700 flex items-center transition-colors">
                                Manage 
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                        <div class="w-full h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            <!-- Using a dark slate for secondary emphasis -->
                            <div class="h-full bg-slate-800 w-full rounded-full"></div> 
                        </div>
                    </div>
                </div>

                <!-- Hero Slider Card -->
<div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between group">
    <div class="flex items-center space-x-3 mb-6">
        <div class="p-3 bg-red-50 text-primedean-purple rounded-lg group-hover:bg-primedean-purple group-hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800">Hero Slider</h3>
    </div>
    <div>
        <div class="flex justify-between items-end mb-4">
            <div class="flex items-baseline space-x-1">
                <span class="text-4xl font-light text-gray-900">{{ \App\Models\HeroSlider::count() }}</span>
                <span class="text-sm text-gray-500 font-medium">Slides</span>
            </div>
            <a href="{{ route('hero-sliders.index') }}" class="text-sm font-semibold text-primedean-purple hover:text-red-700 flex items-center transition-colors">
                Manage 
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
        <div class="w-full h-1.5 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-primedean-purple w-full rounded-full"></div>
        </div>
    </div>
</div>

                <!-- Portfolio Card -->
                <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between group">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="p-3 bg-red-50 text-primedean-purple rounded-lg group-hover:bg-primedean-purple group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">Image Grid</h3>
                    </div>
                    <div>
                        <div class="flex justify-between items-end mb-4">
                            <div class="flex items-baseline space-x-1">
                                    <span class="text-4xl font-light text-gray-900">{{ $portfolioCount }}</span>
                                    <span class="text-sm text-gray-500 font-medium">Images</span>
                                </div>
                   <a href="{{ route('portfolio.index') }}" class="text-sm font-semibold text-primedean-purple hover:text-red-700 flex items-center transition-colors">
    Manage 
    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
</a>
                        </div>
                        <div class="w-full h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-primedean-purple w-full rounded-full"></div>
                        </div>
                    </div>
                </div>

                <!-- Users Card -->
                  <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between group">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="p-3 bg-red-50 text-primedean-purple rounded-lg group-hover:bg-primedean-purple group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800">CMS Users</h3>
                    </div>
                    <div>
                        <div class="flex justify-between items-end mb-4">
                           <div class="flex items-baseline space-x-1">
                            <span class="text-4xl font-light text-gray-900">{{ $userCount }}</span>
                            <span class="text-sm text-gray-500 font-medium">Active</span>
                        </div>
                            <a href="{{ route('users.index') }}" class="text-sm font-semibold text-primedean-purple hover:text-red-700 flex items-center transition-colors">
                                Manage 
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                        <div class="w-full h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-primedean-purple w-full rounded-full"></div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions Block -->
                <div class="flex flex-col sm:flex-row gap-3 items-start pt-4">
                    {{-- <button class="bg-primedean-purple hover:bg-red-700 text-white px-6 py-3 rounded-lg shadow-sm text-sm font-medium transition-colors w-full sm:w-auto focus:ring-4 focus:ring-red-100">
                        Update Portfolio PDF
                    </button> --}}
                    <a href="{{ route('about.edit') }}" class="bg-slate-900 hover:bg-black text-white px-6 py-3 rounded-lg shadow-sm text-sm font-medium transition-colors w-full sm:w-auto focus:ring-4 focus:ring-gray-200">
                        Update HomePage Flyer
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>