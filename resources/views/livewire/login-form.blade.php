<div class="h-screen flex sm:flex sm:flex-col sm:items-center lg:flex lg:flex-row lg:items-center">
    <div class="flex w-1/2 bg-gradient-to-tr from-blue-800 sm:h-48 sm:w-48 to-purple-700 sm:mt-28 lg:items-center lg:px-6 sm:rounded-full lg:h-screen lg:rounded-none lg:mt-0 lg:mb-0 sm:mb-8 justify-around lg:w-1/2 items-center">
        <div>
            <h1 class="text-white font-bold text-4xl font-sans">GoFinance</h1>
            <p class="text-white mt-1">The most popular peer-to-peer lending platform in SEA</p>
            <button type="submit" class="block w-28 bg-white text-indigo-800 mt-4 py-2 rounded-2xl font-bold mb-2">Read More</button>
        </div>
    </div>
    <div class="flex w-1/2 justify-center items-center bg-white sm:mb-6 lg:w-full ">
        <form class="bg-white flex flex-col gap-4 sm:items-center">
            <div class="flex flex-col">
                <h1 class="text-gray-800 font-bold text-2xl mb-1">Hello Again!</h1>
                <p class="text-sm font-normal text-gray-600 mb-7">Welcome Back</p>
            </div>
            <div class="flex">
                <div class="flex flex-col gap-2">
                    <div>
                        <div class="flex items-center border-2 py-2 px-3 rounded-2xl  w-80 md:w-96">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                            <input wire:model="email" class="pl-2 outline-none border-none" type="text" name="email" id="email" placeholder="Email Address" />
                        </div>
                        @error('email')
                        <span class="  text-red-600 p-2 w-64">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <div class="flex items-center border-2 py-2 px-3 rounded-2xl  w-80 md:w-96">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                            <input wire:model="password" class="pl-2 outline-none border-none" type="password" name="password" id="password" placeholder="Password" />
                        </div>
                        @error('password')
                        <span class="  text-red-600 p-2 w-64">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
            <button type="submit" wire:click.prevent="login" class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2 hover:bg-blue-900">Login</button>
            <div class="flex flex-col sm:items-center sm:gap-2 sm:mb-12">
                <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">Forgot Password?</span>
                <span class="text-sm ml-2  cursor-pointer">Don't have an account? <a wire:navigate href="/register" class="text-blue-500 font-bold">Sign Up</a></span>
            </div>
        </form>
    </div>
</div>
