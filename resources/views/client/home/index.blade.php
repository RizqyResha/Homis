<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('client.layout.navbar')
    <main class=relative>
        {{-- BODY  --}}

        {{-- Banner --}}
        <div class="grid xl:grid-cols-2 xl:w-full xl:h-screen w-full h-screen bg-right bg-no-repeat bg-cover" style="background-image: url({{ asset('assets/img/client/home/banner-desktop.png') }})">
            <div></div>
            <div class="grid xl:content-center xl:pr-44 xl:gap-44 p-5">
                <span class="text-center text-white text-2xl font-bold">
                    Effortless Home Management at Your Fingertips,
                    Explore and find household services with ease!
                </span>
                <form>
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-700 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-700 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Housekeeper, Gardener, Driver..." required>
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Search</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- Banner --}}

        {{-- Kategori --}}
        <div class="container mx-auto xl:pr-10 xl:pl-10 pr-5 pl-5 mt-10">
            <p class="text-3xl font-bold xl:text-start text-center text-gray-700">Popular Category</p>
            <div class="items-center grid xl:grid-cols-3 grid-cols-1 mt-10 gap-7">
                {{-- item --}}
                @foreach ($topcategory as $row)
                    <div class="flex justify-center">
                        <div class=" bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                @if ($row->svc_thumbnail != 'noimage' || $row->svc_thumbnail == null)
                                    <img class="rounded-t-lg w-full" src="{{ asset('assets/img/category/' . $row->svc_thumbnail) }}" alt="" />
                                @else
                                    <img class="rounded-t-lg w-full" src="{{ asset('assets/img/category/noimage.png') }}" alt="" />
                                @endif
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-700 dark:text-white">{{ $row->svc_name }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $row->svc_description }}</p>
                                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    Explore
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End Kategori --}}

        {{-- Banner 2 --}}
        <div class="mt-14 bg-gradient-to-r from-green-500 to-green-300 grid xl:grid-cols-3 grid-col-1">
            <div class="grid content-center xl:pt-20 xl:pl-20 xl:pb-20 p-10">
                <p class="font-bold text-white text-2xl mt-2">Simplify Your Daily Routine, Experience Convenience</p>
                <p class="text-white mt-8">When life gets busy, you don't have to face it alone. Make time for what you love and what you need, ensuring moments of leisure and fulfillment.</p>
                <span class="text-white flex items-center mt-5"><img src="{{ asset('assets/img/client/home/checkicon.png') }}" alt="" class="mr-5">Choose Household Assistant based on
                    reviews, skills and prices</span>
                <span class="text-white flex items-center mt-3"><img src="{{ asset('assets/img/client/home/checkicon.png') }}" alt="" class="mr-5">Schedule according to your desires, with the flexibility to make it happen, starting today.</span>
                <span class="text-white flex items-center mt-3"><img src="{{ asset('assets/img/client/home/checkicon.png') }}" alt="" class="mr-5">Communicate, pay, tip and leave reviews through a single platform</span>
            </div>
            <div class="grid xl:visible col-span-2 flex items-center">
                <div class="xl:pt-10 xl:pl-44 xl:pb-10 p-5">
                    <img src="{{ asset('assets/img/client/home/banner-desktop-2.png') }}" alt="">
                </div>

            </div>
        </div>
        {{-- End Banner 2 --}}

        {{-- Top Servicer --}}
        <div class="container mx-auto xl:pr-10 xl:pl-10 pr-5 pl-5 mt-10">
            <p class="text-3xl font-bold xl:text-start text-center text-gray-700">Featured Assistant</p>
            <div class="items-center grid xl:grid-cols-3 grid-cols-1 mt-10 gap-7">
                {{-- item1 --}}
                <div class="flex h-full justify-center">
                    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-5">
                        <div class="grid xl:grid-cols-3 xl:grid-cols-2">
                            <div class="justify-center justify-self-center mx-auto">
                                <img src="{{ asset('assets/img/client/home/person1.png') }}" alt="" class="mr-5">
                            </div>
                            <div class="xl:col-span-2 xl:pl-5 xl:mt-0 mt-5">
                                <p class="font-bold">Prada Nagi</p>
                                <p class="text-sm">Reliable, Skilled, Efficient, Responsible, Thorough, Professional, Sensitive to Detail, Effective, Friendly, Clean</p>
                                <div class="flex items-center mt-1 mb-1">
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>First star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Second star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Third star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Fourth star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Fifth star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <p class="ml-2 text-sm font-medium text-gray-900 dark:text-white">4.95 out of 5</p>
                                </div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">1,745 Reviewers</p>
                            </div>
                        </div>
                        <hr class="h-px my-4 bg-gray-300 border-0 dark:bg-gray-700">
                        <p class="font-bold text-gray-500 mb-2">Servicer Pricing</p>
                        <div class="grid grid-cols-2">
                            <div class="grid grid-rows-4">
                                <p class="text-gray-500">Hourly</p>
                                <p class="text-gray-500">Daily</p>
                                <p class="text-gray-500">Weekly</p>
                                <p class="text-gray-500">Monthly</p>
                            </div>
                            <div class="grid grid-rows-4">
                                <p class="text-gray-500 text-right font-bold">Rp. 50.000</p>
                                <p class="text-gray-500 text-right font-bold">Rp. 50.000</p>
                                <p class="text-gray-500 text-right font-bold">Rp. 50.000</p>
                                <p class="text-gray-500 text-right font-bold">Rp. 50.000</p>
                            </div>
                        </div>
                        <hr class="h-px my-4 bg-gray-300 border-0 dark:bg-gray-700">
                        <p class="font-bold text-gray-500 mb-2">Servicer Description</p>
                        <p class=" text-gray-500">I have supplies and resources available to help you with the moving process, including moving in, moving out, and resetting.</p>
                    </div>
                </div>
                {{-- End-item1 --}}

                {{-- item1 --}}
                <div class="flex h-full justify-center">
                    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-5">
                        <div class="grid xl:grid-cols-3 xl:grid-cols-2">
                            <div class="justify-center justify-self-center mx-auto">
                                <img src="{{ asset('assets/img/client/home/person1.png') }}" alt="" class="mr-5">
                            </div>
                            <div class="xl:col-span-2 xl:pl-5 xl:mt-0 mt-5">
                                <p class="font-bold">Prada Nagi</p>
                                <p class="text-sm">Reliable, Skilled, Efficient, Responsible, Thorough, Professional, Sensitive to Detail, Effective, Friendly, Clean</p>
                                <div class="flex items-center mt-1 mb-1">
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>First star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Second star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Third star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Fourth star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Fifth star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <p class="ml-2 text-sm font-medium text-gray-900 dark:text-white">4.95 out of 5</p>
                                </div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">1,745 Reviewers</p>
                            </div>
                        </div>
                        <hr class="h-px my-4 bg-gray-300 border-0 dark:bg-gray-700">
                        <p class="font-bold text-gray-500 mb-2">Servicer Pricing</p>
                        <div class="grid grid-cols-2">
                            <div class="grid grid-rows-4">
                                <p class="text-gray-500">Hourly</p>
                                <p class="text-gray-500">Daily</p>
                                <p class="text-gray-500">Weekly</p>
                                <p class="text-gray-500">Monthly</p>
                            </div>
                            <div class="grid grid-rows-4">
                                <p class="text-gray-500 text-right font-bold">Rp. 50.000</p>
                                <p class="text-gray-500 text-right font-bold">Rp. 50.000</p>
                                <p class="text-gray-500 text-right font-bold">Rp. 50.000</p>
                                <p class="text-gray-500 text-right font-bold">Rp. 50.000</p>
                            </div>
                        </div>
                        <hr class="h-px my-4 bg-gray-300 border-0 dark:bg-gray-700">
                        <p class="font-bold text-gray-500 mb-2">Servicer Description</p>
                        <p class=" text-gray-500">I have suppli.</p>
                    </div>
                </div>
                {{-- End-item1 --}}

                {{-- item1 --}}
                <div class="flex h-full justify-center">
                    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-5">
                        <div class="grid xl:grid-cols-3 xl:grid-cols-2">
                            <div class="justify-center justify-self-center mx-auto">
                                <img src="{{ asset('assets/img/client/home/person1.png') }}" alt="" class="mr-5">
                            </div>
                            <div class="xl:col-span-2 xl:pl-5 xl:mt-0 mt-5">
                                <p class="font-bold">Prada Nagi</p>
                                <p class="text-sm">Reliable, Skilled, Efficient, Responsible, Thorough, Professional, Sensitive to Detail, Effective, Friendly, Clean</p>
                                <div class="flex items-center mt-1 mb-1">
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>First star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Second star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Third star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Fourth star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Fifth star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    <p class="ml-2 text-sm font-medium text-gray-900 dark:text-white">4.95 out of 5</p>
                                </div>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">1,745 Reviewers</p>
                            </div>
                        </div>
                        <hr class="h-px my-4 bg-gray-300 border-0 dark:bg-gray-700">
                        <p class="font-bold text-gray-500 mb-2">Servicer Pricing</p>
                        <div class="grid grid-cols-2">
                            <div class="grid grid-rows-4">
                                <p class="text-gray-500">Hourly</p>
                                <p class="text-gray-500">Daily</p>
                                <p class="text-gray-500">Weekly</p>
                                <p class="text-gray-500">Monthly</p>
                            </div>
                            <div class="grid grid-rows-4">
                                <p class="text-gray-500 text-right font-bold">Rp. 50.000</p>
                                <p class="text-gray-500 text-right font-bold">Rp. 50.000</p>
                                <p class="text-gray-500 text-right font-bold">Rp. 50.000</p>
                                <p class="text-gray-500 text-right font-bold">Rp. 50.000</p>
                            </div>
                        </div>
                        <hr class="h-px my-4 bg-gray-300 border-0 dark:bg-gray-700">
                        <p class="font-bold text-gray-500 mb-2">Servicer Description</p>
                        <p class=" text-gray-500">I have suppli.</p>
                    </div>
                </div>
                {{-- End-item1 --}}
            </div>
        </div>
        {{-- End Top Servicer --}}

        {{-- Banner 3 --}}
        <div class="mt-14 mb-20 bg-gradient-to-r from-green-300 to-green-500 grid xl:grid-cols-3 grid-col-1">
            <div class="grid xl:visible col-span-2 flex items-center">
                <div class="xl:pt-10 xl:pl-44 xl:pb-10 p-5">
                    <img src="{{ asset('assets/img/client/home/banner-desktop-3.png') }}" alt="">
                </div>
            </div>
            <div class="grid content-center xl:pt-20 xl:pr-20 xl:pb-20 p-10">
                <p class="font-bold text-white text-2xl mt-2">The reliable team at your fingertips</p>
                <p class="text-white mt-8">Assemble a team of local Taskers who have done background checks to help in life. Whatever you need, they will take care of it.</p>
                <span class="text-white flex items-center mt-5"><img src="{{ asset('assets/img/client/home/checkicon.png') }}" alt="" class="mr-5">Compare Tasker reviews, ratings and prices</span>
                <span class="text-white flex items-center mt-3"><img src="{{ asset('assets/img/client/home/checkicon.png') }}" alt="" class="mr-5">Save your favorites to order again and again</span>
                <span class="text-white flex items-center mt-3"><img src="{{ asset('assets/img/client/home/checkicon.png') }}" alt="" class="mr-5">Select and connect with the best people for the job1</span>
            </div>
        </div>
        {{-- End Banner 3 --}}

        {{-- END BODY --}}
    </main>
    @include('client.layout.footer')
</body>

</html>
