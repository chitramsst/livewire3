<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="mx-auto bg-grey-400">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->
            <header class="bg-nav">
                <div class="flex justify-between">
                    <div class="p-1 mx-3 inline-flex items-center">
                        <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                        <h1 class="text-white p-2" wire:click="$route('/')">Logo</h1>
                    </div>
                    <div class="p-3 flex flex-row items-center">
                        <!-- <a href="https://github.com/tailwindadmin/admin" class="text-white p-2 mr-2 no-underline hidden md:block lg:block">Github</a> -->


                        <div class="relative" x-data="{ isOpen: false}">
                            <div class="w-18 justify-between  items-center flex flex-row" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                        <img  onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                        <a href="#"  class="text-white p-2 no-underline hidden md:block lg:block">User</a>
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z" class="heroicon-ui"></path>
                                </svg>
                            <!-- <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false" class="flex items-center">
                                <img src="http://www.gravatar.com/avatar?d=mm" alt="avatar" class="w-8 h-8 rounded-full">
                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z" class="heroicon-ui"></path>
                                </svg>
                            </button> -->
</div>
                            <ul x-show="isOpen" @click.away="isOpen = false" class="absolute font-normal bg-white shadow overflow-hidden rounded w-48 border mt-2 py-1 right-0 z-20">
                                <li>
                                    <a href="#" class="flex items-center px-3 py-3 hover:bg-gray-200">
                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="text-gray-600">
                                            <path d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z" class="heroicon-ui"></path>
                                        </svg>
                                        <span class="ml-2">Account</span>
                                    </a>
                                    
                                </li>
                                <li class="border-b border-gray-400">
                                    <a href="#" class="flex items-center px-3 py-3 hover:bg-gray-200">
                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="text-gray-600">
                                            <path d="M9 4.58V4c0-1.1.9-2 2-2h2a2 2 0 0 1 2 2v.58a8 8 0 0 1 1.92 1.11l.5-.29a2 2 0 0 1 2.74.73l1 1.74a2 2 0 0 1-.73 2.73l-.5.29a8.06 8.06 0 0 1 0 2.22l.5.3a2 2 0 0 1 .73 2.72l-1 1.74a2 2 0 0 1-2.73.73l-.5-.3A8 8 0 0 1 15 19.43V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.58a8 8 0 0 1-1.92-1.11l-.5.29a2 2 0 0 1-2.74-.73l-1-1.74a2 2 0 0 1 .73-2.73l.5-.29a8.06 8.06 0 0 1 0-2.22l-.5-.3a2 2 0 0 1-.73-2.72l1-1.74a2 2 0 0 1 2.73-.73l.5.3A8 8 0 0 1 9 4.57zM7.88 7.64l-.54.51-1.77-1.02-1 1.74 1.76 1.01-.17.73a6.02 6.02 0 0 0 0 2.78l.17.73-1.76 1.01 1 1.74 1.77-1.02.54.51a6 6 0 0 0 2.4 1.4l.72.2V20h2v-2.04l.71-.2a6 6 0 0 0 2.41-1.4l.54-.51 1.77 1.02 1-1.74-1.76-1.01.17-.73a6.02 6.02 0 0 0 0-2.78l-.17-.73 1.76-1.01-1-1.74-1.77 1.02-.54-.51a6 6 0 0 0-2.4-1.4l-.72-.2V4h-2v2.04l-.71.2a6 6 0 0 0-2.41 1.4zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" class="heroicon-ui"></path>
                                        </svg>
                                        <span class="ml-2">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center px-3 py-3 hover:bg-gray-200">
                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-gray-600">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"></path>
                                        </svg><span class="ml-2">Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                            <ul class="list-reset">
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My account</a></li>
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a></li>
                                <li>
                                    <hr class="border-t mx-2 border-grey-ligght">
                                </li>
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </header>
            <!--/Header-->
            <div class="flex flex-1">
                <livewire:components.sidebar />

                <!--Main-->
                <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                    <div class="flex flex-col">
                        {{ $slot }}
                    </div>
                </main>
                <!--/Main-->
            </div>
            <!--Footer-->
            <footer class="bg-grey-darkest text-white p-2">
                <div class="flex flex-1 mx-auto">&copy; My Design</div>
            </footer>
            <!--/footer-->

        </div>

    </div>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>