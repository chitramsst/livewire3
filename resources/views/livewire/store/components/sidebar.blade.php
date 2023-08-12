<div class="min-h-full z-[99]  fixed inset-y-0 print:hidden bg-white dark:bg-gray-900 main-sidebar duration-300 group-data-[sidebar=dark]:bg-dark-sidebar">
    <div class=" text-center border-b bg-white border-r h-[52px] flex justify-center items-center brand-logo dark:bg-gray-900 dark:border-slate-700/40 group-data-[sidebar=dark]:bg-dark-sidebar group-data-[sidebar=dark]:border-slate-700/40">
        <a href="{{route('store.dashboard')}}" class="logo">
            <span>
                <img src="{{ asset('assets/images/logo-sm.png')}}" alt="logo-small" class="logo-sm h-6 align-middle inline-block">
            </span>
            <span>
                <img src="{{ asset('assets/images/logo.png')}}" alt="logo-large" class="logo-lg logo-light hidden dark:inline-block ms-1 group-data-[sidebar=dark]:inline-block">
                <img src="{{ asset('assets/images/logo-dark.png')}}" alt="logo-large" class="logo-lg logo-dark inline-block dark:hidden ms-1 group-data-[sidebar=dark]:hidden">
            </span>
        </a>
    </div>
    <div class="border-r pb-14 h-[100vh] dark:bg-gray-900 dark:border-slate-700/40 group-data-[sidebar=dark]:border-slate-700/40" data-simplebar>
        <div class="p-4 block">
            <ul class="navbar-nav">
                <li class="uppercase text-[11px]  text-primary-500 dark:text-primary-400 mt-0 leading-4 mb-2 group-data-[sidebar=dark]:text-primary-400">
                    M<span>ain</span><br><span class="text-[9px] text-slate-600 dark:text-slate-500 group-data-[sidebar=dark]:text-slate-500">Unique Dashboard</span></li>
                <li>
                <div id="Dashboard">
                    <a href="{{ route('store.dashboard') }}" class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-2 py-2 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 " aria-controls="Widgets-flush">
                        <span data-feather="home" class="w-4 h-4 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400"></span>
                        <span>{{$this->translate('dashboard')}}</span>
                    </a>
                </div>
                <div id="QrCode">
                    <a href="{{ route('store.qr-code') }}" class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-2 py-2 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 " aria-controls="Widgets-flush">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
                          </svg>
                        <span>{{$this->translate('qr_code')}}</span>
                    </a>
                </div>
                <div id="Wifi">
                    <a href="{{ route('store.wifi') }}" class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-2 py-2 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 " aria-controls="Widgets-flush">
                    <span data-feather="wifi" class="w-4 h-4 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400"></span>

                        <span>{{$this->translate('wifi')}}</span>
                    </a>
                </div>
                <div id="CheckInn">
                    <a href="{{ route('store.check-inn') }}" class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-2 py-2 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 " aria-controls="Widgets-flush">
                       <span data-feather="user-plus" class="w-4 h-4 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400"></span>
                        <span>{{$this->translate('checkinn')}}</span>
                    </a>
                </div>
                <div id="Feedback">
                    <a href="{{ route('store.feedback') }}" class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-2 py-2 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 " aria-controls="Widgets-flush">
                    <span data-feather="star" class="w-4 h-4 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400"></span>
                        <span>{{$this->translate('feedback')}}</span>
                    </a>
                </div>
                <div id="Rooms">
                    <a href="{{route('store.rooms')}}" class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-2 py-2 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 " aria-controls="Widgets-flush">
                        <span data-feather="home" class="w-4 h-4 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400"></span>
                        <span>{{$this->translate('rooms')}}</span>

                    </a>
                </div>
                <div id="subscription">
                    <a href="{{ route('store.subscription') }}" class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-2 py-2 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 " aria-controls="Widgets-flush">
                        <span data-feather="layers" class="w-4 h-4 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400"></span>
                        <span>{{$this->translate('subscription')}}</span>

                    </a>
                </div>
                <div id="billing">
                    <a href="{{ route('store.billing') }}" class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-2 py-2 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 " aria-controls="Widgets-flush">
                        <span data-feather="dollar-sign" class="w-4 h-4 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400"></span>
                        <span>{{$this->translate('billing')}}</span>

                    </a>
                </div>
                <div id="pages">
                    <a href="{{ route('store.pages') }}" class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-2 py-2 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 " aria-controls="Widgets-flush">
                        <span class="fa-solid fa-file w-4 h-4 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400"></span>
                        <span>{{$this->translate('pages')}}</span>
                    </a>
                </div>
                <div id="house_keeping">
                    <a href="{{ route('store.house-keeping') }}" class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-2 py-2 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 " aria-controls="Widgets-flush">
                        <span class="fa-solid fa-broom w-4 h-4 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400"></span>
                        <span>{{$this->translate('house_keeping')}}</span>
                    </a>
                </div>
                <div id="app_settings">
                    <a href="{{ route('store.app-settings') }}" class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-2 py-2 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 " aria-controls="Widgets-flush">
                    <span class="fa-solid fa-gear w-4 h-4 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400"></span>
                        <span>{{$this->translate('app_settings')}}</span>
                    </a>
                </div>
                <div id="logout">
                    <a wire:click.logout="logout" class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-2 py-2 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 " aria-controls="Widgets-flush">
                        <span data-feather="log-out" class="w-4 h-4 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400"></span>
                        <span>{{$this->translate('logout')}}</span>
                    </a>
                </div>
            </div>
            </li>
        </ul>
    </div>
</div>