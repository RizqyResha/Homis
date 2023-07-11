@extends('servicer.layout.master')
@section('content')
    <div class="-mx-3">
        <div class="flex-none px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent grid grid-cols-2">
                    <div>
                        <h6 class="dark:text-white font-bold text-gray-600 text-2xl mb-5">Billing</h6>
                    </div>
                </div>
                <form action="{{ route('servicer.billing.withdraw') }}" method="POST" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="grid xl:grid-cols-2 xl:mt-5 p-5 gap-4">
                        <div class="xl:p-5 p-1">
                            <p class="background border border-yellow-300 bg-yellow-100 py-5 px-5 rounded rounded-lg text-yellow-400"><a class="font-bold">Warning !</a>, Pay attention to the recipient's name, withdrawal number and withdrawal amount!</p>
                            <div class="mt-4 mx-4">
                                <ul class="list-disc">
                                    <li>Minimum withdrawal IDR 10,000</li>
                                    <li>Withdrawal Fee 3% calculated from the Withdrawal Amount</li>
                                    <li>The withdrawal process above 12:00 PM WIB is calculated as the next day's withdrawal</li>
                                    <li>The withdrawal process will take 5 minutes to 2 working hours depending on the withdrawal method</li>
                                </ul>
                            </div>
                        </div>
                        <div class="grid xl:grid-rows-1">
                            <label for="withdrawal_method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Withdrawal Method</label>
                            <select name="withdrawal_method" id="withdrawal_method" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose Withdrawal Method</option>
                                @foreach ($withdrawal_m as $wim)
                                    <option value="{{ $wim->id_withdrawal_method }}">{{ $wim->name }}</option>
                                @endforeach
                            </select>
                            <div class="relative z-0 w-full mb-5 mt-4 group p-2">
                                <input type="text" name="withdrawal_number" id="withdrawal_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                @error('withdrawal_number')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                                <label for="withdrawal_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">Account Number</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group p-2">
                                <input type="text" name="beneficiary_name" id="beneficiary_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                @error('beneficiary_name')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                                <label for="beneficiary_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">Beneficiary Name</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group p-2">
                                <input min="0" type="number" name="withdrawal_amount" oninput="updateValue(this.value)" id="withdrawal_amount" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                @error('withdrawal_amount')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                                <label for="withdrawal_amount" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">Withdrawal Amount (IDR)</label>
                            </div>

                            <div class="mb-5">
                                <label for="withdrawal_fees" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Withdrawal Fee (3%)</label>
                                <input readonly name="withdrawal_fees" type="text" id="withdrawal_fees" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>

                            <div class="mb-5">
                                <label for="withdrawal_net" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Withdrawal Net</label>
                                <input readonly name="withdrawal_net" type="text" id="withdrawal_net" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>


                            <div class="flex justify-end">
                                <button type="submit" id="send" class="rounded bg-green-500 text-white p-2 px-10"> Send </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid xl:grid-cols-2 gap-2">
            <div class="min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent grid grid-cols-2">
                    <div>
                        <h6 class="dark:text-white font-bold text-gray-600 text-2xl mb-5">Transaction History</h6>
                    </div>
                </div>
                @if ($transaction_h->isEmpty())
                    <div>
                        <p class="text-center mt-4 text-xl font-semibold text-gray-500 mb-6">No Data</p>
                    </div>
                @else
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Client Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Payment Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction_h as $row)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $row->first_name . ' ' . $row->last_name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $row->svc_category_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $row->td }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $row->transaction_amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $row->transaction_type }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <div class="min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent grid grid-cols-2">
                    <div>
                        <h6 class="dark:text-white font-bold text-gray-600 text-2xl mb-5">Withdrawal History</h6>
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @if ($withdrawal_h->isEmpty())
                        <div>
                            <p class="text-center mt-4 text-xl font-semibold text-gray-500 mb-6">No Data</p>
                        </div>
                    @else
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Beneficiary
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Payment Method
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Account Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdrawal_h as $row2)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $row2->beneficiary_name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $row2->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $row2->account_number }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $row2->withdrawal_amount }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $row2->withdrawal_date }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection

@push('page-scripts')
    <script>
        function updateValue(amount) {
            var parsedValue = parseFloat(amount);
            if (!isNaN(parsedValue) && parsedValue >= 0) {
                var net = parseFloat(amount) - (parseFloat(amount) * 0.02);
                var fee = (parseFloat(net) - parseFloat(amount) * -1);
                if (net < 0 || NaN) {
                    net = 0;
                    fee = 0;
                }
                document.getElementById("withdrawal_net").value = net.toFixed(2);
                document.getElementById("withdrawal_fees").value = fee.toFixed(2);
            } else {

                document.getElementById("withdrawal_net").value = "";
                document.getElementById("withdrawal_fees").value = "";
            }



        }
    </script>
    <script>
        document.querySelector('#send').addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah aksi bawaan formulir
            Swal.fire({
                title: 'Verify',
                text: 'You need to verify if this account belongs to you',
                html: '<input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg swal2-input" placeholder="Email">' +
                    '<input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg swal2-input" placeholder="Password">',
                showCancelButton: true,
                confirmButtonColor: '#00D381',
                confirmButtonText: 'Verify',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                inputValidator: function(value) {
                    return new Promise(function(resolve, reject) {
                        if (value === '') {
                            reject('Please enter both email and password');
                        } else {
                            resolve();
                        }
                    });
                }
            }).then(function(result) {
                if (result.isConfirmed) {
                    const email = Swal.getPopup().querySelector('#email').value;
                    const password = Swal.getPopup().querySelector('#password').value;

                    axios.post('/servicer/billing-verify', {
                            email: email,
                            password: password
                        })
                        .then(response => {
                            if (response.data.success) {
                                // Login berhasil, lanjutkan submit formulir
                                document.querySelector('#myForm').submit();
                            } else {
                                Swal.fire('Error', 'Username atau password salah', 'error');
                            }
                        })
                        .catch(error => {
                            Swal.fire('Error', 'Terjadi kesalahan saat memverifikasi login', 'error');
                        });
                }
            });
        });
    </script>
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

    @if (Session::has('Failed'))
        <script>
            Swal.fire({
                title: 'Failed',
                text: '{{ Session::get('Failed') }}',
                icon: 'error',
                confirmButtonText: 'Ok',
                confirmButtonColor: '#00D381'
            });
        </script>
    @endif
@endpush
