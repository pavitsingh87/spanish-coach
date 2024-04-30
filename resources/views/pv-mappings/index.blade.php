<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    @if(Session::has('success'))
        <div class="bg-green-200 border-green-500 border-t-4 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 10a10 10 0 1120 0 10 10 0 01-20 0zm10-9a9 9 0 00-7.938 4.5 1 1 0 101.752.988A7 7 0 1110 2zm0 12a1 1 0 100 2 1 1 0 000-2z"/></svg></div>
                <div>
                <p class="font-bold">Success</p>
                <p class="text-sm">{{ Session::get('success') }}</p>
                </div>
            </div>
        </div><br>
        @endif

        @if(Session::has('error'))
        <div class="bg-red-200 border-red-500 border-t-4 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0a10 10 0 100 20 10 10 0 000-20zm0 18a8 8 0 110-16 8 8 0 010 16zm-.293-3.707a1 1 0 00-1.414-1.414l-2.5 2.5a1 1 0 001.414 1.414l2.5-2.5z"/></svg></div>
            <div>
            <p class="font-bold">Error</p>
            <p class="text-sm">{{ Session::get('error') }}</p>
            </div>
        </div>
        </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Pronoun-Verb Mapping Management</h1>
            <a href="{{ route('pv-mappings.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Pronoun to Verb Mapping</a>
        </div>
        <div class="overflow-x-auto">
            @if ($pvMappings->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pronoun</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Verb</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($pvMappings as $pvMapping)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                // Explode the comma-separated string of pronoun IDs into an array
                                $pronounIds = explode(',', $pvMapping->pronoun);
                                // Fetch the corresponding pronoun names using the pronoun IDs
                                $pronounNames = [];
                                foreach ($pronounIds as $pronounId) {
                                    $pronounNames[] = $pronounOptions[$pronounId];
                                }
                                // Join the pronoun names into a string
                                $pronounString = implode(', ', $pronounNames);
                                @endphp
                                {{ $pronounString }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $pvMapping->verb }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('pv-mappings.edit', $pvMapping->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('pv-mappings.destroy', $pvMapping->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2" onclick="return confirm('Are you sure you want to delete this PvMapping?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            @else
                <p class="text-gray-500">No PvMappings found.</p>
            @endif
        </div>
        
        <!-- Modal container (hidden by default) -->
        <div id="modal" class="hidden fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div class="fixed inset-0 bg-gray-500 opacity-75"></div>

                <!-- Modal dialog -->
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h1 class="text-lg font-bold mb-4">Delete User</h1>
                        <p class="mb-4">Are you sure you want to delete this user?</p>
                        <form id="delete-user-form" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
<!-- In your main layout file or in a separate JavaScript file -->
<!-- JavaScript to handle modal functionality -->
<script>
    // Function to open the modal and set the delete user form action
    function openModal(deleteUrl) {
        // Show the modal
        document.getElementById('modal').classList.remove('hidden');
        // Set the form action
        document.getElementById('delete-user-form').action = deleteUrl;
    }

    // Function to close the modal
    function closeModal() {
        // Hide the modal
        document.getElementById('modal').classList.add('hidden');
    }
</script>
<!-- In your main layout file or in a separate JavaScript file -->
<script>
    // Function to delete the user asynchronously
    function deleteUser(event) {
        // Prevent the form from submitting in the traditional way
        event.preventDefault();

        // Get the form element
        const form = event.target;

        // Send an AJAX request to delete the user
        fetch(form.action, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(response => {
            // Check if the request was successful
            if (response.ok) {
                // Close the modal
                closeModal();
                
                // Reload the page or update the user list as needed
                location.reload();
            } else {
                // Handle errors if any
                console.error('Failed to delete user');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
