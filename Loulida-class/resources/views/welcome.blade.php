@extends('layouts.master')

@section('content')
    <div class="flex flex-col items-center justify-center md:flex-row md:justify-around w-full md:items-center">
        <div id="textDiv" class="  mt-4 md:m-0 w-[80%] md:w-[48%] lg:mt-24">
            <p class="text-7xl text-center">up your <span class="text-[#EF4A81]">skills</span>
                to <span class="text-[#EF4A81]">advance</span> your <span class="text-[#EF4A81]">career</span>
            </p>
            <p class="mt-4  text-center ">Learn UI-UX Design skills with weekend UX . The latest online learning
                system
                and material that help your knowledge growing.</p>

            <div class="flex text-center justify-center mt-4">
                <button class="px-4 py-2 mt-12 bg-[#ffb703] hover:bg-[#fb8500] text-white rounded">Find Your
                    Course</button>
            </div>
        </div>

        <div id="circleDiv" class=" relative circle h-[400px] mt-5 rounded-full overflow-hidden">
            <img class="absolute cover w-70 h-80 top-36 left-24 object-cover z-40" src="{{ asset('images/girl.png') }}"
                alt="Your Image">
        </div>
    </div>
    <div class="flex justify-center m-4 mt-24">
        <div>
            <h1 class="text-2xl text-center text-green-500"> Explore programs </h1>
            <h1 class="text-5xl text-center"> Our Most Popular Class</h1>
            <p class="text-base text-gray-500 mt-4">Let's join our famous class, the knowledge provided will
                definitely
                be useful for you.</p>
        </div>
    </div>


    <div class="Formations grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xl:grid-cols-3 gap-8 m-4">
        @foreach ($formations as $formation)
            <div class="xl:w-[28vw] lg:w-[40vw] m-8 rounded-lg shadow-2xl bg-gray-100">
                <div class="p-4 relative">
                    <img class="rounded-md w-full" src="{{ asset('formation/' . $formation->image) }}" alt="Formation Image">
                    <div class="absolute rounded bg-gray-200 right-6 top-6">
                        <div class="p-1">
                            <div class="flex">
                                <img class="w-6 mr-4 shadow-2xl " src="{{ asset('images/clock_2784459.png') }}"
                                    alt="">
                                <h6>{{ $formation->duration_months }} hours</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-full pb-4">
                    <div class="mx-4 flex justify-between">
                        <h1 class="font-bold">{{ $formation->cycleEducative->name }}</h1>
                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path
                                d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
                        </svg>
                    </div>
                    <p class="mt-3 mx-4 text-base text-gray-500">{{ $formation->description }}</p>
                    <div class="flex ml-3">
                        <h3 class="p-md2 text-green-500"> 4,3</h3>
                        <svg class="w-4 ml-2" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffd500"
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                        </svg>
                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffd500"
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                        </svg>
                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffd500"
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                        </svg>
                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffd500"
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                        </svg>

                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffd500"
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                        </svg>
                        <span class="ml-4 p-md2 text-gray-500">{{ $formation->available_place }} </span>
                    </div>

                    <div class="flex items-center divide-x-2 divide-blue-400 justify-between m-4">
                        <div class="w-fit flex">
                            <img class="w-12 rounded-full " src="{{ asset('images/service.jpg') }}" alt="prof">

                            <div class="ml-2">
                                <h1>LOULIDA ZAKARIA</h1>
                                <p class="mt-1   text-base text-gray-500">experience plus de 5 ans </p>
                            </div>
                        </div>
                        <h1 class=" text-2xl p-2 text-green-500"> {{ $formation->price }} DH</h1>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- <section class="Formations  flex m-4 items-center flex-wrap justify-between">
            @foreach ($formations as $formation)
            <div class="xl:w-[28vw]  lg:w-[40vw] m-8 rounded-lg  shadow-2xl  bg-gray-100">

                <div class="p-4 relative">
              
                    <img class="rounded-md w-full" src="{{ asset('formation/' .$formation->image) }}" alt="Formation Image"> 
            
                    <div class=" absolute rounded bg-gray-200 right-6 top-6">
                        <div class="p-1">
                            <div class="flex   ">
                                <img class="w-6 mr-4 shadow-2xl " src="{{ asset('images/clock_2784459.png') }}"
                                    alt="">
                                <h6>  {{$formation->duration_months}} hours</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-full pb-4">
                    <div class="mx-4 flex justify-between">
                        <h1 class="font-bold"> {{$formation->cycleEducative->name}} </h1>
                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
                        </svg>
                    </div>
                    <p class="mt-3 mx-4 text-base text-gray-500">
                        {{$formation->description}}
                    </p>
                    <div class="flex ml-3">
                        <h3 class=" p-md2 text-green-500"> 4,3</h3>
                        <svg class="w-4 ml-2" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffd500"
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                        </svg>
                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffd500"
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                        </svg>
                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffd500"
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                        </svg>
                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffd500"
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                        </svg>

                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffd500"
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                        </svg>
                        <span class="ml-4 p-md2 text-gray-500">{{$formation->available_place}} </span>
                    </div>


                    <div class="flex items-center divide-x-2  divide-blue-400 justify-between m-4">
                        <div class="w-fit flex">
                            <img class="w-12 rounded-full " src="{{ asset('images/service.jpg') }}" alt="prof">

                            <div class="ml-2">
                                <h1>LOULIDA ZAKARIA</h1>
                                <p class="mt-1   text-base text-gray-500">experience plus de 5 ans </p>
                            </div>
                        </div>
                        <h1 class=" text-2xl p-2 text-green-500"> {{$formation->price}} DH</h1>

                    </div>
                </div>
            </div>
            @endforeach
   
        </section >  --}}
    <div class="flex justify-center m-4 mt-24">
        <div>
            <h1 class="text-2xl text-center text-green-500"> Tutors </h1>
            <h1 class="text-5xl"> Our Heroes</h1>

        </div>
    </div>
    <!-- Display Formations -->
    <section class="Formations flex m-4 items-center flex-wrap justify-between">

        <div class="xl:w-[28vw] lg:w-[40vw] m-8 rounded-lg shadow-2xl bg-gray-100">
            <!-- Formation details -->
            {{-- <div class="p-4 relative">
                <!-- Image and other details here -->
                 <img class="rounded-md w-full" src="{{ asset('formation/' .$formation->image) }}" alt="Formation Image"> 
            </div>
            <div class="h-full pb-4">
                <!-- Formation name and description here -->
                 <h1 class="font-bold">{{ $formation->name }}</h1> 
                 <p class="mt-3 mx-4 text-base text-gray-500">{{ $formation->description }}</p> 
            </div> --}}

            <!-- Matieres associated with the formation -->
            {{-- <div class="mx-4">
                <h2 class="font-bold">Matieres:</h2>
                <ul>
                    @foreach ($formation->matieres as $matiere)
                        <li>{{ $matiere->name }}</li>
                    @endforeach
                </ul>
            </div> --}}
        </div>

    </section>

    <!-- Display Partners -->
    <div class="flex justify-center m-4 mt-24">
        <div>
            <h1 class="text-2xl text-center text-green-500"> Tutors </h1>
            <h1 class="text-5xl"> Our Heroes</h1>
        </div>
    </div>

    <section class="Partners flex m-4 items-center flex-wrap justify-between">
        @foreach ($partners as $partner)
            <div
                class="lg:w-[20vw] w-[90vw] sm:w-[40vw] m-8 rounded-lg shadow-2xl bg-gray-100 h-[30vh] bg-gray-200 flex flex-col items-center justify-center">

                <img class="w-16 rounded-full" src="{{ asset($partner->image) }}" alt="Partner Image">
                <h1 class="text-2xl font-semibold mb-2">{{ $partner->name }}</h1>
                <p class="mt-1 text-center text-gray-500">{{ $partner->description }}</p>
            </div>
        @endforeach
    </section>

    <section class="Partners flex m-4 items-center flex-wrap justify-between">

        <div
            class=" lg:w-[20vw] w-[90vw] sm:w-[40vw] m-8 rounded-lg  shadow-2xl  bg-gray-100 h-[30vh] bg-gray-200 flex flex-col items-center justify-center">



            <img class="w-16 rounded-full " src="{{ asset('images/ ' . $formation->image) }}" alt="prof">
            <h1 class="text-2xl font-semibold mb-2">Loulida ZAKARIA</h1>
            <p class="mt-1  text-center text-gray-500">Enseignant de la Matière Physique</p>
            <div class="flex">
                <a class="m-1" href=""><svg class="w-8" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#2358b3"
                            d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
                    </svg>


                </a>
                <a class="m-1" href=""><svg class="w-8" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#000000"
                            d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                    </svg>
                </a>
                <a class="m-1" href="">
                    <svg class="w-8" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#385fa3"
                            d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
                    </svg></a>

            </div>
        </div>


    </section>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const circleDiv = document.getElementById("circleDiv");
            const textDiv = document.getElementById("textDiv");

            function checkVisibility(element) {
                const rect = element.getBoundingClientRect();
                return rect.top >= 0 && rect.bottom <= window.innerHeight;
            }

            function handleScroll() {
                if (checkVisibility(circleDiv)) {
                    circleDiv.classList.remove("no-animation");
                    circleDiv.classList.add("slide-from-right");
                } else {
                    circleDiv.classList.remove("slide-from-right");
                    circleDiv.classList.add("no-animation");
                }

                if (checkVisibility(textDiv)) {
                    textDiv.classList.remove("no-animation");
                    textDiv.classList.add("slide-from-left");
                } else {
                    textDiv.classList.remove("slide-from-left");
                    textDiv.classList.add("no-animation");
                }
            }

            window.addEventListener("scroll", handleScroll);

            // Initially, trigger animation check
            handleScroll();
            const partenaireLink = document.querySelector('li:nth-child(5)'); // Select the "Partenaire" list item
            const dropdownMenu = partenaireLink.querySelector('ul'); // Select the nested dropdown menu

            partenaireLink.addEventListener('mouseenter', function() {
                console.log('fcghbj');
                dropdownMenu.classList.remove(
                'hidden'); // Show the dropdown menu when hovering over the "Partenaire" link
            });

            partenaireLink.addEventListener('mouseleave', function() {
                dropdownMenu.classList.add(
                'hidden'); // Hide the dropdown menu when mouse leaves the "Partenaire" link
            });
            // Close dropdown when clicking outside

        });
    </script>
@endsection
