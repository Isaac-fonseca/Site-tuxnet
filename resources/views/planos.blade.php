{{-- /resources/views/planos.blade.php --}}

@extends('layouts.app')

@section('title', 'Nossos Planos de Internet')

@section('content')

{{-- Lógica no topo para separar os planos em dois grupos --}}
@php
    
    $categoriasEspeciais = ['max', 'globoplay', 'playkids'];
    $planosPrincipais = collect($planos)->whereNotIn('categoria', $categoriasEspeciais)->all();
    $planosEspeciais = collect($planos)->whereIn('categoria', $categoriasEspeciais)->all();
@endphp

{{-- ================================================================ --}}
{{-- SEÇÃO 1: PLANOS PRINCIPAIS (COM FILTRO)                       --}}
{{-- ================================================================ --}}
<section id="todos-os-planos" class="section-padding">
    <div class="container">

        <div class="text-center">
            <h1 class="display-4 fw-bold">Nossos Planos e Serviços</h1>
            <p class="lead text-muted">Encontre a solução perfeita para você, sua família ou sua empresa.</p>
        </div>

        {{-- Abas de Filtro para os planos principais --}}
        <div class="row justify-content-center my-5">
            <div class="col-lg-10">
                <ul class="nav nav-pills justify-content-center filter-tabs" id="main-plans-filter">
                    <li class="nav-item"><a class="nav-link active" href="#" data-filter="all">Todos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-filter="fibra">Fibra Óptica</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-filter="movel">Planos Móvel</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-filter="pabx">Soluções PABX</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-filter="cartao">Exclusivo Cartão</a></li>
                </ul>
            </div>
        </div>

        {{-- Carrossel 1: Planos Principais --}}
        <div class="position-relative">
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
{{-- SEÇÃO 2: PLANOS ESPECIAIS (COM FILTROS PARA MAX E GLOBOPLAY)        --}}
{{-- ====================================================================== --}}
<section id="planos-especiais" class="section-padding bg-light">
    <div class="container">
        <div class="text-center">
            <h2 class="display-5 fw-bold">Combos Especiais com Streaming</h2>
            <p class="lead text-muted">Sua internet turbinada com o melhor do entretenimento.</p>
        </div>

    {{-- Abas de Filtro APENAS para os planos especiais --}}
<div class="row justify-content-center my-5">
    <div class="col-lg-10">
        <ul class="nav nav-pills justify-content-center filter-tabs" id="special-plans-filter">
            <li class="nav-item"><a class="nav-link active" href="#" data-filter="all">Todos</a></li>
            <li class="nav-item"><a class="nav-link" href="#" data-filter="max">MAX</a></li>
            <li class="nav-item"><a class="nav-link" href="#" data-filter="globoplay">Globoplay</a></li>

            <li class="nav-item"><a class="nav-link" href="#" data-filter="playkids">Playkids</a></li>
        </ul>
    </div>
</div>

        {{-- Carrossel 2: Planos Especiais --}}
        <div class="position-relative">
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

@endsection

@push('scripts')
{{-- Script final e corrigido para controlar os DOIS carrosséis com seus próprios filtros --}}
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Função genérica para criar um carrossel com filtros
    function createFilterableCarousel(carouselSelector, filterSelector) {
        const carouselElement = document.querySelector(carouselSelector);
        if (!carouselElement) return; // Se o carrossel não existir na página, não faz nada

        let swiperInstance = null;
        const allSlides = Array.from(carouselElement.querySelectorAll('.swiper-slide')).map(slide => slide.cloneNode(true));
        const swiperWrapper = carouselElement.querySelector('.swiper-wrapper');
        const filterButtons = document.querySelectorAll(filterSelector);
        const navigationWrapper = carouselElement.parentElement.querySelector('.swiper-navigation-wrapper');

        function initializeSwiper(slidesToDisplay) {
            if (swiperInstance) {
                swiperInstance.destroy(true, true);
            }
            swiperWrapper.innerHTML = '';
            slidesToDisplay.forEach(slide => {
                swiperWrapper.appendChild(slide);
            });
            swiperInstance = new Swiper(carouselSelector, {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: false,
                navigation: {
                    nextEl: navigationWrapper.querySelector('.swiper-button-next'),
                    prevEl: navigationWrapper.querySelector('.swiper-button-prev'),
                },
                breakpoints: {
                    768: { slidesPerView: 2 },
                    992: { slidesPerView: 3 }
                }
            });
        }

        filterButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const filter = this.dataset.filter;
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                const slidesToShow = allSlides.filter(slide => {
                    const cardCategory = slide.dataset.category;
                    return filter === 'all' || cardCategory === filter;
                });
                initializeSwiper(slidesToShow);
            });
        });

        initializeSwiper(allSlides);
    }

    // --- INICIALIZAÇÃO DOS DOIS CARROSSÉIS ---

    // Inicializa o primeiro carrossel com seus filtros
    createFilterableCarousel('.main-plans-carousel', '#main-plans-filter .nav-link');

    // Inicializa o segundo carrossel com seus filtros
    createFilterableCarousel('.special-plans-carousel', '#special-plans-filter .nav-link');

});
</script>
@endpush
