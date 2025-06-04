@extends('layouts.app')

@section('title', 'Nossos Planos e Serviços')

@push('styles')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container section-padding">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="font-montserrat display-4 fw-bold">Nossos <span class="text-primary-tuxnet">Planos e Serviços</span></h1>
                <p class="lead">Soluções completas em telecomunicações para conectar você ao que mais importa.</p>
            </div>
        </div>

        @if(isset($categoriasDePlanos) && count($categoriasDePlanos) > 0)
            <div class="row mb-5">
                <div class="col-12">
                    <ul class="nav nav-pills tuxnet-plan-filters justify-content-center nav-fill flex-column flex-md-row" id="planCategoryTabs" role="tablist">
                        @foreach($categoriasDePlanos as $index => $categoria)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $index == 0 ? 'active' : '' }}" 
                                        id="{{ $categoria['id_secao'] ?? Str::slug($categoria['titulo_secao']) }}-tab" 
                                        data-bs-toggle="pill" 
                                        data-bs-target="#{{ $categoria['id_secao'] ?? Str::slug($categoria['titulo_secao']) }}-content" 
                                        type="button" role="tab" 
                                        aria-controls="{{ $categoria['id_secao'] ?? Str::slug($categoria['titulo_secao']) }}-content" 
                                        aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                    {!! strip_tags($categoria['titulo_secao'], '<span>') !!} 
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tab-content" id="planCategoryTabsContent">
                @foreach($categoriasDePlanos as $index => $categoria)
                    <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" 
                         id="{{ $categoria['id_secao'] ?? Str::slug($categoria['titulo_secao']) }}-content" 
                         role="tabpanel" 
                         aria-labelledby="{{ $categoria['id_secao'] ?? Str::slug($categoria['titulo_secao']) }}-tab">
                        
                        <section class="plan-category-section"> 
                            @if(!empty($categoria['descricao_secao']))
                                <div class="row">
                                    <div class="col-12 text-center mb-4">
                                        <p class="lead">{{ $categoria['descricao_secao'] }}</p>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($categoria['texto_adicional_secao']))
                                <div class="texto-adicional-categoria small text-muted mb-4 text-center">
                                    {!! nl2br(e($categoria['texto_adicional_secao'])) !!}
                                </div>
                            @endif

                            <div class="row justify-content-center">
                                @if(isset($categoria['planos']) && count($categoria['planos']) > 0)
                                    @foreach($categoria['planos'] as $plano)
                                        @if(view()->exists('components.' . $categoria['estilo_card_template']))
                                            <x-dynamic-component :component="$categoria['estilo_card_template']" :plano="$plano" />
                                        @else
                                            <div class="col-12">
                                                <p class="text-danger text-center">Erro: Template de card '{{ $categoria['estilo_card_template'] }}' não encontrado em resources/views/components/.</p>
                                            </div>
                                            @break 
                                        @endif
                                    @endforeach
                                @else
                                    <div class="col-12">
                                        <p class="text-center">Nenhum plano disponível nesta categoria no momento.</p>
                                    </div>
                                @endif
                            </div>
                        </section>
                    </div>
                @endforeach
            @endif
       
        
        

    </div>
@endsection

@push('scripts')
  
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush
