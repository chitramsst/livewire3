<nav id="topbar" class="topbar border-b  dark:border-slate-700/40  fixed inset-x-0  duration-300
             block print:hidden z-50">
    <div class="mx-0 flex max-w-full flex-wrap items-center lg:mx-auto">
        <div class="ltr:mx-2  rtl:mx-2">
            <button id="toggle-menu-hide" class="button-menu-mobile flex rounded-full md:me-0 relative">
                <i data-feather="menu" class="top-icon w-5 h-5"></i>
            </button>
        </div>
        
        <div class="order-1 ltr:ms-auto rtl:ms-0 rtl:me-auto flex items-center md:order-2">
            <div class="me-2  dropdown relative">
                <button type="button" class="dropdown-toggle flex items-center rounded-full text-sm
                    focus:bg-none focus:ring-0 dark:focus:ring-0 md:me-0" id="user-profile" aria-expanded="false" data-fc-autoclose="both" data-fc-type="dropdown">
                    <img class="h-8 w-8 rounded-full" src="{{ asset('assets/images/users/avatar-10.png')}} " alt="user photo" />
                    <span class="ltr:ms-2 rtl:ms-0 rtl:me-2 hidden text-left xl:block">
                        <span class="block font-medium text-slate-600 dark:text-gray-300">{{Auth::user()->name}}</span>
                        <span class="-mt-0.5 block text-xs text-slate-500 dark:text-gray-400">Admin</span>
                    </span>
                </button>

                <div class="left-auto right-0 z-50 my-1 hidden list-none
                    divide-y divide-gray-100 rounded border-slate-700 md:border-white
                    text-base shadow dark:divide-gray-600 bg-white dark:bg-slate-800 w-40" id="navUserdata">
                    <ul class="py-1" aria-labelledby="navUserdata">
                        <li>
                            <a href="#" wire:click.logout="logout" class="flex items-center py-2 px-3 text-sm text-red-400 hover:bg-gray-50 hover:text-red-500
                          dark:text-red-400 dark:hover:bg-gray-900/20
                          dark:hover:text-red-500">
                                <span data-feather="power" class="w-4 h-4 inline-block text-red-400 dark:text-red-400 me-2"></span>
                                {{$this->translate('signout')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>