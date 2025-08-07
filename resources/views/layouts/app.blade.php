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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>
<body>
     <div id="page-wrapper">
    <div id="app">
        @include('layouts.nav') <main class="main-content py-4"> @yield('content') </main>

        @include('layouts.footer') </div>
    </div> @stack('modals')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <a href="https://wa.me/5508007226662?text=Olá! Gostaria de mais informações sobre os planos da Tuxnet." target="_blank" class="whatsapp-float" title="Fale Conosco pelo WhatsApp">
    <i class="bi bi-whatsapp"></i>
</a>
<a href="tel:08007226662" class="phone-float" title="Ligue para nós">
    <i class="bi bi-telephone-fill"></i>
</a>
<div class="modal fade" id="modal-combo" tabindex="-1" aria-labelledby="modalComboLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalComboLabel">Monte seu Combo Personalizado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- NOVA SEÇÃO para selecionar o plano de internet --}}
                <div class="mb-4">
                    <label for="plano-internet-select" class="form-label"><strong>1. Escolha seu plano de Internet:</strong></label>
                    <select class="form-select form-select-lg" id="plano-internet-select">
                        {{-- Opções populadas via JavaScript --}}
                    </select>
                </div>

                <hr>

                {{-- Seção para os pacotes adicionais --}}
                <div class="mb-4">
                    <label class="form-label"><strong>2. Turbine sua conexão (opcional):</strong></label>
                    <div id="lista-adicionais" class="list-group">
                        {{-- Populado via JavaScript --}}
                    </div>
                </div>

                <hr>

                {{-- Seção para os dados do cliente --}}
                <div class="mb-3">
                    <label for="cliente-nome" class="form-label"><strong>3. Seu nome completo:</strong></label>
                    <input type="text" class="form-control" id="cliente-nome" placeholder="Digite seu nome aqui" required>
                </div>

            </div>
            <div class="modal-footer">
                <div class="total-price-wrapper">
                    <span class="total-label">Total Mensal:</span>
                    <span id="valor-total" class="total-amount">R$ 0,00</span>
                </div>
                <a href="#" id="btn-contratar-whatsapp" class="btn btn-success btn-lg">
                    <i class="bi bi-whatsapp me-2"></i>Contratar pelo WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>
    @stack('scripts')
 <script>

       const planosData = @json($planos ?? []);
        const adicionaisData = @json($adicionais ?? []);
        const pacotesData = @json($pacotes ?? []);
    </script>
</body>
</html>

