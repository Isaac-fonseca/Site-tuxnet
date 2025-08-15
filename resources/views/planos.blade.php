{{-- /resources/views/planos.blade.php --}}

@extends('layouts.app')

@section('title', 'Nossos Planos de Internet')

@push('styles')

@endpush

@section('content')

{{-- Lógica no topo para separar os planos em dois grupos --}}
@php
    $categoriasEspeciais = ['max', 'globoplay', 'playkids'];
    $planosPrincipais = collect($planos)->whereNotIn('categoria', $categoriasEspeciais)->all();
    $planosEspeciais = collect($planos)->whereIn('categoria', $categoriasEspeciais)->all();
@endphp

{{-- ================================================================ --}}
{{-- SEÇÃO 1: PLANOS PRINCIPAIS (COM FILTRO) --}}
{{-- ================================================================ --}}
<section id="todos-os-planos" class="section-padding">
    <div class="container">

        <div class="text-center" data-aos="fade-up">
            <h1 class="display-4 fw-bold">Nossos Planos e Serviços</h1>
            <p class="lead text-muted">Encontre a solução perfeita para você, sua família ou sua empresa.</p>
        </div>

        <div class="row justify-content-center my-1" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-10">
                <ul class="nav nav-pills justify-content-center filter-tabs" id="main-plans-filter">
                    <li class="nav-item"><a class="nav-link" href="#" data-filter="cartao">Combo Cartão</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#" data-filter="fibra">Combo Banda Larga</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-filter="movel">Planos Móvel</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-filter="fixo">Combo Fixo</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mb-1" data-aos="fade-up" data-aos-delay="150">
            <small class="text-muted fst-italic">*Sob consulta de viabilidade</small>
        </div>

        <div class="position-relative" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper main-plans-carousel">
                <div class="swiper-wrapper">
                    @foreach($planosPrincipais as $plano)
                        <div class="swiper-slide plan-card-item" data-category="{{ $plano['categoria'] }}">
                            @include('partials.plan_card', ['plano' => $plano])
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-navigation-wrapper main-nav">
                <div class="swiper-button-prev"><i class="bi bi-chevron-left"></i></div>
                <div class="swiper-button-next"><i class="bi bi-chevron-right"></i></div>
            </div>
        </div>

    </div>
</section>

{{-- ====================================================================== --}}
{{-- SEÇÃO 2: PLANOS ESPECIAIS (COM FILTROS) --}}
{{-- ====================================================================== --}}
<section id="planos-especiais" class="section-padding bg-light">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="display-5 fw-bold">Combos Especiais com Streaming</h2>
            <p class="lead text-muted">Sua internet turbinada com o melhor do entretenimento.</p>
        </div>

        <div class="row justify-content-center my-4" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-10">
                <ul class="nav nav-pills justify-content-center filter-tabs" id="special-plans-filter">
                    <li class="nav-item"><a class="nav-link active" href="#" data-filter="max">MAX</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-filter="globoplay">Globoplay</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-filter="playkids">Playkids</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mb-1" data-aos="fade-up" data-aos-delay="150">
            <small class="text-muted fst-italic">*Sob consulta de viabilidade</small>
        </div>
        
        <div class="position-relative" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper special-plans-carousel">
                <div class="swiper-wrapper">
                    @foreach($planosEspeciais as $plano)
                        <div class="swiper-slide plan-card-item" data-category="{{ $plano['categoria'] }}">
                            @include('partials.plan_card', ['plano' => $plano])
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-navigation-wrapper special-nav">
                <div class="swiper-button-prev"><i class="bi bi-chevron-left"></i></div>
                <div class="swiper-button-next"><i class="bi bi-chevron-right"></i></div>
            </div>
        </div>
    </div>
</section>

{{-- ================================================================ --}}
{{-- SEÇÃO DE PACOTES ADICIONAIS --}}
{{-- ================================================================ --}}
<section id="pacotes-adicionais" class="section-padding">
    <div class="container">
        <div class="text-center text-black mb-1" data-aos="fade-up">
            <h2 class="display-5 fw-bold">Monte o seu combo!</h2>
            <p class="lead">Faça o plano do seu jeito e adicione os seus pacotes favoritos.</p>
        </div>

        <div class="position-relative" data-aos="fade-up" data-aos-delay="200">
            <div class="swiper additional-packages-carousel">
                <div class="swiper-wrapper">
                    @foreach($pacotes as $pacote)
                        <div class="swiper-slide">
                            <div class="pacotes-adicionais-card bg-degrade-roxo h-100">
                                <div class="row align-items-center g-5">
                                    <div class="col-lg-4 text-center">
                                        <img src="{{ asset($pacote['imagem']) }}" alt="{{ $pacote['nome'] }}" class="img-fluid p-3">
                                    </div>
                                    <div class="col-lg-8 mt-4 mt-lg-0">
                                        <h2 class="display-5 fw-bold mb-1 text-white">{{ $pacote['nome'] }}</h2>
                                        <p class="lead">{{ $pacote['descricao'] }}</p>
                                        <a href="#" class="btn btn-lg btn-secondary-tuxnet mt-4 px-5 btn-abrir-combo-pacote" data-pacote-id="{{ $pacote['id'] }}">
                                            {{ $pacote['texto_botao'] }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-navigation-wrapper additional-packages-nav">
                <div class="swiper-button-prev"><i class="bi bi-chevron-left"></i></div>
                <div class="swiper-button-next"><i class="bi bi-chevron-right"></i></div>
            </div>
        </div>
    </div>
</section>

{{-- ================================================================ --}}
{{-- SEÇÃO DE DEPOIMENTOS --}}
{{-- ================================================================ --}}
<section id="prova-social" class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Quem Confia na Tuxnet</h2>
            <p class="lead-corporate">Junte-se a dezenas de clientes satisfeitos que contam com a nossa infraestrutura para o dia a dia.</p>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-card">
                    <blockquote>"Desde que mudei para a Tuxnet, minhas videochamadas de trabalho nunca mais travaram. A estabilidade é incomparável e o suporte é incrivelmente ágil."</blockquote>
                    <div class="author-info">
                        <img src="https://placehold.co/100x100/A428FF/FFFFFF?text=JS" alt="Foto de João Silva">
                        <div><p class="author-name mb-0">João Silva</p><p class="author-company mb-0">Cliente Residencial</p></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-card">
                    <blockquote>"Finalmente consigo assistir minhas séries em 4K sem interrupções. A velocidade é excelente e a instalação foi super rápida e profissional. Recomendo!"</blockquote>
                    <div class="author-info">
                        <img src="https://placehold.co/100x100/340667/FFFFFF?text=MA" alt="Foto de Maria Andrade">
                        <div><p class="author-name mb-0">Maria Andrade</p><p class="author-company mb-0">Cliente Residencial</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
  
    <script>
        // Inicializa o AOS depois que a página carregar completamente
        window.addEventListener('load', function() {
            AOS.init({
                duration: 800,      // Duração da animação em ms
                once: true,         // A animação acontece apenas uma vez
                offset: 100,        // Distância em pixels para disparar a animação
            });
        });
    </script>
@endpush
