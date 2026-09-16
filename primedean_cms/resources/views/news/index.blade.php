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
                    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">News & Articles</h2>
                    <p class="text-sm text-gray-500">Manage press releases, updates, and news publication content.</p>
                </div>

                <a href="{{ route('news-categories.index') }}" class="bg-primedean-purple hover:bg-red-700 text-white px-4 py-2.5 rounded-lg shadow-sm text-sm font-medium transition-colors inline-block">
                    + Manage Categories
                </a>
                
                <a href="{{ route('news.create') }}" class="bg-primedean-purple hover:bg-red-700 text-white px-4 py-2.5 rounded-lg shadow-sm text-sm font-medium transition-colors inline-block">
                    + Create New Article
                </a>
            </div>

            @if($articles->isEmpty())
                <div class="bg-white rounded-xl border border-dashed border-gray-300 p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    <h3 class="mt-2 text-sm font-semibold text-gray-900">No articles found</h3>
                    <p class="mt-1 text-sm text-gray-500">Start writing news articles and updates by clicking above.</p>
                </div>
            @else
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Article</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Category</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Date Written</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Tags</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($articles as $article)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-3">
                                            @if($article->image_path)
                                                <img src="{{ asset('storage/' . $article->image_path) }}" class="h-10 w-10 rounded-lg object-cover">
                                            @else
                                                <div class="h-10 w-10 rounded-lg bg-gray-100 flex items-center justify-center text-xs text-gray-400">N/A</div>
                                            @endif
                                            <div>
                                                <div class="font-medium text-gray-900 text-sm">{{ Str::limit($article->title, 40) }}</div>
                                                <div class="text-xs text-gray-400">{{ $article->galleryImages->count() }} gallery image(s)</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        <span class="px-2.5 py-1 bg-red-50 text-primedean-purple rounded-full text-xs font-medium">
                                            {{ $article->category->name }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $article->published_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-500">
                                        {{ $article->tags ? Str::limit($article->tags, 30) : '—' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('news.edit', $article) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('news.destroy', $article) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Delete this article?')" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $articles->links() }}
                </div>
            @endif

        </div>
    </div>
</x-app-layout>