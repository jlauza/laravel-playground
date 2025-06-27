<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                    <p class="text-green-600">{{ session('success') }}</p>
                    @endif

                    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="text" name="name" placeholder="Name" required class="border rounded p-2 w-full dark:bg-gray-800"><br/><br/>
                    <textarea name="description" placeholder="Description" class="border rounded p-2 w-full dark:bg-gray-800"></textarea><br/>
                    <input type="number" name="price" placeholder="Price" step="0.01" required class="border rounded p-2 w-full dark:bg-gray-800"><br/>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
