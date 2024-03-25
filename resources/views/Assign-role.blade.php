<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Roles') }}
        </h2>
    </x-slot>

    @if(auth()->user()->hasRole('super_admin'))

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Assign Roles</h3>
                    <form action="{{ route('roles.assign') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select User</label>
                            <select id="user_id" name="user_id" class="mt-1 block w-full dark:text-black">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="role_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select Role</label>
                            <select id="role_id" name="role_id" class="mt-1 block w-full dark:text-black">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Assign Role</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-200">
                        {{ __("You're not authorized to manage roles!") }}
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
