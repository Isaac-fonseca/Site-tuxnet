@props(['servico', 'index'])

<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100 service-card">
        <div class="service-image-container position-relative text-center bg-light d-flex align-items-center justify-content-center" style="min-height: 200px;">
            {{-- Opção 1: Imagem de fundo (se você tiver uma para cada categoria de serviço) --}}
             <img src="{{ asset('img/planos/500.png' . Str::slug($servico['categoria']) . '.jpg') }}" alt="{{ $servico['titulo'] }}" class="img-fluid-fill"> 

            {{-- Opção 2: Ícone grande como placeholder --}}
            <i class="bi {{ $servico['icone'] ?? 'bi-gear' }} display-1 text-primary-tuxnet opacity-50"></i>

            @if(!empty($servico['categoria']))
            <div class="service-badge {{ $index % 2 == 0 ? 'service-badge-purple' : 'service-badge-yellow' }}">
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
            {{-- O link aqui pode ser mais dinâmico no futuro, talvez vindo do array $servico --}}
            <a href="#" class="btn {{ $index % 2 == 0 ? 'btn-primary-tuxnet' : 'btn-secondary-tuxnet' }} mt-auto">Ver Detalhes</a>
        </div>
    </div>
</div>
