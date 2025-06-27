<x-app-layout>
    <div x-data="{ tab: 'profile' }" class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow-md">
                
                <!-- Header -->
                <div class="mb-6 text-center">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                         class="w-24 h-24 rounded-full mx-auto mb-2">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                </div>

                <!-- Tabs -->
                <div class="mb-6 flex border-b">
                    <button @click="tab = 'profile'"
                            :class="tab === 'profile' ? 'border-blue-500 text-blue-600' : 'text-gray-600'"
                            class="px-4 py-2 font-semibold border-b-2 focus:outline-none">
                        Profile Info
                    </button>
                    <button @click="tab = 'password'"
                            :class="tab === 'password' ? 'border-blue-500 text-blue-600' : 'text-gray-600'"
                            class="ml-4 px-4 py-2 font-semibold border-b-2 focus:outline-none">
                        Change Password
                    </button>
                    <button @click="tab = 'settings'"
                            :class="tab === 'settings' ? 'border-blue-500 text-blue-600' : 'text-gray-600'"
                            class="ml-4 px-4 py-2 font-semibold border-b-2 focus:outline-none">
                        Settings
                    </button>
                </div>

                <!-- Profile Info -->
                <div x-show="tab === 'profile'" x-cloak>
                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input id="name" name="name" type="text" value="{{ old('name', Auth::user()->name) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required autofocus>
                        </div>

                        <div>
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email', Auth::user()->email) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button>Save</x-primary-button>
                        </div>
                    </form>
                </div>

                <!-- Change Password -->
                <div x-show="tab === 'password'" x-cloak>
                    <form method="POST" action="{{ route('password.update') }}" class="space-y-6 mt-6">
                        @csrf
                        @method('put')

                        <div>
                            <label for="current_password" class="block font-medium text-sm text-gray-700">Current Password</label>
                            <input id="current_password" name="current_password" type="password" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label for="password" class="block font-medium text-sm text-gray-700">New Password</label>
                            <input id="password" name="password" type="password" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div class="flex justify-end">
                            <x-primary-button>Update Password</x-primary-button>
                        </div>
                    </form>
                </div>

                <!-- Settings -->
                <div x-show="tab === 'settings'" x-cloak class="mt-6">
                    <p class="text-gray-600">🔧 Settings tab under development. Add any extra options here like notifications, language preferences, etc.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- AlpineJS -->
    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>
