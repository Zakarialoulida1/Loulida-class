@extends('layouts.master')

@section('title', 'profile')

@section('content')





    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<main class="profile-page">
  <section class="relative block h-500-px">
    <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80');
          ">
          
      <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
    </div>
    <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
      <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
        <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </section>
  <section class="relative  py-16 bg-blueGray-200">
    <div class="container  mx-auto px-4">
      <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
        <div class="px-6">
          <div class="flex m-4 flex-wrap justify-center">
            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
              <div class="relative">
                <img src="{{ asset('images/' . $user->image) }}" alt="User Image" class="w-36 h-36 object-cover rounded-full">
            </div>
            </div>
            <div class="w-full flex items-center justify-center lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
              <div class="py-6  px-3 mt-32 sm:mt-0">
                <button id="editButton" class="bg-orange-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                 Edit
                </button>
              </div>
            </div>
            <div class="w-full lg:w-4/12 px-4 lg:order-1">
              <div class="flex justify-center py-4 lg:pt-4 pt-8">
                  
               
                <div class="mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $formationcount }}</span><span class="text-sm text-blueGray-400">Formation{{ auth()->user()->role === 'Etudiant' ? 'payée' : 'Disponible' }}  </span>
                </div> 
                
                  
                <?php if (partner()): ?>
                <div class="mr-4 p-3 text-center">
                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"><?php echo $courscount; ?></span>
                    <span class="text-sm text-blueGray-400">Cours</span>
                </div>
            <?php endif; ?>
                @if (auth()->user()->role === 'admin')
                     <div class="lg:mr-4 p-3 text-center">
                  <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $partnerCount }}</span><span class="text-sm text-blueGray-400">Nombre Des Professeur</span>
                </div>  
                <div class="lg:mr-4 p-3 text-center">
                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{ $etudiantCount }}</span><span class="text-sm text-blueGray-400">Nombre Des Etudiant</span>
                  </div>  
                @endif
             
              </div>
            </div>
          </div>
          <div class="text-center mt-12">
            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                {{ $user->name }}
            </h3>
            <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
              <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
              {{ $user->address ? $user->address : ' Edit Your profile Adress' }} 
            </div>
            <div class="mb-2 text-blueGray-600 mt-10">
              <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400">{{ $user->role }}</i>  
            </div>
            <?php if (partner()): ?>
            <div class="mb-2 text-blueGray-600">
            
                <i class="fas fa-university mr-2 text-lg text-blueGray-400"> <span class="text-black" ><?php echo partner()->matiere->name; ?></span></i>
            </div>
        <?php endif; ?>
            <div class="mb-2 text-blueGray-600 mt-10">
                <i class="fas fa-phone mr-2 text-lg text-blueGray-400">{{ $user->phone ? $user->phone : ' Set Your phone ' }} </i>
           </div>
         
       
           
          </div>
          <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
            <div class="flex flex-wrap justify-center">
              <div class="w-full lg:w-9/12 px-4">
                <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                
                    {{ $user->description ? $user->description : 'you can Edit Your profile Description' }} 
            
                </p>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
  </section>
</main>








<div id="editFormContainer" class="  hidden modal fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
    <form class="bg-white p-8 rounded-lg" action="{{ route('profile.update') }}" enctype="multipart/form-data" method="POST">
     
 @csrf
    <!-- Image field -->
    <div class="input__wrapper w-full  -ml-2 mb-46">
        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-50 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                @if ($user->image)
                    <img src="{{ asset('images/' . $user->image) }}" alt="User Image" class="w-36 h-36 object-cover rounded-full">
                @else
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg> @endif
                <p class="mb-2
        text-sm text-gray-500 dark:text-gray-400 w-full"><span class="font-semibold">Click to upload</span> or drag and drop
    </p>
    <p class="text-xs text-gray-500 dark:text-gray-400 w-full">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
    </div>
    <input id="dropzone-file" name="image" type="file" class="w-full hidden" onchange="displayFileName(this)" />
    </label>
    </div>

    <!-- Name field -->
    <div class="mt-28 mt-56 input__wrapper ">
        <label class="input__label" for="name">Name</label>
        <input type="text" name="name" id="name" class="input__field w-[65vw] md:w-[40vw]"
            value="{{ $user->name }}">
    </div>

    <!-- Email field -->
    <div class="input__wrapper ">
        <label class="input__label" for="email">Email</label>
        <input type="email" name="email" id="email" class="input__field w-[65vw] md:w-[40vw]"
            value="{{ $user->email }}">
    </div>

    <!-- Address field -->
    <div class="input__wrapper ">
        <label class="input__label" for="address">Address</label>
        <input type="text" name="address" id="address" class="input__field w-[65vw] md:w-[40vw]"
            value="{{ $user->address }}">
    </div>

    <!-- Phone field -->
    <div class="input__wrapper ">
        <label class="input__label" for="phone">Phone</label>
        <input type="text" name="phone" id="phone" class="input__field w-[65vw] md:w-[40vw]"
            value="{{ $user->phone }}">
    </div>

    <!-- Description field -->
    <div class="input__wrapper ">
        <label class="input__label" for="description">Description</label>
        <textarea name="description" id="description" class="input__field w-[65vw] md:w-[40vw]">{{ $user->description }}</textarea>
    </div>

    <button class="m-4 bg-[#f8ae2a] w-[50vw] sm:w-[25vw] mx-auto p-4 text-center hover:bg-[#fb8500]"
        type="submit">Update</button>
    </form>
    <button class="absolute top-0 right-0 mt-4 mr-4 text-red-500 close-modal text-3xl">&times;</button>

    </div>
    <script>
        const editButton = document.querySelector('#editButton');
        const editFormContainer = document.querySelector('#editFormContainer');

        editButton.addEventListener('click', function() {
            editFormContainer.classList.toggle('hidden');
        });

        function displayFileName(input) {
            const fileName = input.files[0].name;
            const fileLabel = input.parentElement.querySelector('.file-label');
            fileLabel.textContent = fileName;
        }


        document.querySelectorAll('.close-modal').forEach(button => {
            button.addEventListener('click', function() {
                const modal = this.closest('.modal');
                modal.classList.add('hidden');
            });
        });
    </script>
@endsection
