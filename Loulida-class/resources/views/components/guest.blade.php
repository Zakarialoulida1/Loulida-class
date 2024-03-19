<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <script src="https://cdn.tailwindcss.com"></script>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-***********" crossorigin="anonymous" />


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" 
      rel="stylesheet">
<link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

    

    <body style="background-image: url('{{ asset('images/concert-3387324_1280.jpg') }}');" >
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0  dark:bg-gray-900">
         

            <div class="w-fit  mt-6 px-6 py-4 bg-transparent bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
             
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
