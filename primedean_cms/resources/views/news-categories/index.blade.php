<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">News Categories</h2>
                    <p class="text-sm text-gray-500">Manage the categories available for your news articles.</p>
                </div>
                
                <div class="flex space-x-3">
                    <a href="{{ route('news.index') }}" class="bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2.5 rounded-lg shadow-sm text-sm font-medium transition-colors">
                        &larr; Back to News
                    </a>
                    <a href="{{ route('news-categories.create') }}" class="bg-primedean-purple hover:bg-gray-700 text-white px-4 py-2.5 rounded-lg shadow-sm text-sm font-medium transition-colors">
                        + Add Category
                    </a>
                </div>
            </div>

            @if($categories->isEmpty())
                <div class="bg-white rounded-xl border border-dashed border-gray-300 p-12 text-center">
                    <h3 class="mt-2 text-sm font-semibold text-gray-900">No categories found</h3>
                    <p class="mt-1 text-sm text-gray-500">Create your first category to populate the news dropdown.</p>
                </div>
            @else
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Category Name</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Slug</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Articles Count</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($categories as $category)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900 text-sm">
                                        {{ $category->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $category->slug }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2.5 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-medium">
                                            {{ $category->news_count }} Article(s)
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('news-categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('news-categories.destroy', $category) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('WARNING: Deleting this category will ALSO delete all {{ $category->news_count }} articles attached to it! Continue?')" class="text-gray-600 hover:text-gray-900">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-6">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>