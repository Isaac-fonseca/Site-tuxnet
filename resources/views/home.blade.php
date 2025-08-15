{{-- /resources/views/home.blade.php --}}

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
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/dogtuxnet.png') }}" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/preguiça200.png') }}" class="d-block w-100" alt="Banner 3">
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

    <section id="planos-destaque" class="section-padding">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold">Ofertas Especiais para Você!</h2>
                <p class="lead text-muted">Garanta sua ultravelocidade com preço de promoção antes que acabe.</p>
            </div>

            <div class="swiper plans-carousel" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    @foreach($planosDestaque as $plano)
                        <div class="swiper-slide">
                            @include('partials.plan_card', ['plano' => $plano])
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="swiper-navigation-wrapper" data-aos="fade-up" data-aos-delay="300">
                <div class="swiper-button-prev"><i class="bi bi-chevron-left"></i></div>
                <div class="swiper-button-next"><i class="bi bi-chevron-right"></i></div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ route('planos.servicos') }}" class="btn btn-ver-planos btn-lg px-4">
                    <i class="bi bi-grid-3x3-gap-fill me-2"></i>
                    Ver Todos os Nossos Planos
                </a>
            </div>
        </div>
    </section>

    <section id="app-tuxnet" class="section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0 d-flex justify-content-center" data-aos="fade-left">
                    <img src="{{ asset('img/celular.png') }}" class="img-fluid rounded shadow-lg app-tuxnet-image" alt="Aplicativo Tuxnet">
                </div>
                <div class="col-lg-6 order-lg-1" data-aos="fade-right">
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
                        <div class="col-md-7">
                            <p class="fw-bold mb-2">Baixe agora e facilite seu dia a dia:</p>
                            <div class="app-buttons-container">
                                <a href="https://play.google.com/store/apps/details?id=com.hubsoft_client_app.tuxnet&hl=pt_BR" target="_blank" class="btn-app-store">
                                    <i class="bi bi-google-play"></i>
                                    <div><span>Disponível no</span> Google Play</div>
                                </a>
                                <a href="https://apps.apple.com/br/app/tuxnet/id1530094992" target="_blank" class="btn-app-store">
                                    <i class="bi bi-apple"></i>
                                    <div><span>Baixar na</span> App Store</div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-5 mt-4 mt-md-0 d-flex justify-content-center justify-content-md-end">
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
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="font-montserrat">Por que escolher a <span class="text-primary-tuxnet">Tuxnet</span>?</h2>
                    <p class="lead">Descubra os diferenciais que fazem da nossa conexão a melhor escolha para você.</p>
                </div>
            </div>
            <div class="row text-center justify-content-center">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card h-100 p-4">
                        <div class="feature-icon mb-3"><i class="bi bi-speedometer2 display-4 text-secondary-tuxnet"></i></div>
                        <h5 class="font-montserrat mb-2">Ultra Velocidade</h5>
                        <p class="small">Fibra óptica de ponta para navegação, streaming e jogos sem travamentos.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card h-100 p-4">
                        <div class="feature-icon mb-3"><i class="bi bi-headset display-4 text-secondary-tuxnet"></i></div>
                        <h5 class="font-montserrat mb-2">Suporte Ágil</h5>
                        <p class="small">Nossa equipe especializada está pronta para te ajudar rapidamente quando precisar.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card h-100 p-4">
                        <div class="feature-icon mb-3"><i class="bi bi-gem display-4 text-secondary-tuxnet"></i></div>
                        <h5 class="font-montserrat mb-2">Tecnologia de Ponta</h5>
                        <p class="small">Investimento constante em infraestrutura moderna para sua melhor experiência.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="cidades-atendidas" class="section-padding cidades-atendidas">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="font-montserrat">Cidades <span class="text-primary-tuxnet">Atendidas na Bahia</span></h2>
                    <p class="lead">Levamos nossa conexão de alta qualidade para diversas localidades. Clique na sua cidade para ver nossos endereços!</p>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($lojasPorCidade as $cidade => $enderecos)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card h-100 text-center cidade-card" data-bs-toggle="modal" data-bs-target="#modalEnderecos" data-cidade="{{ $cidade }}" data-enderecos="{{ json_encode($enderecos) }}" style="cursor: pointer;">
                        @if ($cidade == 'Riachão do Jacuípe')
                            <span class="selo-matriz">MATRIZ <i class="bi bi-star-fill ms-1"></i></span>
                        @endif
                        <div class="card-body">
                            <img src="img/logos/tlogo.svg" alt="Ícone de localização Tuxo" class="icone-localizacao mb-3">
                            <h5 class="card-title font-montserrat">{{ $cidade }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row mt-4" data-aos="fade-up">
                <div class="col-12 text-center">
                    <p>Não encontrou sua cidade? <a href="#cta-whatsapp" class="text-primary-tuxnet fw-bold">Entre em contato</a> para verificar a disponibilidade.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="cta-whatsapp" class="section-padding bg-light">
       <div class="container" data-aos="fade-up">
            <div class="cta-content-box">
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

    <a href="https://wa.me/5508007226662?text=Olá! Gostaria de mais informações sobre os planos da Tuxnet." target="_blank" class="whatsapp-float" title="Fale Conosco pelo WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

@endsection

@push('modals')
    {{-- O HTML do seu modal de endereços permanece aqui, sem alterações --}}
     <div class="modal fade" id="modalEnderecos" tabindex="-1" aria-labelledby="modalEnderecosLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-montserrat" id="modalEnderecosLabel">Endereços em <span id="modal-cidade-nome"></span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="modal-lista-enderecos">
              {{-- Endereços são populados aqui via JavaScript --}}
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
@endpush

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
