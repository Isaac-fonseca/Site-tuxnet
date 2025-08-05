@extends('layouts.app')

@section('title', 'Sobre a Tuxnet')

@push('styles')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush

@section('content')

    <section class="page-header   text-center py-5">
        <div class="container">
            <h1 class="display-4 font-montserrat fw-bold">Conheça a Tuxnet</h1>
            <p class="lead">Sua conexão de alta performance com a Bahia e o mundo.</p>
        </div>
    </section>

    <section id="apresentacao-empresa" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="font-montserrat h2-style">Nossa História e Compromisso</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    @if(isset($empresa['apresentacao_completa']))
                        @php $paragrafos = explode("\n", $empresa['apresentacao_completa']); @endphp
                        @foreach($paragrafos as $index => $paragrafo)
                            <p class="{{ $index == 0 ? 'lead-custom' : '' }} mb-3">{{ $paragrafo }}</p>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="row mt-5 pt-4 border-top">
                <div class="col-md-6 mb-4 mb-md-0 text-center text-md-start">
                    <div class="d-flex align-items-center mb-3 justify-content-center justify-content-md-start">
                        <i class="bi bi-bullseye display-4 text-secondary-tuxnet me-3"></i>
                        <h3 class="font-montserrat mb-0">Nossa Missão</h3>
                    </div>
                    <p class="text-muted ps-md-5">{{ $empresa['missao'] ?? '' }}</p>
                </div>
                <div class="col-md-6 text-center text-md-start">
                     <div class="d-flex align-items-center mb-3 justify-content-center justify-content-md-start">
                        <i class="bi bi-eye-fill display-4 text-secondary-tuxnet me-3"></i>
                        <h3 class="font-montserrat mb-0">Nossa Visão</h3>
                    </div>
                    <p class="text-muted ps-md-5">{{ $empresa['visao'] ?? '' }}</p>
                </div>
            </div>
        </div>
    </section>

    <hr class="my-4">


    <section id="nossos-valores" class="section-padding bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="font-montserrat h2-style">Nossos <span class="text-primary-tuxnet">Valores Fundamentais</span></h2>
                    <p class="lead text-muted">Os pilares que guiam cada uma de nossas ações.</p>
                </div>
            </div>
            <div class="row">
                @if(isset($valoresDetalhados) && count($valoresDetalhados) > 0)
                    @foreach($valoresDetalhados as $valor)
                    <div class="col-lg col-md-6 mb-4 d-flex align-items-stretch">
                        <div class="card text-center valor-card h-100 p-3">
                            <div class="valor-icon mb-3">
                                <i class="bi {{ $valor['icone'] ?? 'bi-star-fill' }} display-2 text-primary-tuxnet"></i>
                            </div>
                            <h4 class="card-title font-montserrat h5-style mb-2">{{ $valor['nome'] }}</h4>
                            <p class="card-text small text-muted">{{ $valor['descricao'] }}</p>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <hr class="my-4">


    <section id="faq" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="font-montserrat h2-style">Perguntas <span class="text-primary-tuxnet">Frequentes</span></h2>
                    <p class="lead text-muted">Tire suas dúvidas sobre nossos serviços e planos.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    @if(isset($faq) && count($faq) > 0)
                    <div class="accordion accordion-flush" id="faqAccordionTuxnet">
                        @foreach($faq as $index => $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqHeading{{ $index }}">
                                <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }} fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="faqCollapse{{ $index }}">
                                    {{ $item['pergunta'] }}
                                </button>
                            </h2>
                            <div id="faqCollapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="faqHeading{{ $index }}" data-bs-parent="#faqAccordionTuxnet">
                                <div class="accordion-body">
                                    {{ $item['resposta'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-center">Nenhuma pergunta frequente disponível no momento.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>





@endsection

