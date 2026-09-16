<x-app-layout>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Edit News Article</h2>
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

            @php
                $existingGallery = $news->galleryImages->map(function($img) {
                    return [
                        'id' => $img->id,
                        'url' => asset('storage/' . $img->image_path)
                    ];
                })->toArray();
            @endphp

            <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data" x-data="newsEditForm()">
                @csrf
                @method('PUT')

                <input type="hidden" name="deleted_image_ids" :value="JSON.stringify(deletedImageIds)">

                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 space-y-6">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Article Title</label>
                            <input type="text" name="title" value="{{ old('title', $news->title) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="news_category_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('news_category_id', $news->news_category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date Written / Published</label>
                            <input type="date" name="published_at" value="{{ old('published_at', $news->published_at->format('Y-m-d')) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Main Featured Image</label>
                            @if($news->image_path)
                                <div class="mb-3 flex items-center space-x-3 bg-gray-50 p-2 rounded-lg border border-gray-200">
                                    <img src="{{ asset('storage/' . $news->image_path) }}" class="h-12 w-12 object-cover rounded">
                                    <span class="text-xs text-gray-500">Uploading replaces existing.</span>
                                </div>
                            @endif
                            <input type="file" name="main_image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-[#db3444] hover:file:bg-red-100 cursor-pointer">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tags (Comma Separated)</label>
                            <input type="text" name="tags" value="{{ old('tags', $news->tags) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#db3444] focus:ring-[#db3444] sm:text-sm">
                        </div>
                    </div>

                    <!-- Existing Gallery Images & Add New -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gallery / Article Images</label>
                        
                        <template x-if="gallery.length > 0">
                            <div class="flex flex-wrap gap-3 mb-4">
                                <template x-for="(img, idx) in gallery" :key="img.id">
                                    <div class="relative group">
                                        <img :src="img.url" class="h-20 w-20 object-cover rounded-lg border border-gray-200">
                                        <button type="button" @click="removeGalleryImage(idx, img.id)" class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full p-1 shadow-sm opacity-0 group-hover:opacity-100 transition-opacity">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </template>

                        <input type="file" name="article_images[]" multiple accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 cursor-pointer">
                    </div>

                    <!-- Content -->
                    <div x-init="initEditor($refs.editorContainer, $refs.hiddenContent)">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Article Content</label>
                        <input type="hidden" name="content" x-ref="hiddenContent" value="{{ old('content', $news->content) }}">
                        <div class="bg-white" x-ref="editorContainer" style="height: 280px;">
                            {!! old('content', $news->content) !!}
                        </div>
                    </div>

                </div>

                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('news.index') }}" class="px-6 py-2.5 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50">Cancel</a>
                    <button type="submit" class="px-6 py-2.5 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-[#db3444] hover:bg-red-700">Update Article</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('newsEditForm', () => ({
                gallery: @json($existingGallery),
                deletedImageIds: [],

                removeGalleryImage(index, id) {
                    this.deletedImageIds.push(id);
                    this.gallery.splice(index, 1);
                },

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