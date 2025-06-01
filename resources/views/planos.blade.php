@extends('layouts.app')

@section('title', 'Nossos Planos e Serviços')

@push('styles')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container section-padding">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1 class="font-montserrat display-5 fw-bold">Nossos <span class="text-primary-tuxnet">Planos e Serviços</span></h1>
                <p class="lead">Soluções completas em telecomunicações para conectar você ao que mais importa.</p>
            </div>
        </div>

        <section id="planos-para-voce" class="mb-5">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="font-montserrat">Planos <span class="text-secondary-tuxnet">Para Você</span></h2>
                    <p>Velocidade e estabilidade para navegar, assistir, jogar e muito mais!</p>
                </div>
            </div>
            <div id="carouselPlanosParaVoce" class="carousel slide carousel-planos" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselPlanosParaVoce" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Plano 1"></button>
                    <button type="button" data-bs-target="#carouselPlanosParaVoce" data-bs-slide-to="1" aria-label="Plano 2"></button>
                    <button type="button" data-bs-target="#carouselPlanosParaVoce" data-bs-slide-to="2" aria-label="Plano 3"></button>
                    <button type="button" data-bs-target="#carouselPlanosParaVoce" data-bs-slide-to="3" aria-label="Plano 4"></button>
                </div>
                <div class="carousel-inner">
                    @php
                        // Atualizando para usar os nomes de arquivo .png fornecidos pelo usuário
                        $planosVoce = [
                            ['nome' => 'COMBO PLUS 500 MEGA', 'imagem' => '500.png', 'alt' => 'Plano Tuxnet 500 Mega'],
                            ['nome' => 'COMBO MAX 700 MEGA', 'imagem' => '700.png', 'alt' => 'Plano Tuxnet 700 Mega'],
                            ['nome' => 'COMBO SUPER 900 MEGA', 'imagem' => '900.png', 'alt' => 'Plano Tuxnet 900 Mega'],
                            ['nome' => 'COMBO PREMIUM 1.1GB', 'imagem' => '1100.png', 'alt' => 'Plano Tuxnet 1.1GB']
                        ];
                    @endphp

                    @foreach($planosVoce as $index => $plano)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="plan-card-rotativo text-center">
                            {{-- Caminho atualizado para public/img/planos/ e nomes .png --}}
                            <img src="{{ asset('img/planos/' . $plano['imagem']) }}" class="img-fluid" alt="{{ $plano['alt'] }}">
                            {{-- Você pode adicionar um botão "Saiba Mais" ou "Contratar" aqui se desejar --}}
                            {{-- Exemplo: <a href="#" class="btn btn-primary-tuxnet mt-3">Quero Esse!</a> --}}
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselPlanosParaVoce" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselPlanosParaVoce" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </section>
        <hr class="my-5"> {{-- Divisor --}}

        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="font-montserrat">Todos os Nossos <span class="text-primary-tuxnet">Serviços</span></h2>
            </div>
        </div>

        <div class="row align-items-stretch service-highlight-section">
            @if(isset($servicos) && count($servicos) > 0)
                @foreach($servicos as $index => $servico)
                    {{-- Usando o Blade Component --}}
                    <x-service-card :servico="$servico" :index="$index" />
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-center">Nenhum serviço disponível no momento.</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/app.js') }}" defer></script>                   
@endpush
