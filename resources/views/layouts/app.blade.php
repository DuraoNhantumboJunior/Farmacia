<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/ALGARVELOGO.svg') }}" type="image/svg+xml" class="w-32 h-32">
    <title>{{ config('app.name', 'Farmácia Algarve') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Lottie JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.4/lottie.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/loader.css', 'resources/js/app.js', 'resources/js/loader.js', 'resources/json/Coracao.json'])
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <!-- Loader HTML -->

    <div class="loading" id="loader" style="display: flex;">
        <svg height="48px" width="64px">
            <polyline id="back" points="0.157 23.954, 14 23.954, 21.843 48, 43 0, 50 24, 64 24"></polyline>
            <polyline id="front" points="0.157 23.954, 14 23.954, 21.843 48, 43 0, 50 24, 64 24"></polyline>
        </svg>

        <style>
    main {
        background-image: url("{{ asset('img/ALGARVE.svg') }}");
        background-repeat: no-repeat; /* Não repete a imagem */
        background-position: center center; /* Centraliza a imagem no centro da tela */
        background-size: contain; /* A imagem será redimensionada para caber dentro da tela */
        height: 100vh; /* Garante que o main ocupe toda a altura da tela */
        width: 100%; /* Garante que o main ocupe toda a largura da tela */
        position: relative;
    }
</style>


    </div>



    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main>
            <!-- Background Lottie Animation -->
            <div id="lottie-background" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;"></div>
            {{ $slot }}
        </main>
    </div>

    <!-- Lottie Animation Script -->
    <script>
        var animationData = {
            "v": "4.8.0",
            "meta": {
                "g": "LottieFiles AE 1.0.0",
                "a": "",
                "k": "",
                "d": "",
                "tc": "#FFFFFF"
            },
            "fr": 25,
            "ip": 0,
            "op": 61,
            "w": 800,
            "h": 388,
            "nm": "All",
            "ddd": 0,
            "assets": [],
            "layers": []
        };

        // Dynamically load the animation JSON file from the public directory
        fetch("{{ asset('json/Coracao.json') }}")
            .then(response => response.json())
            .then(data => {
                animationData.layers = data.layers;

                lottie.loadAnimation({
                    container: document.getElementById('lottie-background'),
                    animationData: animationData,
                    renderer: 'svg',
                    loop: true,
                    autoplay: true
                });
            })
            .catch(error => console.error('Error loading animation:', error));
    </script>

</body>

</html>