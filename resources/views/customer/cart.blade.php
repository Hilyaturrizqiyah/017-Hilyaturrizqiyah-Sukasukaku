<x-customer.app>
    <div class="container mx-auto mb-16">
        <h1 class="text-3xl font-bold text-center mb-8">Shopping Cart</h1>

        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Quantity
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Subtotal
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Remove</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($cartItems as $cartItem)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img src="{{ $cartItem['image'] ? asset('storage/' . $cartItem['image']) : asset('img/default-ingredient.jpg') }}" alt="{{ $cartItem['name'] }}" class="w-20 h-20 object-cover rounded-lg">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $cartItem['name'] }} 
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $cartItem['quantity'] }} 
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <form action="{{ route('cart.update', $cartItem['id']) }}" method="post" class="flex items-center justify-center space-x-2">
                                            @csrf
                                            @method('PUT')
                                    
                                            <select name="option" class="block w-32 py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                                <option value="uncooked" {{ $cartItem['option'] == 'uncooked' ? 'selected' : '' }}>Uncooked</option>
                                                <option value="cooked" {{ $cartItem['option'] == 'cooked' ? 'selected' : '' }}>Cooked</option>
                                            </select>
                                    
                                            <input type="number" name="quantity" value="{{ $cartItem['quantity'] }}" class="w-16 text-center border border-gray-300 rounded-md shadow-sm">
                                    
                                            <button type="submit" class="px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M12.293 4.293a1 1 0 0 1 1.414 1.414l-7 7a1 1 0 0 1-1.414 0l-3-3a1 1 0 1 1 1.414-1.414L5 10.586l6.293-6.293a1 1 0 0 1 1.414 0z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        {{ number_format($cartItem['serve_price'], 2) }} 
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        {{ number_format($cartItem['quantity'] * $cartItem['serve_price'], 2) }} 
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('cart.remove', $cartItem['id']) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 focus:outline-none">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="flex flex-col mt-8">
            <div class="flex justify-between">
                <span class="text-gray-600">Subtotal</span>
                <span class="text-gray-900 font-bold">{{ number_format($totalPrice, 2) }}</span>
            </div>
            <div class="flex justify-between mt-2">
                <span class="text-gray-600">Shipping estimate</span>
                <span class="text-gray-900 font-bold">--</span>
            </div>
            <div class="flex justify-between mt-2">
                <span class="text-gray-600">Total</span>
                <span class="text-gray-900 font-bold">{{ number_format($totalPrice, 2) }}</span>
            </div>
            <div class="mt-6">
                <a href="{{ route('checkout.index') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded-md">Checkout</a>
            </div>
        </div>
    </div>
</x-customer.app>
