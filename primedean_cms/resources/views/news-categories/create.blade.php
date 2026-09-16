<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Add News Category</h2>
                <a href="{{ route('news-categories.index') }}" class="text-gray-500 hover:text-gray-700 font-medium text-sm">
                    &larr; Back
                </a>
            </div>

            @if($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 text-primedean-purple px-4 py-3 rounded-lg shadow-sm">
                    <ul class="list-disc list-inside text-sm font-medium">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <form action="{{ route('news-categories.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Category Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="e.g. Press Releases" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primedean-purple focus:ring-primedean-purple sm:text-sm">
                        <p class="mt-1 text-xs text-gray-500">The URL slug will be generated automatically.</p>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('news-categories.index') }}" class="px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50">Cancel</a>
                        <button type="submit" class="px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-primedean-purple hover:bg-gray-700">Save Category</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>