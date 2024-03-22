<!-- component -->
<nav class="bg-gray-200 shadow shadow-gray-300 w-100 px-8 md:px-auto">
    <div class="md:h-16 h-28 mx-auto md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">
        <!-- Logo -->
        <div class="text-indigo-500 md:order-1">
            <!-- Heroicon - Chip Outline -->
            <img class="w-24" src="{{ asset('images/logos.png') }}" alt="">
        </div>
        <div class="text-gray-500 order-3 w-full md:w-auto md:order-2">
            <ul class="flex font-semibold justify-between">
                <!-- Active Link = text-indigo-500
                Inactive Link = hover:text-indigo-500 -->
                <li class="md:px-4 md:py-2 text-[#EF4A81]"><a href="#">Dashboard</a></li>
                <li class="md:px-4 md:py-2 hover:text-[#ffb703]"><a href="#">Search</a></li>
                <li class="md:px-4 md:py-2 hover:text-[#ffb703]"><a href="#">Explore</a></li>
                <li class="md:px-4 md:py-2 hover:text-[#ffb703]"><a href="#">ADD a Course</a></li>
                <li class="md:px-4 md:py-2 hover:text-[#ffb703]"><a href="{{route('matieres')}}">ADD a Subject </a></li>
                <li class="md:px-4 md:py-2 hover:text-[#ffb703]"><a href="{{route('cycles')}}">Manage Your Cycles</a></li>
                <li class="md:px-4 md:py-2 hover:text-[#EF4A81]">
                    <a href="#">Partenaire</a>
                    <!-- Dropdown menu -->
                    <ul class="absolute hidden bg-gray-100 w-fit divide-y rounded-lg z-10 mt-2 py-1 shadow-lg">
                        <li><a href="#" class="block px-4 py-2 text-[#EF4A81] hover:bg-[#ffb703] hover:text-white">Become a Teacher</a></li>
                        <li style="border-color: #000000;"><a href="#" class="block px-4 py-2 text-[#EF4A81] hover:bg-[#ffb703] hover:text-white">Become a Partner</a></li>
                    </ul>
                    
                </li>
                {{-- <li class="md:px-4 md:py-2  relative">
                    <a href="#" class="flex gap-2">Partenaire  <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffbb00" d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg></a>
                    <!-- Dropdown content -->
                    <ul class="absolute hidden divide-y-2 bg-gray-100 mt-2 py-2 w-56 rounded-md shadow-md z-10">
                        <li><a href="#" class=" hover:text-[#ffb703] p-4">Become a Teacher  </a></li>
                        <li><a href="#" class=" hover:text-[#ffb703] p-4"></a></li>
                        
                    </ul>
                </li> --}}
            </ul>
        </div>
        <div class="order-2 md:order-3">




            @auth
                <div class="sm:fixed sm:top-[-11px] sm:right-0 p-6 text-right z-10">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="px-4 py-2 bg-[#ffb703] hover:bg-indigo-600 text-gray-50 rounded-xl flex items-center gap-2">
                            <!-- Heroicons - Login Solid -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>

                </div>
            @else
                <a href="{{ route('login') }}"
                    class=" text-white mx-2 p-2 bg-[#ffb703]  hover:border hover:border-[#EF4A81] rounded dark:text-gray-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                
                    <a href="{{ route('register') }}"
                        class=" text-white mx-2 p-2 bg-[#ffb703] hover:bg-[#ffb703]  hover:border hover:border-[#EF4A81] rounded dark:text-gray-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
              
            @endauth


        </div>

    </div>
    </div>
</nav>
