@extends('layouts.master')

@section('title', 'Partner Requests')

@section('content')
<h1 class="text-3xl font-bold text-center m-4 mb-8">Les Demandes d'abonnement </h1>


<div class="w-full flex flex-wrap justify-around ">
    <!-- Ajout de la classe flex-wrap pour que les cartes s'enroulent -->
    @foreach ($partnerRequests as $partner)
        <!-- Sample Card -->
        <div class="w-full md:w-2/5  lg:w-1/3 px-4 mb-8">
            <!-- Utilisation de w-full pour prendre toute la largeur sur les petits écrans et w-1/3 pour diviser en 3 colonnes sur les écrans larges -->
            <div class="relative bg-gray-100 py-6 px-6 rounded-3xl text-gray-400 my-4 shadow-xl">
                <div class=" text-white flex items-center absolute rounded-full shadow-xl  left-4 -top-6">

                    <img src="{{ asset('images/' . $partner->user->image) }}" alt="User Image"
                        class="w-16  object-cover rounded-full">

                </div>

                <div class=" flex mt-4 flex-col">
                    <h1 class="text-black"> {{ $partner->user->name }}</h1>
                    <p> {{ Str::limit($partner->description, 80, '...') }}</p>
                </div>
                <div class="mt-8">
                    <p class="text-xl font-semibold text-white my-2"></p>

                    <div class="flex space-x-2 text-gray-400 text-sm my-3">
                        <!-- svg  -->
                        <svg fill="#000000" class="h-5 w-5" viewBox="0 0 24 24" id="job" data-name="Line Color"
                            xmlns="http://www.w3.org/2000/svg" class="icon line-color">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path id="secondary" d="M16,7H8V4A1,1,0,0,1,9,3h6a1,1,0,0,1,1,1Zm1,4H7m8,0v2"
                                    style="fill: none; stroke: #49c427; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                </path>
                                <rect id="primary" x="5" y="5" width="14" height="18" rx="1"
                                    transform="translate(26 2) rotate(90)"
                                    style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                </rect>
                            </g>
                        </svg>
                        <p class="text-gray-400">Profession: <span
                                class="text-bold text-black">{{ $partner->matiere->name }} </span> </p>
                    </div>
                    <div class="flex items-center  space-x-2 text-gray-400 text-sm my-3">
                        Cv :
                        <a href="{{ asset('cv/' . $partner->cv) }}" target="_blank"
                            class="text-indigo-600 hover:text-indigo-900">
                            <img class="w-10 inline-block align-middle" src="{{ asset('images/pdf.png') }}" alt="PDF">
                        </a>
                    </div>
                    <div class="border-t-2"></div>

                    <div class="flex justify-between ">


                        <div class="flex justify-between ">
                            <div class="my-2">
                                <button onclick="showDetails({{ json_encode($partner) }})"
                                    class="text-indigo-600 hover:text-indigo-900 focus:outline-none">
                                    View Details
                               <svg viewBox="0 -398 1820 1820" class="icon w-16 h-16" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                    </g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M916.859259 217.125926h350.435556v60.681481H916.859259z" fill="#5FFFBA">
                                        </path>
                                        <path
                                            d="M805.641481 550.874074H603.306667c-27.875556 0-50.536296 22.660741-50.536297 50.536296v202.24c0 27.875556 22.660741 50.536296 50.536297 50.536297h202.24c27.875556 0 50.536296-22.660741 50.536296-50.536297V601.41037c0.094815-27.875556-22.565926-50.536296-50.441482-50.536296zM795.496296 765.44c0 15.54963-12.61037 28.16-28.16 28.16H641.611852c-15.54963 0-28.16-12.61037-28.16-28.16V639.715556c0-15.54963 12.61037-28.16 28.16-28.16h125.819259c15.54963 0 28.16 12.61037 28.16 28.16v125.724444z"
                                            fill="#FFD561"></path>
                                        <path d="M916.859259 596.385185h350.435556v60.681482H916.859259z" fill="#5FFFBA">
                                        </path>
                                        <path
                                            d="M805.641481 171.614815H603.306667c-27.875556 0-50.536296 22.660741-50.536297 50.536296v202.24c0 27.875556 22.660741 50.536296 50.536297 50.536296h202.24c27.875556 0 50.536296-22.660741 50.536296-50.536296V222.151111c0.094815-27.875556-22.565926-50.536296-50.441482-50.536296zM795.496296 386.180741c0 15.54963-12.61037 28.16-28.16 28.16H641.611852c-15.54963 0-28.16-12.61037-28.16-28.16V260.456296c0-15.54963 12.61037-28.16 28.16-28.16h125.819259c15.54963 0 28.16 12.61037 28.16 28.16v125.724445z"
                                            fill="#FFA28D"></path>
                                        <path
                                            d="M916.859259 368.82963h350.435556v60.681481H916.859259zM916.859259 748.088889h350.435556v60.681481H916.859259z"
                                            fill="#5FFFBA"></path>
                                    </g>
                                </svg>
                            </button>
                            </div>
                        </div>




                        @if ($partner->status === 'validé')
                            <div class="my-2">
                                <p class="font-semibold text-base mb-2 text-gray-400">Reject</p>
                                <div class="text-base text-gray-400 font-semibold">
                                    <form action="{{ route('partnerRequests.UnConfirm', $partner->id) }}" method="POST"
                                        class="ml-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit">
                                            <svg viewBox="0 0 15 15" class="w-8" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" stroke="#ff0000">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M2.5 2.5L12.5 12.5M7.5 14.5C3.63401 14.5 0.5 11.366 0.5 7.5C0.5 3.63401 3.63401 0.5 7.5 0.5C11.366 0.5 14.5 3.63401 14.5 7.5C14.5 11.366 11.366 14.5 7.5 14.5Z"
                                                        stroke="#ff0000"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                        <div class="my-2">
                         
                                <p class="font-semibold text-base mb-2 text-gray-400">Accept</p>
                                <form action="{{ route('partnerRequests.Confirm', $partner->id) }}" method="POST">
                                    @csrf

                                    @method('PATCH')
                                    <button type="submit">
                                        <svg fill="#30b300" class="w-8" viewBox="0 0 32 32"
                                            enable-background="new 0 0 32 32" version="1.1" xml:space="preserve"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g id="Approved"></g>
                                                <g id="Approved_1_"></g>
                                                <g id="File_Approve">
                                                    <g>
                                                        <path
                                                            d="M26,24c-0.553,0-1,0.448-1,1v4H7V3h10v7c0,0.552,0.447,1,1,1h7v4c0,0.552,0.447,1,1,1s1-0.448,1-1v-4.903 c0.003-0.033,0.02-0.063,0.02-0.097c0-0.337-0.166-0.635-0.421-0.816l-7.892-7.891c-0.086-0.085-0.187-0.147-0.292-0.195 c-0.031-0.015-0.063-0.023-0.097-0.034c-0.082-0.028-0.166-0.045-0.253-0.05C18.043,1.012,18.022,1,18,1H6C5.447,1,5,1.448,5,2v28 c0,0.552,0.447,1,1,1h20c0.553,0,1-0.448,1-1v-5C27,24.448,26.553,24,26,24z M19,9V4.414L23.586,9H19z">
                                                        </path>
                                                        <path
                                                            d="M30.73,15.317c-0.379-0.404-1.01-0.424-1.414-0.047l-10.004,9.36l-4.629-4.332c-0.404-0.378-1.036-0.357-1.414,0.047 c-0.377,0.403-0.356,1.036,0.047,1.413l5.313,4.971c0.192,0.18,0.438,0.27,0.684,0.27s0.491-0.09,0.684-0.27l10.688-10 C31.087,16.353,31.107,15.72,30.73,15.317z">
                                                        </path>
                                                    </g>
                                                </g>
                                                <g id="Folder_Approved"></g>
                                                <g id="Security_Approved"></g>
                                                <g id="Certificate_Approved"></g>
                                                <g id="User_Approved"></g>
                                                <g id="ID_Card_Approved"></g>
                                                <g id="Android_Approved"></g>
                                                <g id="Privacy_Approved"></g>
                                                <g id="Approved_2_"></g>
                                                <g id="Message_Approved"></g>
                                                <g id="Upload_Approved"></g>
                                                <g id="Download_Approved"></g>
                                                <g id="Email_Approved"></g>
                                                <g id="Data_Approved"></g>
                                            </g>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach





</div>






    <div id="popup"
        class="fixed top-0 left-0 right-0 bottom-0 bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
        <div id="profil_details" class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover"
            style="background-image:url('https://source.unsplash.com/1L71sPT5XKc');">



            <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

                <!--Main Col-->
                <div id="profile"
                    class="relative w-full lg:w-[50vw] rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 mx-6 lg:mx-0">

                    <div class="absolute -top-28 right-4 w-32">


                        <img id="image" src="" class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block">


                    </div>
                    <div class="p-4 md:p-12 text-center lg:text-left">
                        <!-- Image for mobile view-->
                        <div class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"
                            style="background-image: url('https://source.unsplash.com/MP0IUfwrn0A')"></div>
                        <div class="flex">
                            <h1 id="partnerName" class="text-3xl font-bold pt-8 lg:pt-0"></h1>
                            <a href="" id="cvLink" class="flex items-center" class="link">
                                <img class="w-10 inline-block align-middle" src="{{ asset('images/pdf.png') }}"
                                    alt="PDF">
                            </a>
                        </div>
                        <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>
                        <div class="flex gap-8">
                            <p class=" text-base font-bold flex items-center justify-center lg:justify-start">
                                <svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
                                </svg>

                                <span id="Type"></span>
                            </p>
                            <p class="text-gray-500"> Profession :
                                <span id="profession" class="text-black text-bold">

                                </span>


                            </p>
                        </div>
                        <p class="pt-2 text-gray-600 text-xs lg:text-sm flex items-center justify-center lg:justify-start">
                            <svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm7.75-8a8.01 8.01 0 0 0 0-4h-3.82a28.81 28.81 0 0 1 0 4h3.82zm-.82 2h-3.22a14.44 14.44 0 0 1-.95 3.51A8.03 8.03 0 0 0 16.93 14zm-8.85-2h3.84a24.61 24.61 0 0 0 0-4H8.08a24.61 24.61 0 0 0 0 4zm.25 2c.41 2.4 1.13 4 1.67 4s1.26-1.6 1.67-4H8.33zm-6.08-2h3.82a28.81 28.81 0 0 1 0-4H2.25a8.01 8.01 0 0 0 0 4zm.82 2a8.03 8.03 0 0 0 4.17 3.51c-.42-.96-.74-2.16-.95-3.51H3.07zm13.86-8a8.03 8.03 0 0 0-4.17-3.51c.42.96.74 2.16.95 3.51h3.22zm-8.6 0h3.34c-.41-2.4-1.13-4-1.67-4S8.74 3.6 8.33 6zM3.07 6h3.22c.2-1.35.53-2.55.95-3.51A8.03 8.03 0 0 0 3.07 6z" />
                            </svg>
                            <span id="Address"></span>
                        </p>

                        <p id="description" class="pt-8 text-sm"></p>
                        <div class="flex w-50 justify-end">
                            <div
                                class="mt-6 pb-16 lg:pb-0 w-4/5 lg:w-full  mx-auto flex flex-wrap items-center justify-end divide-green-500 divide-x-4">
                                <a id="partnergmailmailto" class="flex items-center" class="link" href="#"
                                    data-tippy-content="@phone_handle">
                                    <img class="w-8 " src="{{ asset('images/gmail.png') }}" alt="">
                                    <span class="m-4" id="partnergmail"></span>
                                </a>
                                <a id="partnerPhonetel" class="flex items-center" class="link" href=""
                                    data-tippy-content="@phone_handle">
                                    <img class=" w-8" src="{{ asset('images/telephoner.png') }}" alt="">
                                    <span id="partnerPhone"></span>
                                </a>



                            </div>
                        </div>
                        <button onclick="closePopup()"
                            class="mt-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none">Close</button>

                        <!-- Use https://simpleicons.org/ to find the svg for your preferred product -->

                    </div>

                </div>






            </div>

            <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
            <script src="https://unpkg.com/tippy.js@4"></script>
            <script>
                function showDetails(partner) {
                    document.getElementById('partnerName').innerText = partner.user.name;
                    document.getElementById('image').src = "/images/" + partner.user.image;
                    document.getElementById('Address').innerText = partner.Address;
                    document.getElementById('Type').innerText = partner.type;
                    document.getElementById('profession').innerText = partner.matiere.name;
                    document.querySelector('.block.lg\\:hidden.rounded-full.shadow-xl.mx-auto.-mt-16.h-48.w-48.bg-cover.bg-center')
                        .style.backgroundImage = "url('/images/" + partner.user.image + "')";

                    document.getElementById('partnerPhone').innerText = partner.phone;
                    document.getElementById('partnergmail').innerText = partner.user.email;
                    document.getElementById('cvLink').href = "/cv/" + partner.cv;

                    document.getElementById('partnerPhonetel').href = "tel:" + partner.phone;
                    document.getElementById('partnergmailmailto').href = "mailto:" + partner.user.email;

                    document.getElementById('description').innerText = partner.description;

                    // Show the pop-up
                    document.getElementById('popup').classList.remove('hidden');
                }


                function closePopup() {
                    // Hide the pop-up
                    document.getElementById('popup').classList.add('hidden');
                }
            </script>

        </div>
    </div>



@endsection
