<x-app-layout>
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Session Alerts -->
            @if(session('success'))
                <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg relative flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 bg-red-50 border border-red-200 text-primedean-purple px-4 py-3 rounded-lg relative flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('error') }}
                </div>
            @endif

            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Website Inquiries</h2>
                    <p class="text-sm text-gray-500 mt-1">Manage all contact form and service inquiry submissions.</p>
                </div>

                <a href="{{ route('inquiries.export') }}" class="inline-flex items-center justify-center bg-primedean-purple hover:bg-primedean-dark text-white px-4 py-2.5 rounded-lg shadow-sm text-sm font-medium transition-colors gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export to CSV
                </a>
            </div>

            <!-- Data Table -->
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Type</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Name / Company</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Contact</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Service</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($inquiries as $inquiry)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $inquiry->created_at->format('M d, Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $inquiry->type === 'service_inquiry' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ $inquiry->type === 'service_inquiry' ? 'Service Booking' : 'Contact Form' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $inquiry->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $inquiry->company ?: 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $inquiry->email }}</div>
                                        <div class="text-xs text-gray-500">{{ $inquiry->phone ?: 'No phone' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ Str::limit($inquiry->service ?: 'General Inquiry', 25) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        
                                        <!-- Scoped Alpine component for View & Delete modals -->
                                        <div x-data="{ viewModalOpen: false, deleteModalOpen: false }" class="inline-block space-x-2">
                                            <button @click="viewModalOpen = true" class="text-indigo-600 hover:text-indigo-900 font-medium">View</button>
                                            <button @click="deleteModalOpen = true" class="text-red-600 hover:text-red-900 font-medium ml-2">Delete</button>

                                            <!-- VIEW DETAILS MODAL -->
                                            <div x-show="viewModalOpen" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto text-left" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                    <div x-show="viewModalOpen" x-transition.opacity class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="viewModalOpen = false"></div>
                                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                                    
                                                    <div x-show="viewModalOpen" x-transition class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6">
                                                            <div class="flex justify-between items-start border-b border-gray-100 pb-3 mb-4">
                                                                <h3 class="text-lg font-bold text-gray-900">Inquiry Details</h3>
                                                                <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full {{ $inquiry->type === 'service_inquiry' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                                                    {{ ucfirst(str_replace('_', ' ', $inquiry->type)) }}
                                                                </span>
                                                            </div>

                                                            <div class="space-y-3 text-sm">
                                                                <div>
                                                                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Full Name</span>
                                                                    <p class="text-gray-800 font-medium">{{ $inquiry->name }}</p>
                                                                </div>
                                                                <div class="grid grid-cols-2 gap-4">
                                                                    <div>
                                                                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Email Address</span>
                                                                        <p class="text-gray-800">{{ $inquiry->email }}</p>
                                                                    </div>
                                                                    <div>
                                                                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Phone / WhatsApp</span>
                                                                        <p class="text-gray-800">{{ $inquiry->phone ?: 'Not provided' }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="grid grid-cols-2 gap-4">
                                                                    <div>
                                                                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Company</span>
                                                                        <p class="text-gray-800">{{ $inquiry->company ?: 'Not provided' }}</p>
                                                                    </div>
                                                                    <div>
                                                                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Requested Service</span>
                                                                        <p class="text-gray-800">{{ $inquiry->service ?: 'General' }}</p>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Message Body</span>
                                                                    <div class="mt-1 p-3 bg-gray-50 border border-gray-200 rounded-md text-gray-700 whitespace-pre-wrap max-h-48 overflow-y-auto">
                                                                        {{ $inquiry->message ?: 'No message provided.' }}
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Received On</span>
                                                                    <p class="text-gray-500 text-xs">{{ $inquiry->created_at->format('F d, Y \a\t h:i A') }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                            <button type="button" @click="viewModalOpen = false" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primedean-purple sm:w-auto sm:text-sm">
                                                                Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- DELETE MODAL -->
                                            <div x-show="deleteModalOpen" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto text-left" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                    <div x-show="deleteModalOpen" x-transition.opacity class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="deleteModalOpen = false"></div>
                                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                                    
                                                    <div x-show="deleteModalOpen" x-transition class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                        <form action="{{ route('inquiries.destroy', $inquiry) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                                <div class="sm:flex sm:items-start">
                                                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                        <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                                                    </div>
                                                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Delete Inquiry Record</h3>
                                                                        <div class="mt-2">
                                                                            <p class="text-sm text-gray-500">Are you sure you want to delete the submission from <strong>{{ $inquiry->name }}</strong>? This action cannot be undone.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Yes, Delete</button>
                                                                <button type="button" @click="deleteModalOpen = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-400 text-sm">
                                        No inquiries found in the database.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $inquiries->links() }}
            </div>

        </div>
    </div>
</x-app-layout>