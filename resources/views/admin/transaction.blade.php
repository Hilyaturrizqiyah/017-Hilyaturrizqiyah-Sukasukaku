<x-admin.app>
    <!-- Content -->
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
                                    Transactions
                                </h2>
                                <p class="text-sm text-gray-600">
                                    Manage transactions, view details and more.
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <div class="flex items-center ml-4">
                                        <input type="text" id="search" class="w-full ml-2 px-7 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Search..." onkeyup="filter()">
                                    </div>
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
                                                Date
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                                                Customer
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                                                Total Price
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                                                Status
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                </tr>
                            </thead>

                            <tbody id="table" class="divide-y divide-gray-200">
                                @foreach ($transactions as $transaction)
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 lg:ps-3 xl:ps-6 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                {{ $transaction->transaction_date }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="h-px w-72 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm text-gray-800">{{ $transaction->user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm text-gray-800">{{ $transaction->total_price }}</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm text-gray-800">{{ $transaction->status }}</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-1.5">
                                            <button type="button" class="text-blue-600 hover:text-blue-900 mr-2" data-id="{{ $transaction->id }}" data-customer-id="{{ $transaction->customer_id }}" data-total-price="{{ $transaction->total_price }}" data-status="{{ $transaction->status }}" onclick="openEditTransactionModal(this)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form method="POST" action="{{ route('transactions.destroy', $transaction) }}" onsubmit="return confirm('Are you sure you want to delete?')" class="inline">
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
                                        Showing
                                        <span class="font-medium text-blue-600">{{ $transactions->firstItem() }}</span>
                                        to
                                        <span class="font-medium text-blue-600">{{ $transactions->lastItem() }}</span>
                                        of
                                        <span class="font-medium text-blue-600">{{ $transactions->total() }}</span>
                                        results
                                    </p>
                                </div>

                                <div>
                                    {{ $transactions->links('vendor.pagination.default') }}
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

    <!-- Edit Transaction Modal -->
    <div id="editTransactionModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-lg">
                <div class="p-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">Edit Transaction</h2>
                </div>
                <div class="p-4">
                    <form id="editTransactionForm" method="POST" action="">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editTransactionId" name="transaction_id">
                        <div class="mb-4">
                            <label for="editStatus" class="block text-sm text-gray-600">Status</label>
                            <select id="editStatus" name="status" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="pending">Pending</option>
                                <option value="process">Process</option>
                                <option value="delivery">Delivery</option>
                                <option value="done">Done</option>
                            </select>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600" onclick="closeEditTransactionModal()">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        function openEditTransactionModal(transactionId, currentStatus) {
            const form = document.getElementById('editTransactionForm');
            const action = "{{ route('transactions.update', ['transaction' => 'PLACEHOLDER']) }}".replace('PLACEHOLDER', transactionId);
            form.action = action;
            document.getElementById('editTransactionId').value = transactionId;
            document.getElementById('editStatus').value = currentStatus;
            document.getElementById('editTransactionModal').classList.remove('hidden');
        }

        function closeEditTransactionModal() {
            document.getElementById('editTransactionModal').classList.add('hidden');
        }

    
        document.getElementById('editTransactionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = e.target;
            const formData = new FormData(form);
            const transactionId = document.getElementById('editTransactionId').value;
    
            fetch(`/transactions/${transactionId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': formData.get('_token'),
                    'X-HTTP-Method-Override': 'PUT'
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload(); // Reload page to see the changes
                } else {
                    alert('Error updating transaction');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error updating transaction');
            });
        });
    </script>
    
    

</x-admin.app>
