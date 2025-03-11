 <div>







     @if (session()->has('message'))
        <div class="mb-4 text-green-500">{{ session('message') }}</div>
    @endif

    <form  class="shadow-md tarjeta2 p-4 rounded shadow" wire:submit.prevent="{{ $editMode ? 'update' : 'register' }}">
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name:</label>
            <input type="text" id="name" wire:model="name" class="w-full px-3 py-2 border rounded-lg">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" id="email" wire:model="email" class="w-full px-3 py-2 border rounded-lg">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password:</label>
            <input type="password" id="password" wire:model="password" class="w-full px-3 py-2 border rounded-lg">
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg">
            {{ $editMode ? 'Update' : 'Register' }}
        </button>
    </form>
 </div>
