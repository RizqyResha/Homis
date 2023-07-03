@extends('servicer.layout.master')
@section('content')
    <div class="flex flex-wrap items-stretc -mx-3">
        <!-- card1 -->
        <div class="w-full max-w-full h-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Your Ratings</p>
                                <div class="">
                                    <div class="flex items-center mt-1 mb-1">
                                        <svg aria-hidden="true" class="w-12 h-12 {{ $ratings >= 1 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}  " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>First star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-12 h-12 {{ $ratings >= 2 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Second star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-12 h-12 {{ $ratings >= 3 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Third star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-12 h-12 {{ $ratings >= 4 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Fourth star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-12 h-12 {{ $ratings >= 5 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Fifth star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        {{-- <svg aria-hidden="true" class="w-6 h-6 {{ $row->rate_point >= 5 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <title>Fifth star</title>
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg> --}}
                                        {{-- <p class="ml-2 text-sm font-medium text-gray-900 dark:text-white">{{ number_format($row->rate_point, 2) }} out of 5</p> --}}
                                    </div>
                                    {{-- <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $row->total_reviewers }} Reviewers</p> --}}
                                </div>
                                {{-- <p class="mb-0 dark:text-white dark:opacity-60">
                                            <span class="text-sm font-bold leading-normal text-emerald-500">+55%</span>
                                            since yesterday
                                        </p> --}}
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                <i class="fas fa-star leading-none  text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card2 -->
        <div class="w-full max-w-full h-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">This Month Earnings</p>
                                <h5 class="mb-2 font-bold dark:text-white">Rp. {{ number_format($this_month_earning) }}</h5>
                                <p class="mb-0 dark:text-white dark:opacity-60">
                                    <span class="text-sm font-bold leading-normal {{ $month_earn_percentage >= 0 ? 'text-emerald-400' : 'text-red-600' }}">{{ number_format($month_earn_percentage, 1) }}%</span>
                                    <a class="text-sm">Since last Month</a>
                                </p>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                <i class="leading-none fas fa-money-bill text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card3 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">this month transact</p>
                                <h5 class="mb-2 font-bold dark:text-white">{{ $this_month_transaction }}</h5>
                                <p class="mb-0 dark:text-white dark:opacity-60">
                                    <span class="text-sm font-bold leading-normal {{ $month_transaction_percentage >= 0 ? 'text-emerald-400' : 'text-red-600' }}">{{ number_format($month_transaction_percentage, 1) }}%</span>
                                    <a class="text-sm">Since last Month</a>
                                </p>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                <i class="leading-none fas fa-money-bills text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card4 -->
        <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Total Transaction</p>
                                <h1 class="mb-5 text-3xl font-bold dark:text-white">{{ $total_transaction }}</h1>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                                <i class=""></i>
                                <i class="leading-none fas fa-money-bill-transfer text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- cards row 2 -->
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize dark:text-white">Your Earnings</h6>
                    @if ($month_earn_percentage >= 0)
                        <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                            <i class="fa fa-arrow-up text-emerald-500"></i>
                            <span class="font-semibold">{{ number_format($month_earn_percentage, 1) }}% more</span> in {{ Carbon\Carbon::now()->format('M') }}
                        </p>
                    @else
                        <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                            <i class="fa fa-arrow-down text-red-500"></i>
                            <span class="font-semibold">{{ number_format($month_earn_percentage, 1) }}% less</span> in {{ Carbon\Carbon::now()->format('M') }}
                        </p>
                    @endif
                </div>
                <div class="flex-auto p-4">
                    <div>
                        <canvas id="chart-line2" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
            <div slider class="relative w-full h-full overflow-hidden rounded-2xl">
                <!-- slide 1 -->
                <div slide class="absolute w-full h-full transition-all duration-500">
                    <img class="object-cover h-full brightness-50" src="{{ asset('assets/img/servicer/dashboard/banner-desktop-2.png') }}" alt="carousel image" />
                    <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                        <div class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                            <i class="top-0.75 text-xxs relative text-slate-700 ni ni-camera-compact"></i>
                        </div>
                        <h5 class="mb-1 text-white">Collaborating with Homis</h5>
                        <p class="dark:opacity-80">Allow us to present our range of exceptional services to the general public, acquainting them with the myriad of solutions we provide to cater to their diverse needs and requirements.</p>
                    </div>
                </div>

                <!-- slide 2 -->
                <div slide class="absolute w-full h-full transition-all duration-500">
                    <img class="object-cover h-full brightness-50" src="{{ asset('assets/img/servicer/dashboard/banner-desktop-3.png') }}" alt="carousel image" />
                    <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                        <div class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                            <i class="top-0.75 text-xxs relative text-slate-700 ni ni-bulb-61"></i>
                        </div>
                        <h5 class="mb-1 text-white">A platform for easy service Openers</h5>
                        <p class="dark:opacity-80"> With our support, you can expect improved efficiency, elevated quality, and increased customer satisfaction, as we work together to take your service to new heights.</p>
                    </div>
                </div>

                <!-- Control buttons -->
                <button btn-next class="absolute z-10 w-10 h-10 p-2 text-lg text-white border-none opacity-50 cursor-pointer hover:opacity-100 fas fa-chevron-right active:scale-110 top-6 right-4"></button>
                {{-- <button btn-prev class="absolute z-10 w-10 h-10 p-2 text-lg text-white border-none opacity-50 cursor-pointer hover:opacity-100 fas fa-chevron-left active:scale-110 top-6 right-16"></button> --}}
            </div>
        </div>
    </div>

    <!-- cards row 3 -->

    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
                <div class="p-4 pb-0 mb-0 rounded-t-4">
                    <div class="flex justify-between">
                        <h6 class="mb-2 dark:text-white">Feedbacks</h6>
                    </div>
                </div>
                <div id="feedback-container">
                    <div class="p-5" id="feedback-list">
                        @foreach ($feedback as $row)
                            <div class="feedback">
                                <div class="flex items-center mb-1">
                                    <svg aria-hidden="true" class="w-5 h-5 {{ $row->rate_point >= 1 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>First star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 {{ $row->rate_point >= 2 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Second star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 {{ $row->rate_point >= 3 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Third star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 {{ $row->rate_point >= 4 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Fourth star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg aria-hidden="true" class="w-5 h-5 {{ $row->rate_point == 5 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <title>Fifth star</title>
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    {{-- <p class="ml-2 text-sm font-medium text-gray-900 dark:text-white">{{ number_format($row->rate_point, 2)
                                            }} out of 5</p> --}}
                                </div>

                                <div class="flex items-center space-x-4 ">
                                    @if ($row->profile_image == 'noimage')
                                        <img class="w-10 h-10 rounded-full" src="{{ asset('assets/img/blank-profile.webp') }}" alt="">
                                    @else
                                        <img class="w-10 h-10 rounded-full" src="{{ asset('assets/img/client/profile-img/' . $row->profile_image) }}" alt="">
                                    @endif

                                    <div class="dark:text-white">
                                        <div class="Font Bold">{{ $row->username }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $row->svc_name }}</div>
                                    </div>
                                </div>

                                <div>
                                    <small>{{ $row->created_at }}</small>
                                </div>
                                <div class="">
                                    {{ $row->description }}
                                </div>
                                <hr>
                                <div class=""><i class="fas fa-thumbs-up mb-6 mt-2"></i> {{ $row->like_count }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="pagination">{!! $feedback->links('components.pagination') !!}</div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script>
                    function ajaxPaging() {
                        $('.pagination a').on('click', function(e) {
                            e.preventDefault();
                            var url = $(this).attr('href');
                            $('#feedback-container').load(url + ' div#feedback-container', null, ajaxPaging); // re-run on complete
                        });
                    }
                    ajaxPaging();
                </script>
            </div>
        </div>
        <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
            <div class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="p-4 pb-0 rounded-t-4">
                    <h6 class="mb-0 dark:text-white">Your Services</h6>
                </div>
                <div class="flex-auto p-4">
                    @foreach ($services as $row)
                        <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                            <li class="relative flex justify-between py-2 pr-4 border-0 rounded-b-lg rounded-xl text-inherit">
                                <div class="flex items-center">
                                    <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                                        <i class="text-white fa-solid fa-person-chalkboard relative top-0.75 text-xxs"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">{{ $row->svc_name }}</h6>
                                    </div>
                                </div>
                                <div class="flex">
                                    <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-white"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


@push('page-scripts')
    <!-- plugin for charts  -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script async>
        "use strict";
        var data = <?php echo json_encode($datachrt); ?>;
        var ctx1 = document.getElementById("chart-line2").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Des"],
                datasets: [{
                    label: "Statistics",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: data,
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
