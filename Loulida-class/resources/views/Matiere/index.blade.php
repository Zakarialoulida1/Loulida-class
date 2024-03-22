<x-app title="Matieres">


        <div class="flex-none w-full max-w-full px-3 mt-8">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table
                            class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        matiere Name
                                    </th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Created at
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="border-t">
                                @foreach ($data['Matieres'] as $item)
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $item['name'] }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                                                {{ $item->created_at }}
                                            </p>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <form role="form text-left"
                                                action="{{ route('delete.matiere', ['id' => $item['id']]) }} "
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="bg-transparent cursor-pointer flex flex-row font-medium text-red-500 px-2 py-1 mt-2 rounded-md transition duration-150"
                                                    type="submit">
                                                    <svg class="w-5 h-5 mx-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                        <td>

                                            
                                            <!-- Modal toggle -->
                                            <button onclick="editmatiere('{{ $item->id }}','{{$item->name}}')" class="w-5   text-green-500 " type="button">
                                       
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#00db37" d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg>
                                         
                                            </button>
                                          
                                    
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="update-form" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50" aria-hidden="true">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white dark:bg-slate-850 rounded-lg shadow-xl p-6">
                <!-- Modal content -->
                <div class="text-center">
                    <h5 class="text-xl mb-4">Edit matiere</h5>
                    <form id="update-matiere-form" action="{{ route('update.matiere') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <input id="matiere-name" type="text" name="name" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white dark:bg-gray-700 bg-clip-padding py-2 px-3 font-normal text-gray-700 dark:text-white transition-all focus:border-fuchsia-300 focus:text-gray-700 focus:outline-none focus:transition-shadow dark:border-gray-700 dark:focus:border-fuchsia-300 dark:focus:bg-dark dark:focus:text-white" placeholder="Name" aria-label="Name" aria-describedby="email-addon" required>
                            <input id="matiere-id" type="hidden" name="id">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-700 hover:bg-blue-800 rounded-lg cursor-pointer">UPDATE Subject</button>
                            <button type="button" onclick="toggleModal('update-form')" class="inline-block ml-4 px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-gray-400 hover:bg-gray-500 rounded-lg cursor-pointer">CANCEL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 





    <div id="add-matiere-modal" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white dark:bg-slate-850 rounded-lg shadow-xl p-6">
                <!-- Modal content -->
                <div class="text-center">
                    <h5 class="text-xl mb-4">Add Subject</h5>
                    <form action="{{ route('addmatiere') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <input type="text" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white dark:bg-gray-700 bg-clip-padding py-2 px-3 font-normal text-gray-700 dark:text-white transition-all focus:border-fuchsia-300  focus:text-gray-700 focus:outline-none focus:transition-shadow dark:border-gray-700 dark:focus:border-fuchsia-300 dark:focus:bg-dark dark:focus:text-white" name="name" placeholder="Name" aria-label="Name" aria-describedby="email-addon" />
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-700 hover:bg-blue-800 rounded-lg cursor-pointer">ADD Subject</button>
                            <button type="button" onclick="toggleModal('add-matiere-modal')" class="inline-block ml-4 px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-gray-400 hover:bg-gray-500 rounded-lg cursor-pointer">CANCEL</button>
                    
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
    
    <!-- Add matiere Button -->
    <button onclick="toggleModal('add-matiere-modal')" class="fixed bottom-6 right-6 bg-blue-700 hover:bg-blue-800 text-white py-3 px-6 rounded-full shadow-lg focus:outline-none">
      <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                                   
                            </svg> </button>

</x-app>

<script>

function editmatiere(matiereId, matiereName) {
        document.getElementById('matiere-id').value = matiereId;
        document.getElementById('matiere-name').value = matiereName;
        toggleModal('update-form');
    }
    function toggleModal(matiereform) {
        const modal = document.getElementById(matiereform);
        modal.classList.toggle('hidden');
    }
</script>