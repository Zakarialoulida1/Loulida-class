@extends('layouts.master')

@section('title', 'Partner Requests')

@section('content')
    <h1 class="text-3xl font-bold text-center m-4 mb-8">Partner Requests</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 dark:bg-slate-850">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cycle Educative
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Formation name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Recu
                    </th>


                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-slate-800">
                @foreach ($payments as $payment)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $payment->user->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $payment->user->phone }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                           {{ $payment->formation->cycleEducative->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $payment->formation->name }}
                        </td>
...

                      
                        <td class="px-6 py-4 whitespace-nowrap"> @if ($payment->path!== '')
                       
                            
                                
                           
                            <a href="{{ asset('recu/' . $payment->path) }}" target="_blank"
                                class="text-indigo-600 hover:text-indigo-900">
                                <img class="w-10 inline-block align-middle" src="{{ asset('images/pdf.png') }}"
                                    alt="PDF">
                            </a>@endif
                        </td> 
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                          
                          
                          
                          
                            @if ($payment->status === 'validé')
                           <form action="{{ route('payments.unvalidate', ['id' => $payment->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Unvalidate
                                </button>
                            </form>
                            
                            @else
                                  <form action="{{ route('payments.validate', ['id' => $payment->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Validate
                                </button>
                            </form>
                          
                            @endif
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <!-- Button to view details -->

                            <button onclick="showDetails({{ json_encode($payment) }})"
                                class="text-indigo-600 hover:text-indigo-900 focus:outline-none">
                                View Details
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
                        <p class="pt-4 text-base font-bold flex items-center justify-center lg:justify-start">
                            <svg class="h-4 fill-current text-green-700 pr-4" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
                            </svg>

                            <span id="Type"></span>
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
                    
                    document.getElementById('Type').innerText = partner.user.role;

                    document.querySelector('.block.lg\\:hidden.rounded-full.shadow-xl.mx-auto.-mt-16.h-48.w-48.bg-cover.bg-center')
                        .style.backgroundImage = "url('/images/" + partner.user.image + "')";

                    document.getElementById('partnerPhone').innerText = partner.user.phone;
                    document.getElementById('partnergmail').innerText = partner.user.email;
                    document.getElementById('cvLink').href = "/recu/" + partner.path;

                    document.getElementById('partnerPhonetel').href = "tel:" + partner.user.phone;
                    document.getElementById('partnergmailmailto').href = "mailto:" + partner.user.email;

                    document.getElementById('description').innerText = partner.user.description;

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
