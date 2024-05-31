<x-customer.app>
    <div class="bg-white">
        <div class="pt-6">
            <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Order Details</h1>
                <div class="mt-6">
                    <div class="py-4">
                        <h2 class="text-lg font-semibold text-gray-900">Order ID: {{ $order->id }}</h2>
                        <p class="text-sm text-gray-500">Date: {{ $order->transaction_date }}</p>
                        <p class="text-sm text-gray-500">Status: {{ ucfirst($order->status) }}</p>
                        <p class="text-sm text-gray-500">Total: Rp. {{ number_format($order->total_price, 0, ',', '.') }}</p>
                        <div class="mt-4">
                            <h3 class="text-md font-semibold text-gray-900">Items:</h3>
                            <ul class="mt-2">
                                @foreach ($order->details as $detail)
                                    <li class="text-sm text-gray-700">
                                        <div>
                                            {{ $detail->product->name }} - {{ $detail->qty }} pcs - Rp. {{ number_format($detail->product_price, 0, ',', '.') }}
                                        </div>
                                        <div class="mt-2 ml-4">
                                            <h4 class="text-sm font-semibold text-gray-900">Ingredients:</h4>
                                            <ul class="list-disc list-inside">
                                                @foreach ($detail->product->ingredients as $ingredient)
                                                    <li class="text-sm text-gray-700">{{ $ingredient->ingredient_name }} - {{ $ingredient->pivot->quantity }} {{ $ingredient->unit }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('orders.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-customer.app>
