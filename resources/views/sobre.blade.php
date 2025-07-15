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
    
    <hr class="my-4">

    
    <section id="nossas-lojas" class="section-padding bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="font-montserrat h2-style">Nossas <span class="text-primary-tuxnet">Lojas</span></h2>
                    <p class="lead text-muted">Encontre a unidade Tuxnet mais próxima de você.</p>
                </div>
            </div>

            @if(isset($lojas['matriz']))
            <div class="row mb-5 justify-content-center"> 
                <div class="col-md-8 col-lg-6">
                    <div class="loja-card-wrapper">
                        <h4 class="font-montserrat text-center text-md-start mb-3 h4-style">Matriz</h4>
                        <div class="card loja-card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><i class="bi bi-building me-2 text-primary-tuxnet"></i>{{ $lojas['matriz']['nome'] }}</h5>
                                <p class="card-text mb-2"><i class="bi bi-geo-alt-fill me-2 text-secondary-tuxnet"></i>{{ $lojas['matriz']['endereco_completo'] }}</p>
                                <a href="{{ $lojas['matriz']['link_mapa'] }}" target="_blank" class="btn btn-sm btn-outline-primary-tuxnet">Ver no Mapa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(isset($lojas['filiais']) && count($lojas['filiais']) > 0)
                <div class="row">
                    <div class="col-12 text-center text-md-start mb-4">
                        <h4 class="font-montserrat h4-style">Lojas</h4>
                    </div>
                </div>
                @foreach($lojas['filiais'] as $cidade => $unidades)
                    <div class="mb-5"> 
                         <h5 class="font-montserrat text-primary-tuxnet mb-3 ms-1"><i class="bi bi-pin-map-fill me-2"></i>{{ $cidade }}</h5>
                         <div class="row"> 
                            @foreach($unidades as $unidade)
                            <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch">
                                <div class="card loja-card shadow-sm h-100">
                                    <div class="card-body d-flex flex-column">
                                        @if(!empty($unidade['nome_local']))
                                        <h6 class="card-subtitle mb-2 font-montserrat fw-semibold">{{ $unidade['nome_local'] }}</h6>
                                        @endif
                                        <p class="card-text small flex-grow-1"><i class="bi bi-geo-alt-fill me-2 text-secondary-tuxnet"></i>{{ $unidade['endereco_completo'] }}</p>
                                        <a href="{{ $unidade['link_mapa'] }}" target="_blank" class="btn btn-sm btn-outline-primary-tuxnet mt-auto">Ver no Mapa</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

@endsection

