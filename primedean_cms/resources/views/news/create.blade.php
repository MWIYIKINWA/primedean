<x-app-layout>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Create News Article</h2>
                <a href="{{ route('news.index') }}" class="text-gray-500 hover:text-gray-700 font-medium text-sm">
                    &larr; Back to News
                </a>
            </div>

            @if($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 text-[#db3444] px-4 py-3 rounded-lg shadow-sm">
                    <ul class="list-disc list-inside text-sm font-medium">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" x-data="newsForm()">
                @csrf

                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-6">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Article Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="news_category_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('news_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date Written / Published</label>
                            <input type="date" name="published_at" value="{{ old('published_at', date('Y-m-d')) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm">
                        </div>
                    </div>

                    <!-- Main Featured Image -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Main Featured Image</label>
                            <input type="file" name="main_image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-[#db3444] hover:file:bg-red-100 cursor-pointer">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tags (Comma Separated)</label>
                            <input type="text" name="tags" value="{{ old('tags') }}" placeholder="e.g. Press Release, Kampala, Media" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm">
                        </div>
                    </div>

                    <!-- Additional Images for Content/Gallery -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Article Inline/Gallery Images (Nullable)</label>
                        <input type="file" name="article_images[]" multiple accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 cursor-pointer">
                        <p class="text-xs text-gray-400 mt-1">Select multiple image files if this article features supplementary photos.</p>
                    </div>

                    <!-- Rich Text Content -->
                    <div x-init="initEditor($refs.editorContainer, $refs.hiddenContent)">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Article Content</label>
                        <input type="hidden" name="content" x-ref="hiddenContent">
                        <div class="bg-white" x-ref="editorContainer" style="height: 280px;"></div>
                    </div>

                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('news.index') }}" class="px-6 py-2.5 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50">Cancel</a>
                    <button type="submit" class="px-6 py-2.5 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-[#db3444] hover:bg-red-700">Publish Article</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('newsForm', () => ({
                initEditor(container, hiddenInput) {
                    const quill = new Quill(container, {
                        theme: 'snow',
                        placeholder: 'Write the complete news article here...',
                        modules: {
                            toolbar: [
                                ['bold', 'italic', 'underline', 'strike'],
                                [{'list': 'ordered'}, {'list': 'bullet'}],
                                [{'header': [1, 2, 3, false]}],
                                ['link', 'clean']
                            ]
                        }
                    });

                    quill.on('text-change', () => {
                        hiddenInput.value = quill.root.innerHTML === '<p><br></p>' ? '' : quill.root.innerHTML;
                    });
                }
            }));
        });
    </script>
</x-app-layout>