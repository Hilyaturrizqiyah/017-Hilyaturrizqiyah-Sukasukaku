<x-customer.app>
    <!-- Hero Section -->
    <div class="container mx-auto mt-4">
        <section class="relative bg-cover bg-center h-96 md:h-[700px] p-4 shadow-md" style="background-image: url('img/hero-img.jpg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="flex h-full items-center justify-left">
            <div class="relative z-10 text-left pl-4 md:pl-20">
            <h1 class="font-bold tracking-widest text-blue-500">SUKASUKAKU</h1>
            <h1 class="text-4xl font-bold text-white">Customize Purchasing <br />Ingredients or Food </h1>
            <p class="mt-2 text-lg text-white">Free Pickup and Delivery Available</p>
            <button class="mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="scrollToSection()">Shop Now</button>
            </div>
        </div>
        </section>
    </div>

  <!-- Slider Section -->
    <section class="bg-white py-12">
        <div class="container mx-auto relative">
            <div class="swiper-container overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md p-4">
                            <img src="img/categories/ice-tea.jpg" alt="Lemonade Ice Tea" class="w-full h-45 object-cover object-center">
                            <div class="p-2">
                                <h5 class="text-sm font-semibold"><a href="#">Lemonade Ice Tea</a></h5>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan lebih banyak slide di sini -->
                    <div class="swiper-slide">
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md p-4">
                            <img src="img/categories/ginger-tea.jpg" alt="Ginger Tea" class="w-full h-45 object-cover object-center">
                            <div class="p-2">
                                <h5 class="text-sm font-semibold"><a href="#">Ginger Tea</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md p-4">
                            <img src="img/categories/fried-rice.jpeg" alt="Fried Rice" class="w-full h-45 object-cover object-center">
                            <div class="p-2">
                                <h5 class="text-sm font-semibold"><a href="#">Fried Rice</a></h5>
                            </div>
                        </div>
                    </div>
                    <!-- Slide lainnya -->
                    <div class="swiper-slide">
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md p-4">
                            <img src="img/categories/chicken-satay.jpg" alt="Chicken Satay" class="w-full h-45 object-cover object-center">
                            <div class="p-2">
                                <h5 class="text-sm font-semibold"><a href="#">Chicken Satay</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md p-4">
                            <img src="img/categories/fried-noodles.jpg" alt="Fried Noodles" class="w-full h-45 object-cover object-center">
                            <div class="p-2">
                                <h5 class="text-sm font-semibold"><a href="#">Fried Noodles</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md p-4">
                            <img src="img/categories/gado-gado.jpg" alt="Gado - Gado" class="w-full h-45 object-cover object-center">
                            <div class="p-2">
                                <h5 class="text-sm font-semibold"><a href="#">Gado - Gado</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan tombol navigasi Swiper -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>

  <!-- Featured Section Begin -->
    <section id="shop-section" class="bg-white py-12">
        <div class="container mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-semibold">Product</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 featured__filter">
                <!-- Item 1 -->
                {{-- <div class="beverages">
                <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md p-4">
                    <div class="relative">
                    <img src="img/categories/ginger-tea.jpg" alt="Ginger Tea" class="w-full h-50 object-cover">
                    <ul class="absolute inset-0 flex justify-center items-center space-x-2 opacity-0 hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                        <li><a href="#" class="text-white"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#" class="text-white"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    </div>
                    <div class="p-2">
                    <h6 class="text-lg font-semibold"><a href="#">Ginger Tea</a></h6>
                    <h5 class="text-sm text-gray-500">Rp. 15.000,-</h5>
                    </div>
                </div>
                </div> --}}
                @foreach ($products as $product)
                    <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md p-4">
                        <div class="relative">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('img/default-ingredients.jpg') }}" alt="{{ $product->name }}" class="w-full h-50 object-cover">
                            <ul class="absolute inset-0 flex justify-center items-center space-x-2 opacity-0 hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                                <li><a href="#" class="text-white"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#" class="text-white"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="p-2">
                            <h6 class="text-lg font-semibold"><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h6>
                            <p class="text-sm text-gray-500">Rp. {{ number_format($product->serve_price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
                <!-- Item 2 -->
                {{-- <div class="beverages">
                <div class="bg-gray-100 rounded-lg overflow-hidden shadow-md p-4">
                    <div class="relative">
                    <img src="img/categories/ice-tea.jpg" alt="Ginger Tea" class="w-full h-50 object-cover">
                    <ul class="absolute inset-0 flex justify-center items-center space-x-2 opacity-0 hover:opacity-100 transition-opacity duration-300 bg-black bg-opacity-50">
                        <li><a href="#" class="text-white"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#" class="text-white"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    </div>
                    <div class="p-2">
                    <h6 class="text-lg font-semibold"><a href="#">Lemonade Ice Tea</a></h6>
                    <h5 class="text-sm text-gray-500">Rp. 20.000,-</h5>
                    </div>
                </div>
                </div> --}}
                <!-- Tambahkan lebih banyak item sesuai kebutuhan -->
            </div>
        </div>
    </section>
<!-- Featured Section End -->
</x-customer.app>