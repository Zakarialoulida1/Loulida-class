<!-- component -->
<nav class="bg-gray-200 shadow  shadow-gray-300 w-100  md:px-auto">
    <div class="md:h-16 h-28  md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">
        <!-- Logo -->
        <div class="text-indigo-500 md:order-1">
            <!-- Heroicon - Chip Outline -->

            <img class="w-24" src="{{ asset('images/logos.png') }}" alt="">
        </div>

    </div>

    <div class="order-2  flex items-center justify-between md:order-3">
        <div class="lg:fixed  sm:top-[-11px] sm:right-0 p-6 text-right z-10">
            @auth <button id="profile-button"
                    class=" inline-flex items-center px-3 mx-2 py-1 bg-gray-300 border border-transparent text-sm leading-4 font-medium rounded-md hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <svg class="w-4 h-4 md:w-6 md:h-6 md:mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="#000000"
                            d="M280.4 148.3L96 300.1V464a16 16 0 0 0 16 16l112.1-.3a16 16 0 0 0 15.9-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.6a16 16 0 0 0 16 16.1L464 480a16 16 0 0 0 16-16V300L295.7 148.3a12.2 12.2 0 0 0 -15.3 0zM571.6 251.5L488 182.6V44.1a12 12 0 0 0 -12-12h-56a12 12 0 0 0 -12 12v72.6L318.5 43a48 48 0 0 0 -61 0L4.3 251.5a12 12 0 0 0 -1.6 16.9l25.5 31A12 12 0 0 0 45.2 301l235.2-193.7a12.2 12.2 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0 -1.7-16.9z" />
                    </svg>
                    <h1 class="hidden lg:flex">{{ Auth()->user()->name }}</h1>
                </button>

                <div
                    class="profile-menu  hidden bg-gray-100 divide-y rounded-lg z-10 mt-2  mr-8 py-1 shadow-lg absolute right-auto  ">
                    <li class="block px-4 py-2 text-black hover:bg-[#ffb703] hover:text-white">
                        <div class="flex ">
                            <a href="{{ route('profile') }}"class="flex" > <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                                </svg>Profile</a>
                        </div>
                    </li>
                    <li class="block px-4 py-2 text-black hover:bg-[#ffb703] hover:text-white">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 " viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </div>
            @else
                <div>
                    <a href="{{ route('login') }}"
                        class=" text-white mx-2 p-2 bg-[#ffb703]  hover:border hover:border-[#EF4A81] rounded dark:text-gray-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>


                    <a href="{{ route('register') }}"
                        class=" text-white mx-2 p-2 bg-[#ffb703] hover:bg-[#ffb703]  hover:border hover:border-[#EF4A81] rounded dark:text-gray-400  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                </div>

            @endauth
        </div>




        <div class="lg:hidden sm:top-[-11px] sm:right-0 p-6 text-right">
            <button id="burger-menu-toggle" class="focus:outline-none">
                <svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>
    </div>
    <div id="menu-items"
        class="hidden    md:top-16 top-20 enter lg:flex lg:items-center order-3 w-full lg:justify-center  space-x-4">

        <ul class="flex flex-col w-full bg-gray-200 lg:flex-row font-semibold justify-around">

            <li class="px-4 py-2 text-[#EF4A81]"><a href="{{ route('formation.index') }}">Dashboard</a></li>
            <li class="px-4 py-2 text-[#EF4A81]"><a href="/AllFormation">Nos Formation</a></li>



            @auth

                @if (auth()->user()->role === 'Etudiant')
                    <li class="px-4 py-2 hover:text-[#ffb703]">
                        <a href="{{ route('Abbonement') }}">Mes Abbonnement</a>
                    </li>




                    <li class="becompartners px-4 py-2 hover:text-[#EF4A81]">
                        <a href="#">Partenaire</a>
                        <!-- Dropdown menu -->
                        <ul class="absolute hidden bg-gray-100 w-fit divide-y rounded-lg z-10 mt-2 py-1 shadow-lg">
                            <li><a href="{{ route('BecomePartnerOrTeacher') }}"
                                    class="block px-4 py-2 text-[#EF4A81] hover:bg-[#ffb703] hover:text-white">Become a
                                    Teacher</a></li>
                            <li style="border-color: #000000;"><a href="{{ route('BecomePartnerOrTeacher') }}"
                                    class="block px-4 py-2 text-[#EF4A81] hover:bg-[#ffb703] hover:text-white">Become a
                                    Partner</a></li>
                        </ul>

                    </li>
                @elseif(auth()->user()->role === 'professeur')
                    <li class="px-4 py-2 hover:text-[#ffb703]"><a href="{{ route('cours.submit') }}">ADD a Course</a>


                    </li>

                    <li class="px-4 py-2 hover:text-[#ffb703]"><a href="{{ route('cours.display') }}">Our cours</a></li>
                @elseif(auth()->user()->role === 'admin')
                    <li class="px-4 py-2 hover:text-[#ffb703]"><a href="{{ route('formations.create') }}">Create
                            Formation </a></li>

                    <li class="px-4 py-2 hover:text-[#ffb703]"><a href="{{ route('matieres') }}">Manage Your Subjects </a>
                    </li>
                    <li class="px-4 py-2 hover:text-[#ffb703]"><a href="{{ route('cycles') }}">Manage Your Cycles</a>
                    </li>
                    <li class="px-4 py-2 hover:text-[#ffb703]"><a href="{{ route('admin.partner-requests') }}">Manage
                            Requests</a>
                    </li>
                    <li class="px-4 py-2 hover:text-[#ffb703]"><a href="{{ route('payments.index') }}">Manage
                            Payements</a>
                    </li>
                @endif


            @endauth

        </ul>
    </div>


    </div>
    </div>
</nav>
<script>
    const profileButton = document.getElementById('profile-button'); // Select the button containing the user's name
    const profileMenu = document.querySelector('.profile-menu'); // Select the profile dropdown menu

    // Add click event listener to the profile button
    profileButton.addEventListener('click', function(event) {
        event
            .stopPropagation(); // Prevent the click event from bubbling up and closing the dropdown immediately
        profileMenu.classList.toggle('hidden'); // Toggle the visibility of the profile dropdown menu
    });

    // Close the dropdown menu when clicking outside of it
    document.addEventListener('click', function(event) {
        if (!profileMenu.contains(event.target)) {
            profileMenu.classList.add(
                'hidden'); // Hide the dropdown menu if the clicked element is not inside the menu
        }
    });
</script>
