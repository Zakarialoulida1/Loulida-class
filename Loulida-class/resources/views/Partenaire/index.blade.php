@extends('layouts.master')

@section('title', 'Partenaire')

@section('content')


    <div id="teacherForm">
        
        <div class="flex items-center md m-24 justify-center">
            <div class="shadow-2xl rounded-md m-8  w-[90%]  sm:w-[80%] ">
                <div class="flex flex-col sm:flex-row items-center mb-8   w-full sm:justify-around ">
                    <form method="POST" action="{{ route('teacher.submit') }}" enctype="multipart/form-data">
                        @csrf

                        <h1 class="text-center m-4 text-3xl underline">Devenir Professeur </h1>
                        <input type="text" name="type" class="hidden" value="Teacher">

                        <div class="input__wrapper">
                            <input id="Address" type="text" name="Address" placeholder="Your Address"
                                title="Please provide your address" class="input__field w-[43vw]  xl:w-[43vw]">
                            <label for="Address" class="input__label">Address</label>
                        </div>
                        @error('Address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="input__wrapper">
                            <input id="Phone" type="Phone" name="Phone" placeholder="Your Phone"
                                title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                                class="input__field w-[43vw]  xl:w-[43vw]">
                            <label for="Phone" class="input__label">Phone</label>
                        </div>
                        @error('Phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input__wrapper ">
                            <textarea id="Description" name="Description" title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                                class="input__field  w-[43vw]  xl:w-[43vw] "></textarea>
                            <label for="Description" class="input__label">Description</label>
                        </div>
                        @error('Description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input__wrapper">
                            <input id="cv" type="file" name="cv" placeholder="Your Cv"
                                class="input__field  w-[43vw]  xl:w-[43vw]">

                            <label for="Cv" class="input__label">Télecharger Votre Cv</label>
                        </div>
                        @error('cv')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror


                        <div class="input__wrapper">
                            <input id="facebookName" type="text" name="Social_Media[facebookName]"
                                placeholder="Your Facebook Name" class="input__field w-[43vw]  xl:w-[43vw]">
                            <label for="facebookName" class="input__label">Facebook Name</label>
                        </div>
                        <div class="input__wrapper">
                            <input id="instagramName" type="text" name="Social_Media[instagramName]"
                                placeholder="Your Instagram Name" class="input__field w-[43vw]  xl:w-[43vw]">
                            <label for="instagramName" class="input__label">Instagram Name</label>
                        </div>
                        <div class="input__wrapper">
                            <input id="linkedinName" type="text" name="Social_Media[linkedinName]"
                                placeholder="Your LinkedIn Name" class="input__field w-[43vw]  xl:w-[43vw]">
                            <label for="linkedinName" class="input__label">LinkedIn link</label>
                        </div>
                        <div class="input__wrapper">
                            <select name="matiere_id" required class="input__field  w-[43vw]  xl:w-[43vw] ">
                                <option value="" disabled selected>Select a Profession </option>
                                @foreach ($matieres as $matiere)
                                    <option class="" value="{{ $matiere->id }}">{{ $matiere->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('matiere_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <button class=" mt-4 bg-[#f8ae2a] w-fit sm:w-[43vw] p-4 center text-center hover:bg-[#fb8500] "
                            type="submit"> Envoyer </button>

                    </form>
                </div>
            </div>
        </div>

    </div>


@stop
