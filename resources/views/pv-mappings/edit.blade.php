<x-app-layout>
    <div class="max-w-full mx-auto mt-8 bg-white px-10 py-6 rounded-md shadow-md">
        <h1 class="text-2xl font-semibold mb-4 border-b pb-2">Edit Verb to Pronoun Mapping</h1>
        <form method="POST" action="{{ route('pv-mappings.update', $pvMapping->id) }}">
            @csrf
            @method('PUT') <!-- Use PUT method for update -->
            <div class="mb-4">
                <label for="verb" class="block text-sm font-medium text-gray-700">Verb:</label>
                <input type="text" name="verb" id="verb" class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="{{ $pvMapping->verb }}" required>
            </div>
            <div class="mb-4">
                <label for="pronouns" class="block text-sm font-medium text-gray-700">Pronouns:</label>
                <div id="pronounsDropdown" class="relative inline-block w-full">
                    <div class="overflow-hidden border border-gray-300 rounded-md">
                        <div class="grid grid-cols-2 gap-2 p-2">
                            @foreach ($pronounOptions as $id => $pronoun)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="pronouns[]" value="{{ $id }}" class="form-checkbox h-5 w-5 text-indigo-600" {{ in_array($id, explode(',', $pvMapping->pronoun)) ? 'checked' : '' }}>
                                    <span class="ml-2 text-sm text-gray-700">{{ $pronoun }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label for="selectedPronouns" class="block text-sm font-medium text-gray-700">Selected Pronouns:</label>
                <div id="selectedPronounsContainer" class="flex flex-wrap gap-2">
                    <!-- Display selected pronouns here -->
                    @foreach (explode(',', $pvMapping->pronoun) as $pronounId)
                        @if (isset($pronounOptions[$pronounId]))
                            <div class="flex items-center bg-gray-200 rounded-md p-2">
                                <span>{{ $pronounOptions[$pronounId] }}</span>
                                <button type="button" class="ml-2 text-gray-500 hover:text-red-500">
                                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 6.293a1 1 0 011.414 0L10 8.586l3.293-3.293a1 1 0 111.414 1.414L11.414 10l3.293 3.293a1 1 0 01-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 10 5.293 6.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Update</button>
            </div>
        </form>
    </div>
    <script>
        // Function to update the selected pronouns in the display div
        function updateSelectedPronouns() {
            // Get all the selected checkboxes
            const checkboxes = document.querySelectorAll('#pronounsDropdown input[type="checkbox"]:checked');
            // Get the container div to display selected pronouns
            const selectedPronounsContainer = document.getElementById('selectedPronounsContainer');
            // Clear previous content in the container
            selectedPronounsContainer.innerHTML = '';
            // Iterate over the selected checkboxes and add them to the container
            checkboxes.forEach((checkbox) => {
                const pronoun = checkbox.nextElementSibling.textContent;
                const pronounDiv = document.createElement('div');
                pronounDiv.classList.add('flex', 'items-center', 'bg-gray-200', 'rounded-md', 'p-2');
                pronounDiv.innerHTML = `
                    <span>${pronoun}</span>
                    <button type="button" class="ml-2 text-gray-500 hover:text-red-500">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 6.293a1 1 0 011.414 0L10 8.586l3.293-3.293a1 1 0 111.414 1.414L11.414 10l3.293 3.293a1 1 0 01-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 10 5.293 6.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                `;
                // Add click event listener to the button to deselect the pronoun
                pronounDiv.querySelector('button').addEventListener('click', () => {
                    checkbox.checked = false; // Uncheck the checkbox
                    updateSelectedPronouns(); // Update the display
                });
                // Append the pronoun div to the container
                selectedPronounsContainer.appendChild(pronounDiv);
            });
        }

        // Add event listener to update selected pronouns when checkboxes are clicked
        document.querySelectorAll('#pronounsDropdown input[type="checkbox"]').forEach((checkbox) => {
            checkbox.addEventListener('click', updateSelectedPronouns);
        });
    </script>
</x-app-layout>
