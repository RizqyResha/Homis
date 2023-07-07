@extends('servicer.layout.master')
@section('content')
    <div class="-mx-3">
        <div class="flex-none px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent grid grid-cols-2">
                    <div>
                        <h6 class="dark:text-white font-bold text-gray-600 text-2xl">Your Services</h6>
                    </div>
                    <div class="flex justify-end px-10">
                        <a href="{{ route('servicer.service.create') }}"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-10 rounded mb-6 openModal" id="">ADD</button></a>
                    </div>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        @foreach ($service as $row)
                            <div class="">
                                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-5">
                                    <div class="grid xl:grid-cols-3 xl:grid-cols-3">
                                        <div class="justify-center justify-self-center mx-auto">
                                            @if ($row->thumbnail_image == 'noimage')
                                                <img src="{{ asset('assets/img/services/noimage.png') }}" width="240px" height="204px" alt="" class="mr-5">
                                            @else
                                                <img src="{{ asset('assets/img/services/' . $row->thumbnail_image) }}" width="240px" height="204px" alt="" class="mr-5">
                                            @endif
                                        </div>
                                        <div class="xl:pl-5 xl:mt-0 mt-5">
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
                                        <div class="flex justify-end gap-2 items-center px-10 mt-5 mb-5">
                                            <div>
                                                <a href="{{ route('servicer.service.update', $row->id_svc) }}"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 rounded"><i class="fas fa-edit"></i></button></a>
                                            </div>
                                            <div>
                                                <button onclick="deleteConfirmation('{{ route('servicer.service.delete', $row->id_svc) }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-10 rounded"><i class="fas fa-trash"></i></button>
                                            </div>
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page-scripts')
    <script>
        function deleteConfirmation(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You're cant redo this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sure, Delete!',
                cancelButtonText: 'Cancle'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = url;
                }
            });
        }
    </script>
@endpush
@push('page-scripts')
    @if (Session::has('Success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: '{{ Session::get('Success') }}',
                icon: 'success',
                confirmButtonText: 'Ok',
                confirmButtonColor: '#00D381'
            });
        </script>
    @endif
@endpush
