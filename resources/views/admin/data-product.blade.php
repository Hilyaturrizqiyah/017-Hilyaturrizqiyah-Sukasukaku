<x-admin.app>
    <!-- Content -->
    <!-- Table Section -->
    <div class="flex flex-col lg:ps-64 max-w-[110rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-140 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <!-- Header -->
                        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">
                                    Products
                                </h2>
                                <p class="text-sm text-gray-600">
                                    Add products, edit and more.
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <div class="flex items-center ml-4">
                                        <input type="text" id="search" class="w-full ml-2 px-7 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Search..." onkeyup="filter()">
                                    </div>
                                    <button type="button" class="inline-flex items-center px-2 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none ml-4" onclick="openAddModal()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="padding-right: 8px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table id="table" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                                                Image
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                                                Name
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                                                Serve Price
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                                                Quantity
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                </tr>
                            </thead>

                            <tbody id="table" class="divide-y divide-gray-200">
                                @foreach ($products as $product)
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 lg:ps-3 xl:ps-6 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                @if ($product->image)
                                                <img class="inline-block size-[38px]" src="{{ asset('storage/' . $product->image) }}" alt="Image Description">
                                                @else
                                                <img class="inline-block size-[38px]" src="{{ asset('img/default-ingredients.jpg') }}" alt="Default Product">
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="h-px w-72 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm text-gray-800 ">{{ $product->name }}</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm text-gray-800 ">{{ $product->serve_price }}</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm text-gray-800 ">{{ $product->qty_product }}</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-1.5">
                                            <button class="text-blue-600 hover:text-blue-900 mr-2" onclick="openEditModal({{ $product->id }})">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('Are you sure you want to delete?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->

                        <!-- Footer -->
                        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700 leading-5">
                                        {!! __('Showing') !!}
                                        <span class="font-medium text-blue-600">{{ $products->firstItem() }}</span>
                                        {!! __('to') !!}
                                        <span class="font-medium text-blue-600">{{ $products->lastItem() }}</span>
                                        {!! __('of') !!}
                                        <span class="font-medium text-blue-600">{{ $products->total() }}</span>
                                        {!! __('results') !!}
                                    </p>
                                </div>

                                <div>
                                    {{ $products->links('vendor.pagination.default') }}
                                </div>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Table Section -->

    <!-- Add Modal -->
    <div id="addModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-lg">
                <div class="p-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">Add Product</h2>
                </div>
                <div class="p-4">
                    <form id="addForm" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm text-gray-600">Name</label>
                            <input type="text" id="name" name="name" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Name">
                        </div>
                        <div class="mb-4">
                            <label for="serve_price" class="block text-sm text-gray-600">Serve Price</label>
                            <input type="number" id="serve_price" name="serve_price" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Serve Price">
                        </div>
                        <div class="mb-4">
                            <label for="qty_product" class="block text-sm text-gray-600">Quantity</label>
                            <input type="number" id="qty_product" name="qty_product" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Quantity">
                        </div>
                        <div class="mb-4">
                            <label for="instruction" class="block text-sm text-gray-600">Instruction</label>
                            <textarea id="instruction" name="instruction" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Instruction"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm text-gray-600">Description</label>
                            <textarea id="description" name="description" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Description"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-sm text-gray-600">Image</label>
                            <input type="file" id="image" name="image" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="flex justify-end">
                            <button type="button" class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600" onclick="closeAddModal()">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
                        </div>
                    </form>                
                </div>
            </div>
        </div>
    </div>
    

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-lg">
                <div class="p-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">Edit Product</h2>
                </div>
                <div class="p-4">
                    <form id="editForm" method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editProductId" name="product_id">
                        <div class="mb-4">
                            <label for="editName" class="block text-sm text-gray-600">Name</label>
                            <input type="text" id="editName" name="name" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="editServePrice" class="block text-sm text-gray-600">Serve Price</label>
                            <input type="number" id="editServePrice" name="serve_price" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="editQtyProduct" class="block text-sm text-gray-600">Quantity</label>
                            <input type="number" id="editQtyProduct" name="qty_product" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Quantity">
                        </div>
                        <div class="mb-4">
                            <label for="editInstruction" class="block text-sm text-gray-600">Instruction</label>
                            <textarea id="editInstruction" name="instruction" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Instruction"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="editDescription" class="block text-sm text-gray-600">Description</label>
                            <textarea id="editDescription" name="description" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Description"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="editImage" class="block text-sm text-gray-600">Image</label>
                            <input type="file" id="editImage" name="image" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="flex justify-end">
                            <button type="button" class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600" onclick="closeEditModal()">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    


    <!-- Scripts to handle modal open/close -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        function openEditModal(productId) {
            fetch(`/admin/products/${productId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(product => {
                    document.getElementById('editProductId').value = product.id;
                    document.getElementById('editName').value = product.name;
                    document.getElementById('editServePrice').value = product.serve_price;
                    document.getElementById('editQtyProduct').value = product.qty_product;
                    document.getElementById('editInstruction').value = product.instruction || ''; // memastikan data instruction diisi
                    document.getElementById('editDescription').value = product.description || ''; // memastikan data description diisi
                    document.getElementById('editForm').action = `/admin/products/${product.id}`;
                    document.getElementById('editModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
</x-admin.app>
