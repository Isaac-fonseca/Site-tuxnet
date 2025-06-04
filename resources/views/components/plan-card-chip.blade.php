@props(['plano'])

<div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-11 mx-auto mb-4 d-flex align-items-stretch">
    <div class="card plano-card plano-chip-card {{ $plano['destaque'] ?? false ? 'border-secondary-tuxnet shadow-lg' : 'shadow-sm' }} h-100 text-center">
      
        <div class="card-header bg-primary-tuxnet text-white py-3">
            <h3 class="h4 mb-0 font-montserrat">{{ $plano['nome_plano_card'] ?? 'Chip Tuxnet' }}</h3>
        </div>
        <div class="card-body d-flex flex-column">
            <div class="my-3">
                <span class="chip-dados-total display-3 fw-bold text-secondary-tuxnet">{{ $plano['dados_total'] ?? 'N/A' }}</span>
                @if(!empty($plano['dados_detalhe']))
                    <p class="small text-muted mb-1">{{ $plano['dados_detalhe'] }}</p>
                @endif
            </div>
            
            <ul class="list-unstyled plano-inclusos my-2 flex-grow-1">
                @if(!empty($plano['ligacoes']))
                    <li><i class="bi bi-broadcast-pin text-secondary-tuxnet me-2"></i>{{ $plano['ligacoes'] }}</li>
                @endif
                @if(!empty($plano['sms']))
                    <li><i class="bi bi-chat-dots-fill text-secondary-tuxnet me-2"></i>{{ $plano['sms'] }} SMS</li>
                @endif
                @if(isset($plano['apps_inclusos']) && count($plano['apps_inclusos']) > 0)
                    @foreach($plano['apps_inclusos'] as $app)
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>{{ $app }}</li>
                    @endforeach
                @endif
            </ul>

            <div class="preco-container text-center my-3">
                <span class="preco-simbolo">R$</span>
                <span class="preco-valor display-5 fw-bold text-secondary-tuxnet">{{ $plano['preco'] ?? 'N/A' }}</span>
                <span class="preco-periodo text-muted">/MÊS</span>
            </div>
        </div>
        <div class="card-footer bg-transparent border-top-0 pb-3 pt-0">
            <a href="{{ $plano['link_contratar'] ?? '#' }}" class="btn {{ $plano['destaque'] ?? false ? 'btn-secondary-tuxnet' : 'btn-primary-tuxnet' }} btn-lg w-100 contratar-btn">Pedir Chip</a>
        </div>
    </div>
</div>
