<!-- Navbar -->

<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="text-sm leading-normal">
                    <a class="text-white opacity-50" href="javascript:;">Page</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Servicer</li>
            </ol>
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
                <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
                    <button class="px-4 py-2 w-full rounded bg-white border border-green-400 text-green-400" data-dropdown-toggle="profile-dropdown-delay" data-dropdown-delay="500" data-dropdown-trigger="hover" id="profile-dropdown">
                        <div class="flex items-center space-x-2">
                            <div class="flex-shrink-0">
                                @if (\Auth::guard('servicer')->user()->profile_image == 'noimage' || \Auth::guard('servicer')->user()->profile_image == null)
                                    <img class="w-5 h-5 rounded-full" src="{{ asset('assets/img/blank-profile.webp') }}" alt="Neil image">
                                @else
                                    <img class="w-5 h-5 rounded-full" src="{{ asset('assets/img/servicer/profile-img/' . \Auth::guard('servicer')->user()->profile_image) }}" alt="Neil image">
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ \Auth::guard('servicer')->user()->username }}
                                </p>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                <li class="flex items-center">
                    <a href="./pages/sign-in.html" class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                        <button class="px-4 py-2 w-full rounded bg-white border border-green-400 text-green-400" data-dropdown-toggle="profile-dropdown-delay" data-dropdown-delay="500" data-dropdown-trigger="hover" id="profile-dropdown">
                            <div class="flex items-center space-x-2">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        Balance : Rp. {{ number_format(\Auth::guard('servicer')->user()->balance) }}
                                    </p>
                                </div>
                            </div>
                        </button>
                    </a>
                </li>
                <li class="flex items-center ml-3">
                    <a target="_blank" href="/chat" class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                        <button class="px-4 py-2 w-full rounded bg-white border border-green-400 text-green-400" data-dropdown-toggle="profile-dropdown-delay" data-dropdown-delay="500" data-dropdown-trigger="hover" id="profile-dropdown">
                            <div class="flex items-center space-x-2">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-green-500 truncate dark:text-white">
                                        <i class="fas fa-comments"></i> &nbsp; Messangger
                                    </p>
                                </div>
                            </div>
                        </button>
                    </a>
                </li>
                <li class="flex items-center pl-4 xl:hidden">
                    <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
                        <div class="w-4.5 overflow-hidden">
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                            <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                            <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- end Navbar -->
