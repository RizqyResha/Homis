@extends('servicer.layout.master')
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
                                        @if (Route::is('servicer.transaction'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('servicer.transaction') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif
                                        All Transaction
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        @if (Route::is('servicer.transaction.pending'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('servicer.transaction.pending') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Pending
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        @if (Route::is('servicer.transaction.accepted'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('servicer.transaction.accepted') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Accepted
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        @if (Route::is('servicer.transaction.paid'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('servicer.transaction.paid') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Paid
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        @if (Route::is('servicer.transaction.process'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('servicer.transaction.process') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Process
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        @if (Route::is('servicer.transaction.finished'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('servicer.transaction.finished') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Finished
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        @if (Route::is('servicer.transaction.rejected'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('servicer.transaction.rejected') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Rejected
                                        </a>
                                    </li>
                                    <li class="mr-2">
                                        @if (Route::is('servicer.transaction.canceled'))
                                            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                                            @else
                                                <a href="{{ route('servicer.transaction.canceled') }}" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                        @endif Canceled
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="transactions">
                                <div class="pagination mt-4">{!! $data->links('components.pagination') !!}</div>
                                {{-- @php $collection = $data @endphp --}}
                                @if (!$data->isEmpty())
                                    @foreach ($data as $row)
                                        <div class=" mt-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-5">
                                            <div class="grid xl:grid-cols-6 grid-cols-2">
                                                <div class="">
                                                    <p class="font-semibold text-gray-500 xl:text-lg">Client Name</p>
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
                                                            <Button onclick="Acceptfirmation('{{ route('servicer.transaction.update.accepted', $row->id_transaction) }}')" class="mt-2 background bg-green-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-check-square"></i></Button>
                                                            <Button onclick="Rejectfirmation('{{ route('servicer.transaction.update.rejected', $row->id_transaction) }}')" class="background bg-red-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-times-circle"></i></Button>
                                                        @elseif($row->status == 'Unpaid')
                                                            <Button disabled class="mt-2 background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-check-square"></i></Button>
                                                            <Button disabled class="background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-times-circle"></i></Button>
                                                        @elseif ($row->status == 'Paid')
                                                            <Button disabled class="mt-2 background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-check-square"></i></Button>
                                                            <Button disabled class="background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-times-circle"></i></Button>
                                                        @elseif($row->status == 'Process')
                                                            <Button onclick="Finishfirmation('{{ route('servicer.transaction.update.finished', $row->id_transaction) }}')" class="mt-2 background bg-green-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-clipboard-check"></i></Button>
                                                            <Button disabled class="background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-times-circle"></i></Button>
                                                        @else
                                                            <Button disabled class="mt-2 background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-check-square"></i></Button>
                                                            <Button disabled class="background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-times-circle"></i></Button>
                                                        @endif
                                                        <a target="_blank" href="/chat/{{ $row->userid }}"><Button class="background bg-yellow-400 rounded text-white font-semibold p-2 w-full"><i class="fas fa-comment-dots"></i></Button></a>
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
        // Accept
        function Acceptfirmation(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will change the Unpaid status to Accepted(Unpaid), which means you are waiting for the Client to pay",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'i Accept it !',
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

        // Reject
        function Rejectfirmation(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will change the Unpaid status to Reject, which means you are Rejecting The Client Request",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'i Accept it !',
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
                text: "You will change the paid status to process, which means you are processing your services",
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

        // Finish

        function Finishfirmation(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will change the paid status to Finished, which means you Already Finish your work",
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
