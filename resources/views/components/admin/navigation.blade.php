<!-- Sidebar -->
<div id="application-sidebar" class="hs-overlay [--auto-close:lg]
    hs-overlay-open:translate-x-0
    -translate-x-full transition-all duration-300 transform
    w-[260px]
    hidden
    fixed inset-y-0 start-0 z-[60]
    bg-white border-e border-gray-200
    lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
">
    <div class="px-8 pt-4">
        <!-- Logo -->
        <a href="/admin/dashboard">
            <img src="{{ asset('img/sukasukaku2.png') }}" alt="SukaSukaKu Logo" class="h-15">
        </a>
        <!-- End Logo -->
    </div>

    <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
        <ul class="space-y-1.5">
            <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 {{ Request::is('admin/dashboard') ? 'bg-gray-100 text-neutral-700' : 'text-neutral-700' }}" href="/admin/dashboard">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    Dashboard
                </a>
            </li>

            <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 {{ Request::is('admin/users*') ? 'bg-gray-100 text-neutral-700' : 'text-neutral-700' }}" href="{{ route('users.index') }}">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Users
                </a>
            </li>

            <li class="hs-accordion {{ Request::is('admin/ingredients*') || Request::is('admin/products*') || Request::is('admin/ingredients-product*') ? 'hs-accordion-active' : '' }}" id="account-accordion">
                <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 {{ Request::is('admin/ingredients*') || Request::is('admin/products*') || Request::is('admin/ingredients-product*') ? 'text-blue-600' : 'text-neutral-700' }}">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5V19A9 3 0 0 0 21 19V5"/><path d="M3 12A9 3 0 0 0 21 12"/></svg>
                    Master Data

                    <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>

                    <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>

                <div id="account-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 {{ Request::is('admin/ingredients*') || Request::is('admin/products*') || Request::is('admin/ingredients-product*') ? '' : 'hidden' }}">
                    <ul class="pt-2 ps-2">
                        <li>
                            <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 {{ Request::is('admin/ingredients*') ? 'text-blue-600' : 'text-neutral-700' }}" href="{{ route('ingredients.index') }}">
                                Ingredients
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 {{ Request::is('admin/products*') ? 'text-blue-600' : 'text-neutral-700' }}" href="{{ route('products.index') }}">
                                Products
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 {{ Request::is('admin/ingredients-product*') ? 'text-blue-600' : 'text-neutral-700' }}" href="#">
                                Ingredients Product
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg hover:bg-gray-100 {{ Request::is('admin/transactions*') ? 'bg-gray-100 text-neutral-700' : 'text-neutral-700' }}" href="{{ route('transactions.index') }}">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Transactions
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- End Sidebar -->
