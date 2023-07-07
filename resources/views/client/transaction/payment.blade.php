@extends('client.layout.master')
@section('content')
    <main class=relative>
        <div class="container mx-auto xl:p-10 p-5">
            <h1 class="text-4xl font-bold text-gray-500">Contract</h1>
            <p class="mt-3 text-gray-500">Fill out your Infromation</p>

            <div class="grid grid-cols-1 mt-6 gap-7">
                <div class="background bg-white box shadow-xl p-5">
                    <h3 class="text-2xl font-bold text-gray-500">Payment Information</h3>
                    <div class="grid grid-cols-2 mt-2">
                        <div>
                            <p class="mt-3 text-xl text-gray-500">Servicer</p>
                        </div>
                        <div>
                            <p class="mt-3 text-xl text-end text-gray-500">{{ $data->servicer_name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="grid grid-cols-2 mt-2 mb-2">
                        <div>
                            <p class="mt-3 text-xl text-gray-500">Service Category</p>
                        </div>
                        <div>
                            <p class="mt-3 text-xl text-end text-gray-500">{{ $data->svc_category_name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="grid grid-cols-2 mt-2 mb-2">
                        <div>
                            <p class="mt-3 text-xl text-gray-500">Contract Period</p>
                        </div>
                        <div>
                            <p class="mt-3 text-xl text-end text-gray-500">{{ $data->period_type }} (Rp. {{ number_format($data->period_price, 2) }})</p>
                        </div>
                    </div>
                    <hr>
                    <div class="grid grid-cols-2 mt-2 mb-2">
                        <div>
                            <p class="mt-3 text-xl text-gray-500">Contract Times</p>
                        </div>
                        <div>
                            <p class="mt-3 text-xl text-end text-gray-500">{{ $data->period_qyt }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="grid grid-cols-2 mt-2 mb-5">
                        <div>
                            <p class="mt-3 text-xl text-gray-500">Administration Fee</p>
                        </div>
                        <div>
                            <p class="mt-3 text-xl text-end text-gray-500">{{ $data->admin_fee }}%</p>
                        </div>
                    </div>
                    <hr class="border-4">
                    <div class="grid grid-cols-2 mt-2">
                        <div>
                            <p class="mt-3 text-xl text-gray-500">Sub Total</p>
                        </div>
                        <div>
                            <p class="mt-3 text-xl text-end text-gray-500">Rp. {{ number_format($data->sub_total, 2) }}</p>
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button id="pay-button" class="background bg-green-500 px-5 py-3 text-white font-bold">Pay Now !</button>
                    </div>
                    <script type="text/javascript">
                        // For example trigger on button clicked, or any time you need
                        var payButton = document.getElementById('pay-button');
                        payButton.addEventListener('click', function() {
                            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                            window.snap.pay('{{ $snapToken }}', {
                                onSuccess: function(result) {
                                    /* You may add your own implementation here */
                                    alert("payment success!");
                                    console.log(result);
                                },
                                onPending: function(result) {
                                    /* You may add your own implementation here */
                                    alert("wating your payment!");
                                    console.log(result);
                                },
                                onError: function(result) {
                                    /* You may add your own implementation here */
                                    alert("payment failed!");
                                    console.log(result);
                                },
                                onClose: function() {
                                    /* You may add your own implementation here */
                                    alert('you closed the popup without finishing the payment');
                                }
                            })
                        });
                    </script>
                </div>
            </div>
        </div>
    </main>
@endsection
