@extends('layouts.master')

@section('title', 'Partenaire')

@section('content')
    

<div class="flex justify-center mb-8">
    <button id="teacherFormBtn" class="mr-4 px-4 py-2 bg-gray-300">Devenir Professeur</button>
    <button id="investorFormBtn" class="px-4 py-2 bg-gray-300">Devenir Investisseur</button>
</div>

<div id="teacherForm">
<div class="flex items-center md m-24 justify-center">
        <div class="shadow-2xl rounded-md m-8  w-[90%]  sm:w-[80%] ">
            <div class="flex flex-col sm:flex-row items-center mb-8   w-full sm:justify-around ">
                <form method="POST" action="{{route('teacher.submit')}}" enctype="multipart/form-data" >
                    @csrf
                    
                        <h1 class="text-center m-4 text-3xl underline">Devenir Professeur </h1>
                        <input type="text" name="type" class="hidden" value="Teacher">

                        <div class="input__wrapper">
                            <input id="Address" type="text" name="Address" placeholder="Your Address"
                                title="Please provide your address" class="input__field w-[43vw]  xl:w-[30vw]">
                            <label for="Address" class="input__label">Address</label>
                        </div>
                        @error('Address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        
                        <div class="input__wrapper">
                            <input id="Phone" type="Phone" name="Phone" placeholder="Your Phone"
                                title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                                class="input__field w-[43vw]  xl:w-[30vw]">
                            <label for="Phone" class="input__label">Phone</label>
                        </div>
                        @error('Phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input__wrapper">
                            <textarea id="Description" name="Description"
                                title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                                class="input__field w-[43vw] lg:w-[20vw] "></textarea>
                            <label for="Description" class="input__label">Description</label>
                        </div>
                        @error('Description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input__wrapper">
                            <input id="cv" type="file" name="cv" placeholder="Your Cv" class="input__field">

                            <label for="Cv" class="input__label">Télecharger Votre Cv</label>
                        </div>
                        @error('cv')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <button class=" mt-4 bg-[#f8ae2a] w-fit sm:w-[43vw] p-4 center text-center hover:bg-[#fb8500] "
                            type="submit"> Envoyer </button>
                      
                </form>
            </div>
        </div>
    </div>

</div>

    <div id="investorForm" style="display: none;">
        <!-- Investor form -->
        <form method="POST" action="">
            @csrf
            <div class="input__wrapper">
                <input id="Phone" type="Phone" name="Phone" placeholder="Your Phone"
                    title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                    class="input__field w-[43vw]  xl:w-[30vw]">
                <label for="Phone" class="input__label">Phone</label>
            </div>
            @error('Phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="input__wrapper">
                <textarea id="Description" name="Description"
                    title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                    class="input__field w-[43vw] lg:w-[20vw] "></textarea>
                <label for="Description" class="input__label">Description</label>
            </div>
            @error('Description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <button class=" mt-4 bg-[#f8ae2a] w-fit sm:w-[43vw] p-4 center text-center hover:bg-[#fb8500] "
                type="submit">Envoyer</button>
        </form>
    </div>
@stop


