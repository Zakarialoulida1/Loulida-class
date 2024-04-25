@extends('layouts.master')

@section('title', 'créer_un_Cours')

@section('content')

<div class="flex items-center mt-4 justify-center">
    <div class="shadow-2xl  flex flex-col items-center mt-4 justify-center rounded-md m-8 w-[90%] sm:w-[80%]">
        <h1 class="text-center m-4 text-3xl underline">Créer un Cours</h1>
        <form class="flex flex-col items-center justify-center" method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data" id="addCourseForm">
            @csrf

            <div class="input__wrapper">
                <label for="title" class="input__label">Title:</label>
                <input type="text" id="title" name="title" required class="input__field xl:w-[30vw]">
            </div>

            <div class="input__wrapper">
                <label for="description" class="input__label">Description:</label>
                <textarea id="description" name="description" required class="input__field xl:w-[30vw]"></textarea>
            </div>
        

            <div class="input__wrapper text-bold text-black">
                <label for="cycle_educative_id" class="input__label">Cycle éducatif:</label>
                <select id="cycle_educative_id" name="cycle_educative_id" required class="input__field xl:w-[30vw]">
                    <option value="" disabled selected>Select a Cycle </option>
                    @foreach($cycle_educatives as $cycle_educative)
                    <option class="" value="{{ $cycle_educative->id }}">{{ $cycle_educative->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input__wrapper text-bold text-black">
                <label for="matiere_id" class="input__label">Matière:</label>
                <input id="matiere_id" name="matiere_id" type="hidden" required class="input__field xl:w-[30vw]" value="{{ $matiereteacher->id }}">
                </input>
                <input id="matiere_id" disabled required class="input__field xl:w-[30vw]" disabled  value="{{ $matiereteacher->name }}">
                
            </div>

            <div class="input__wrapper">
                <label for="course_files" class="input__label">Course Files:</label>
                <input type="file" id="course_files" name="course_files[]" multiple class="input__field xl:w-[30vw]">
            </div>

            <div class="input__wrapper">
                <label for="exercise_files" class="input__label">Exercise Files (optional):</label>
                <input type="file" id="exercise_files" name="exercise_files[]" multiple class="input__field xl:w-[30vw]">
            </div>

            <button class="m-4 bg-[#f8ae2a] w-[50vw] sm:w-[25vw] mx-auto p-4  text-center hover:bg-[#fb8500]" type="submit">Submit</button>
        </form>
    </div>
</div>

<script>
    
</script>

@stop
