@props(['plano'])

<div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 col-11 mx-auto mb-4 d-flex align-items-stretch">
    <div class="card plano-card plano-imagem-card {{ $plano['destaque'] ?? false ? 'border-secondary-tuxnet shadow-lg' : 'shadow-sm' }} h-100 overflow-hidden">
      
        <a href="{{ $plano['link_contratar'] ?? '#' }}" class="d-block h-100">
            <img src="{{ asset('img/planos/' . $plano['imagem_panfleto']) }}" class="img-fluid h-100 w-100" 
                 alt="{{ $plano['nome_plano_card'] ?? 'Plano Tuxnet' }}" 
                 style="object-fit: cover; object-position: top center;">
        </a>
    </div>
</div>
