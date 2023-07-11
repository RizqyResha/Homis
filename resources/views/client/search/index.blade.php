@extends('client.layout.master')
@section('content')
    <main class=relative>
        {{-- SEARCH BAR --}}
        <div class="grid grid-col-2">
            <div class="xl:pl-52 pl-5 pr-5 xl:pr-52">
                <form action="{{ route('client.search.process') }}" method="POST">
                    @csrf
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-700 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input name="search" type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-700 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Housekeeper, Gardener, Driver..." required>
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Search</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Categories --}}
        <div class="xl:pl-44 pl-5 pr-5 xl:pr-44 mt-5 mb-5">
            <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
                <div class="w-full relative flex items-center justify-center">
                    <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer" id="prev">
                        <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                        <div id="slider" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
                            @foreach ($category as $row)
                                <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                                    <a href="{{ route('client.search.category', ['category' => $row->svc_category_name]) }}">
                                        @if ($row->svc_thumbnail == null)
                                            <img src="{{ asset('assets/img/category/noimage.png') }}" alt="black chair and white table" class="object-cover object-center w-full" />
                                        @else
                                            <img src="{{ asset('assets/img/category/' . $row->svc_thumbnail) }}" alt="black chair and white table" class="object-cover object-center w-full" />
                                        @endif
                                    </a>
                                    <a class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6" href="{{ route('client.search.category', ['category' => $row->svc_category_name]) }}">
                                        <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">{{ $row->svc_category_name }}</h2>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button aria-label="slide forward" class="absolute z-30 right-0 mr-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" id="next">
                        <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="services-container" class="grid grid-cols-1">
            <div class="items-center grid xl:grid-cols-4 grid-cols-1 mt-10 gap-7 xl:pl-44 pl-5 pr-5 xl:pr-44 mb-5 ">
                {{-- item1 --}}
                @foreach ($data as $row)
                    <a href="{{ route('client.service.view', ['id_svc' => $row->id_svc]) }}">
                        <div class="flex h-full w-full justify-center">
                            <div class="bg-wh   ite border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-5">
                                <div class="grid xl:grid-cols-3 xl:grid-cols-2">
                                    <div class="justify-center justify-self-center mx-auto">
                                        @if ($row->thumbnail_image == 'noimage')
                                            <img src="{{ asset('assets/img/services/noimage.png') }}" width="120px" height="102px" alt="" class="mr-5">
                                        @else
                                            <img src="{{ asset('assets/img/services/' . $row->thumbnail_image) }}" width="120px" height="102px" alt="" class="mr-5">
                                        @endif
                                    </div>
                                    <div class="xl:col-span-2 xl:pl-5 xl:mt-0 mt-5">
                                        <p class="font-bold mb-1">{{ $row->svc_category_name }}</p>
                                        <p class="text-sm mb-1">{{ $row->servicer_name }}</p>
                                        <div class="flex items-center mt-1 mb-1">
                                            <svg aria-hidden="true" class="w-5 h-5 {{ $row->rate_point >= 1 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}  " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <title>First star</title>
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 {{ $row->rate_point >= 2 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <title>Second star</title>
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 {{ $row->rate_point >= 3 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <title>Third star</title>
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 {{ $row->rate_point >= 4 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <title>Fourth star</title>
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <svg aria-hidden="true" class="w-5 h-5 {{ $row->rate_point >= 5 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <title>Fifth star</title>
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            <p class="ml-2 text-sm font-medium text-gray-900 dark:text-white">{{ number_format($row->rate_point, 2) }} out of 5</p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $row->total_reviewers }} Reviewers</p>
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
                                        <p class="text-gray-500 text-right font-bold">Rp. {{ number_format($row->hourly_price, 0, ',', '.') }}</p>
                                        <p class="text-gray-500 text-right font-bold">Rp. {{ number_format($row->daily_price, 0, ',', '.') }}</p>
                                        <p class="text-gray-500 text-right font-bold">Rp. {{ number_format($row->weekly_price, 0, ',', '.') }}</p>
                                        <p class="text-gray-500 text-right font-bold">Rp. {{ number_format($row->monthly_price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <hr class="h-px my-4 bg-gray-300 border-0 dark:bg-gray-700">
                                <p class="font-bold text-gray-500 mb-2">Servicer Description</p>
                                <p class=" text-gray-500">{{ $row->description }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
                {{-- End-item1 --}}
            </div>
            <div class="flex justify-center">
                <div class="pagination">{!! $data->links('components.pagination') !!}</div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            function ajaxPaging() {
                $('.pagination a').on('click', function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    $('#services-container').load(url + ' div#services-container', null, ajaxPaging); // re-run on complete
                });
            }
            ajaxPaging();
        </script>
    </main>
@endsection

@push('page-scripts')
    <script>
        let defaultTransform = 0;

        function goNext() {
            defaultTransform = defaultTransform - 355;
            var slider = document.getElementById("slider");
            if (Math.abs(defaultTransform) >= slider.scrollWidth / 1.7) defaultTransform = 0;
            slider.style.transform = "translateX(" + defaultTransform + "px)";
        }
        next.addEventListener("click", goNext);

        function goPrev() {
            var slider = document.getElementById("slider");
            if (Math.abs(defaultTransform) === 0) defaultTransform = 0;
            else defaultTransform = defaultTransform + 355;
            slider.style.transform = "translateX(" + defaultTransform + "px)";
        }
        prev.addEventListener("click", goPrev);
    </script>
@endpush
