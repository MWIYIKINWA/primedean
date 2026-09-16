<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Flash Alerts -->
            @if(session('success'))
                <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Services Management</h2>
                    <p class="text-sm text-gray-500">Manage your main services and their nested categories.</p>
                </div>
                
                <div class="flex items-center">
                    <a href="{{ route('services.create') }}" class="bg-primedean-purple hover:bg-red-700 text-white px-4 py-2.5 rounded-lg shadow-sm text-sm font-medium transition-colors">
                        + Add New Service
                    </a>
                </div>
            </div>

            <!-- Services List -->
            @if($services->isEmpty())
                <div class="bg-white rounded-xl border border-dashed border-gray-300 p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <h3 class="mt-2 text-sm font-semibold text-gray-900">No services created</h3>
                    <p class="mt-1 text-sm text-gray-500">Click the button above to create your first service module.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($services as $service)
                        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">
                            
                            <!-- Main Service Image -->
                            <div class="h-48 w-full bg-gray-100 overflow-hidden relative">
                                @if($service->image_path)
                                    <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="flex items-center justify-center h-full text-gray-400 text-sm">No Image</div>
                                @endif
                            </div>

                            <!-- Details -->
                            <div class="p-5 flex-1 flex flex-col">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $service->name }}</h3>
                                <div class="text-sm text-gray-500 mb-4">
                                    {{ $service->previewtext}}
                                </div>
                                
                              
                            </div>

                            <!-- Actions -->
                                    <!-- Actions -->
                        <div class="bg-gray-50 px-5 py-3 border-t border-gray-100 flex justify-center space-x-3 items-center">
                            
                            <!-- Edit Button -->
                            <a href="{{ route('services.edit', $service) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-900 transition-colors">
                                Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this service and ALL of its categories and images? This cannot be undone.')" class="text-sm font-medium text-red-600 hover:text-red-900 transition-colors">
                                    Delete
                                </button>
                            </form>
                        </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-6">
                    {{ $services->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>