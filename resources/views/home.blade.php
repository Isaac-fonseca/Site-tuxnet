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
                    <img src="{{ asset('img/banners/banner1.jpg') }}" class="d-block w-100" alt="Banner Promocional 1">
                    <div class="assine-ja-container">
                        <a href="{{ route('planos.servicos') }}" class="btn btn-lg btn-assine-ja">ASSINE JÁ</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banners/banner2.jpg') }}" class="d-block w-100" alt="Banner Novos Serviços">
                    <div class="assine-ja-container">
                        <a href="{{ route('planos.servicos') }}" class="btn btn-lg btn-assine-ja">ASSINE JÁ</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banners/banner3.png') }}" class="d-block w-100" alt="Banner Qualidade Tuxnet">
                    <div class="assine-ja-container">
                        <a href="{{ route('planos.servicos') }}" class="btn btn-lg btn-assine-ja">ASSINE JÁ</a>
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

 

 <section id="cta-whatsapp" class="section-padding bg-light">
        <div class="container">
            <div class="cta-content-box animate-on-scroll fade-in-up">
                <div class="row align-items-center">
                    <div class="col-md-5 mb-4 mb-md-0 text-center text-md-start">
                        <img src="{{ asset('img/tuxvalor.jpg') }}" class="img-fluid rounded cta-image" alt="Fale com a Tuxnet"> {{-- SUBSTITUA PELA SUA IMAGEM REAL, SE O SLOGAN.PNG NÃO FOR A IMAGEM DA CTA --}}
                    </div>
                    <div class="col-md-7 text-center text-md-start">
                        <i class="bi bi-whatsapp display-2 mb-3 text-primary-tuxnet d-block d-md-none"></i> 
                        <h2 class="font-montserrat mb-3 cta-title text-primary-tuxnet">Conexão <span class="text-secondary-tuxnet">Sem Limites</span> na Palma da Sua Mão!</h2>
                        <p class="lead mb-4 cta-text text-dark"> 
                            Cansado de internet lenta? Fale com nossos especialistas e descubra o plano ideal com a velocidade e o suporte que você merece!
                        </p>
                        <a href="https://wa.me/5508007226662?text=Olá! Gostaria de mais informações sobre os planos da Tuxnet." target="_blank" class="btn btn-lg btn-secondary-tuxnet tuxnet-cta-button">
                            <i class="bi bi-whatsapp me-2"></i> Chamar no WhatsApp
                        </a>
                        <p class="mt-3 mb-0 cta-phone-number">
                            <i class="bi bi-telephone-fill"></i> Ou ligue: 0800 722 6662
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <a href="https://wa.me/5508007226662?text=Olá! Gostaria de mais informações sobre os planos da Tuxnet." target="_blank" class="whatsapp-float" title="Fale Conosco pelo WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>
@endsection

@push('scripts')
    
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush
