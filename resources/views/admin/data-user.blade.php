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
                    Users
                  </h2>
                  <p class="text-sm text-gray-600">
                    Add users, edit and more.
                  </p>
                </div>

                <div>
                  <div class="inline-flex gap-x-2">
                    <div class="flex items-center ml-4">
                      <input type="text" id="search" class="w-full ml-2 px-7 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Search..." onkeyup="filterUsers()">
                      
                    </div>
                    <button type="button" class="inline-flex items-center px-2 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none ml-4" onclick="openAddUserModal()">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="padding-right: 8px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                      </svg>
                      Add User
                    </button>
                  </div>
                </div>
              </div>
              <!-- End Header -->

              <!-- Table -->
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="ps-6 lg:ps-3 xl:ps-6 pe-6 py-3 text-start">
                      <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                          Name
                        </span>
                      </div>
                    </th>

                    <th scope="col" class="px-6 py-3 text-start">
                      <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                          Email
                        </span>
                      </div>
                    </th>

                    <th scope="col" class="px-6 py-3 text-start">
                      <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                          Phone Number
                        </span>
                      </div>
                    </th>

                    <th scope="col" class="px-6 py-3 text-start">
                      <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                          Role
                        </span>
                      </div>
                    </th>

                    <th scope="col" class="px-6 py-3 text-end"></th>
                  </tr>
                </thead>

                <tbody id="userTable" class="divide-y divide-gray-200">
                  @foreach ($users as $user)
                  <tr>
                    <td class="size-px whitespace-nowrap">
                      <div class="ps-6 lg:ps-3 xl:ps-6 pe-6 py-3">
                        <div class="flex items-center gap-x-3">
                          @if ($user->photo)
                            <img class="inline-block size-[38px] rounded-full" src="{{ asset('storage/' . $user->photo) }}" alt="Image Description">
                          @else
                            <img class="inline-block size-[38px] rounded-full" src="{{ asset('img/default-user.jpg') }}" alt="Default User">
                          @endif
                          {{-- <img class="inline-block size-[38px] rounded-full" src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description"> --}}
                          <div class="grow">
                            <span class="block text-sm font-semibold text-gray-800 ">{{ $user->name }}</span>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="h-px w-72 whitespace-nowrap">
                      <div class="px-6 py-3">
                        <span class="block text-sm text-gray-800 ">{{ $user->email }}</span>
                      </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                      <div class="px-6 py-3">
                        <span class="block text-sm text-gray-800 ">{{ $user->phone_number }}</span>
                      </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                      <div class="px-6 py-3">
                        <div class="flex items-center gap-x-3">
                          <span class="block text-sm text-gray-800 ">{{ $user->role }}</span>
                        </div>
                      </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                      <div class="px-6 py-1.5">
                        <button class="text-blue-600 hover:text-blue-900 mr-2" onclick="openEditUserModal({{ $user->id }})">
                          <i class="fas fa-edit"></i>
                        </button>
                        <form method="POST" action="{{ route('users.destroy', $user) }}" onsubmit="return confirm('Are you sure you want to delete this user?')" class="inline">
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
                            <span class="font-medium text-blue-600">{{ $users->firstItem() }}</span>
                            {!! __('to') !!}
                            <span class="font-medium text-blue-600">{{ $users->lastItem() }}</span>
                            {!! __('of') !!}
                            <span class="font-medium text-blue-600">{{ $users->total() }}</span>
                            {!! __('results') !!}
                        </p>
                    </div>
        
                    <div>
                      {{ $users->links('vendor.pagination.default') }}
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
  
    <!-- Add User Modal -->
    <div id="addUserModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-lg">
                <div class="p-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">Add User</h2>
                </div>
                <div class="p-4">
                  <form id="addUserForm" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm text-gray-600">Name</label>
                        <input type="text" id="name" name="name" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Name">
                    </div>
                    <div class="mb-4">
                        <label for="phone_number" class="block text-sm text-gray-600">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Phone Number">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm text-gray-600">Email</label>
                        <input type="email" id="email" name="email" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Email">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm text-gray-600">Password</label>
                        <input type="password" id="password" name="password" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Password">
                    </div>
                    <div class="mb-4">
                        <label for="role" class="block text-sm text-gray-600">Role</label>
                        <select id="role" name="role" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Select Role">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="mb-4">
                      <label for="editAddress" class="block text-sm text-gray-600">Address</label>
                      <textarea id="editAddress" name="address" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Your Address"></textarea>
                    </div>                  
                    <div class="mb-4">
                        <label for="photo" class="block text-sm text-gray-600">Photo</label>
                        <input type="file" id="photo" name="photo" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600" onclick="closeAddUserModal()">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
                    </div>
                  </form>                
                </div>
            </div>
        </div>
    </div>
    
  
    <!-- Edit User Modal -->
    <div id="editUserModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
      <div class="min-h-screen flex items-center justify-center">
          <div class="bg-white rounded-lg shadow-xl w-full max-w-lg">
              <div class="p-4 border-b">
                  <h2 class="text-xl font-semibold text-gray-800">Edit User</h2>
              </div>
              <div class="p-4">
                  <form id="editUserForm" method="POST" action="" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <input type="hidden" id="editUserId" name="user_id">
                      <div class="mb-4">
                          <label for="editName" class="block text-sm text-gray-600">Name</label>
                          <input type="text" id="editName" name="name" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                      </div>
                      <div class="mb-4">
                          <label for="editEmail" class="block text-sm text-gray-600">Email</label>
                          <input type="email" id="editEmail" name="email" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                      </div>
                      <div class="mb-4">
                          <label for="editPhoneNumber" class="block text-sm text-gray-600">Phone Number</label>
                          <input type="text" id="editPhoneNumber" name="phone_number" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                      </div>
                      <div class="mb-4">
                          <label for="editRole" class="block text-sm text-gray-600">Role</label>
                          <select id="editRole" name="role" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                              <option value="admin">Admin</option>
                              <option value="user">User</option>
                          </select>
                      </div>
                      <div class="mb-4">
                          <label for="editAddress" class="block text-sm text-gray-600">Address</label>
                          <textarea id="editAddress" name="address" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" rows="4"></textarea>
                      </div>
                      <div class="mb-4">
                          <label for="editPhoto" class="block text-sm text-gray-600">Photo</label>
                          <input type="file" id="editPhoto" name="photo" class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                      </div>
                      <div class="flex justify-end">
                          <button type="button" class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600" onclick="closeEditUserModal()">Cancel</button>
                          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
  
  
    <!-- Scripts to handle modal open/close -->
  <script>
      function openAddUserModal() {
        document.getElementById('addUserModal').classList.remove('hidden');
      }

      function closeAddUserModal() {
        document.getElementById('addUserModal').classList.add('hidden');
      }

      function openEditUserModal(userId) {
        fetch(`/admin/users/${userId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(user => {
                document.getElementById('editUserId').value = user.id;
                document.getElementById('editName').value = user.name;
                document.getElementById('editPhoneNumber').value = user.phone_number;
                document.getElementById('editEmail').value = user.email;
                document.getElementById('editRole').value = user.role;
                document.getElementById('editAddress').value = user.address;
                // Add other fields here as needed
                document.getElementById('editUserForm').action = `/admin/users/${user.id}`;
                document.getElementById('editUserModal').classList.remove('hidden');
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
      }

      function closeEditUserModal() {
        document.getElementById('editUserModal').classList.add('hidden');
      }

      function filterUsers() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("search");
          filter = input.value.toUpperCase();
          table = document.getElementById("userTable");
          tr = table.getElementsByTagName("tr");

          console.log("Filtering for:", filter); // Debug log

          for (i = 0; i < tr.length; i++) {
              td = tr[i].getElementsByTagName("td")[0]; // Kolom nama pengguna
              if (td) {
                  txtValue = td.textContent || td.innerText;
                  console.log("Checking row:", txtValue); // Debug log
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                      tr[i].style.display = "";
                  } else {
                      tr[i].style.display = "none";
                  }
              }
          }
      }


  </script>
</x-admin.app>