<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased sm:w-full">
    <x-banner />

    <div class="">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                    <h1>World</h1>
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script>
        function dropdown() {
            document.getElementById("hamburger").classList.toggle('fa-bars');
            document.getElementById("hamburger").classList.toggle('fa-xmark');
            document.getElementById("sidebar").classList.toggle('w-12');
            document.getElementById("sidebar").classList.toggle('w-52');
            document.getElementById("sidebar").classList.toggle('relative');
            document.getElementById("sidebar").classList.toggle('absolute');
            document.getElementById("arrow").classList.toggle('hidden');
            document.getElementById("arrow").classList.toggle('flex');
            document.getElementById("arrow1").classList.toggle('hidden');
            document.getElementById("arrow1").classList.toggle('flex');
            document.getElementById("item1").classList.toggle('hidden');
            document.getElementById("item2").classList.toggle('hidden');
            document.getElementById("item3").classList.toggle('hidden');
            document.getElementById("item4").classList.toggle('hidden');
            document.getElementById("item5").classList.toggle('hidden');
            document.getElementById("item6").classList.toggle('hidden');
        }

        function dropDownBTN() {
            document.querySelector('#submenu').classList.toggle('hidden')
            document.querySelector('#arrow').classList.toggle('-rotate-90')
        }

        function dropDownBTN1() {
            document.querySelector('#submenu1').classList.toggle('hidden')
            document.querySelector('#arrow1').classList.toggle('-rotate-90')
        }

        function closeMsg(){
            document.getElementById("msg").classList.toggle('hidden');
            document.getElementById("msg").classList.toggle('flex');
        }

    </script>
</body>

</html>
