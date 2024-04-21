<!-- resources/views/payments/create.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="text-center flex flex-col  items-start w-fit mx-auto m-2 p-4  rounded  bg-blue-300 md:w-[70vw]">
        <span>Important !

            <span> Pour valider votre achat, nous vous demandons de procéder au virement bancaire sur notre compte ouvert au
                CIH Bank suivant :</span>
        </span> ------------------------------------------
        <Span>Société : Loulida class</Span>
        <span> RIB : 230 780 4441618221009500 64</Span>
        <span> I.B.A.N : MA64 2307 8044 4161 8221 0095 0064</Span>
        <span> Swift : CIHMMAMC </Span>
        <span> Banque : CIH BANK</Span>
        ------------------------------------------
     
        <p>Motif : <span id="price"> </Span>Formation_Loulida_class10552{{ $formation->id }}</p>
        <p>Montant total : <span id="price"> </Span>{{ $formation->price }}(DHs)</p>
        ------------------------------------------
        <span> Un message de confirmation vous sera envoyé à votre adresse e-mail, dès validation de votre paiement.</Span>
        <span> N'hésitez pas à nous contacter en cas de besoin:</Span>
        <span> support@Loulida.education</Span>
        <span> Sur Whatsapp +212 656 721 061</span>
    </div>
    <div class="w-full max-w-lg mx-auto p-8">

        <div class=" relative  bg-white rounded-lg shadow-lg p-6">

            <h2 class="text-lg font-medium mb-6">Payment Information</h2>
            <form enctype="multipart/form-data" method="POST" action="{{ route('payments.store') }}">
            @csrf


                    <div class="input__wrapper w-full -ml-2 mb-36">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-50 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 w-full">
                                    <span class="font-semibold">Click to upload</span> or drag
                                    and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 w-full">SVG,
                                    PNG, JPG or GIF pdf
                                   </p>
                            </div>
                            <input id="dropzone-file" name="recu" type="file"
                                class="w-full hidden" />
                        </label>
                    </div>
                
                        <input type="hidden" name="formation_id" id="card-holder" value={{$formation->id}} >
            
                </div>
                <div class="mt-8">
                    <button type="submit"
                        class="w-full bg-green-500 hover:bg-blue-600 text-white font-medium py-3 rounded-lg focus:outline-none">Valider
                        Le payement</button>
                </div>
            </form>
        </div>
    </div>

@endsection
