@extends('layouts.master')

@section('title', 'profile')

@section('content')
<form class="flex flex-col items-center justify-center" action="{{ route('profile.update') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <!-- Image field -->
    <div class="input__wrapper w-full  -ml-2 mb-36">
        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-50 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                @if ($user->image)
                    <img src="{{ asset('images/' . $user->image) }}" alt="User Image" class="w-36 h-36 object-cover rounded-full">
                @else
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                @endif
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 w-full"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400 w-full">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            </div>
            <input id="dropzone-file" name="image" type="file" class="w-full hidden" onchange="displayFileName(this)" />
        </label>
    </div>

    <!-- Name field -->
    <div class="mt-28 input__wrapper ">
        <label class="input__label" for="name">Name</label>
        <input type="text" name="name" id="name" class="input__field w-[65vw] md:w-[40vw]" value="{{ $user->name }}">
    </div>

    <!-- Email field -->
    <div class="input__wrapper ">
        <label class="input__label" for="email">Email</label>
        <input type="email" name="email" id="email" class="input__field w-[65vw] md:w-[40vw]" value="{{ $user->email }}">
    </div>

    <!-- Address field -->
    <div class="input__wrapper ">
        <label class="input__label" for="address">Address</label>
        <input type="text" name="address" id="address" class="input__field w-[65vw] md:w-[40vw]" value="{{ $user->address }}">
    </div>

    <!-- Phone field -->
    <div class="input__wrapper ">
        <label class="input__label" for="phone">Phone</label>
        <input type="text" name="phone" id="phone" class="input__field w-[65vw] md:w-[40vw]" value="{{ $user->phone }}">
    </div>

    <!-- Description field -->
    <div class="input__wrapper ">
        <label class="input__label" for="description">Description</label>
        <textarea name="description" id="description" class="input__field w-[65vw] md:w-[40vw]">{{ $user->description }}</textarea>
    </div>

    <button class="m-4 bg-[#f8ae2a] w-[50vw] sm:w-[25vw] mx-auto p-4 text-center hover:bg-[#fb8500]" type="submit">Update</button>
</form>

<script>  
function displayFileName(input) {
    const fileName = input.files[0].name;
    const fileLabel = input.parentElement.querySelector('.file-label');
    fileLabel.textContent = fileName;
}</script>
@endsection