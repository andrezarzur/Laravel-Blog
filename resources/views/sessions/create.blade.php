<x-layout>
    <section class="px-6 py-8">
        <div class=" flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
                <div class="flex justify-center mb-6">
                    <span class="inline-block bg-gray-200 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/></svg>
                    </span>
                </div>
                <h2 class="text-2xl font-semibold text-center mb-4">Log in to your account</h2>
                <p class="text-gray-600 text-center mb-6">Enter your details to log in.</p>
                <form action="/login" method="POST" class="mt-10">
                    @csrf
    
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email Address *</label>
                        <input type="email" value="{{ old('email') }}" id="email" name="email" class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500 {{ isset($errors->getMessages()['email']) ? 'border-red-400' : ''}}" required placeholder="hello@alignui.com">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password *</label>
                        <input type="password" value="{{ old('password') }}" id="password" name="password" class="form-input w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-blue-500 {{ isset($errors->getMessages()['password']) ? 'border-red-400' : ''}}" required placeholder="••••••••">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Log in</button>
                    {{-- <p class="text-gray-600 text-xs text-center mt-4">
                        By clicking Register, you agree to accept Apex Financial's
                        <a href="#" class="text-blue-500 hover:underline">Terms and Conditions</a>.
                    </p> --}}
                </form>
            </div>
        </div>
    </section>
</x-layout>