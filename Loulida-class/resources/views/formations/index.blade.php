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
    <form id="filterForm"
        class="m-8 flex md:flex-row md:items-center flex-col justify-center items-center  md:justify-around">
        @csrf


        <select id="cycle_educative_id" name="cycle_educative_id" required class="input__field xl:w-[30vw]">
            <option value="" selected>Select a Cycle</option>
            <option value="all" >All Cycles</option> <!-- Add this option to select all cycles -->
            @foreach ($cycle_educatives as $cycle_educative)
                <option value="{{ $cycle_educative->id }}">{{ $cycle_educative->name }}</option>
            @endforeach
        </select>

        
        <select id="matiere_id" name="matiere_id" class="input__field xl:w-[30vw]">

            <option value="none">Select by Cycle Only</option> <!-- Add this option to select only by cycle -->
            <!-- Options will be dynamically populated based on selected cycle_educative -->
        </select>

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
            <div class="inline-block  align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-[90vw] lg:w-fit "
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <!-- Modal content -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <!-- Formation Image -->
                        <div class="flex flex-col">
                            <img id="modalFormationImage" class="rounded-md h-56 w-full mx-auto" src=""
                                alt="Formation Image">

                            <div class="flex items-center divide-x-2 divide-blue-400 justify-between m-4">

                                <p class="w-fit  ">

                                    <span> Durée :
                                        <span id="duration" class="">
                                        </span>
                                        Mois</span>
                                    </span>
                                </p>

                                <h1 id="price" class="text-2xl p-2 text-green-500"></h1>

                            </div>
                            <h1>Matieres :</h1>
                            <div id="modalFormationmatires"></div>
                        </div>
                        <!-- Formation Details -->
                        <div class="mt-3 text-center sm:text-left md:w-[20vw] sm:mt-0 sm:ml-4">
                            <h3 id="modalFormationTitle" class="text-lg leading-6 font-medium text-gray-900"></h3>
                            <p id="modalFormationDescription" class="mt-2  text-gray-500"></p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                </div>

                <!-- Modal footer -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button id="paymentButton" type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#fb8500] text-base font-medium text-white hover:bg-[#fb8500] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#fb8500] sm:ml-3 sm:w-auto sm:text-sm">
                        Make Payment
                    </button>
                    <button id="closeModalBtn" type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#fb8500] text-base font-medium text-white hover:bg-[#fb8500] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#fb8500] sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="userRole" data-role="{{ auth()->check() ? auth()->user()->role : '' }}"></div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
          loadMoreData();
            const userRole = document.getElementById('userRole').dataset.role;

            let Formationstable = []; // Define formations at a higher scope

           

            document.getElementById('cycle_educative_id').addEventListener('change', function() {
                var cycleId = this.value;
                var matiereSelect = document.getElementById('matiere_id');
                matiereSelect.innerHTML = ''; // Clear previous options

                // Add an "All Matieres" option to the matieres dropdown
                var allMatiereOption = document.createElement('option');
                allMatiereOption.value = "all";
                allMatiereOption.textContent = "All Matieres";
                matiereSelect.appendChild(allMatiereOption);

                // Check if the selected cycle is not "all" before populating matieres dropdown
                if (cycleId !== "all") {
                    // Populate matieres dropdown based on the selected cycle_educative
                    var matieres = @json($matieresByCycle);
                    var cycleMatieres = matieres[cycleId];

                    cycleMatieres.forEach(function(matiere) {
                        var option = document.createElement('option');
                        option.value = matiere.id;
                        option.textContent = matiere.name;
                        matiereSelect.appendChild(option);
                    });
                }
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

                    let formationHTML =  `
        <div class="formation-card xl:w-[28vw] lg:w-[40vw] rounded-lg shadow-2xl bg-gray-100" data-formation-id="${formation.id}">
            <div class="p-4 relative">
            
                <img class="rounded-md h-56 w-full" src="formation/${formation.image}" alt="Formation Image">
                <div class="absolute rounded bg-gray-200 right-6 top-6">
                    <div class="p-1">
                        <div class="flex">
                            <img class="w-6 mr-4 shadow-2xl" src="{{ asset('images/clock_2784459.png') }}" alt="">
                            <h6>${formation.duration_months} hours</h6>
                        </div>
                    </div>
                </div>
            </div>
            
             
                <div class="mx-4 flex justify-between">
                    <h1 class="font-bold">${formation.cycle_educative.name} </h1>

                    <span class="font-normal ">Groupe :( ${formation.name}) </span>
                    <svg class=" w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z" />
                    </svg>
                </div>
             <p class="mt-3 mx-4 h-[80px] text-base text-gray-500">${formation.description.substring(0, 100)}</p>
                <div class="flex ml-3">
                    <h3 class="p-md2 text-green-500"> Available place</h3>
                    <span class="ml-4 p-md2 text-gray-500">(${formation.available_place})</span>
                </div>
                 <div class="flex items-center divide-x-2 divide-blue-400 justify-between m-4">
                    <div class="w-fit flex">
                       
                        <div class="ml-2 flex flex-wrap items-center">
                            ${matieresHTML}
                        </div>
                    </div>
                    <h1 class="text-2xl p-2 text-green-500">${formation.price} DH</h1>
                </div>
                <div class="m-4 flex justify-around items-center">
                    <button class="view-details-button bg-[#fb8500] text-white px-4 py-2 rounded mt-2"> Details</button>
                    <a href="/payments/create?formation_id=${formation.id}" type="button"
                        class="bg-[#fb8500] text-white px-4 py-2 rounded mt-2">
                        Make Payment
                    </a>
              `;

                    if (userRole === 'admin') {
                        formationHTML += `
            
                <a href="/formations/${formation.id}/edit" class="bg-green-500 text-white px-4 py-2 rounded mt-2">Update</a>
                <button class="delete-button bg-red-500 text-white px-4 py-2 rounded mt-2">Delete</button>
            </div>
        `;
                    }


                    formationHTML += `</div>                     </div>`
                    formationsContainer.innerHTML += formationHTML
                });

                const viewDetailsButtons = document.querySelectorAll('.view-details-button');
                viewDetailsButtons.forEach((button, index) => {
                    button.addEventListener('click', function() {

                        openModal(formations[index]);
                    });
                });



                const deleteButtons = document.querySelectorAll('.delete-button');
                deleteButtons.forEach((button, index) => {
                    button.addEventListener('click', function() {

                        deleteFormation(formations[index].id);
                    });
                });
            }


            function openModal(formation) {

                document.getElementById('modalFormationImage').src = `formation/${formation.image}`;
                document.getElementById('duration').textContent = `${formation.duration_months} hours`;
                document.getElementById('price').textContent = `${formation.price} DH`;
                document.getElementById('modalFormationTitle').textContent = formation.cycle_educative.name;
                document.getElementById('modalFormationDescription').textContent = formation.description;
                document.getElementById('modalFormationTitle').dataset.formationId = formation.id;
                // Clear previous matieres
                document.getElementById('modalFormationmatires').innerHTML = '';
                // Add matieres to modal
                formation.matieres.forEach(matiere => {
                    const matiereElement = document.createElement('span');
                    matiereElement.textContent = matiere.name;
                    matiereElement.classList.add('bg-black', 'text-white', 'rounded', 'p-1', 'm-1');
                    document.getElementById('modalFormationmatires').appendChild(matiereElement);
                });

                // Show modal
                document.getElementById('formationModal').classList.remove('hidden');
            }

            // Close modal button event listener
            document.getElementById('closeModalBtn').addEventListener('click', function() {
                document.getElementById('formationModal').classList.add('hidden');
            });

            // Function to fetch additional formations and partners via AJAX
            function loadMoreData() {
                fetch('/load-All-data')
                    .then(response => response.json())
                    .then(data => {
                        renderFormations(data.formations);
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            }
            document.getElementById('paymentButton').addEventListener('click', function() {
                // Extract formation details
                const formationId = document.getElementById('modalFormationTitle').dataset.formationId;

                window.location.href = `/payments/create?formation_id=${formationId}`;
            });



            function deleteFormation(formationId) {
                // Get CSRF token value
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Implement the logic to delete the formation with the given ID
                // You can use fetch or any other method to send a DELETE request to the server
                // Example:
                fetch(`/formations/${formationId}/delete`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': token // Include CSRF token in the request headers
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            // Formation deleted successfully, you may want to reload the formations or update the UI
                            loadMoreData(); // Reload formations after deletion
                        } else {
                            // Handle error response
                            console.error('Failed to delete formation');
                        }
                    })
                    .catch(error => {
                        console.error('Error deleting formation:', error);
                    });
            }








            document.getElementById('cycle_educative_id').addEventListener('change', function() {
                filterFormations();
            });

            document.getElementById('matiere_id').addEventListener('change', function() {
                filterFormations();
            });

            function filterFormations() {
                var cycleId = document.getElementById('cycle_educative_id').value;
                var matiereId = document.getElementById('matiere_id').value;

                var formData = new FormData();
                formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content'));
                formData.append('cycle_educative_id', cycleId);
                formData.append('matiere_id', matiereId);

                fetch('/filter-formations', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        renderFormations(data.formations);
                    })
                    .catch(error => {
                        console.error('Error filtering formations:', error);
                    });
            }
        });
    </script>
@endsection
