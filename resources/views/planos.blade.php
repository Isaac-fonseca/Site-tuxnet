@extends('layouts.app')

@section('title', 'Nossos Planos e Serviços')

@push('styles')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container section-padding">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="font-montserrat display-5 fw-bold">Nossos <span class="text-primary-tuxnet">Planos e Serviços</span></h1>
                <p class="lead">Soluções completas em telecomunicações para conectar você ao que mais importa.</p>
            </div>
        </div>

        <div class="row align-items-stretch service-highlight-section">
            @if(isset($servicos) && count($servicos) > 0)
                @foreach($servicos as $index => $servico)
                <div class="col-lg-4 col-md-6 mb-4"> {{-- 3 colunas em LG, 2 em MD, 1 em SM --}}
                    <div class="card h-100 service-card">
                        {{-- Para a imagem e o selo --}}
                        {{-- Você precisará de imagens para cada serviço. Ex: public/img/servico_linha_movel.jpg --}}
                        {{-- Como placeholder, usaremos uma imagem genérica ou uma cor de fundo com ícone --}}
                        <div class="service-image-container position-relative text-center bg-light d-flex align-items-center justify-content-center" style="min-height: 200px;">
                            {{-- Opção 1: Imagem de fundo (se você tiver uma para cada) --}}
                            {{-- <img src="{{ asset('img/placeholder-servico-' . Str::slug($servico['categoria']) . '.jpg') }}" alt="{{ $servico['titulo'] }}" class="img-fluid-fill"> --}}

                            {{-- Opção 2: Ícone grande como placeholder se não houver imagem --}}
                            <i class="bi {{ $servico['icone'] ?? 'bi-gear' }} display-1 text-primary-tuxnet opacity-50"></i>

                            @if(!empty($servico['categoria']))
                            <div class="service-badge {{ $index % 2 == 0 ? 'service-badge-purple' : 'service-badge-yellow' }}">
                                {{-- Tenta quebrar o texto do badge de forma inteligente para caber --}}
                                @php
                                    $badgeText = $servico['categoria'];
                                    if (str_word_count($badgeText) > 2 && strpos($badgeText, ' ') !== false) {
                                        $parts = explode(' ', $badgeText, 3);
                                        if (count($parts) >= 2) {
                                            echo $parts[0] . ' ' . $parts[1] . (isset($parts[2]) ? '<br>' . $parts[2] : '');
                                        } else {
                                            echo str_replace(' ', '<br>', $badgeText);
                                        }
                                    } elseif (str_word_count($badgeText) == 2) {
                                        echo str_replace(' ', '<br>', $badgeText);
                                    } else {
                                        echo $badgeText;
                                    }
                                @endphp
                            </div>
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column text-center">
                            <h4 class="card-title font-montserrat text-primary-tuxnet mt-3">{{ $servico['titulo'] }}</h4>
                            <p class="card-text flex-grow-1">{{ $servico['descricao'] }}</p>
                            <a href="#" class="btn {{ $index % 2 == 0 ? 'btn-primary-tuxnet' : 'btn-secondary-tuxnet' }} mt-auto">Ver Detalhes</a>
                        </div>
                    </div>
                </div>
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
    {{-- Scripts específicos da página de planos, se necessário --}}
@endpush
