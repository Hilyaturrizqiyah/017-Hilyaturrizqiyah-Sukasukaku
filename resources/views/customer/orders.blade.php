<x-customer.app>
    <div class="bg-white">
        <div class="pt-6">
            <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Your Orders</h1>
                <div class="mt-6">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if (count($orders) > 0)
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach ($orders as $order)
                                <li class="py-4">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h2 class="text-lg font-semibold text-gray-900">Order ID: {{ $order->id }}</h2>
                                            <p class="text-sm text-gray-500">Date: {{ $order->transaction_date }}</p>
                                            <p class="text-sm text-gray-500">Status: {{ ucfirst($order->status) }}</p>
                                            <p class="text-sm text-gray-500">Total: Rp. {{ number_format($order->total_price, 0, ',', '.') }}</p>
                                            <div class="mt-4">
                                                <h3 class="text-md font-semibold text-gray-900">Items:</h3>
                                                <ul class="mt-2">
                                                    @foreach ($order->details as $detail)
                                                        <li class="text-sm text-gray-700">{{ $detail->product->name }} - {{ $detail->qty }} pcs - Rp. {{ number_format($detail->product_price, 0, ',', '.') }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="{{ route('orders.details', $order->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">View Details</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-lg font-semibold text-gray-900">You have no orders.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-customer.app>
