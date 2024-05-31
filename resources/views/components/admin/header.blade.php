<!-- ========== HEADER ========== -->
<header class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 sm:py-4 lg:ps-64">
    <nav class="flex basis-full items-center w-full mx-auto px-4 sm:px-6" aria-label="Global">
        <div class="me-5 lg:me-0 lg:hidden">
            <!-- Logo -->
            <a href="/admin/dashboard">
                <img src="{{ asset('img/sukasukaku2.png') }}" alt="SukaSukaKu Logo" class="h-13">
            </a>
            <!-- End Logo -->
        </div>
    
        <div class="w-full flex items-center justify-end sm:justify-end sm:gap-x-3 sm:order-3">
            {{-- <div class="flex flex-row items-center justify-end gap-2">
                <button type="button" class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/>
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>
                    </svg>
                </button> --}}
            
                <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                    <button id="hs-dropdown-with-header" type="button" class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                        @if (Auth::user()->photo)
                            <img class="inline-block size-[38px] rounded-full ring-2 ring-white" src="{{ asset('storage/' . Auth::user()->photo) }}" alt="User Photo">
                        @else
                            <img class="inline-block size-[38px] rounded-full ring-2 ring-white" src="{{ asset('img/default-user.jpg') }}" alt="Default Photo">
                        @endif
                    </button>
                    
            
                    <div id="dropdown-menu" class="hs-dropdown-menu transition-[opacity,margin] duration-300 opacity-0 invisible absolute right-0 mt-2 min-w-[200px] bg-white shadow-md rounded-lg p-2" aria-labelledby="hs-dropdown-with-header">
                        <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg">
                            <p class="text-sm text-gray-500">Signed in as</p>
                            <p class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="mt-2 py-2 first:pt-0 last:pb-0">
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="{{ route('profile.edit') }}">
                              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                  <circle cx="9" cy="7" r="4"/>
                                  <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                  <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                              </svg>
                                Profile
                            </a>
                            <a id="logout-button" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                                  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                  <polyline points="16 17 21 12 16 7"/>
                                  <line x1="21" x2="9" y1="12" y2="12"/>
                                </svg>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
        
    </nav>
</header>
<!-- ========== END HEADER ========== -->