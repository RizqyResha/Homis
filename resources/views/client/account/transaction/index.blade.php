@extends('client.account.layout.master')
@section('content')
    <div class="-mx-3">
        <div class="flex-none px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="py-6 px-3 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent grid grid-cols-2">
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
                                        @if (Route::is('client.transaction'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('client.transaction') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif
                                        All Transaction
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        @if (Route::is('client.transaction.pending'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('client.transaction.pending') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Pending
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        @if (Route::is('client.transaction.accepted'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('client.transaction.accepted') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Accepted
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        @if (Route::is('client.transaction.paid'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('client.transaction.paid') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Paid
                                        </a>
                                    </li>

                                    <li class="mr-2">
                                        @if (Route::is('client.transaction.process'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('client.transaction.process') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Process
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        @if (Route::is('client.transaction.finished'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('client.transaction.finished') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Finished
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        @if (Route::is('client.transaction.rejected'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('client.transaction.rejected') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Rejected
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        @if (Route::is('client.transaction.canceled'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('client.transaction.canceled') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Canceled
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="transactions">
                                <div class="pagination mt-4">{!! $data->links('components.pagination') !!}</div>
                                @php $collection = $data @endphp
                                @if (!$data->isEmpty())
                                    @foreach ($data as $row)
                                        <div class=" mt-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-5">
                                            <div class="grid xl:grid-cols-6 grid-cols-2">
                                                <div class="">
                                                    <p class="font-semibold text-gray-500 xl:text-lg">Servicer Name</p>
                                                    <p class="mt-2">{{ $row->first_name }} {{ $row->last_name }}</p>
                                                </div>
                                                <div class="">
                                                    <p class="font-semibold text-gray-500 xl:text-lg">Service</p>
                                                    <p class="mt-2">{{ $row->svc_category_name }}</p>
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-gray-500 xl:text-lg">Contract Period</p>
                                                    <p class="mt-2">{{ $row->period_type }}</p>
                                                </div>
                                                <div class="">
                                                    <p class="font-semibold text-gray-500 xl:text-lg">Transaction Date</p>
                                                    <p class="mt-2">{{ $row->transaction_date }}</p>
                                                </div>

                                                <div class="">
                                                    <p class="font-semibold text-gray-500 xl:text-lg">Status</p>
                                                    @if ($row->status == 'Pending')
                                                        <p class="mt-2 text-red-400">{{ $row->status }}</p>
                                                    @elseif($row->status == 'Accepted(Unpaid)')
                                                        <p class="mt-2 text-yellow-400">{{ $row->status }}</p>
                                                    @elseif($row->status == 'Paid')
                                                        <p class="mt-2 text-green-400">{{ $row->status }}</p>
                                                    @elseif($row->status == 'Process')
                                                        <p class="mt-2 text-blue-400">{{ $row->status }}</p>
                                                    @elseif($row->status == 'Finished')
                                                        <p class="mt-2 text-green-500">{{ $row->status }}</p>
                                                    @elseif($row->status == 'Rejected')
                                                        <p class="mt-2 text-gray-400">{{ $row->status }}</p>
                                                    @elseif($row->status == 'Canceled')
                                                        <p class="mt-2 text-gray-400">{{ $row->status }}</p>
                                                    @endif
                                                </div>
                                                <div class="">
                                                    <p class="font-semibold text-gray-500 text-lg text-center">Action</p>
                                                    <div class="grid grid-cols-2 gap-1 xl:px-14 px-5 ">
                                                        <Button class="mt-2 background bg-blue-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-eye"></i></Button>
                                                        @if ($row->status == 'Pending')
                                                            <Button disabled class="mt-2 background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-money-bill-wave"></i></Button>
                                                            <Button onclick="Cancelfirmation('{{ route('client.transaction.update.cancel', $row->id_transaction) }}')" class="background bg-red-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-times-circle"></i></Button>
                                                        @elseif($row->status == 'Accepted(Unpaid)')
                                                            <a href="{{ route('client.transaction.pay.fromlist', $row->id_transaction) }}" type="submit" class="mt-2 background bg-green-500 rounded text-white font-semibold  w-full text-center p-2"><i class="fas fa-money-bill-wave"></i></a>
                                                            <Button onclick="Cancelfirmation('{{ route('client.transaction.update.cancel', $row->id_transaction) }}')" class="background bg-red-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-times-circle"></i></Button>
                                                        @elseif ($row->status == 'Paid')
                                                            <Button onclick="Proccessfirmation('{{ route('client.transaction.update.process', $row->id_transaction) }}')" class="mt-2 background bg-green-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-clipboard-list"></i></Button>
                                                            <Button disabled class="background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-times-circle"></i></Button>
                                                        @elseif($row->status == 'Process')
                                                            <Button onclick="Finishfirmation('{{ route('client.transaction.update.finished', $row->id_transaction) }}')" class="mt-2 background bg-green-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-clipboard-check"></i></Button>
                                                            <Button disabled class="background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-times-circle"></i></Button>
                                                        @else
                                                            <Button disabled class="mt-2 background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-check-square"></i></Button>
                                                            <Button disabled class="background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-times-circle"></i></Button>
                                                        @endif
                                                        <Button class="background bg-yellow-400 rounded text-white font-semibold p-2 w-full"><i class="fas fa-comment-dots"></i></Button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-center mt-5 text-2xl text-gray-400">
                                        No Data
                                    </p>
                                @endif
                                <div class="pagination mt-2">{!! $data->links('components.pagination') !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script>
        function ajaxPaging() {
            $('.pagination a').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $('#transactions').load(url + ' div#transactions', null, ajaxPaging); // re-run on complete
            });
        }
        ajaxPaging();
    </script>


    <script>
        // Cancel
        function Cancelfirmation(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will change the status to Cancel, which means you are Canceling the Contract",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'i Cancel it !',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: '{!! csrf_token() !!}',
                        },
                        success: function(response) {
                            if (response.success) {
                                // Update the div content
                                $('#transactions').load(location.href + ' #transactions');
                                // Show success message
                                Swal.fire({
                                    title: 'Success',
                                    text: response.message,
                                    icon: 'success'
                                });
                            } else {
                                // Show error message
                                Swal.fire({
                                    title: 'Error',
                                    text: response.message,
                                    icon: 'error'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            // Show error message
                            Swal.fire({
                                title: 'Error',
                                text: 'An error occurred while processing the request.',
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        }

        // process
        function Proccessfirmation(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will change the paid status to process, which means servicer start to work",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sure, Change!',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: '{!! csrf_token() !!}',
                        },
                        success: function(response) {
                            if (response.success) {
                                // Update the div content
                                $('#transactions').load(location.href + ' #transactions');
                                // Show success message
                                Swal.fire({
                                    title: 'Success',
                                    text: response.message,
                                    icon: 'success'
                                });
                            } else {
                                // Show error message
                                Swal.fire({
                                    title: 'Error',
                                    text: response.message,
                                    icon: 'error'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            // Show error message
                            Swal.fire({
                                title: 'Error',
                                text: 'An error occurred while processing the request.',
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        }

        function Finishfirmation(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will change the Process status to Finished, which means the servicer already finished work",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sure!',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: '{!! csrf_token() !!}',
                        },
                        success: function(response) {
                            if (response.success) {
                                // Update the div content
                                $('#transactions').load(location.href + ' #transactions');
                                // Show success message
                                Swal.fire({
                                    title: 'Success',
                                    text: response.message,
                                    icon: 'success'
                                });
                            } else if (response.info) {
                                // Update the div content
                                $('#transactions').load(location.href + ' #transactions');
                                // Show success message
                                Swal.fire({
                                    title: 'Info',
                                    text: response.message,
                                    icon: 'info'
                                });
                            } else {
                                // Show error message
                                Swal.fire({
                                    title: 'Error',
                                    text: response.message,
                                    icon: 'error'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            // Show error message
                            Swal.fire({
                                title: 'Error',
                                text: 'An error occurred while processing the request.',
                                icon: 'error'
                            });
                        }
                    });
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
