<x-app title="Register">
    <div class="flex items-center mt-4 justify-center">

        <div class="shadow-2xl rounded-md m-8  w-[90%]  sm:w-[80%] ">

            <h1 class="text-center m-4 text-3xl underline">Join Us</h1>
            <div class=" flex flex-col sm:flex-row items-center mb-8  w-full sm:justify-around ">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
            
                    <div class="box">


                        <div class="input__wrapper w-full -ml-2 mb-36">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-50 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 w-full"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 w-full">SVG, PNG, JPG or GIF
                                        (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" name="image" type="file" class="w-full hidden" />
                            </label>
                        </div>



                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="input__wrapper">
                            <input id="name" type="name" name="name" placeholder="Your name"
                                class="input__field xl:w-[30vw]">
                            <label for="name" class="input__label">name</label>


                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input__wrapper">
                            <input id="email" type="email" name="email" placeholder="Your email"
                                title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                                class="input__field xl:w-[30vw]">
                            <label for="email" class="input__label">Email</label>


                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input__wrapper">
                            <input id="password" type="password" name="password" placeholder="Your Password"
                                title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                                class="input__field inputpass xl:w-[30vw] ">
                            <label for="password" class="input__label">Password</label>
                            <img alt="Eye Icon" title="Eye Icon" src="{{ asset('images/eye.svg') }}"
                                class="input__icon r-[500px" id="eyeIcon">

                        </div>
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input__wrapper">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                placeholder="confirm your password"
                                title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                                class="input__field  xl:w-[30vw]">
                            <label for="password_confirmation" class="input__label">confirm your password</label>


                        </div>


                        <button
                            class=" mt-4 bg-[#f8ae2a] w-[50vw] sm:w-[15vw] p-4 center text-center hover:bg-[#fb8500] "
                            type="submit"> Register </button>

                </form>
            </div>

            <div>
                <h1 class="underline">Adresse</h1>
                <p>36 Rue Daya Quartier Sidi Ouassel Safi</p>
                <h1 class="underline">Contact</h1>
                <p class="">+212.06.52.96.76.76</p>

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
                <iframe class="rounded-lg  h-[28vh] w-[70vw] sm:w-[28vw]"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3373.860993781909!2d-9.248272799999999!3d32.261822099999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdac26e91eba8d31%3A0xe09ba714cd9f76c2!2sAgence%20inwi%20-%20Sidi%20Ouassel!5e0!3m2!1sfr!2sma!4v1710689040938!5m2!1sfr!2sma"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </div>

    </div>
    <script src="script.js"></script>
    <script>
        const input = document.querySelector(".inputpass");
        const inputIcon = document.querySelector("#eyeIcon"); // Select by id

        inputIcon.addEventListener("click", (e) => {
            e.preventDefault();

            const isPassword = input.getAttribute('type') === 'password';

            // Change the src attribute based on the current state
            inputIcon.setAttribute(
                'src',
                isPassword ? "{{ asset('images/eye-off.svg') }}" : "{{ asset('images/eye.svg') }}"
            );

            // Change the input type attribute to toggle between password and text
            input.setAttribute(
                'type',
                isPassword ? 'text' : 'password'
            );
        });
    </script>
</x-app>
