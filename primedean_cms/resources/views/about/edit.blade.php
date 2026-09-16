<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage About Section') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Current Image Preview -->
                        <div class="mb-8">
                            <h3 class="text-md font-semibold text-gray-900 mb-3">Current Frontend Image</h3>
                            @if(isset($about) && $about->image_path)
                                <div class="relative w-64 h-auto rounded-lg overflow-hidden border border-gray-200 shadow-sm">
                                    <img src="{{ asset('storage/' . $about->image_path) }}" alt="Current About Image" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="w-64 p-4 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 flex items-center justify-center">
                                    <p class="text-sm text-gray-500 text-center">No image uploaded.<br>Frontend is using the default fallback image.</p>
                                </div>
                            @endif
                        </div>

                        <!-- Upload Field -->
                        <div class="mb-6 border-t border-gray-100 pt-6">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Upload New Image</label>
                            
                            <!-- Custom Tailwind File Input -->
                            <input type="file" name="image" id="image" accept="image/jpeg, image/png, image/jpg, image/webp" 
                                class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2.5 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-[#E0C1D7] file:text-[#812C84]
                                hover:file:bg-[#812C84] hover:file:text-white file:transition-colors file:cursor-pointer">
                            
                            @error('image')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                            
                            <p class="text-xs text-gray-500 mt-2">Allowed formats: JPG, PNG, WEBP. Max size: 2MB.</p>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center pt-4">
                            <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-[#812C84] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-900 focus:bg-purple-900 active:bg-purple-950 focus:outline-none focus:ring-2 focus:ring-[#812C84] focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                                Save & Replace Image
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>