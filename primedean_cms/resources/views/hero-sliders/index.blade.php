<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Flash Alert -->
            @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-sm font-medium">
                {{ session('success') }}
            </div>
            @endif

            <!-- Multi-Image Upload Card -->
            <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Upload New Slider Images</h2>
                
                <form action="{{ route('hero-sliders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="flex items-center justify-center w-full">
                        <label for="images" class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-300 rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-600"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-400">Select multiple images (PNG, JPG, WEBP up to 5MB each)</p>
                            </div>
                            <input id="images" name="images[]" type="file" multiple class="hidden" accept="image/*" required />
                        </label>
                    </div>

                    <!-- PREVIEW CONTAINER -->
                    <div id="image-preview-container" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 hidden">
                        <!-- Preview images will be injected here by JS -->
                    </div>

                    @error('images.*')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror

                    <div class="flex justify-end pt-2">
                        <button type="submit" class="bg-primedean-purple hover:bg-purple-900 text-white font-medium px-6 py-2.5 rounded-lg text-sm transition-colors shadow-sm">
                            Upload Images
                        </button>
                    </div>
                </form>
            </div>

            <!-- Existing Images Grid -->
            <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-gray-800 mb-6">Active Hero Slides ({{ $sliders->count() }})</h2>

                @if($sliders->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($sliders as $slide)
                    <div class="relative group rounded-xl overflow-hidden border border-gray-200 bg-gray-50 flex flex-col justify-between">
                        <div class="h-48 w-full overflow-hidden relative">
                            <img src="{{ asset('storage/' . $slide->image_path) }}" alt="Hero Slide" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-3 flex items-center justify-between bg-white border-t border-gray-100">
                            <span class="text-xs text-gray-400 font-mono">Order: #{{ $slide->sort_order }}</span>
                            
                            <!-- Delete Form -->
                            <form action="{{ route('hero-sliders.destroy', $slide->id) }}" method="POST" onsubmit="return confirm('Delete this slide permanently?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 p-1 rounded transition-colors text-xs font-semibold flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-12 text-gray-500">
                    <p>No hero slider images uploaded yet.</p>
                </div>
                @endif
            </div>

        </div>
    </div>

    <!-- SCRIPT FOR IMAGE PREVIEW -->
    <script>
        document.getElementById('images').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('image-preview-container');
            previewContainer.innerHTML = ''; // Clear existing previews
            
            const files = event.target.files;

            // Show or hide the preview container based on whether files are selected
            if (files.length > 0) {
                previewContainer.classList.remove('hidden');
                previewContainer.classList.add('mt-4'); // Add top margin when visible
            } else {
                previewContainer.classList.add('hidden');
                previewContainer.classList.remove('mt-4');
            }

            // Loop through selected files and generate previews
            Array.from(files).forEach(file => {
                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const imgWrapper = document.createElement('div');
                    imgWrapper.className = 'relative h-24 sm:h-32 rounded-lg overflow-hidden border border-gray-200 shadow-sm';
                    
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-full h-full object-cover';
                    
                    imgWrapper.appendChild(img);
                    previewContainer.appendChild(imgWrapper);
                }
                
                reader.readAsDataURL(file);
            });
        });
    </script>
</x-app-layout>