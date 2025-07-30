@extends('layouts.app')

@section('title', 'Página Inicial')

@push('styles')

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



            </div>

            <div class="carousel-item active">
                <img src="{{ asset('img/dogtuxnet.png') }}" class="d-block w-100" alt="Banner Novos Serviços">

            </div>


        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
</section>

<section id="planos-destaque" class="section-padding bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">A ultravelocidade que você precisa!</h2>
            <p class="lead text-muted">com o plano que cabe no seu bolso.</p>
        </div>

        <div class="swiper plans-carousel">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="card plan-card-new h-100">
                        <div class="card-body d-flex flex-column text-center p-4">
                            <p class="plan-title">COMBO BÁSICO</p>
                             <div class="plan-speed my-2">
                                 <span class="speed-number">100</span>
                                 <span class="speed-unit">MEGA</span>
                             </div>
                             <div class="installation-banner my-3">
                                 INSTALAÇÃO GRATUITA 100% FIBRA
                             </div>
                             <p class="viability-text small my-2">*SOB CONSULTA DE VIABILIDADE</p>
                             <div class="price-separator my-3">
                                 <span>POR APENAS</span>
                             </div>
                             <div class="price-display-new mb-2">
                                 <span class="currency">R$</span>
                                 <span class="main-price">69</span>
                                 <span class="cents">,99</span>
                                 <span class="period">/MÊS</span>
                             </div>
                             <div class="payment-method d-flex justify-content-center align-items-center gap-2 small">
                                 <i class="bi bi-upc-scan"></i>
                                 <span>Boleto</span>
                             </div>
                             <a href="#" class="btn btn-contratar mt-4">Contratar Agora</a>
                             <div class="slogan-container mt-auto pt-4">
                                 <p class="slogan-text">Internet <span class="highlight">sem dor de cabeça</span></p>
                                 <img src="{{ asset('img/cachorro-dor.png') }}" alt="Internet sem dor de cabeça" class="slogan-image">
                             </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="card plan-card-new  h-100">
                         <div class="card-body d-flex flex-column text-center p-4">
                            <p class="plan-title">COMBO PLUS</p>
                             <div class="plan-speed my-2">
                                 <span class="speed-number">400</span>
                                 <span class="speed-unit">MEGA</span>
                             </div>
                             <div class="installation-banner my-3">
                                 INSTALAÇÃO GRATUITA 100% FIBRA
                             </div>
                             <p class="viability-text small my-2">*SOB CONSULTA DE VIABILIDADE</p>
                             <div class="price-separator my-3">
                                 <span>POR APENAS</span>
                             </div>
                             <div class="price-display-new mb-2">
                                 <span class="currency">R$</span>
                                 <span class="main-price">79</span>
                                 <span class="cents">,99</span>
                                 <span class="period">/MÊS</span>
                             </div>
                             <div class="payment-method d-flex justify-content-center align-items-center gap-2 small">
                                 <i class="bi bi-upc-scan"></i>
                                 <span>BOLETO</span>
                             </div>
                             <a href="#" class="btn btn-contratar mt-4">Contratar Agora</a>
                             <div class="slogan-container mt-auto pt-4">
                                 <p class="slogan-text">Internet <span class="highlight">sem dor de cabeça</span></p>
                                 <img src="{{ asset('img/cachorro-dor.png') }}" alt="Internet sem dor de cabeça" class="slogan-image">
                             </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="card plan-card-new h-100">
                        <div class="card-body d-flex flex-column text-center p-4">
                           <p class="plan-title">COMBO SUPER</p>
                            <div class="plan-speed my-2">
                                <span class="speed-number">600</span>
                                <span class="speed-unit">MEGA</span>
                            </div>
                            <div class="installation-banner my-3">
                                INSTALAÇÃO GRATUITA 100% FIBRA
                            </div>
                            <p class="viability-text small my-2">*SOB CONSULTA DE VIABILIDADE</p>
                            <div class="price-separator my-3">
                                <span>POR APENAS</span>
                            </div>
                            <div class="price-display-new mb-2">
                                <span class="currency">R$</span>
                                <span class="main-price">89</span>
                                <span class="cents">,99</span>
                                <span class="period">/MÊS</span>
                            </div>
                            <div class="payment-method d-flex justify-content-center align-items-center gap-2 small">
                                <i class="bi-upc-scan"></i>
                                <span>boleto</span>
                            </div>
                            <a href="#" class="btn btn-contratar mt-4">Contratar Agora</a>
                            <div class="slogan-container mt-auto pt-4">
                                <p class="slogan-text">Internet <span class="highlight">sem dor de cabeça</span></p>
                                <img src="{{ asset('img/cachorro-dor.png') }}" alt="Internet sem dor de cabeça" class="slogan-image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="card plan-card-new h-100">
                        <div class="card-body d-flex flex-column text-center p-4">
                           <p class="plan-title">COMBO SUPER</p>
                            <div class="plan-speed my-2">
                                <span class="speed-number">800</span>
                                <span class="speed-unit">MEGA</span>
                            </div>
                            <div class="installation-banner my-3">
                                INSTALAÇÃO GRATUITA 100% FIBRA
                            </div>
                            <p class="viability-text small my-2">*SOB CONSULTA DE VIABILIDADE</p>
                            <div class="price-separator my-3">
                                <span>POR APENAS</span>
                            </div>
                            <div class="price-display-new mb-2">
                                <span class="currency">R$</span>
                                <span class="main-price">109</span>
                                <span class="cents">,99</span>
                                <span class="period">/MÊS</span>
                            </div>
                            <div class="payment-method d-flex justify-content-center align-items-center gap-2 small">
                                <i class="bi-upc-scan"></i>
                                <span>boleto</span>
                            </div>
                            <a href="#" class="btn btn-contratar mt-4">Contratar Agora</a>
                            <div class="slogan-container mt-auto pt-4">
                                <p class="slogan-text">Internet <span class="highlight">sem dor de cabeça</span></p>
                                <img src="{{ asset('img/cachorro-dor.png') }}" alt="Internet sem dor de cabeça" class="slogan-image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="card plan-card-new h-100">
                        <div class="card-body d-flex flex-column text-center p-4">
                           <p class="plan-title">PREMIUM</p>
                            <div class="plan-speed my-2">
                                <span class="speed-number">1.0</span>
                                <span class="speed-unit">GIGA</span>
                            </div>
                            <div class="installation-banner my-3">
                                INSTALAÇÃO GRATUITA 100% FIBRA
                            </div>
                            <p class="viability-text small my-2">*SOB CONSULTA DE VIABILIDADE</p>
                            <div class="price-separator my-3">
                                <span>POR APENAS</span>
                            </div>
                            <div class="price-display-new mb-2">
                                <span class="currency">R$</span>
                                <span class="main-price">134</span>
                                <span class="cents">,99</span>
                                <span class="period">/MÊS</span>
                            </div>
                            <div class="payment-method d-flex justify-content-center align-items-center gap-2 small">
                                <i class="bi-upc-scan"></i>
                                <span>boleto</span>
                            </div>
                            <a href="#" class="btn btn-contratar mt-4">Contratar Agora</a>
                            <div class="slogan-container mt-auto pt-4">
                                <p class="slogan-text">Internet <span class="highlight">sem dor de cabeça</span></p>
                                <img src="{{ asset('img/cachorro-dor.png') }}" alt="Internet sem dor de cabeça" class="slogan-image">
                            </div>
                        </div>
                    </div>
                </div>

                </div><div class="swiper-navigation-wrapper">
            <div class="swiper-button-prev">
                <i class="bi bi-chevron-left"></i>
            </div>
            <div class="swiper-button-next">
                <i class="bi bi-chevron-right"></i>
            </div>



        </div>
    </div>
</section>



    <section id="app-tuxnet" class="section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0 text-center animate-on-scroll fade-in-right">
                    <img src="{{ asset('img/celular.png') }}" class="img-fluid rounded shadow-lg app-tuxnet-image" alt="Aplicativo Tuxnet">
                </div>
                <div class="col-lg-6 order-lg-1 animate-on-scroll fade-in-left">
                    <h2 class="font-montserrat mb-3">Gerencie Tudo na <span class="text-primary-tuxnet">Palma da Sua Mão</span></h2>
                    <p class="lead mb-3">Com o aplicativo Tuxnet, você tem o controle total dos seus serviços de forma rápida e fácil!</p>
                    <ul class="list-unstyled app-features-list mb-4">
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Acompanhe seu consumo de dados.</li>
                        <li><i class="bi bi-receipt-cutoff text-success me-2"></i>Acesse e pague suas faturas.</li>
                        <li><i class="bi bi-tools text-success me-2"></i>Solicite suporte técnico simplificado.</li>
                        <li><i class="bi bi-bell-fill text-success me-2"></i>Fique por dentro das novidades e promoções.</li>
                        <li><i class="bi bi-pencil-square text-success me-2"></i>Altere dados cadastrais e muito mais!</li>
                    </ul>
                    <div class="row align-items-center">
                        <div class="col-md-7 col-lg-12 col-xl-7">
                            <p class="fw-bold">Baixe agora e facilite seu dia a dia:</p>
                            <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                                <a href="https://play.google.com/store/apps/details?id=com.hubsoft_client_app.tuxnet&hl=pt_BR" class="me-3"><img src="https://placehold.co/150x50/FCB62E/FFFFFF?text=Play+Store" alt="Disponível no Play Store" style="height: 50px;"></a>
                                <a href="https://apps.apple.com/br/app/tuxnet/id1530094992"><img src="https://placehold.co/150x50/FCB62E/FFFFFF?text=Apple+Store" alt="Disponível na Apple Store" style="height: 50px;"></a>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-12 col-xl-5 mt-3 mt-md-0 text-center text-md-end">
                            <img src="{{ asset('img/playstore.png') }}" class="img-fluid app-qrcode" alt="QR Code para baixar o aplicativo Tuxnet">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="porque-tuxnet" class="section-padding bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="font-montserrat">Por que escolher a <span class="text-primary-tuxnet">Tuxnet</span>?</h2>
                    <p class="lead">Descubra os diferenciais que fazem da nossa conexão a melhor escolha para você.</p>
                </div>
            </div>
            <div class="row text-center justify-content-center">

                <div class="col-lg-4 col-md-6 mb-4 animate-on-scroll fade-in-up">
                    <div class="feature-card h-100 p-4">
                        <div class="feature-icon mb-3"><i class="bi bi-speedometer2 display-4 text-secondary-tuxnet"></i></div>
                        <h5 class="font-montserrat mb-2">Ultra Velocidade</h5>
                        <p class="small">Fibra óptica de ponta para navegação, streaming e jogos sem travamentos.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 animate-on-scroll fade-in-up" data-animation-delay="100">
                    <div class="feature-card h-100 p-4">
                        <div class="feature-icon mb-3"><i class="bi bi-headset display-4 text-secondary-tuxnet"></i></div>
                        <h5 class="font-montserrat mb-2">Suporte Ágil</h5>
                        <p class="small">Nossa equipe especializada está pronta para te ajudar rapidamente quando precisar.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 animate-on-scroll fade-in-up" data-animation-delay="200">
                    <div class="feature-card h-100 p-4">
                        <div class="feature-icon mb-3"><i class="bi bi-gem display-4 text-secondary-tuxnet"></i></div>
                        <h5 class="font-montserrat mb-2">Tecnologia de Ponta</h5>
                        <p class="small">Investimento constante em infraestrutura moderna para sua melhor experiência.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 animate-on-scroll fade-in-up" data-animation-delay="300">
                    <div class="feature-card h-100 p-4">
                        <div class="feature-icon mb-3"><i class="bi bi-file-earmark-text display-4 text-secondary-tuxnet"></i></div>
                        <h5 class="font-montserrat mb-2">Planos Transparentes</h5>
                        <p class="small">Sem surpresas na fatura e com a clareza que você merece ao contratar.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 animate-on-scroll fade-in-up" data-animation-delay="400">
                    <div class="feature-card h-100 p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-gift-fill display-4 text-secondary-tuxnet"></i>
                        </div>
                        <h5 class="font-montserrat mb-2">Vantagens Exclusivas (SVA)</h5>
                        <p class="small">Aproveite pacotes bônus como Deezer, MAX e GloboPlay inclusos em diversos planos para seu entretenimento!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="cidades-atendidas" class="section-padding cidades-atendidas">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="font-montserrat">Cidades <span class="text-primary-tuxnet">Atendidas na Bahia</span></h2>
                    <p class="lead">Levamos nossa conexão de alta qualidade para diversas localidades. Clique na sua cidade para ver no mapa!</p>
                </div>
            </div>
            <div class="row justify-content-center">
                @php
                    $cidades = [
                        'Feira de Santana', 'Ichu', 'Pé de Serra', 'Riachão do Jacuípe',
                        'Retirolândia', 'Santaluz', 'São Domingos', 'Serra Preta'
                    ];
                @endphp
                @foreach($cidades as $cidade)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($cidade . ', Bahia, Brazil') }}" target="_blank" class="cidade-card-link text-decoration-none">
                        <div class="card h-100 text-center cidade-card">
                            <div class="card-body">
                                <i class="bi bi-geo-alt-fill display-4 text-secondary-tuxnet mb-3"></i>
                                <h5 class="card-title font-montserrat">{{ $cidade }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>Não encontrou sua cidade? <a href="{{ route('home') }}#cta-whatsapp" class="text-primary-tuxnet fw-bold">Entre em contato</a> para verificar a disponibilidade.</p>
                </div>
            </div>
        </div>
    </section>


    <section id="cta-whatsapp" class="section-padding bg-light">
       <div class="container">
            <div class="cta-content-box animate-on-scroll fade-in-up">
                <div class="row align-items-center">
                    <div class="col-md-5 mb-4 mb-md-0 text-center text-md-start">
                        <img src="{{ asset('img/tuxvalor.jpg') }}" class="img-fluid rounded cta-image" alt="Fale com a Tuxnet">
                    </div>
                    <div class="col-md-7 text-center">
                        <i class="bi bi-whatsapp display-2 mb-3 text-primary-tuxnet d-block d-md-none"></i>
                        <h2 class="font-montserrat mb-3 cta-title text-primary-tuxnet">Conexão <span class="text-secondary-tuxnet">Sem Limites</span> na Palma da Sua Mão!</h2>
                        <p class="lead mb-4 cta-text text-dark">
                            Cansado de internet lenta? Fale com nossos especialistas e descubra o plano ideal com a velocidade e o suporte que você merece!
                        </p>
                        <div class="cta-actions-container">
                            <a href="https://wa.me/5508007226662?text=Olá! Gostaria de mais informações sobre os planos da Tuxnet." target="_blank" class="btn btn-lg btn-secondary-tuxnet tuxnet-cta-button">
                                <i class="bi bi-whatsapp me-2"></i> Chamar no WhatsApp
                            </a>
                            <p class="mt-3 mb-0 cta-phone-number">
                                <i class="bi bi-telephone-fill"></i> Ou ligue: <a href="tel:08007226662">0800 722 6662</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
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
    <a href="https://wa.me/5508007226662?text=Olá! Gostaria de mais informações sobre os planos da Tuxnet." target="_blank" class="whatsapp-float" title="Fale Conosco pelo WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>


@endsection


