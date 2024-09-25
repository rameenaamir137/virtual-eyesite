<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Eye Site') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;700&display=swap" rel="stylesheet">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            :root {
                font-family: 'Fredoka', sans-serif;
                --main-color: purple;
                --sec-color: rgb(84, 1, 84);
            }
            .colored-heading {
                color: var(--main-color);
            }

            .p-button {
                font-family:"Fredoka"; 
                background-color: var(--main-color);
            }
            .p-button:hover {
                background-color: var(--sec-color);
            }

            .links::first-letter {
                font-family:"Fredoka";
                color: var(--main-color);
                font-weight: bold;
            }

            @keyframes rotate {
                to {
                    --angle: 360deg;
                }
            }

            @property --angle {
                syntax: '<angle>';
                initial-value: 0deg;
                inherits: false;
            }

            .purple-slide {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: purple;
                animation-name: slide;
                animation-duration: 1s;
                animation-timing-function: ease-in-out;
                z-index: 100;
            }

            .purple-slide-reverse {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: purple;
                animation-name: slide-back;
                animation-duration: 1s;
                animation-timing-function: ease-in-out;
                z-index: 100;
            }

            @keyframes slide {
                0% {
                    transform: translateX(-100%);
                }
                100% {
                    transform: translateX(0);
                }
            }

            @keyframes slide-back {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(100%);
            }
            }



            .cool-link::after {
                content: '';
                display: block;
                width: 0;
                height: 3px;
                background: var(--main-color);
                transition: width .5s;
            }

            .cool-link:hover::after {
                width: 100%;
                //transition: width .5s;
            }

            .home_img {
                background: url(../images/tempmain.jpg);
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                box-shadow: inset 0 0 0 9px rgb(128 0 128 / 30%);
                order: 1;
                justify-self: center;
                width: 500px;
                height: 500px;
                animation: profile__animate 8s ease-in-out infinite 1s;
            }

            @keyframes profile__animate {
                0% {
                    border-radius: 60% 40% 30% 70%/ 60% 30% 70% 40%;
                }

                50% {
                    border-radius: 30% 60% 70% 40%/ 50% 60% 30% 60%;
                }

                100% {
                    border-radius: 60% 40% 30% 70%/ 60% 30% 70% 40%;
                }
            }
            
        </style>
        @if (Request::is('eyetests/colorblindnesstest'))
            <script src="../js/colorblindnesstest.js" defer></script>
        @endif
        @if (Request::is('eyetests/eyesighttest0'))
            <script src="https://docs.opencv.org/master/opencv.js" defer></script>
            <script src="../js/eyesighttest.js" defer></script>
        @endif
    
        
    </head>
    <body>
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        
    </body>
</html>
