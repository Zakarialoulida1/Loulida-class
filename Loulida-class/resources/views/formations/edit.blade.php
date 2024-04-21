<!-- formations/edit.blade.php -->
@extends('layouts.master')

@section('content')
    <div class="flex items-center justify-center">
        <div class="shadow-2xl flex flex-col items-center mt-4 justify-center rounded-md m-8 w-[90%] sm:w-[80%]">
            <h1 class="text-center m-4 text-3xl underline">Update Formation</h1>
            @if ($errors->any())
                <div class="text-red">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="flex flex-col items-center justify-center" action="{{ route('formations.update', $formation->id) }}"
                enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->
                <!-- Image field -->
                <div class="input__wrapper w-full -ml-2 mb-36">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-50 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            @if ($formation->image)
                                <img src="{{ asset('formation/' . $formation->image) }}" alt="Formation Image"
                                    class="w-36 h-36 object-cover rounded-full">
                            @else
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                            @endif
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 w-full"><span
                                    class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 w-full">SVG, PNG, JPG or GIF
                                (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" name="image" type="file" class="w-full hidden" />
                    </label>
                </div>

                <!-- Cycle Educative field -->
                <div class="input__wrapper mt-28 ">
                    <label class="input__label">Cycle Educative</label>
                    <select name="cycle_educative_id" id="cycle_educative_id" class="input__field w-[65vw] md:w-[40vw] ">
                        @foreach ($cycles as $cycle)
                            <option value="{{ $cycle->id }}" {{ $cycle->id == $formation->cycle_educative_id ? 'selected' : '' }}>{{ $cycle->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Matieres field -->
                <div class="  w-[65vw] md:w-[40vw] form-group flex flex-wrap ">
                    <label>Matieres</label><br>
                    <!-- Matieres checkboxes will be dynamically populated here -->
                    @foreach ($matieres as $matiere)
                        <div class="flex w-fit items-center  flex-wrap gap-4 mr-2">
                            <input type="checkbox" name="matieres[]" id="matiere_{{ $matiere->id }}"
                                value="{{ $matiere->id }}" {{ in_array($matiere->id, $formation->matieres->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <span for="matiere_{{ $matiere->id }}">{{ $matiere->name }}</span>
                        </div>
                    @endforeach
                </div>

                <!-- Available Place field -->
                <div class="input__wrapper ">
                    <label class="input__label" for="available_place">Available Place</label>
                    <input type="number" name="available_place" id="available_place" class="input__field w-[65vw] md:w-[40vw]"
                        min="1" value="{{ $formation->available_place }}">
                </div>

                <!-- Price field -->
                <div class="input__wrapper ">
                    <label class="input__label" for="price">Price</label>
                    <input type="number" name="price" id="price" class="input__field w-[65vw] md:w-[40vw]"
                        min="1" value="{{ $formation->price }}">
                </div>

                <!-- Duration field -->
                <div class="input__wrapper flex ">
                    <label for="duration_months" class="input__label">duration_months (in Months)</label>
                    <input type="number" name="duration_months" id="duration_months" class="input__field w-[65vw] md:w-[40vw]"
                        min="0" step="0.01" value="{{ $formation->duration_months }}">
                </div>

                <!-- Description field -->
                <div class="input__wrapper ">
                    <label for="description" class="input__label">Description</label>
                    <textarea name="description" id="description" class="input__field w-[65vw] md:w-[40vw]">{{ $formation->description }}</textarea>
                </div>

                <button class="m-4 bg-[#f8ae2a] w-[50vw] sm:w-[25vw] mx-auto p-4 text-center hover:bg-[#fb8500]"
                    type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
