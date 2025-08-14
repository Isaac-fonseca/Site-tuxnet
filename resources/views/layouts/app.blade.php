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
        @include('layouts.nav') <main class="main-content py-2"> @yield('content') </main>

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
{{-- Em /resources/views/layouts/app.blade.php --}}

{{-- Em /resources/views/layouts/app.blade.php --}}

{{-- Em /resources/views/layouts/app.blade.php --}}

<div class="modal fade" id="modal-combo" tabindex="-1" aria-labelledby="modalComboLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalComboLabel"><i class="bi bi-tools me-2"></i>Monte seu Combo Personalizado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-0">
                <div class="row g-0">
                    {{-- COLUNA ESQUERDA: OPÇÕES DE MONTAGEM --}}
                    <div class="col-lg-7 p-4">

                        {{-- PASSO 1: TIPO DE PLANO --}}
                        <div class="mb-4">
                            <label class="form-label"><strong>1. Qual o tipo de serviço principal?</strong></label>
                            <div id="tipo-plano-toggles" class="d-flex flex-wrap gap-2"></div>
                        </div>
                        <hr>

                        {{-- PASSO 2: DETALHES DO PLANO (AGORA COM ABAS E CARDS) --}}
                        <div id="plano-especifico-container">
                            <label class="form-label"><strong>2. Escolha o seu plano:</strong></label>

                            {{-- Container para o dropdown (usado para planos base) --}}
                            <div id="dropdown-container">
                                <select class="form-select form-select-lg" id="plano-internet-select"></select>


                            </div>

                            {{-- Container para as abas e cards (usado para combos) --}}
                            <div id="combo-selector-container" class="d-none">
                                <div id="combo-sub-category-tabs" class="sub-category-tabs"></div>
                                <div id="combo-plan-cards-grid" class="plan-cards-grid"></div>
                            </div>

                        </div>
                        <hr>
 <div id="plano-velocidade-display" class="text-center mt-3">
        <!-- A velocidade do plano selecionado aparecerá aqui -->
    </div>
                        {{-- PASSO 3 E 4: ADICIONAIS --}}
                        <div id="secao-adicionais">
                            <div class="mb-4">
                                <label class="form-label"><strong>3. Adicione pacotes de Streaming:</strong></label>
                                <div id="lista-streaming" class="list-group"></div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label"><strong>4. Adicione outros serviços:</strong></label>
                                <div id="lista-adicionais" class="list-group"></div>
                            </div>
                        </div>
                    </div>

                    {{-- COLUNA DIREITA: RESUMO --}}
                    <div class="col-lg-5 bg-light p-4 d-flex flex-column">
                        <h6 class="text-uppercase text-muted mb-3">Resumo do seu Combo</h6>
                        <div id="resumo-plano-base" class="resumo-item">
                            <p class="text-muted small">Selecione um plano para começar</p>
                        </div>
                        <div id="resumo-adicionais" class="resumo-item border-top pt-3 mt-3"></div>
                        <div class="mt-auto">
                            <div class="mb-3" id="resumo-pagamento-container">
                          <label class="form-label small text-muted">Método de Pagamento:</label>
                          <p id="resumo-metodo-pagamento" class="fw-bold"></p>
                           </div>
                            <hr>
                            <div class="mb-3">
                                <label for="cliente-nome" class="form-label"><strong>Seu nome completo:</strong></label>
                                <input type="text" class="form-control" id="cliente-nome" placeholder="Digite seu nome aqui" required>
                            </div>
                            <div class="total-price-wrapper text-end">
                                <span class="total-label">Total Mensal:</span>
                                <span id="valor-total" class="total-amount">R$ 0,00</span>
                            </div>
                            <a href="#" id="btn-contratar-whatsapp" class="btn btn-success btn-lg w-100 mt-3">
                                <i class="bi bi-whatsapp me-2"></i>Contratar pelo WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
>>>>>>> fc4029cc137dbb2540b66e298d88c230916bde9b
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

