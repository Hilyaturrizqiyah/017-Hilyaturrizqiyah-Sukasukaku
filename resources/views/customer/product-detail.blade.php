<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <x-customer.app>
        <div class="bg-white">
            <div class="pt-6">
                <!-- Image and Product Info -->
                <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:max-w-7xl lg:grid lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                    <!-- Image -->
                    <div class="flex justify-center items-center lg:block lg:h-auto">
                        <img src="{{ $product->image ? asset($product->image) : asset('img/default-ingredients.jpg') }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center rounded-lg max-h-96">
                    </div>

                    <!-- Product info -->
                    <div class="px-4 pb-16 pt-10 sm:px-6 lg:px-8 lg:pb-24 lg:pt-16">
                        <div class="lg:border-gray-200 lg:pr-8">
                            <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $product->name }}</h1>
                        </div>

                        <!-- Options -->
                        <div class="mt-4">
                            <h2 class="sr-only">Product information</h2>
                            <p class="text-3xl tracking-tight text-gray-900">Rp. {{ number_format($product->serve_price, 0, ',', '.') }}</p>
                            
                            <!-- Description -->
                            <div class="mt-6">
                                <p class="text-base text-gray-900">
                                    {{-- {{ $product->description }} --}}
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, omnis laboriosam nemo et, voluptate dolorum sapiente, pariatur inventore quod vitae numquam ducimus libero beatae? A consequatur nemo accusantium ullam officiis?
                                </p>
                            </div>

                            <form class="mt-10" action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add to cart</button>
                            </form>
                        </div>

                        <div class="py-10 lg:pt-6 lg:pb-16 lg:pr-8">
                            <!-- Ingredients -->
                            <div class="mt-10">
                                <h3 class="text-sm font-medium text-gray-900 cursor-pointer border-b pb-4 flex items-center justify-between" onclick="toggleDropdown('ingredients')">
                                    Ingredients
                                    <i id="ingredients-icon" class="fas fa-plus"></i>
                                </h3>
                                <div id="ingredients" class="mt-4 hidden">
                                    <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                                        @foreach ($product->ingredients as $ingredient)
                                            <li class="flex items-center space-x-4">
                                                <img src="{{ $ingredient->image ? asset($ingredient->image) : asset('img/default-ingredient.jpg') }}" alt="{{ $ingredient->ingredient_name }}" class="w-12 h-12 object-cover rounded-full">
                                                <div>
                                                    <p class="text-gray-600">{{ $ingredient->ingredient_name }} - {{ $ingredient->pivot->quantity }} {{ $ingredient->unit }}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Details -->
                            <div class="mt-10">
                                <h2 class="text-sm font-medium text-gray-900">Details</h2>
                                <div class="mt-4 space-y-6">
                                    <p class="text-sm text-gray-600">{{ $product->details }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function toggleDropdown(id) {
                const element = document.getElementById(id);
                const icon = document.getElementById(id + '-icon');
                element.classList.toggle('hidden');
                if (element.classList.contains('hidden')) {
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                } else {
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                }
            }
        </script>
    </x-customer.app>
</body>
</html>
