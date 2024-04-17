<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-***********" crossorigin="anonymous" />


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" 
      rel="stylesheet">
<link rel="stylesheet" href="style.css"> --}}

    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>" type="text/css">
    <title>App Name - @yield('title')</title>
</head>

<body>

    <x-navbar  />




    <main>
        @include('layouts.flashbag')
        <div class="container  min-h-screen">
            @yield('content')
        </div>
    </main>
    <x-footer />

</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        const partenaireLink = document.querySelector('li:nth-child(5)'); // Select the "Partenaire" list item
        const dropdownMenu = partenaireLink.querySelector('ul'); // Select the nested dropdown menu

        partenaireLink.addEventListener('mouseenter', function() {
            dropdownMenu.classList.remove(
            'hidden'); // Show the dropdown menu when hovering over the "Partenaire" link
        });
        partenaireLink.addEventListener('mouseleave', function() {
                      dropdownMenu.classList.add(
            'hidden'); // Hide the dropdown menu when mouse leaves the "Partenaire" link
        });
        
        
            var textarea = document.getElementById('Description');
            var placeholder = 'Description de votre profession (matières, Langue d\'enseignement) ';

            textarea.value = placeholder;

            textarea.addEventListener('focus', function() {
                if (this.value === placeholder) {
                    this.value = '';
                }
            });

            textarea.addEventListener('blur', function() {
                if (this.value === '') {
                    this.value = placeholder;
                }
            });



           
    document.getElementById('teacherFormBtn').addEventListener('click', function() {
        document.getElementById('teacherForm').style.display = 'block';
        document.getElementById('investorForm').style.display = 'none';
    });

    document.getElementById('investorFormBtn').addEventListener('click', function() {
        document.getElementById('teacherForm').style.display = 'none';
        document.getElementById('investorForm').style.display = 'block';
    });

        });

    
</script>


</html>
