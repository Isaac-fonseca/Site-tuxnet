@props(['plano'])

<div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-11 mx-auto mb-4 d-flex align-items-stretch">
    <div class="card plano-card plano-fixo-card {{ $plano['destaque'] ?? false ? 'border-secondary-tuxnet shadow-lg' : 'shadow-sm' }} h-100">
        @if($plano['destaque'] ?? false)
            <div class="plano-destaque-badge">MELHOR CUSTO</div>
        @endif
        <div class="card-header text-center bg-primary-tuxnet text-white py-3">
            <h3 class="h4 mb-0 font-montserrat">{{ $plano['nome_plano_card'] ?? ($plano['velocidade'] ?? 'Plano Fixo') }}</h3>
        </div>
        <div class="card-body d-flex flex-column">
            <div class="preco-container text-center my-3">
                <span class="preco-simbolo">R$</span>
                <span class="preco-valor display-4 fw-bold text-secondary-tuxnet">{{ $plano['preco'] ?? 'N/A' }}</span>
                <span class="preco-periodo text-muted">/MÊS</span>
            </div>
            @if(!empty($plano['tipo_pagamento']))
                <p class="text-center text-muted small tipo-pagamento">{{ $plano['tipo_pagamento'] }}</p>
            @endif
            
            @if(isset($plano['inclusos']) && count($plano['inclusos']) > 0)
            <ul class="list-unstyled plano-inclusos my-3 flex-grow-1">
                @foreach($plano['inclusos'] as $item)
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>{{ $item }}</li>
                @endforeach
            </ul>
            @endif
            @if(!empty($plano['instalacao_info']))
                <p class="text-center small text-muted mt-2 mb-1 instalacao-info">{{ $plano['instalacao_info'] }}</p>
            @endif
            @if(!empty($plano['observacao']))
                <p class="text-center small text-muted observacao-plano">{{ $plano['observacao'] }}</p>
            @endif
        </div>
        <div class="card-footer text-center bg-transparent border-top-0 pb-3 pt-0">
            <a href="{{ $plano['link_contratar'] ?? '#' }}" class="btn {{ $plano['destaque'] ?? false ? 'btn-secondary-tuxnet' : 'btn-primary-tuxnet' }} btn-lg w-100 contratar-btn">Contratar Combo</a>
        </div>
    </div>
</div>
