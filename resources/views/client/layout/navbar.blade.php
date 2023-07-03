<header class="sticky top-0 z-50">
    <nav class="bg-white border-gray-200 dark:bg-gray-900 pr-10 pl-10">
        <div class="max-w-screen-xl mt-3 flex flex-wrap items-center justify-between mx-auto p-2">
            <a href="#" class="flex items-center">
                <img src="{{ asset('assets/img/logo.png') }}" class="mr-3 w-2/3 h-2/3" alt="Flowbite Logo" />
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#" class="mt-2 block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Search</a>
                    </li>
                    <li>
                        <a href="#" class="mt-2 block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Become Partner</a>
                    </li>
                    <li>
                        <a href="#" class="mt-2 block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About Us</a>
                    </li>
                    <li>

                    </li>
                    @if (\Auth::guard('client')->user())
                        <a>
                            <button class="px-4 py-2 w-full rounded bg-white border border-green-400 text-green-400" data-dropdown-toggle="profile-dropdown-delay" data-dropdown-delay="500" data-dropdown-trigger="hover" id="profile-dropdown">
                                <div class="flex items-center space-x-2">
                                    <div class="flex-shrink-0">
                                        @if (\Auth::guard('client')->user()->profile_image == 'noimage' || \Auth::guard('client')->user()->profile_image == null)
                                            <img class="w-5 h-5 rounded-full" src="{{ asset('assets/img/blank-profile.webp') }}" alt="Neil image">
                                        @else
                                            <img class="w-5 h-5 rounded-full" src="{{ asset('assets/img/client/profile-img/' . \Auth::guard('client')->user()->profile_image) }}" alt="Neil image">
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ \Auth::guard('client')->user()->username }}
                                        </p>
                                    </div>
                                </div>
                            </button>
                            <div id="profile-dropdown-delay" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="profile-dropdown">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Account Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Contracts</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('client.logout') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    @else
                        <a href="{{ route('client.login') }}"><button class="px-4 py-2 w-full rounded bg-white border border-green-400 text-green-400">Log in / Sign Up</button></a>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
