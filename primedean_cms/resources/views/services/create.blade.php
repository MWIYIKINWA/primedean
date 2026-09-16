<x-app-layout>
    <!-- Load Quill.js Editor Styles & Scripts -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Add New Service</h2>
                <a href="{{ route('services.index') }}" class="text-gray-500 hover:text-gray-700 font-medium text-sm">
                    &larr; Back to Services
                </a>
            </div>

            @if($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 text-[#db3444] px-4 py-3 rounded-lg shadow-sm">
                    <ul class="list-disc list-inside text-sm font-medium">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data"
                x-data="serviceForm()">
                @csrf

                <!-- MAIN SERVICE BLOCK -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden mb-6">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800">Top-Level Service Details</h3>
                    </div>
                    <div class="p-6 space-y-6">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Service Name</label>
                                <input type="text" name="name" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Main Service Image</label>
                                <input type="file" name="image" accept="image/*"
                                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-[#db3444] hover:file:bg-red-100 cursor-pointer">
                            </div>
                        </div>

                        <div class="mb-6">
    <label class="block text-sm font-medium text-gray-700">Service Preview Text</label>
    <textarea type="text" name="previewtext" placeholder="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm"></textarea>
</div>

                       <div class="mb-6">
    <label class="block text-sm font-medium text-gray-700">Service Tagline</label>
    <input type="text" name="tagline" placeholder="e.g. Empowering your digital journey" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm">
</div>

                        <!-- Rich Text Editor via Alpine + Quill -->
                        <div x-init="initEditor($refs.editorContainer, $refs.hiddenDescription)">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Service Description</label>
                            <input type="hidden" name="description" x-ref="hiddenDescription">
                            <div class="bg-white" x-ref="editorContainer" style="height: 200px;"></div>
                        </div>
                    </div>
                </div>

                <!-- DYNAMIC CATEGORIES BLOCK -->
                <div class="mb-6 flex justify-between items-end">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 tracking-tight">Service Categories</h3>
                        <p class="text-sm text-gray-500 mt-1">Add sub-categories and their specific showcase images.</p>
                    </div>
                    <button type="button" @click="addCategory()"
                        class="bg-slate-900 hover:bg-black text-white px-4 py-2 rounded-lg shadow-sm text-sm font-medium transition-colors">
                        + Add Category
                    </button>
                </div>

                <div class="space-y-4">
                    <template x-for="(category, index) in categories" :key="category.id">
                        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 relative">

                            <!-- Remove Category Button -->
                            <button type="button" @click="removeCategory(index)"
                                class="absolute top-4 right-4 text-gray-400 hover:text-red-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>

                            <h4 class="text-md font-semibold text-gray-800 mb-4">Category #<span
                                    x-text="index + 1"></span></h4>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Category Name</label>
                                        <!-- Note the dynamic name attribute syntax -->
                                        <input type="text" :name="`categories[${index}][name]`" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Category
                                            Description</label>
                                        <textarea :name="`categories[${index}][description]`" rows="3"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm"></textarea>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Category Images (Select
                                        Multiple)</label>
                                    <div
                                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-[#db3444] transition-colors bg-gray-50 h-32 items-center">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none"
                                                viewBox="0 0 48 48">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <input type="file" :name="`categories[${index}][images][]`" multiple
                                                accept="image/*" class="text-xs text-gray-500 w-full cursor-pointer">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </template>

                    <!-- Empty State Warning if no categories are added -->
                    <div x-show="categories.length === 0"
                        class="text-center py-8 bg-white border border-dashed border-gray-300 rounded-xl">
                        <p class="text-sm text-gray-500">No categories added yet. Click "Add Category" above.</p>
                    </div>
                </div>

                <!-- Submission Action -->
                <div class="mt-8 pt-5 border-t border-gray-200 flex justify-end space-x-3">
                    <a href="{{ route('services.index') }}"
                        class="px-6 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50">Cancel</a>
                    <button type="submit"
                        class="px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-[#db3444] hover:bg-red-700 focus:ring-4 focus:ring-red-100">
                        Save Service & Categories
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Alpine.js Application Logic -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('serviceForm', () => ({
                // Start with one category row by default
                categories: [
                    { id: Date.now() }
                ],

                addCategory() {
                    this.categories.push({
                        id: Date.now() // Unique ID prevents Alpine DOM rendering bugs
                    });
                },

                removeCategory(index) {
                    this.categories.splice(index, 1);
                },

                initEditor(container, hiddenInput) {
                    const quill = new Quill(container, {
                        theme: 'snow',
                        placeholder: 'Write the service description here...',
                        modules: {
                            toolbar: [
                                ['bold', 'italic', 'underline', 'strike'],
                                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                                [{ 'header': [1, 2, 3, false] }],
                                ['link', 'clean']
                            ]
                        }
                    });

                    // Sync Quill content to the hidden input on every text change
                    quill.on('text-change', () => {
                        hiddenInput.value = quill.root.innerHTML === '<p><br></p>' ? '' : quill.root.innerHTML;
                    });
                }
            }));
        });
    </script>
</x-app-layout>