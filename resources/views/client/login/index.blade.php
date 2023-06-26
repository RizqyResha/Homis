<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <title>Homis | Login</title>
    @vite('resources/css/app.css')
</head>

<body class="w-full h-screen bg-no-repeat bg-cover" style="background-image: url({{ asset('assets/img/client/login/bg.png') }})">
    <div class="grid lg:grid-cols-2 grid-rows-none">
        <div class="visible grid lg:grid-cols-3 lg:visible sm:invisible md:invisible xs:invisible ssm:invisible sxm:invisible xxm:invisible">
            <div class="xl:col-span-2 lg:col-span-3 lg:bg-no-repeat lg:h-screen w-full bg-cover" style="background-image: url({{ asset('assets/img/client/login/all3.png') }})"></div>
        </div>
        <div class="grid grid-cols-1">
            <div class="w-full lg:max-w-lg">
                <div class="p-6 space-y-5 md:space-y-6 sm:p-8">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="" width="160px" srcset="">
                    <p class="text-gray-500 text-bold">
                        Hello, welcome to our website, please fill in your account information to Log in
                    </p>
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                        <a class="text-gray-500">Sign </a><a class="text-green-400">in</a>
                    </h1>
                    @if ($message = Session::get('Failed'))
                        <br>
                        <div class="text-sm text-red-600">*{{ $message }}</div>
                    @endif
                    <form class="space-y-4 md:space-y-6" action="{{ route('client.login.process') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                                email</label>

                            <input name="email" placeholder="" :type="text" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                            @error('email')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="py-2" x-data="{ show: true }">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>

                            <div class="relative">
                                <input name="password" placeholder="" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">

                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show" :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                        <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                        </path>
                                    </svg>

                                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show" :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                        <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            @error('password')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input name="remember" id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-900">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline text-green-500">
                                Forgot password?
                            </a>
                        </div>
                        <button class="px-4 py-2 w-full text-lg font-semibold text-sm bg-green-500 text-white rounded-none shadow-sm" type="submit" name="Submit">Sign In</button>
                    </form>


                    <p class="text-gray-500 text-center">Login with</p>
                    <div class="grid grid-cols-3 gap-4">
                        <a href=""><button class="px-4 py-2 w-full bg-white border border-gray-300 flex justify-center"><img src="{{ asset('assets/img/google.png') }}" class="" alt="" width="30px" srcset=""></button></a>
                        <a href=""><button class="px-4 py-2 w-full bg-white border border-gray-300 flex justify-center"><img src="{{ asset('assets/img/fb2.png') }}" class="" alt="" width="30px" srcset=""></button></a>
                        <a href=""><button class="px-4 py-2 w-full bg-white border border-gray-300 flex justify-center"><img src="{{ asset('assets/img/twt2.png') }}" class="" alt="" width="30px" srcset=""></button></a>
                    </div>
                    <p class="text-sm font-light text-gray-900 dark:text-gray-400">
                        Don’t have an account yet? <a href="#" class="font-medium text-green-600 hover:underline ">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
