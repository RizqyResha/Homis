@extends('servicer.layout.master')
@section('content')
    <div class="-mx-3">
        <div class="flex-none px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent grid grid-cols-2">
                    <div>
                        <h6 class="dark:text-white">Publish New Service</h6>
                    </div>
                </div>
                <form action="">
                    @csrf
                    <div class="grid xl:grid-cols-3 mt-5 p-5 gap-4">
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden" />
                            </label>
                        </div>

                        <div class="grid xl:grid-rows-3 xl:col-span-2">

                            <div class="relative z-0 w-full mb-6 group p-2">
                                <input type="number" name="hourly" id="hourly" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="hourly" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Hourly Price</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group p-2">
                                <input type="number" name="daily" id="daily" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="daily" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Daily Price</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group p-2">
                                <input type="number" name="weekly" id="weekly" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="weekly" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Weekly Price</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group p-2">
                                <input type="number" name="monthly" id="monthly" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="monthly" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Monthly Price</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group p-2">
                                <input type="text" name="svc_category" id="svc_category" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="svc_category" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">Services Category</label>
                                <ul id="svcCategoryDropDown" class="absolute z-10 bg-white border border-gray-300 divide-y divide-gray-200 rounded-md shadow-lg hidden"></ul>
                            </div>
                            <div class="relative col-span-2 z-0 w-full mb-6 group p-2">
                                <input type="text" name="description" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                <label for="description" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
                            </div>
                        </div>
                        <div></div>
                        <div></div>
                        <div class="flex justify-end">
                            <button type="submit" class="rounded bg-green-500 text-white p-2 px-5"> Save </button>
                        </div>
                    </div>
                </form>

                {{-- <div class="flex-auto px-0 pt-0 pb-2 mt-5">
                    <div class="p-0 overflow-x-auto">

                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@push('page-scripts')
    <script>
        const input = document.getElementById('svc_category');
        const dropdown = document.getElementById('svcCategoryDropDown');
        const emails = ['Room Bliss', 'Gardener', 'Engineer'];

        // Fungsi untuk menampilkan dropdown
        function showDropdown() {
            dropdown.innerHTML = ''; // Reset dropdown
            dropdown.classList.remove('hidden'); // Tampilkan dropdown

            const filterValue = input.value.toLowerCase(); // Dapatkan nilai inputan dan ubah ke lowercase

            // Tambahkan item dropdown untuk setiap email dalam array yang cocok dengan filter
            emails.filter(email => email.toLowerCase().includes(filterValue)).forEach(email => {
                const li = document.createElement('li');
                li.textContent = email;
                li.classList.add('cursor-pointer', 'px-4', 'py-2');
                dropdown.appendChild(li);

                // Tambahkan event listener untuk mengisi inputan saat item dropdown diklik
                li.addEventListener('click', () => {
                    input.value = email;
                    dropdown.classList.add('hidden');
                });
            });
        }

        // Event listener untuk menampilkan dropdown saat inputan diklik
        input.addEventListener('click', showDropdown);

        // Event listener untuk memfilter dropdown saat nilai inputan berubah
        input.addEventListener('input', showDropdown);

        // Event listener untuk menyembunyikan dropdown saat klik di luar dropdown dan inputan
        document.addEventListener('click', event => {
            const target = event.target;
            if (target !== input && target !== dropdown && !dropdown.contains(target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
@endpush
