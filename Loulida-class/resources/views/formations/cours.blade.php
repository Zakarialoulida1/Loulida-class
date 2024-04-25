@extends('layouts.master')

@section('title', 'créer_un_Cours')

@section('content')

<div class="min-h-[60vh] ">
    @foreach ($cycles as $cycle)
        <div class="m-8">

            <button class="cycle-toggle flex  text-semibold text-3xl"> <img class="w-8"
                    src="{{ asset('images/folder.png') }}" alt="">
                {{ $cycle->name }}(  {{ $cycle->cycleEducative->name }})</button>
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
                                        $value->cycle_educative_id === $cycle->cycleEducative->id;
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
                                            @if ($course->cycle_educative_id === $cycle->cycleEducative->id)
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
                                                                           
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <h1> No file Exist</h1>
                                                        @endif

                                                    

                                       
                                                    </td>

                                                    <td
                                                        class="p-2 relative align-middle bg-transparent border-b dark:border-white/40  shadow-transparent">
                                                        @if ($course->exerciseFiles->isNotEmpty() && $course->cycle_educative_id === $cycle->cycleEducative->id)
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
                                                                            
                                                                            </div>

                                                                            @foreach ($file->correctionFiles as $correctionFile)
                                                                                <h1 class="underline-none"> -->
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
</div>
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
