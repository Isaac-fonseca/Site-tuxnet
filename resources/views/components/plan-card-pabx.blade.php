@props(['plano'])

<div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-11 mx-auto mb-4 d-flex align-items-stretch">
    <div class="card plano-card plano-pabx-card {{ $plano['destaque'] ?? false ? 'border-secondary-tuxnet shadow-lg' : 'shadow-sm' }} h-100">
      
        <div class="card-header text-center bg-primary-tuxnet text-white py-3">
            <h3 class="h4 mb-0 font-montserrat">{{ $plano['nome_plano_card'] ?? 'PABX Virtual' }}</h3>
            @if(($plano['velocidade'] ?? 'N/A') !== 'N/A')
                <small class="d-block">Internet {{ $plano['velocidade'] }} inclusa</small>
            @endif
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
                <h6 class="text-muted small text-center mt-2 mb-1">RECURSOS PRINCIPAIS:</h6>
                <ul class="list-unstyled plano-inclusos my-2 flex-grow-1">
                    @foreach($plano['inclusos'] as $item)
                    <li><i class="bi bi-gear-fill text-secondary-tuxnet me-2"></i>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif

            @if(isset($plano['vantagens_pabx']) && count($plano['vantagens_pabx']) > 0)
                <h6 class="text-muted small text-center mt-3 mb-1">VANTAGENS:</h6>
                <ul class="list-unstyled plano-inclusos my-2">
                    @foreach($plano['vantagens_pabx'] as $item)
                    <li><i class="bi bi-star-fill text-warning me-2"></i>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif
            
            @if(!empty($plano['instalacao_info']))
                <p class="text-center small text-muted mt-2 mb-1 instalacao-info">{{ $plano['instalacao_info'] }}</p>
            @endif
            @if(!empty($plano['observacao']))
                <p class="text-center small text-muted observacao-plano fst-italic">{{ $plano['observacao'] }}</p>
            @endif
             @if(!empty($plano['obs_pabx']))
                <p class="text-center small text-danger mt-2 observacao-plano fw-bold">{{ $plano['obs_pabx'] }}</p>
            @endif
        </div>
        <div class="card-footer text-center bg-transparent border-top-0 pb-3 pt-0">
            <a href="{{ $plano['link_contratar'] ?? '#' }}" class="btn {{ $plano['destaque'] ?? false ? 'btn-secondary-tuxnet' : 'btn-primary-tuxnet' }} btn-lg w-100 contratar-btn">Consultar PABX</a>
        </div>
    </div>
</div>
