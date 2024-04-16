@extends('layouts.master')

@section('title', 'créer_un_Cours')

@section('content')


    @foreach ($cycles as $cycle)
        <div class="m-8">

            <button class="cycle-toggle flex  text-semibold text-3xl"> <img class="w-8"
                    src="{{ asset('images/folder.png') }}" alt="">
                {{ $cycle->name }}</button>
            <div class="cycle-matieres flex flex-col" style="display: none;">
                @foreach ($cycle->matieres as $matiere)
                    <div class="ml-8">
                        <button class="matiere-toggle flex items-center text-semibold text-xl">
                            <img class="w-10 " src="{{ asset('images/appris.png') }}" alt="">
                            {{ $matiere->name }}</button>
                        <div class="matiere-cours" style="display: none;">
                            @php
                                $hasCours = $matiere->cours->contains(function ($value) use ($matiere, $cycle) {
                                    return $value->matiere_id === $matiere->id &&
                                        $value->cycle_educative_id === $cycle->id;
                                });
                            @endphp
                            @if ($hasCours)
                                <table
                                    class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>

                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Course Title</th>
                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Course Files</th>

                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Exercise Files</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-t">


                                        @foreach ($matiere->cours as $course)
                                            @if ($course->cycle_educative_id === $cycle->id)
                                                <tr class="divide-x-2">
                                                    <td
                                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        {{ $course->title }}</td>

                                                    <td
                                                        class="p-2  relative align-middle bg-transparent border-b  dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        @if ($course->coursFiles->isNotEmpty())
                                                            <ul class="underline text-red-500 text  flex  ">
                                                                @foreach ($course->coursFiles as $file)
                                                                    <li class="m-4">
                                                                        <div class="relative w-fit">
                                                                            <a href="{{ asset('storage/' . substr($file->path, 7)) }}"
                                                                                target="_blank">
                                                                                <img class="w-10 inline-block align-middle"
                                                                                    src="{{ asset('images/pdf.png') }}"
                                                                                    alt="PDF">

                                                                            </a>
                                                                            <!-- Delete button -->
                                                                            <form class="absolute -top-2 -right-2"
                                                                                action=" {{ route('cours-files.destroy', $file->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button>
                                                                                    <svg class="w-5 h-5 text-red-500 "
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                                        <path fill="#d70f0f"
                                                                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                                                    </svg>
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <h1> No file Exist</h1>
                                                        @endif

                                                        <!-- Add icon (+) SVG -->
                                                        <svg class="w-8 h-8 text-green-500 cursor-pointer bottom-2 right-2 absolute add-file-icon"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="12" y1="8" x2="12"
                                                                y2="16"></line>
                                                            <line x1="8" y1="12" x2="16"
                                                                y2="12"></line>
                                                        </svg>

                                                        <!-- Form for adding a file -->
                                                        <div
                                                            class=" w-50 modal hidden fixed inset-0 flex items-center justify-center z-50">
                                                            <div
                                                                class=" relative bg-gray-200 rounded-lg p-8 max-w-md w-full">
                                                                <form action="{{ route('add-file') }}" method="post"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="course_id"
                                                                        value="{{ $course->id }}">
                                                                    <div class="input__wrapper">
                                                                        <label for="course_files"
                                                                            class="input__label">Course Files:</label>
                                                                        <input type="file" id="course_files"
                                                                            name="course_files[]" multiple
                                                                            class="input__field ">
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="bg-blue-500 text-white m-4 px-4 py-2 rounded">Add
                                                                        File</button>
                                                                </form>
                                                                <button
                                                                    class="absolute top-0 right-0 mt-4 mr-4 text-red-500 close-modal text-3xl">&times;</button>


                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td
                                                        class="p-2 relative align-middle bg-transparent border-b dark:border-white/40  shadow-transparent">
                                                        @if ($course->exerciseFiles->isNotEmpty() && $course->cycle_educative_id === $cycle->id)
                                                            <ul class="underline text-blue-500 text">
                                                                @foreach ($course->exerciseFiles as $file)
                                                                    <li>
                                                                        <div class="flex m-2 ">
                                                                            <div class="relative w-fit"> <a
                                                                                    href="{{ asset('storage/' . substr($file->path, 7)) }}"
                                                                                    target="_blank"> <img
                                                                                        class="w-10 inline-block align-middle"
                                                                                        src="{{ asset('images/pdf.png') }}"
                                                                                        alt="PDF"></a>
                                                                                <form class="absolute -top-2 -right-2"
                                                                                    action="{{ route('exercise-files.destroy', $file->id) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <button>
                                                                                        <svg class="w-5 h-5 text-red-500"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 0 448 512">
                                                                                            <path fill="#d70f0f"
                                                                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                                                        </svg>
                                                                                    </button>
                                                                                </form>
                                                                            </div>

                                                                            @foreach ($file->correctionFiles as $correctionFile)
                                                                                <h1 class="underline-none"> -(correction)->
                                                                                </h1>
                                                                                <a href="{{ asset('storage/' . substr($file->correctionFiles, 7)) }}"
                                                                                    target="_blank"> <img
                                                                                        class="w-10 inline-block align-middle"
                                                                                        src="{{ asset('images/pdf.png') }}"
                                                                                        alt="PDF"></a>
                                                                            @endforeach


                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                        <svg class="w-8 h-8 text-green-500 cursor-pointer bottom-2 right-2 absolute add-exercise-file-icon"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="12" y1="8" x2="12"
                                                                y2="16"></line>
                                                            <line x1="8" y1="12" x2="16"
                                                                y2="12"></line>
                                                        </svg>

                                                        <div
                                                            class="exercice-forms hidden modal fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                                                            <div
                                                                class="relative bg-gray-200 rounded-lg p-8 max-w-md w-full">
                                                                <div class=" flex justify-around"> <button
                                                                        id="exercise-files-with-correction-btn"
                                                                        class=" w-32 bg-blue-500 text-white m-4 px-4 py-2 rounded">Add
                                                                        Exercise Files with Correction</button>

                                                                    <!-- Button to choose the form for exercise files without correction -->
                                                                    <button id="exercise-files-without-correction-btn"
                                                                        class="w-32 bg-blue-500 text-white m-4 px-4 py-2 rounded">Add
                                                                        Exercise Files without Correction</button>
                                                                </div>
                                                                <!-- Form for adding an exercise file -->
                                                                <div class="hidden exercise-file-form-with-correction ">
                                                                    <div
                                                                        class="bg-gray-200 rounded-lg p-8 max-w-md w-full">
                                                                        <form
                                                                            action="{{ route('exercise-files-with-correction.store') }}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="course_id"
                                                                                value="{{ $course->id }}">
                                                                            <div class="input__wrapper">
                                                                                <label for="exercise_files_with_correction"
                                                                                    class="input__label">Exercise Files
                                                                                    (with correction)
                                                                                    :</label>
                                                                                <input type="file"
                                                                                    id="exercise_files_with_correction"
                                                                                    name="exercise_files_with_correction[]"
                                                                                    multiple class="input__field">
                                                                            </div>
                                                                            <!-- Add input for correction files if needed -->
                                                                            <div class="input__wrapper">
                                                                                <label for="correction_files"
                                                                                    class="input__label">Correction
                                                                                    Files:</label>
                                                                                <input type="file"
                                                                                    id="correction_files"
                                                                                    name="correction_files[]" multiple
                                                                                    class="input__field">
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="bg-blue-500 text-white m-4 px-4 py-2 rounded">Add
                                                                                File</button>
                                                                        </form>
                                                                    </div>
                                                                </div>

                                                                <!-- Form for adding an exercise file without correction -->
                                                                <div class="hidden exercise-file-form-without-correction ">
                                                                    <div
                                                                        class="bg-gray-200 rounded-lg p-8 max-w-md w-full">
                                                                        <form action="{{ route('exercise-files.store') }}"
                                                                            method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="course_id"
                                                                                value="{{ $course->id }}">
                                                                            <div class="input__wrapper">
                                                                                <label
                                                                                    for="exercise_files_without_correction"
                                                                                    class="input__label">Exercise Files
                                                                                    (without correction):</label>
                                                                                <input type="file"
                                                                                    id="exercise_files_without_correction"
                                                                                    name="exercise_files_without_correction[]"
                                                                                    multiple class="input__field">
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="bg-blue-500 text-white m-4 px-4 py-2 rounded">Add
                                                                                File</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <button
                                                                    class="absolute top-0 right-0 mt-4 mr-4 text-red-500 close-modal text-3xl">&times;</button>

                                                            </div>




                                                        </div>
                                                    </td>

                                                    <td
                                                        class="  bg-transparent border-b  shadow-transparent">
                                                        <!-- Delete button for the course -->
                                                        <form action="{{ route('courses.destroy', $course->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="m-4">
                                                                <svg class="w-5 h-5 text-red-500"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 448 512">
                                                                    <path fill="#d70f0f"
                                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                                </svg>
                                                            </button>
                                                        </form>


                                                        <!-- Update button -->
                                                        <button class="m-4 update-course-icon ">
                                                            <svg class="w-6 h-5 " xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                                <path fill="#00b303"
                                                                    d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1 .8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z" />
                                                            </svg>
                                                        </button>

                                                        <!-- Form for updating the course -->
                                                        <div
                                                            class="hidden update-course-form modal fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                                                            <div
                                                                class="relative bg-gray-200 rounded-lg p-8 max-w-md w-full">
                                                                 <div
                                                                        class="bg-gray-200 rounded-lg  max-w-md w-full">
                                                                        <h1 class="text-center text-bold text-2xl" >Update Your cours</h1>
                                                                <form  action="{{ route('courses.update', $course->id) }}"
                                                                    method="post" class="flex mt-4 mr-4 flex-col">
                                                                    @csrf
                                                                    @method('put')
                                                                    <!-- Populate the form fields with existing course information -->
                                                                  
                                                                <!-- Add other course fields here -->
                                                                 
                                                                       
                                                                        <div class=" ml-4  input__wrapper">
                                                                            <label
                                                                                
                                                                                class=" bg-gray-200 text-black border-b input__label">
                                                                                Cours Description</label>
                                                                                <textarea name="description"  
                                                                               class=" w-full input__field">{{ $course->description }}</textarea>
                                                                  
                                                                        </div>

                                                                        <div class=" ml-4 input__wrapper">
                                                                            <label
                                                                                
                                                                                class="bg-gray-200 text-black  border-b input__label">
                                                                                Title</label>
                                                                            <input type="text" name="title"
                                                                                multiple class="  w-full input__field"   value="{{ $course->title }}">
                                                                        </div>

                                                                        <button type="submit"
                                                                        class="bg-blue-500 text-white m-4 px-4 py-2 rounded">Update
                                                                </form>
                                                                <button
                                                                    class="absolute top-0 right-0 mt-4 mr-4 text-red-500 close-modal text-3xl">&times;</button>
                                                            </div>
                                                        </div>

                                                    </td>


                                                </tr>
                                            @endif
                                        @endforeach




                                    </tbody>
                                </table>
                            @else
                                <h1 class="text-center text-red-400 text-capitalize  text-black"> Aucun Cours Créer jusqu'a
                                    maintenant</h1>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <hr>
    @endforeach

    <script>
        // Add event listener to toggle the cycle matières visibility
        document.querySelectorAll('.cycle-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const cycleMatieres = this.nextElementSibling;
                cycleMatieres.style.display = cycleMatieres.style.display === 'none' ? 'block ' : 'none';
            });
        });

        // Add event listener to toggle the matière cours visibility
        document.querySelectorAll('.matiere-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const matiereCours = this.nextElementSibling;
                matiereCours.style.display = matiereCours.style.display === 'none' ? 'block' : 'none';
            });
        });

        // Add event listener to toggle the course files visibility
        document.querySelectorAll('.course-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const courseFiles = this.nextElementSibling;
                courseFiles.style.display = courseFiles.style.display === 'none' ? 'block' : 'none';
            });
        });
        document.querySelectorAll('.add-file-icon').forEach(icon => {
            icon.addEventListener('click', function() {
                const form = this.nextElementSibling;
                form.classList.toggle('hidden');
            });
        });

        document.querySelectorAll('.close-modal').forEach(button => {
            button.addEventListener('click', function() {
                const modal = this.closest('.modal');
                modal.classList.add('hidden');
            });
        });


        document.querySelectorAll('.add-exercise-file-icon').forEach(icon => {
            icon.addEventListener('click', function() {
                const exerciseForms = document.querySelector('.exercice-forms');
                exerciseForms.classList.toggle('hidden');
            });
        });

        // Add event listeners to choose between exercise forms
        document.getElementById('exercise-files-with-correction-btn').addEventListener('click', function() {
            const formWithCorrection = document.querySelector('.exercise-file-form-with-correction');
            const formWithoutCorrection = document.querySelector('.exercise-file-form-without-correction');
            formWithCorrection.classList.remove('hidden');
            formWithoutCorrection.classList.add('hidden');
        });

        document.getElementById('exercise-files-without-correction-btn').addEventListener('click', function() {
            const formWithCorrection = document.querySelector('.exercise-file-form-with-correction');
            const formWithoutCorrection = document.querySelector('.exercise-file-form-without-correction');
            formWithCorrection.classList.add('hidden');
            formWithoutCorrection.classList.remove('hidden');
        });

        // Add event listener to close the modal
        document.querySelectorAll('.close-modal').forEach(button => {
            button.addEventListener('click', function() {
                const modal = this.closest('.modal');
                modal.classList.add('hidden');
            });
        });


        document.querySelectorAll('.update-course-icon').forEach(icon => {
            icon.addEventListener('click', function() {
                const form = this.nextElementSibling;
                form.classList.toggle('hidden');
            });
        });

        // Add event listener to close the modal
        document.querySelectorAll('.close-modal').forEach(button => {
            button.addEventListener('click', function() {
                const modal = this.closest('.modal');
                modal.classList.add('hidden');
            });
        });
    </script>


@endsection
