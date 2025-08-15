@extends('layouts.app')

@section('title', 'Nossa História | Tuxnet')

@push('styles')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush

@section('content')

<section class="page-header-sobre text-white text-center py-5 d-flex align-items-center">
    <div class="container">
        <h1 class="display-3 font-montserrat fw-bold text-shadow-strong" data-aos="fade-down">
            {{ $sobre->hero->headline }}
        </h1>
        <p class="lead col-lg-8 mx-auto" data-aos="fade-up" data-aos-delay="200">
            {{ $sobre->hero->lead }}
        </p>
        <a href="{{ route('planos.servicos') }}" class="btn btn-secondary-tuxnet btn-lg mt-4" data-aos="fade-up" data-aos-delay="400">
            {{ $sobre->hero->buttonText }} <i class="bi bi-arrow-right-short"></i>
        </a>
    </div>
</section>

<section id="nossa-jornada" class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="font-montserrat h2-style">{{ $sobre->jornada->titulo }}</h2>
            <p class="lead text-muted">{{ $sobre->jornada->subtitulo }}</p>
        </div>
        
        <div class="timeline">
            @foreach($sobre->jornada->eventos as $evento)
            <div class="timeline-item" data-aos="{{ $loop->iteration % 2 == 0 ? 'fade-left' : 'fade-right' }}">
                <div class="timeline-icon"><i class="{{ $evento->icone }}"></i></div>
                <div class="timeline-content">
                    <h3 class="timeline-title">{{ $evento->ano }}: {{ $evento->titulo }}</h3>
                    <p>{{ $evento->descricao }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="nosso-dna" class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="font-montserrat h2-style">{{ $sobre->dna->titulo }}</h2>
        </div>
        <div class="row text-center">
            <div class="col-lg-4 mb-4" data-aos="fade-up">
                <div class="dna-card p-4 h-100">
                    <i class="bi {{ $sobre->dna->missao->icone }} display-2 text-secondary-tuxnet mb-3"></i>
                    <h3 class="font-montserrat">{{ $sobre->dna->missao->titulo }}</h3>
                    <p class="text-muted">{{ $sobre->dna->missao->texto }}</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="dna-card p-4 h-100">
                    <i class="bi {{ $sobre->dna->visao->icone }} display-2 text-secondary-tuxnet mb-3"></i>
                    <h3 class="font-montserrat">{{ $sobre->dna->visao->titulo }}</h3>
                    <p class="text-muted">{{ $sobre->dna->visao->texto }}</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="dna-card p-4 h-100">
                    <i class="bi {{ $sobre->dna->valores->icone }} display-2 text-secondary-tuxnet mb-3"></i>
                    <h3 class="font-montserrat">{{ $sobre->dna->valores->titulo }}</h3>
                    <ul class="list-unstyled text-muted">
                        @foreach($sobre->dna->valores->lista as $valor)
                        <li><i class="bi {{ $valor->icone }} text-primary-tuxnet me-2"></i>{{ $valor->nome }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="nosso-time" class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="font-montserrat h2-style">{{ $sobre->time->titulo }}</h2>
            <p class="lead text-muted">{{ $sobre->time->subtitulo }}</p>
        </div>
        <div class="row justify-content-center">
            @foreach($sobre->time->membros as $membro)
            <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 150 }}">
                <div class="team-card">
                    <img src="{{ asset($membro->foto_url) }}" alt="Foto de {{ $membro->nome }}" class="team-img">
                    <div class="team-info">
                        <h5 class="mb-0">{{ $membro->nome }}</h5>
                        <p class="text-muted">{{ $membro->cargo }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="nossa-pegada" class="section-padding bg-primary-tuxnet text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="font-montserrat display-5 fw-bold mb-4">{{ $sobre->pegada->titulo }}</h2>
                <div class="row">
                    @foreach($sobre->pegada->numeros as $item)
                    <div class="col-md-6 mb-4">
                        <h3 class="display-4 fw-bold">{{ $item->numero }}</h3>
                        <p>{{ $item->descricao }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="{{ asset($sobre->pegada->mapa_url) }}" alt="Mapa de cobertura da Tuxnet na Bahia" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<section id="faq" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="font-montserrat h2-style">Perguntas Frequentes</h2>
                <p class="lead text-muted">Tire suas dúvidas sobre nossos serviços e planos.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="accordion accordion-flush" id="faqAccordionTuxnet">
                    @foreach($sobre->faq as $item)
                    <div class="accordion-item" data-aos="fade-up">
                        <h2 class="accordion-header" id="faqHeading{{ $loop->index }}">
                            <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }} fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $loop->index }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="faqCollapse{{ $loop->index }}">
                                {{ $item->pergunta }}
                            </button>
                        </h2>
                        <div id="faqCollapse{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="faqHeading{{ $loop->index }}" data-bs-parent="#faqAccordionTuxnet">
                            <div class="accordion-body">
                                {{ $item->resposta }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section id="cta-sobre" class="section-padding text-center bg-light">
    <div class="container" data-aos="zoom-in">
        <h2 class="font-montserrat h2-style">{{ $sobre->cta->titulo }}</h2>
        <p class="lead text-muted col-lg-7 mx-auto">{{ $sobre->cta->subtitulo }}</p>
        <a href="{{ route('planos.servicos') }}" class="btn btn-primary-tuxnet btn-lg mt-4">
            {{ $sobre->cta->buttonText }}
        </a>
    </div>
</section>

@endsection 
@push('scripts')
    {{-- Adiciona o script da biblioteca AOS e o inicializa --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inicializa o AOS depois que a página carregar completamente
        window.addEventListener('load', function() {
            AOS.init({
                duration: 800,      // Duração da animação em ms
                once: true,         // A animação acontece apenas uma vez
                offset: 100,        // Distância em pixels para disparar a animação
            });
        });
    </script>
@endpush