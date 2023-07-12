@extends('client.layout.master')
@section('content')
    <main class=relative>
        {{-- search --}}
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
        {{-- service information --}}
        <div class="xl:px-44">
            <div class=" container mx-auto xl:p-5 mt-5 background bg-white shadow-2xl rounded mb-5">
                <div class="px-10">
                    <div class="grid xl:grid-cols-2 grid-cols-1">
                        <div>
                            <div class="flex justify-center">
                                @if ($data->thumbnail_image == 'noimage')
                                    <img src="{{ asset('assets/img/services/noimage.png') }}" alt="">
                                @else
                                    <img src="{{ asset('assets/img/services/' . $data->thumbnail_image) }}" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="">
                            <div class="h-fit">
                                <p class="text-2xl xl:mt-0 xl:text-left mt-4 text-gray-500 font-bold">{{ $data->svc_name }}</p>
                                <hr class="mt-2">
                            </div>

                            <div class="grid grid-cols-3 mt-2">
                                <div class="xl:border flex justify-center xl:mr-0 mr-4">
                                    <div class="flex items-center mt-1 mb-1">
                                        <svg aria-hidden="true" class="w-5 h-5 {{ $data->rate_point >= 1 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}  " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>First star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 {{ $data->rate_point >= 2 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Second star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 {{ $data->rate_point >= 3 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Third star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 {{ $data->rate_point >= 4 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Fourth star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 {{ $data->rate_point >= 5 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Fifth star</title>
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <p class="ml-2 text-sm font-medium text-gray-900 dark:text-white">{{ number_format($data->rate_point, 2) }}</p>
                                    </div>
                                </div>
                                <div class="xl:border">
                                    <p class="text-center"><a class="text-green-500 font-bold xl:text-xl xl:mr-2 mr-1"><u>{{ $data->total_reviewers }}</u></a>Rated</p>
                                </div>
                                <div class="xl:border">
                                    <p class="text-center"><a class="text-green-500 font-bold xl:text-xl xl:mr-2 mr-1"><u>{{ $data->total_transaction }}</u></a>Been Done</p>
                                </div>
                            </div>
                            @php
                                $prices = [$data->hourly_price, $data->daily_price, $data->weekly_price, $data->monthly_price];
                                $lowest = min($prices);
                                $bigghest = max($prices);
                            @endphp
                            <p class="mt-4 mb-4 font-semibold text-green-500 text-3xl" id="result">Rp{{ number_format($lowest, 2) }} - Rp{{ number_format($bigghest, 2) }}</p>
                            <p class="font-semibold text-gray-500 mb-2 mt-5">Servicer :</p>
                            <p class=" text-gray-500 mb-1">{{ $data->servicer_name }}</p>
                            <p class="font-semibold text-gray-500 mb-2 mt-2">Servicer Pricing</p>
                            <div class="grid grid-cols-2">
                                <div class="grid grid-rows-4">
                                    <p class="text-gray-500">Hourly</p>
                                    <p class="text-gray-500">Daily</p>
                                    <p class="text-gray-500">Weekly</p>
                                    <p class="text-gray-500">Monthly</p>
                                </div>
                                <div class="grid grid-rows-4">
                                    <p class="text-gray-500 text-right font-bold">Rp. {{ number_format($data->hourly_price, 2) }}</p>
                                    <p class="text-gray-500 text-right font-bold">Rp. {{ number_format($data->daily_price, 2) }}</p>
                                    <p class="text-gray-500 text-right font-bold">Rp. {{ number_format($data->weekly_price, 2) }}</p>
                                    <p class="text-gray-500 text-right font-bold">Rp. {{ number_format($data->monthly_price, 2) }}</p>
                                </div>
                            </div>
                            <h3 class="mb-2 mt-4 font-semibold text-gray-500 dark:text-white">Select Service Period</h3>
                            <form action="{{ route('client.transaction.post') }}" method="POST">
                                @csrf
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input required id="horizontal-list-radio-license" type="radio" value="Daily" name="period_type" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Daily</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-id" type="radio" value="Hourly" name="period_type" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hourly</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-millitary" type="radio" value="Weekly" name="period_type" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-millitary" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Weekly</label>
                                        </div>
                                    </li>
                                    <li class="w-full dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-passport" type="radio" value="Monthly" name="period_type" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-passport" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Monthly</label>
                                        </div>
                                    </li>
                                </ul>
                                <div class="relative z-0 mt-3 mb-6 group p-2">
                                    <input hidden value="1" type="hidden" name="period_qty" id="period_qty" class="block py-2.5 px-0  text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-green-500 peer" placeholder=" " required />
                                    <label for="period_qty" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-green-500 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">Period Quantity</label>
                                    <input id="result2" type="number" name="total_price" id="total_price" hidden class="hidden">
                                    <input type="text" name="servicer_name" value="{{ $data->servicer_name }}" hidden>
                                    <input type="text" name="svc_category_name" value="{{ $data->svc_category_name }}" hidden>
                                    <input id="result3" name="period_price" type="number" hidden id="period_price">
                                    <input hidden type="text" name="id_svc" value="{{ $data->id_svc }}">
                                </div>
                                <script>
                                    // Mendapatkan elemen-elemen yang diperlukan
                                    const radioButtons = document.querySelectorAll('input[name="period_type"]');
                                    const multiplierInput = document.getElementById('period_qty');
                                    const resultElement = document.getElementById('result');
                                    const result2Element = document.getElementById('result2');
                                    const result3Element = document.getElementById('result3');

                                    // Menambahkan event listener untuk perubahan pada radio button
                                    radioButtons.forEach(radioButton => {
                                        radioButton.addEventListener('change', updateResult);
                                    });

                                    // Menambahkan event listener untuk perubahan pada input numerik
                                    multiplierInput.addEventListener('input', updateResult);

                                    // Fungsi untuk memperbarui hasil perkalian
                                    function updateResult() {
                                        // Mendapatkan nilai dari radio button yang dipilih
                                        const selectedRadioButton = document.querySelector('input[name="period_type"]:checked');
                                        const frequencyValue = selectedRadioButton ? selectedRadioButton.value : '';

                                        // Mendapatkan nilai dari input numerik
                                        const multiplierValue = multiplierInput.value;

                                        // Melakukan perkalian berdasarkan frekuensi dan nilai multiplier
                                        let result = 0;
                                        let res = 0;
                                        if (frequencyValue === 'Daily') {
                                            result = JSON.parse("{{ json_encode($data->daily_price) }}") * multiplierValue;
                                            res = JSON.parse("{{ json_encode($data->daily_price) }}");
                                        } else if (frequencyValue === 'Hourly') {
                                            result = JSON.parse("{{ json_encode($data->hourly_price) }}") * multiplierValue;
                                            res = JSON.parse("{{ json_encode($data->hourly_price) }}");
                                        } else if (frequencyValue === 'Weekly') {
                                            result = JSON.parse("{{ json_encode($data->weekly_price) }}") * multiplierValue;
                                            res = JSON.parse("{{ json_encode($data->weekly_price) }}");
                                        } else if (frequencyValue === 'Monthly') {
                                            result = JSON.parse("{{ json_encode($data->monthly_price) }}") * multiplierValue;
                                            res = JSON.parse("{{ json_encode($data->monthly_price) }}");
                                        }

                                        // Memperbarui teks pada elemen <p>
                                        const formattedResult = result.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        document.getElementById('result2').value = result;

                                        document.getElementById('result3').value = res;

                                        resultElement.textContent = `Rp ${formattedResult}`;
                                    }
                                </script>
                                <div class="grid grid-rows-1 mb-10">
                                    <div class="grid grid-cols-2">
                                        <div class="flex xl:justify-start">
                                            <a href="{{ '/chat/' . $id }}" target="_blank" class="mr-4 background item-end bg-white border-2 border-green-500 xl:px-4 xl:py-2 xl:text-2xl text-xl px-2 text-green-400 font-bold rounded"><i class="fas fa-comments"></i> Chat</a>
                                            <button type="submit" class="background item-end bg-green-500  text-white xl:px-4 xl:py-2 xl:text-2xl text-xl px-2 font-bold rounded">Contract</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        {{-- About --}}
        <div class="background bg-green-500 p-5">
            <div class="xl:px-44 py-5">
                <p class="text-white text-bold text-xl mb-5">Service Description</p>
                <p class="text-white text-bold">{{ $data->description }}</p>
            </div>
        </div>
        {{-- Reviews --}}
        <div class="mt-4 xl:px-44 p-5">
            <p class="font-bold text-xl"> Reviews</p>
            <div class="flex">
                <div class="mr-5">
                    <p class="text-6xl">{{ number_format($total_rating, 2) }}</p>
                    <p class="text-center text-gray-600 mt-4 text-sm">{{ $data->total_reviewers }} <br> Reviewers</p>
                </div>
                @php
                    if ($five == 0) {
                        $persentase5 = 0;
                    } else {
                        $persentase5 = ($five / $data->total_reviewers) * 100;
                    }
                    
                    if ($four == 0) {
                        $persentase4 = 0;
                    } else {
                        $persentase4 = ($four / $data->total_reviewers) * 100;
                    }
                    
                    if ($three == 0) {
                        $persentase3 = 0;
                    } else {
                        $persentase3 = ($three / $data->total_reviewers) * 100;
                    }
                    
                    if ($two == 0) {
                        $persentase2 = 0;
                    } else {
                        $persentase2 = ($two / $data->total_reviewers) * 100;
                    }
                    
                    if ($one == 0) {
                        $persentase1 = 0;
                    } else {
                        $persentase1 = ($one / $data->total_reviewers) * 100;
                    }
                    
                @endphp
                <div class="w-full">
                    <div class="flex items-center mt-1">
                        <a href="#" class="text-sm font-medium text-green-500 dark:text-blue-500 hover:underline">5 star</a>
                        <div class="xl:w-1/6 w-2/4 h-2 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                            <div class="h-2 bg-yellow-300 rounded" style="width: {{ $persentase5 }}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ number_format($persentase5, 1) }}%</span>
                    </div>
                    <div class="flex items-center mt-1">
                        <a href="#" class="text-sm font-medium text-green-500 dark:text-blue-500 hover:underline">4 star</a>
                        <div class="xl:w-1/6 w-2/4 h-2 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                            <div class="h-2 bg-yellow-300 rounded" style="width: {{ $persentase4 }}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ number_format($persentase4, 1) }}%</span>
                    </div>
                    <div class="flex items-center mt-1">
                        <a href="#" class="text-sm font-medium text-green-500 dark:text-blue-500 hover:underline">3 star</a>
                        <div class="xl:w-1/6 w-2/4 h-2 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                            <div class="h-2 bg-yellow-300 rounded" style="width: {{ $persentase3 }}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ number_format($persentase3, 1) }}%</span>
                    </div>
                    <div class="flex items-center mt-1">
                        <a href="#" class="text-sm font-medium text-green-500 dark:text-blue-500 hover:underline">2 star</a>
                        <div class="xl:w-1/6 w-2/4 5-2 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                            <div class="h-2 bg-yellow-300 rounded" style="width: {{ $persentase2 }}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ number_format($persentase2, 1) }}%</span>
                    </div>
                    <div class="flex items-center mt-1">
                        <a href="#" class="text-sm font-medium text-green-500 dark:text-blue-500 hover:underline">1 star</a>
                        <div class="xl:w-1/6 w-2/4 h-2 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                            <div class="h-2 bg-yellow-300 rounded" style="width: {{ $persentase1 }}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ number_format($persentase1, 1) }}%</span>
                    </div>
                </div>

            </div>
        </div>

        {{-- Feedbacks --}}

        <div class="flex flex-wrap mt-6 -mx-3 xl:px-44 p-5">
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
                                            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $row->svc_category_name }}</div>
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
    </main>
@endsection
