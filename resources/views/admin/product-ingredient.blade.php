<x-admin.app>
    <div class="flex flex-col lg:ps-64 max-w-[110rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-140 mx-auto">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">
                                    Product Ingredients
                                </h2>
                                <p class="text-sm text-gray-600">
                                    Add product ingredients, edit and more.
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

                        <table id="table" class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                Product ID
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                Ingredient ID
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                Quantity
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                </tr>
                            </thead>

                            <tbody id="table" class="divide-y divide-gray-200">
                                @foreach ($productIngredients as $productIngredient)
                                <tr>
                                    <td class="px-6 py-3 text-sm text-gray-800">
                                        {{ $productIngredient->product_id }}
                                    </td>
                                    <td class="px-6 py-3 text-sm text-gray-800">
                                        {{ $productIngredient->ingredient_id }}
                                    </td>
                                    <td class="px-6 py-3 text-sm text-gray-800">
                                        {{ $productIngredient->quantity }}
                                    </td>
                                    <td class="px-6 py-3 text-sm text-gray-800 text-end">
                                        <button class="text-blue-600 hover:text-blue-900 mr-2" onclick="openDetailModal({{ $productIngredient }})">
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                        <button class="text-blue-600 hover:text-blue-900 mr-2" onclick="openEditModal({{ $productIngredient->id }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form method="POST" action="{{ route('product-ingredients.destroy', $productIngredient) }}" onsubmit="return confirm('Are you sure you want to delete?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700 leading-5">
                                        {!! __('Showing') !!}
                                        <span class="font-medium text-blue-600">{{ $productIngredients->firstItem() }}</span>
                                        {!! __('to') !!}
                                        <span class="font-medium text-blue-600">{{ $productIngredients->lastItem() }}</span>
                                        {!! __('of') !!}
                                        <span class="font-medium text-blue-600">{{ $productIngredients->total() }}</span>
                                        {!! __('results') !!}
                                    </p>
                                </div>

                                <div>
                                    {{ $productIngredients->links('vendor.pagination.default') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="addModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-lg">
                <div class="p-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">Add Product Ingredient</h2>
                </div>
                <div class="p-4">
                    <form id="addForm" method="POST" action="{{ route('product-ingredients.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="product_id" class="block text-sm text-gray-600">Product ID</label>
                            <input type="text" id="product_id" name="product_id" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Product ID">
                        </div>
                        <div class="mb-4">
                            <label for="ingredient_id" class="block text-sm text-gray-600">Ingredient ID</label>
                            <input type="text" id="ingredient_id" name="ingredient_id" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Ingredient ID">
                        </div>
                        <div class="mb-4">
                            <label for="quantity" class="block text-sm text-gray-600">Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Quantity">
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

    <div id="editModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-lg">
                <div class="p-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">Edit Product Ingredient</h2>
                </div>
                <div class="p-4">
                    <form id="editForm" method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editProductIngredientId" name="product_ingredient_id">
                        <div class="mb-4">
                            <label for="editProductId" class="block text-sm text-gray-600">Product ID</label>
                            <input type="text" id="editProductId" name="product_id" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="editIngredientId" class="block text-sm text-gray-600">Ingredient ID</label>
                            <input type="text" id="editIngredientId" name="ingredient_id" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="editQuantity" class="block text-sm text-gray-600">Quantity</label>
                            <input type="number" id="editQuantity" name="quantity" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
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

    <div id="detailModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-lg">
                <div class="p-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">Product Ingredient Details</h2>
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <label for="detailProductId" class="block text-sm text-gray-600">Product ID</label>
                        <input type="text" id="detailProductId" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="detailIngredientId" class="block text-sm text-gray-600">Ingredient ID</label>
                        <input type="text" id="detailIngredientId" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="detailQuantity" class="block text-sm text-gray-600">Quantity</label>
                        <input type="text" id="detailQuantity" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" readonly>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600" onclick="closeDetailModal()">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        function openEditModal(productIngredientId) {
            fetch(`/admin/product-ingredients/${productIngredientId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(productIngredient => {
                    document.getElementById('editProductIngredientId').value = productIngredient.id;
                    document.getElementById('editProductId').value = productIngredient.product_id;
                    document.getElementById('editIngredientId').value = productIngredient.ingredient_id;
                    document.getElementById('editQuantity').value = productIngredient.quantity;
                    document.getElementById('editForm').action = `/admin/product-ingredients/${productIngredient.id}`;
                    document.getElementById('editModal').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function openDetailModal(productIngredient) {
            document.getElementById('detailProductId').value = productIngredient.product_id;
            document.getElementById('detailIngredientId').value = productIngredient.ingredient_id;
            document.getElementById('detailQuantity').value = productIngredient.quantity;
            document.getElementById('detailModal').classList.remove('hidden');
        }

        function closeDetailModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }
    </script>
</x-admin.app>
