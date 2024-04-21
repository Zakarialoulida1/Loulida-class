@extends('layouts.master')

@section('content')
    <div class="flex justify-center m-4 mt-24">
        <div>
            <h1 class="text-2xl text-center text-green-500"> Explore programs </h1>
            <h1 class="text-5xl text-center"> Our Most Popular Class</h1>
            <p class="text-base text-gray-500 mt-4">Let's join our famous class, the knowledge provided will
                definitely
                be useful for you.</p>
        </div>
    </div>
    <form id="filterForm" class="m-8 flex md:flex-row md:items-center flex-col justify-center items-center  md:justify-around">
        @csrf
        <div class="input__wrapper text-bold text-black">
            <label for="cycle_educative_id" class="input__label">Cycle éducatif:</label>
            <select id="cycle_educative_id" name="cycle_educative_id" required class="input__field xl:w-[30vw]">
                <option value="" disabled selected>Select a Cycle</option>
                @foreach ($cycle_educatives as $cycle_educative)
                    <option value="{{ $cycle_educative->id }}">{{ $cycle_educative->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="input__wrapper text-bold text-black">
            <label for="matiere_id" class="input__label">Matière:</label>
            <select id="matiere_id" name="matiere_id" required class="input__field xl:w-[30vw]">
                <option value="" disabled selected>Select a Matiere File</option>
                <!-- Options will be dynamically populated based on selected cycle_educative -->
            </select>
        </div>

        <button type="submit" class="bg-[#fb8500] p-4 rounded mt-4">Apply Filter</button>
    </form>


    <div class="Formations grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 md:gap-2 xl:grid-cols-3 gap-8 m-4">

    </div>



    <div id="formationModal" class="hidden  fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center md:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal panel -->
            <span class="hidden  sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block w-[70vw] align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-[90vw] lg:w-[60vw] "
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <!-- Modal content -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <!-- Formation Image -->
                        <img id="modalFormationImage" class="rounded-md h-56 w-full sm:h-64 sm:w-64 mx-auto" src=""
                            alt="Formation Image">

                        <!-- Formation Details -->
                        <div class="mt-3 text-center sm:text-left sm:mt-0 sm:ml-4">
                            <h3 id="modalFormationTitle" class="text-lg leading-6 font-medium text-gray-900"></h3>
                            <p id="modalFormationDescription" class="mt-2 text-base text-gray-500"></p>
                            <div>
                                Sur Cette formation tu vas benificier de ces matieres (

                                <span id="modalFormationmatires">

                                </span>)
                            </div>
                            <div>



                                <div class="flex items-center divide-x-2 divide-blue-400 justify-between m-4">

                                    <p class="w-fit flex flex-col ">

                                        <span> Pour Une Durée de
                                            <span id="duration" class="">
                                            </span>



                                         Mois</span>


                                        <span>Abbonner vous et rejoignez Notre Equipe Pour L'Execellence
                                        </span>

                                    </p>

                                    <h1 id="price" class="text-2xl p-2 text-green-500"></h1>

                                </div>
                                <button id="paymentButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Make Payment
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal footer -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button id="closeModalBtn" type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#fb8500] text-base font-medium text-white hover:bg-[#fb8500] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#fb8500] sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function() {

            let Formationstable = []; // Define formations at a higher scope

            loadMoreData();

            document.getElementById('cycle_educative_id').addEventListener('change', function() {
                var cycleId = this.value;
                var matiereSelect = document.getElementById('matiere_id');
                matiereSelect.innerHTML = ''; // Clear previous options
                console.log(@json($matieresByCycle));
                // Populate matieres dropdown based on the selected cycle_educative
                var matieres = @json($matieresByCycle);
                var cycleMatieres = matieres[cycleId];

                cycleMatieres.forEach(function(matiere) {
                    var option = document.createElement('option');
                    option.value = matiere.id;
                    option.textContent = matiere.name;
                    matiereSelect.appendChild(option);
                });
            });


            function renderFormations(formations) {
                Formationstable = formations;
                const formationsContainer = document.querySelector('.Formations');
                formationsContainer.innerHTML = ''; // Clear existing formations
                formations.forEach(formation => {
                    let matieresHTML =
                        ''; // Initialize an empty string to store HTML for matieres

                    // Iterate over matieres array and create HTML elements for each matiere
                    formation.matieres.forEach(matiere => {
                        matieresHTML +=
                            `<span class=" bg-black text-white rounded p-1 m-1" >${matiere.name}</span>`;
                    });

                    formationsContainer.innerHTML += `
       
                    <div class="formation-card xl:w-[28vw] lg:w-[40vw] rounded-lg shadow-2xl bg-gray-100 cursor-pointer" data-formation-id="${formation.id}">
     
                      
                                <div class="p-4 relative">
               
                                    <!-- Formation Image -->
               
                                    <img class="rounded-md h-56 w-full" src="formation/${formation.image}" alt="Formation Image">
                
                                    <!-- Duration -->
                
                                    <div class="absolute rounded bg-gray-200 right-6 top-6">
                  
                  
                                        <div class="p-1">
                     
                                            <div class="flex">
                         
                                                <img class="w-6 mr-4 shadow-2xl" src="{{ asset('images/clock_2784459.png') }}" alt="">
                         
                                                <h6>${formation.duration_months} hours</h6>
                        
                                            </div>
      
                                        </div>
      
                                    </div>
      
                                </div>
          
                                <div class="h-full pb-4">
                
                                    <!-- Formation Title -->
                
                                    <div class="mx-4 flex justify-between">
                    
                                        <h1 class="font-bold">${formation.cycle_educative.name}</h1>
                    
                                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        
                                            <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
                    
                                            </svg>
                
                                    </div>
                
                                    <!-- Formation Description -->
                
                                    <p class="mt-3 mx-4 h-[80px] text-base text-gray-500">${formation.description.substring(0, 100)}</p>
                
                                    <div class="flex ml-3">
                    
                                        <h3 class="p-md2 text-green-500"> 4,3</h3>
                    
                                        <!-- Insert star rating SVGs here -->
                   
                                        <span class="ml-4 p-md2 text-gray-500">${formation.available_place}</span>
                
                                    </div>
                
                                    <!-- Matieres -->
                
                
                
                                    <div class="flex items-center divide-x-2 divide-blue-400 justify-between m-4">
                
                                        <div class="w-fit flex">
                
                                            <!-- Formation Logo -->
                
                                            <img class="w-24" src="{{ asset('images/logos.png') }}" alt="">  
                
                                            <div class="ml-2 flex flex-wrap items-center">
                
                                                <!-- Matieres HTML -->
                
                                                ${matieresHTML}
                            
                
                                             </div>
                
                                        </div>
                
                                                <!-- Formation Price -->
                
                                        <h1 class="text-2xl p-2 text-green-500">${formation.price} DH</h1>
                
                                    </div>
                                    <a href="/formations/${formation.id}/edit" class="text-blue-500 z-20 hover:underline">Update Formation</a>

                
                
                                    <p class="mt-1 text-center text-gray-500">experience plus de 5 ans </p>
            
                                </div>
        
              
                             
                    
        
                                            
    `;
                });
            }
            // Function to fetch additional formations and partners via AJAX
            function loadMoreData() {
                fetch('/load-more-data')
                    .then(response => response.json())
                    .then(data => {
                        renderFormations(data.formations);
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            }






            document.getElementById('filterForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                var formData = new FormData(this);

                // Fetch filtered formations based on selected cycle educative and matiere via AJAX
                fetch('/filter-formations', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())

                    .then(data => {
                        console.log(data);
                        console.log(data);
                        // Update formations list with filtered data
                        renderFormations(data.formations);
                    })
                    .catch(error => {

                        console.error('Error filtering formations:', error);
                    });
            });



            document.querySelector('.Formations').addEventListener('click', function(event) {
                const formationCard = event.target.closest('.formation-card');
                if (formationCard) {
                    const formationId = formationCard.dataset.formationId;
                    console.log(formationId);
                    console.log(Formationstable);
                    const formation = Formationstable.find(f => f.id === parseInt(formationId));

                    let matieresHTML = '';

                    document.getElementById('modalFormationImage').src = `formation/${formation.image}`;
                    document.getElementById('modalFormationTitle').textContent = formation.cycle_educative
                        .name;
document.getElementById('modalFormationTitle').dataset.formationId =formationId
console.log(formationId);
                    document.getElementById('modalFormationDescription').textContent = formation
                        .description;
                    formation.matieres.forEach(matiere => {
                        matieresHTML += `<span class="  rounded p-1 m-1" >${matiere.name}</span>`;

                    });


                    document.getElementById('modalFormationmatires').innerHTML = matieresHTML;
                    document.getElementById('duration').textContent = formation.duration_months;
                    document.getElementById('price').textContent = formation.price;

                    // Show modal
                    document.getElementById('formationModal').classList.remove('hidden');
                }
            });

            document.getElementById('closeModalBtn').addEventListener('click', function() {
                document.getElementById('formationModal').classList.add('hidden');
            });
        });

// Payment Button Click Event
// Payment Button Click Event
document.getElementById('paymentButton').addEventListener('click', function() {
    // Extract formation details
    const formationId = document.getElementById('modalFormationTitle').dataset.formationId;
    
    // Redirect the user to the payment page with the formation ID as a parameter
    window.location.href = `/payments/create?formation_id=${formationId}`;
});

            // Close modal when clicking on close button
         
    </script>
@endsection
