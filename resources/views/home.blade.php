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
                    <img src="{{ asset('img/slogan.png') }}" class="img-fluid rounded shadow sobre-empresa-image" alt="Sobre a Tuxnet">
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
                <div class="col-12 text-center mb-5"> {{-- Aumentei o mb para mb-5 --}}
                    <h2 class="font-montserrat">Cidades <span class="text-primary-tuxnet">Atendidas na Bahia</span></h2>
                    <p class="lead">Levamos nossa conexão de alta qualidade para diversas localidades. Veja se a sua cidade está na lista!</p>
                </div>
            </div>
            <div class="row justify-content-center">
                @php
                    $cidades = ['Feira de Santana', 'Retiro', 'Riachão do Jacuípe', 'Valente', 'Santa Luz'];
                @endphp

                @foreach($cidades as $cidade)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 text-center cidade-card">
                        <div class="card-body">
                            <i class="bi bi-geo-alt-fill display-4 text-secondary-tuxnet mb-3"></i>
                            <h5 class="card-title font-montserrat">{{ $cidade }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>Não encontrou sua cidade? <a href="{{ url('/contato') }}" class="text-primary-tuxnet fw-bold">Entre em contato</a> para verificar a disponibilidade.</p>
                </div>
            </div>
        </div>
    </section>
</section>

    <section id="cta-whatsapp" class="section-padding bg-primary-tuxnet text-white">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <i class="bi bi-whatsapp display-1 mb-3 animate-on-scroll fade-in-up"></i>
                    <h2 class="font-montserrat mb-3 animate-on-scroll fade-in-up" data-animation-delay="100">Fale com um Especialista Agora!</h2>
                    <p class="lead mb-4 animate-on-scroll fade-in-up" data-animation-delay="200">
                        Tem dúvidas ou quer contratar o melhor plano de internet para você ou sua empresa? Nossa equipe está pronta para te atender pelo WhatsApp!
                    </p>
                    <a href="https://wa.me/5508007226662?text=Olá! Gostaria de mais informações sobre os planos da Tuxnet." target="_blank" class="btn btn-lg btn-secondary-tuxnet animate-on-scroll fade-in-up" data-animation-delay="300">
                        <i class="bi bi-whatsapp me-2"></i> Chamar no WhatsApp: 0800 722 6662
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- Fim da Seção CTA WhatsApp --}}

    {{-- Ícone Flutuante do WhatsApp (adicionado no final do content se for específico da home) --}}
    <a href="https://wa.me/5508007226662?text=Olá! Gostaria de mais informações sobre os planos da Tuxnet." target="_blank" class="whatsapp-float" title="Fale Conosco pelo WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>
@endsection

@push('scripts')
    {{-- Link para seu arquivo JavaScript principal da aplicação --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush
