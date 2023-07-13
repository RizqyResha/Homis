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
                                                        <Button data-modal-target="staticModal-{{ $row->id_transaction }}" data-modal-toggle="staticModal-{{ $row->id_transaction }}" type="button" class="mt-2 background bg-blue-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-eye"></i></Button>
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
                                                        @elseif($row->status == 'Finished')
                                                            <Button data-modal-target="feedbackModal-{{ $row->id_transaction }}" data-modal-toggle="feedbackModal-{{ $row->id_transaction }}" type="button" class="mt-2 background bg-yellow-300 rounded text-white font-semibold p-2 w-full"><i class="fas fa-star"></i></Button>
                                                            <Button disabled class="background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-times-circle"></i></Button>
                                                        @else
                                                            <Button disabled class="mt-2 background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-check-square"></i></Button>
                                                            <Button disabled class="background bg-gray-500 rounded text-white font-semibold p-2 w-full"><i class="fas fa-times-circle"></i></Button>
                                                        @endif
                                                        <a target="_blank" href="/chat/{{ $row->userid }}"><Button class="background bg-yellow-400 rounded text-white font-semibold p-2 w-full"><i class="fas fa-comment-dots"></i></Button></a>
                                                    </div>

                                                    <!-- Main modal -->
                                                    <div id="staticModal-{{ $row->id_transaction }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                        <div class="relative w-full max-w-2xl max-h-full">
                                                            <!-- Modal content -->
                                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                <!-- Modal header -->
                                                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                        Client Information
                                                                    </h3>
                                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal-{{ $row->id_transaction }}">
                                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                        </svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                <div class="background bg-white box shadow-xl p-5">
                                                                    <form action="{{ route('client.transaction.pay') }}" method="POST">
                                                                        @csrf
                                                                        <div class="grid xl:grid-rows-3 xl:col-span-2 mt-2">

                                                                            {{-- hidden input --}}
                                                                            <div class="relative z-0 w-full mb-6 group p-2">
                                                                                <input readonly type="text" value="{{ $row->first_name }}" name="first_name" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                                                                <label for="first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">First Name</label>
                                                                            </div>
                                                                            <div class="relative z-0 w-full mb-6 group p-2">
                                                                                <input readonly type="text" value="{{ $row->last_name }} " name="last_name" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                                                                <label for="last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">Last Name</label>
                                                                            </div>
                                                                            <div class="relative col-span-2 z-0 w-full mb-6 group p-2">
                                                                                <input readonly type="text" value="{{ $row->address }} " name="address" id="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                                                                <label for="address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address</label>
                                                                            </div>

                                                                            <div class="relative z-0 w-full mb-6 group p-2">
                                                                                <input readonly type="text" value="{{ $row->phone_number }} " name="phone_number" id="phone_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                                                                <label for="phone_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone Number</label>
                                                                            </div>
                                                                            <div class="relative z-0 w-full mb-6 group p-2">
                                                                                <input type="email" value="{{ $row->email }} " name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                                                                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                    <button data-modal-hide="staticModal-{{ $row->id_transaction }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Feedback Modal --}}
                                                    <div id="feedbackModal-{{ $row->id_transaction }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                        <div class="relative w-full max-w-2xl max-h-full">
                                                            <!-- Modal content -->
                                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                <!-- Modal header -->
                                                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                        Client Information
                                                                    </h3>
                                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="feedbackModal-{{ $row->id_transaction }}">
                                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                        </svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                <div class="background bg-white box shadow-xl p-5">
                                                                    <form action="{{ route('client.transaction.pay') }}" method="POST">
                                                                        @csrf
                                                                        <div class="grid xl:grid-rows-3 xl:col-span-2 mt-2">
                                                                            <div class="rating rating-lg">
                                                                                <input type="radio" name="rating-8" class="mask mask-star-2 bg-orange-400" />
                                                                                <input type="radio" name="rating-8" class="mask mask-star-2 bg-orange-400" checked />
                                                                                <input type="radio" name="rating-8" class="mask mask-star-2 bg-orange-400" />
                                                                                <input type="radio" name="rating-8" class="mask mask-star-2 bg-orange-400" />
                                                                                <input type="radio" name="rating-8" class="mask mask-star-2 bg-orange-400" />
                                                                            </div>
                                                                            <div class="relative z-0 w-full group p-2">
                                                                                <input type="email" value="{{ $row->email }} " name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                                                                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Comments</label>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                    <button data-modal-hide="feedbackModal-{{ $row->id_transaction }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                                                    <button data-modal-hide="feedbackModal-{{ $row->id_transaction }}" type="button" class="text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
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
