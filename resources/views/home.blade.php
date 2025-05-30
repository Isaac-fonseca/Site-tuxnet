@extends('layouts.app')

@section('title', 'Página Inicial')

@push('styles')
    {{-- Link para seu novo arquivo CSS específico da home --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> {{-- Certifique-se que o caminho está correto --}}
@endpush

@section('content')

    <section id="hero-carousel" class="hero-carousel">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/banner1.jpg') }}" class="d-block w-100" alt="Banner Promocional 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="font-montserrat">Promoção Imperdível!</h5>
                        <p>Planos de internet com velocidade dobrada pelo mesmo preço. Aproveite!</p>
                        <a href="{{ url('/planos') }}" class="btn btn-secondary-tuxnet btn-sm">Conheça os Planos</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banner2.jpg') }}" class="d-block w-100" alt="Banner Novos Serviços">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="font-montserrat">Novos Serviços Chegando!</h5>
                        <p>Descubra nossas soluções completas para sua casa e empresa.</p>
                        <a href="{{ url('/planos/para-empresa') }}" class="btn btn-primary-tuxnet btn-sm">Para Empresas</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banner3.png') }}" class="d-block w-100" alt="Banner Qualidade Tuxnet">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="font-montserrat">A Qualidade que Você Confia</h5>
                        <p>Suporte técnico especializado e a melhor conexão da região.</p>
                        <a href="{{ url('/contato') }}" class="btn btn-light btn-sm">Fale Conosco</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </section>

    <section id="sobre-empresa" class="section-padding bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0 text-center animate-on-scroll fade-in-left">
                    <img src="https://placehold.co/600x400/5F1970/FFFFFF?text=Sobre+a+Tuxnet" class="img-fluid rounded shadow" alt="Sobre a Tuxnet" style="max-width: 450px;">
                </div>
                <div class="col-lg-6 animate-on-scroll fade-in-right">
                    <h2 class="font-montserrat mb-3 text-center text-lg-start">Bem-vindo à <span class="text-primary-tuxnet">Tuxnet</span></h2>
                    <p class="lead">Somos uma empresa líder em soluções de telecomunicações, dedicada a fornecer internet de alta velocidade, telefonia e serviços inovadores para residências e empresas.</p>
                    <p>Com uma infraestrutura moderna e uma equipe apaixonada por tecnologia, nosso compromisso é conectar pessoas e negócios ao futuro, oferecendo qualidade, confiança e um atendimento excepcional.</p>
                    <p>Nossa missão é simplificar sua vida digital, garantindo que você tenha sempre a melhor experiência, seja navegando, trabalhando, estudando ou se divertindo.</p>
                    <div class="text-center text-lg-start">
                        <a href="{{ url('/sobre') }}" class="btn btn-primary-tuxnet mt-3">Saiba Mais Sobre Nós</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="cidades-atendidas" class="section-padding cidades-atendidas">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="font-montserrat">Cidades <span class="text-primary-tuxnet">Atendidas</span></h2>
                    <p class="lead">Levamos nossa conexão de alta qualidade para diversas localidades. Veja se a sua cidade está na lista!</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <ul>
                        <li><i class="bi bi-geo-alt-fill me-2"></i>Cidade Exemplo 1</li>
                        <li><i class="bi bi-geo-alt-fill me-2"></i>Cidade Exemplo 2</li>
                        <li><i class="bi bi-geo-alt-fill me-2"></i>Cidade Exemplo 3</li>
                        <li><i class="bi bi-geo-alt-fill me-2"></i>Cidade Exemplo 4</li>
                        <li><i class="bi bi-geo-alt-fill me-2"></i>Cidade Exemplo 5</li>
                        <li><i class="bi bi-geo-alt-fill me-2"></i>Cidade Exemplo 6</li>
                        <li><i class="bi bi-geo-alt-fill me-2"></i>Cidade Exemplo 7</li>
                        <li><i class="bi bi-geo-alt-fill me-2"></i>Cidade Exemplo 8</li>
                        <li><i class="bi bi-geo-alt-fill me-2"></i>Cidade Exemplo 9</li>
                        <li><i class="bi bi-geo-alt-fill me-2"></i>Cidade Exemplo 10</li>
                        {{-- Adicione mais cidades conforme necessário --}}
                    </ul>
                    <div class="text-center mt-4">
                        <p>Não encontrou sua cidade? <a href="{{ url('/contato') }}" class="text-primary-tuxnet fw-bold">Entre em contato</a> para verificar a disponibilidade.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    {{-- Link para seu arquivo JavaScript principal da aplicação --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush
