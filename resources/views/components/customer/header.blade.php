<header class="fixed top-0 left-0 right-0 bg-white shadow-md z-50">
    <!-- Top Header (Menu About) -->
    <div class="bg-gray-200 p-2 flex justify-between items-center px-7">
        <!-- Spacer -->
        <div></div>
        <!-- Menu About -->
        <div>
            <a href="#" class="text-blue-600 hover:text-blue-800">About</a>
        </div>
    </div>

    <!-- Bottom Header (Search, Notification, Cart, Login) -->
    <div class="bg-white shadow-md px-7">
        <div class="p-2 flex justify-between items-center">
            <!-- Brand Name -->
            {{-- <div class="text-xl font-semibold text-blue-600">SukaSukaKu</div> --}}
            <a href="/">
                <img src="{{ asset('img/sukasukaku2.png') }}" alt="SukaSukaKu Logo" class="h-13">
            </a>

            <!-- Search Input -->
            <div class="w-1/2">
                <input type="text" placeholder="Search..." class="w-full rounded-lg border border-gray-300 p-2 focus:border-blue-500 focus:outline-none" />
            </div>
            <!-- Icons (Notification, Cart, Login) -->
            <div class="flex space-x-5 justify-center items-center">
                @if (Auth::check())
                <a href="#" class="text-blue-600 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                </a>
                <a href="{{ route('cart.index') }}" class="text-blue-600 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </a>
                @else
                <a href="/" class="text-blue-600 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </a>
                @endif
                <!-- Separator -->
                <div class="border-r border-blue-300 h-6"></div>
                @if (Auth::check())
                <div class="relative inline-block text-left">
                  <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                    <button type="button" class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none border-gray-300 shadow-sm bg-white focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-offset-gray-100 focus:ring-indigo-500" id="profile-menu-button" aria-haspopup="true" aria-expanded="false">
                        @auth
                            @if (auth()->user()->image)
                                <img class="h-9 w-9 rounded-full" src="{{ asset('storage/' . auth()->user()->image) }}" alt="User profile picture">
                            @else
                                <img class="h-9 w-9 rounded-full" src="{{ asset('img/default-user.jpg') }}" alt="Default profile picture">
                            @endif
                        @endauth
                    </button>
                    
                  </div>
                  <div id="profile-menu" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" role="menu" aria-orientation="vertical" aria-labelledby="profile-menu-button">
                    <div class="py-3 px-5 bg-gray-200 rounded-t-lg dark:bg-neutral-800">
                        <p class="text-sm text-gray-500 dark:text-neutral-400">Signed in as</p>
                        <p class="text-sm font-medium text-gray-800 dark:text-neutral-300">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="py-1" role="none">
                          <a href="{{ route('customer.profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Your Profile</a>
                          <a href="{{ route('orders.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Order</a>
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Logout</button>
                          </form>
                      </div>
                  </div>
                </div>              
                @else
                <!-- Login -->
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </a>
                @endif
            </div>
        </div>
    </div>
</header>