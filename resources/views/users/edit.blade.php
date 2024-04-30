<x-app-layout>
    <div class="max-w-md mx-auto mt-8 bg-white p-6 rounded-md shadow-md">
        <!-- Breadcrumb Bar Row -->
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-4">
                <li>
                    <div class="flex items-center">
                        <a href="{{ route('users.index') }}" class="text-gray-400 hover:text-indigo-500">
                            <!-- Heroicon name: solid/home -->
                            
                            Users
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                        <a href="#" class="ml-4 text-sm font-medium text-gray-900">Create User</a>
                    </div>
                </li>
            </ol>
        </nav>
        <!-- End Breadcrumb Bar Row -->
        <h1 class="text-2xl font-semibold mb-4">Edit User</h1>
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" required
                       class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required
                       class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" name="password" id="password"
                       class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Update User</button>
            </div>
        </form>
    </div>
</x-app-layout>
