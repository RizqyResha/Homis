@extends('servicer.layout.master')
@section('content')
    <div class="-mx-3">
        <div class="flex-none px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent grid grid-cols-2">
                    <div>
                        <h6 class="dark:text-white font-bold text-gray-600 text-2xl mb-5">Your Transactions</h6>
                    </div>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <div class="">
                            <div class="border-b border-gray-200 dark:border-gray-700">
                                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                                    <li class="mr-2">
                                        <a href="#" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                            <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                            </svg>All Transaction
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            <svg class="w-4 h-4 mr-2 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                                            </svg>Paid
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                            <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z" />
                                            </svg>Unpaid
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        <a href="#" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                            <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                                <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                            </svg>Finished
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            @foreach ($data as $row)
                                <div class=" mt-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-5">
                                    <div class="grid xl:grid-cols-6 grid-cols-2">
                                        <div class="">
                                            <p class="font-semibold text-gray-500 xl:text-lg">Client Name</p>
                                            <p class="mt-2">{{ $row->first_name }} {{ $row->last_name }}</p>
                                        </div>
                                        <div class="">
                                            <p class="font-semibold text-gray-500 xl:text-lg">Transaction Date</p>
                                            <p class="mt-2">{{ $row->transaction_date }}</p>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-500 xl:text-lg">Contract Period</p>
                                            <p class="mt-2">{{ $row->period_type }}</p>
                                        </div>
                                        <div class="">
                                            <p class="font-semibold text-gray-500 xl:text-lg">Contract Quantiy</p>
                                            <p class="mt-2">{{ $row->period_qty }}</p>
                                        </div>
                                        <div class="">
                                            <p class="font-semibold text-gray-500 xl:text-lg">Status</p>
                                            @if ($row->status == 'Unpaid')
                                                <p class="mt-2 text-red-400">{{ $row->status }}</p>
                                            @elseif($row->status == 'Paid')
                                                <p class="mt-2 text-yellow-400">{{ $row->status }}</p>
                                            @elseif($row->status == 'Process')
                                                <p class="mt-2 text-blue-400">{{ $row->status }}</p>
                                            @elseif($row->status == 'Finish')
                                                <p class="mt-2 text-Green-400">{{ $row->status }}</p>
                                            @endif
                                        </div>
                                        <div class="">
                                            <p class="font-semibold text-gray-500 text-lg text-center">Action</p>
                                            <div class="grid grid-cols-2 gap-1 xl:px-14 px-5 ">
                                                <Button class="mt-2 background bg-blue-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-eye"></i></Button>
                                                @if ($row->status == 'Paid')
                                                    <Button onclick="Proccessfirmation('{{ route('servicer.transaction.update.process', $row->id_transaction) }}')" class="mt-2 background bg-green-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-walking"></i></Button>
                                                @elseif($row->status == 'Process')
                                                    <Button class="mt-2 background bg-green-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-check-square"></i></Button>
                                                @else
                                                    <Button disabled class="mt-2 background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-check-square"></i></Button>
                                                @endif
                                                <Button class="background bg-yellow-400 rounded text-white font-semibold p-2 w-full"><i class="fas fa-comment-dots"></i></Button>
                                                <Button class="background bg-red-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-times-circle"></i></Button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script>
        function Proccessfirmation(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will change the paid status to process, which means you are processing your services",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sure, Change!',
                cancelButtonText: 'Cancel',
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
