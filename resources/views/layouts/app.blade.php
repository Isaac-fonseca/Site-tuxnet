<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tuxnet') }} - @yield('title', 'Bem-vindo')</title>
 <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body>
     <div id="page-wrapper">
    <div id="app">
        @include('layouts.nav') <main class="main-content py-4"> @yield('content') </main>

        @include('layouts.footer') </div>
    </div> @stack('modals')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <a href="https://wa.me/5508007226662?text=Olá! Gostaria de mais informações sobre os planos da Tuxnet." target="_blank" class="whatsapp-float" title="Fale Conosco pelo WhatsApp">
    <i class="bi bi-whatsapp"></i>
</a>
<a href="tel:08007226662" class="phone-float" title="Ligue para nós">
    <i class="bi bi-telephone-fill"></i>
</a>
    @stack('scripts')
<script>

</script>
</body>
</html>

