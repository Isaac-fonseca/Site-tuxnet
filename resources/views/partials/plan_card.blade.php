{{-- /resources/views/partials/plan_card.blade.php --}}

{{--
Este é o "molde" de um único card de plano.
Ele espera receber uma variável chamada $plano.
--}}
<div class="card plan-card-new h-100
    @if(isset($plano['background_especial']) && $plano['background_especial'] === 'laranja') bg-globoplay @endif
    @if(isset($plano['background_especial']) && $plano['background_especial'] === 'azul') bg-max @endif
    @if(isset($plano['background_especial']) && $plano['background_especial'] === 'azul-claro') bg-playkids @endif
">
    <div class="card-body d-flex flex-column text-center p-4">

        @if(isset($plano['selo_popular']))
            <div class="selo-popular">{{ $plano['selo_popular'] }}</div>
        @endif

        <img src="{{ asset($plano['imagem_mascote']) }}" alt="Mascote" class="slogan-image d-block mx-auto mb-3">
        <p class="plan-title">{{ $plano['nome'] }}</p>

        <div class="plan-speed my-2">
            <span class="speed-number">{{ $plano['velocidade_num'] }}</span>
            <span class="speed-unit">{{ $plano['velocidade_unidade'] }}</span>
        </div>

        <div class="installation-banner my-3">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ $plano['info_instalacao'] }}</span>
        </div>

        <div class="price-separator my-3"><span>{{ $plano['texto_preco'] }}</span></div>

        <div class="price-display-new mb-2">
            <span class="currency">R$</span>
            <span class="main-price">{{ $plano['preco_inteiro'] }}</span>
            <span class="cents">,{{ $plano['preco_centavos'] }}</span>
            <span class="period">{{ $plano['periodo'] }}</span>
        </div>

        <div class="mt-auto pt-4">
            <a href="{{ $plano['link_contratar'] }}" class="btn btn-contratar">{{ $plano['texto_botao_contratar'] }}</a>
            <div class="text-center mt-4">
                <button class="btn details-button-yellow" type="button" data-bs-toggle="collapse" data-bs-target="#details-plan-{{ $plano['id'] }}" aria-expanded="false" aria-controls="details-plan-{{ $plano['id'] }}">
                    Ver Detalhes <i class="bi bi-chevron-down"></i>
                </button>
                <div class="collapse" id="details-plan-{{ $plano['id'] }}">
                    <div class="details-content-styled">
                        <p class="fw-bold mb-1">Vantagens:</p>
                        <ul class="list-unstyled">
                            @foreach($plano['vantagens'] as $vantagem)
                                <li><i class="bi bi-check-circle-fill text-success"></i> {{ $vantagem }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
