@extends('client.account.layout.master')
@section('content')
    <div class="-mx-3">
        <div class="flex-none px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent grid grid-cols-2">
                    <div>
                        <h6 class="dark:text-white">Account Center</h6>
                    </div>
                </div>
                <form action="{{ route('client.accountcenter.edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid xl:grid-cols-3 mt-5 p-5 gap-4">
                        <div class="flex items-center justify-center w-full">
                            <div class="max-w-xl">
                                <label class="flex justify-center w-full h-80 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none">
                                    <span class="flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            @if ($data->profile_image == 'noimage')
                                                <img src="{{ url('assets/img/client/profile-img/noimage.png') }}" width="150" class="img-thumbnail mr-3" align="left" id="preview">
                                            @else
                                                <img src="{{ url('assets/img/client/profile-img/' . $data->profile_image) }}" width="150" class="img-thumbnail mr-3" align="left" id="preview">
                                            @endif
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        <span class="font-medium text-gray-600">
                                            Upload Your Photo Profile
                                            <span class="text-blue-600 underline">browse</span>
                                        </span>
                                    </span>
                                    <input type="file" accept="image/png, image/gif, image/jpeg" name="file_upload" id="inputImage" class="hidden">
                                </label>
                            </div>
                        </div>

                        <div class="grid xl:grid-rows-3 xl:col-span-2">
                            <div class="relative z-0 w-full mb-6 group p-2">
                                <input value="{{ $data->first_name }}" type="text" name="first_name" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                @error('first_name')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                                <label for="first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">First Name</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group p-2">
                                <input value="{{ $data->last_name }}" type="text" name="last_name" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                @error('last_name')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                                <label for="last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">Last Name</label>
                                <ul id="svcCategoryDropDown" class="absolute block overflow-visible z-10 block bg-white border border-gray-300 divide-y divide-gray-200 rounded-md shadow-lg hidden"></ul>
                            </div>
                            <div class="relative  z-0 w-full mb-6 group p-2">
                                <input value="{{ $data->username }}" type="text" name="username" id="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                                @error('username')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                                <label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group p-2">
                                <input value="{{ $data->email }}" type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                @error('email')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group p-2">
                                <input value="{{ $data->phone_no }}" type="text" name="phone_no" id="phone_no" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                @error('phone_no')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                                <label for="phone_no" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone Number</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group p-2">
                                <input value="" type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                @error('password')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                                <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                            </div>
                            <div class="relative col-span-2 z-0 w-full mb-6 group p-2">
                                <input value="{{ $data->address }}" type="text" name="address" id="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                @error('address')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                                <label for="address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address</label>
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
    <script type="text/javascript">
        function filePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {
            $("#inputImage").change(function() {
                filePreview(this);
            });
        });
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
