<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-bold">Product List</h1>
                        <a href="{{ route('products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                            + Add Product
                        </a>
                    </div>

                    @if($products->isEmpty())
                        <p class="text-gray-400">No products available.</p>
                    @else
                        <table class="w-full table-auto border-collapse border border-gray-300">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="border px-4 py-2 text-left">ID</th>
                                    <th class="border px-4 py-2 text-left">Name</th>
                                    <th class="border px-4 py-2 text-left">Price</th>
                                    <th class="border px-4 py-2 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="border px-4 py-2">{{ $product->id }}</td>
                                        <td class="border px-4 py-2">{{ $product->name }}</td>
                                        <td class="border px-4 py-2">${{ number_format($product->price, 2) }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
