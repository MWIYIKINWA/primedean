<x-app-layout>
    <div x-data="portfolioManager()" class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Flash Alerts -->
            @if(session('success'))
                <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 text-[#db3444] px-4 py-3 rounded-lg shadow-sm">
                    <div class="font-medium mb-1">Upload Error</div>
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            

            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Company Portfolio</h2>
                    <p class="text-sm text-gray-500">Manage client showcase images. File limits: Max 800 KB per image.</p>
                </div>
                
                <div class="flex items-center space-x-3">
                    <!-- Bulk Delete Trigger Button -->
                    <template x-if="selectedIds.length > 0">
                        <button @click="deleteBulkModal = true" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2.5 rounded-lg text-sm font-medium transition-colors shadow-sm">
                            Delete Selected (<span x-text="selectedIds.length"></span>)
                        </button>
                    </template>

                    <button @click="uploadModalOpen = true" class="bg-primedean-purple hover:bg-red-700 text-white px-4 py-2.5 rounded-lg shadow-sm text-sm font-medium transition-colors">
                        + Upload Images
                    </button>
                </div>
            </div>

            <!-- Image Grid -->
            @if($items->isEmpty())
                <div class="bg-white rounded-xl border border-dashed border-gray-300 p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <h3 class="mt-2 text-sm font-semibold text-gray-900">No portfolio images uploaded</h3>
                    <p class="mt-1 text-sm text-gray-500">Click the button above to upload company work images.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($items as $index => $item)
                        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between group relative">
                            
                            <!-- Bulk Selection Checkbox -->
                            <div class="absolute top-3 left-3 z-10">
                                <input type="checkbox" :value="{{ $item->id }}" x-model="selectedIds" class="rounded border-gray-300 text-[#db3444] focus:ring-[#db3444] w-5 h-5 cursor-pointer">
                            </div>

                            <!-- Preview Thumbnail -->
                            <div class="h-48 w-full bg-gray-100 overflow-hidden relative">
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title ?? 'Portfolio Image' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200">
                            </div>

                            <!-- Item Details & Actions -->
                            <div class="p-4 bg-white">
                                <p class="text-sm font-medium text-gray-900 truncate mb-3">
                                    {{ $item->title ?: 'Untitled Image' }}
                                </p>

                                <div class="flex items-center justify-between border-t border-gray-100 pt-3">
                                    <!-- Order Control Inputs -->
                                    <div class="flex items-center space-x-1">
                                        <label class="text-xs text-gray-400 font-medium">Order:</label>
                                        <input type="number" value="{{ $item->sort_order }}" 
                                               @change="updateOrder({{ $item->id }}, $event.target.value)" 
                                               class="w-16 h-8 text-xs rounded border-gray-200 focus:border-[#db3444] focus:ring-[#db3444]">
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>

        <!-- UPLOAD MODAL -->
        <div x-show="uploadModalOpen" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div @click="uploadModalOpen = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                
                <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Upload Portfolio Images</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Optional Title / Category</label>
                                    <input type="text" name="title" placeholder="e.g. Branding Project" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Select Images (< 800 KB per file)</label>
                                    <input type="file" name="images[]" multiple required @change="validateFiles($event)" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-[#db3444] hover:file:bg-red-100 cursor-pointer">
                                </div>

                                <!-- Client side validation warning -->
                                <template x-if="fileSizeError">
                                    <p class="text-xs text-red-600 font-medium">One or more selected files exceed the 800 KB size limit.</p>
                                </template>
                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="submit" :disabled="fileSizeError" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#db3444] text-base font-medium text-white hover:bg-red-700 disabled:opacity-50 sm:ml-3 sm:w-auto sm:text-sm">
                                Start Upload
                            </button>
                            <button type="button" @click="uploadModalOpen = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- BULK DELETE MODAL -->
        <div x-show="deleteBulkModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div @click="deleteBulkModal = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form action="{{ route('portfolio.bulk-delete') }}" method="POST">
                        @csrf
                        <template x-for="id in selectedIds" :key="id">
                            <input type="hidden" name="ids[]" :value="id">
                        </template>

                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h3 class="text-lg font-medium text-gray-900">Delete Selected Images</h3>
                            <p class="text-sm text-gray-500 mt-2">Are you sure you want to delete the <strong x-text="selectedIds.length"></strong> selected portfolio items? This cannot be undone.</p>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 sm:ml-3 sm:w-auto sm:text-sm">
                                Yes, Delete All Selected
                            </button>
                            <button type="button" @click="deleteBulkModal = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        function portfolioManager() {
            return {
                uploadModalOpen: false,
                deleteBulkModal: false,
                fileSizeError: false,
                selectedIds: [],

                validateFiles(event) {
                    this.fileSizeError = false;
                    const maxBytes = 800 * 1024; // 800 KB
                    const files = event.target.files;

                    for (let i = 0; i < files.length; i++) {
                        if (files[i].size > maxBytes) {
                            this.fileSizeError = true;
                            break;
                        }
                    }
                },

                updateOrder(id, newOrder) {
                    fetch('{{ route("portfolio.reorder") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            order: [{ id: id, sort_order: parseInt(newOrder) }]
                        })
                    }).then(res => res.json()).then(data => {
                        window.location.reload();
                    });
                }
            }
        }
    </script>
</x-app-layout>