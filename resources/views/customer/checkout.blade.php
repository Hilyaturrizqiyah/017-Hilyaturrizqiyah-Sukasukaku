<x-customer.app>
    <div class="bg-white">
        <div class="pt-6">
            <!-- Checkout Items -->
            <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Checkout</h1>
                <div class="mt-6">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if (count($cartItems) > 0)
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach ($cartItems as $item)
                                <li class="py-4 flex justify-between items-center">
                                    <div class="flex flex-col sm:flex-row sm:items-center">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded-lg">
                                        <div class="ml-4">
                                            <h2 class="text-lg font-semibold text-gray-900">{{ $item['name'] }}</h2>
                                            <p class="text-sm text-gray-500">Rp. {{ number_format($item['serve_price'], 0, ',', '.') }}</p>
                                            <p class="text-sm text-gray-500">Quantity: {{ $item['quantity'] }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <!-- Total Price -->
                        <div class="mt-6">
                            <p class="text-lg font-semibold text-gray-900">Total: Rp. {{ number_format($totalPrice, 0, ',', '.') }}</p>
                        </div>
                        <!-- Checkout Form -->
                        <div class="mt-6">
                            <form action="{{ route('checkout.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                    <input type="text" name="address" id="address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" name="city" id="city" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div class="mb-4">
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                                    <input type="text" name="postal_code" id="postal_code" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Place Order</button>
                            </form>
                        </div>
                    @else
                        <p class="text-lg font-semibold text-gray-900">Your cart is empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-customer.app>
