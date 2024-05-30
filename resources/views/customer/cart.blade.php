<x-customer.app>
    <div class="bg-white">
        <div class="pt-6">
            <!-- Cart Items -->
            <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Shopping Cart</h1>
                <!-- Cart Item List -->
                <div class="mt-6">
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
                                    <div class="flex items-center mt-4 sm:mt-0">
                                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-red-500 hover:text-red-700 focus:outline-none">
                                                <span class="sr-only">Remove</span>
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M6 5a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zM5 13a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <!-- Total Price -->
                        <div class="mt-6">
                            <p class="text-lg font-semibold text-gray-900">Total: Rp. {{ number_format($totalPrice, 0, ',', '.') }}</p>
                        </div>
                        <!-- Checkout Button -->
                        <div class="mt-6">
                            <a href="{{ route('checkout.index') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Checkout</a>
                        </div>
                    @else
                        <p class="text-lg font-semibold text-gray-900">Your cart is empty.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-customer.app>
