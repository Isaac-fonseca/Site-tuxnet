@extends('layouts.app')

@section('title', 'Trabalhe Conosco')
@push('styles')
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush
@section('content')

 <section class="hero-empresas text-center">
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <h1 class="display-3 fw-bold text-white">Conectividade de Alta Performance para o seu Negócio</h1>
                <p class="lead my-4 mx-auto" style="max-width: 800px;">Soluções desenhadas para empresas que não podem parar.</p>
                <a href="#contato-empresas" class="btn btn-primary-tuxnet btn-lg">Solicite uma Proposta</a>
            </div>

            <div class="diagnosis-content">
                <div class="text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="section-title">Qual a sua necessidade?</h2>
                    <p class="lead-corporate">Clique na sua principal necessidade e veja como podemos ajudar.</p>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300"><a href="#solucao-wifi" class="diagnosis-card"><div class="icon"><i class="bi bi-wifi"></i></div><h5>Wi-Fi para Clientes</h5><p class="text-muted mb-0">Lojas e restaurantes</p></a></div>
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400"><a href="#solucao-operacoes" class="diagnosis-card"><div class="icon"><i class="bi bi-briefcase-fill"></i></div><h5>Operações Críticas</h5><p class="text-muted mb-0">Escritórios e Indústria</p></a></div>
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="500"><a href="#solucao-seguranca" class="diagnosis-card"><div class="icon"><i class="bi bi-shield-shaded"></i></div><h5>Segurança e Failover</h5><p class="text-muted mb-0">Proteção de dados</p></a></div>
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="600"><a href="#solucao-infra" class="diagnosis-card"><div class="icon"><i class="bi bi-hdd-network-fill"></i></div><h5>Infraestrutura Própria</h5><p class="text-muted mb-0">Dark Fiber e Colocation</p></a></div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- SEÇÃO DE SOLUÇÕES (COM FEATURE CARDS) -->
    <section id="servicos-empresas" class="section-padding" style="background-color: #f0f2f5;">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Nossas Soluções Completas</h2>
                <p class="lead-corporate">Da conexão à segurança, temos o projeto ideal para o seu negócio.</p>
            </div>

            <!-- Solução 1: Wi-Fi para Clientes -->
            <div id="solucao-wifi" class="row align-items-center solution-item">
                <div class="col-md-6" data-aos="fade-right"><img src="https://images.unsplash.com/photo-1590650153355-a5180805956c?q=80&w=2070&auto=format&fit=crop" alt="Wi-Fi em um restaurante" class="solution-image"></div>
                <div class="col-md-6 ps-md-5" data-aos="fade-left">
                    <div class="solution-content">
                        <div class="solution-icon"><i class="bi bi-wifi"></i></div>
                        <h3>Wi-Fi de Alta Performance para Clientes</h3>
                        <p class="text-muted">Ofereça uma experiência de conexão segura e de alta velocidade para seus visitantes com nossa solução de **Access Points** gerenciados.</p>
                        <div class="mt-4">
                            <div class="feature-card"><i class="bi bi-check-circle-fill feature-icon"></i><div><strong>Portal de login customizável</strong><br><small class="text-muted">Fortaleça sua marca e colete dados para marketing.</small></div></div>
                            <div class="feature-card"><i class="bi bi-check-circle-fill feature-icon"></i><div><strong>Controle de banda por usuário</strong><br><small class="text-muted">Garanta uma experiência justa para todos os conectados.</small></div></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Solução 2: Link Dedicado e Home Office -->
            <div id="solucao-operacoes" class="row align-items-center solution-item">
                <div class="col-md-6 order-md-2" data-aos="fade-left"><img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=2070&auto=format&fit=crop" alt="Equipe em reunião" class="solution-image"></div>
                <div class="col-md-6 pe-md-5 order-md-1" data-aos="fade-right">
                    <div class="solution-content">
                        <div class="solution-icon"><i class="bi bi-briefcase-fill"></i></div>
                        <h3>Conectividade para Operações Críticas</h3>
                        <p class="text-muted">Para empresas que não podem parar. Garanta máxima performance na sua matriz e uma conexão estável para sua equipe em trabalho remoto.</p>
                        <div class="mt-4">
                            <div class="feature-card"><i class="bi bi-check-circle-fill feature-icon"></i><div><strong>Link Dedicado 100% fibra</strong><br><small class="text-muted">Garantia de banda e a mais alta disponibilidade do mercado.</small></div></div>
                            <div class="feature-card"><i class="bi bi-check-circle-fill feature-icon"></i><div><strong>PABX Virtual na nuvem</strong><br><small class="text-muted">Modernize sua telefonia com ramais, URA e mobilidade.</small></div></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Solução 3: Segurança e Continuidade -->
            <div id="solucao-seguranca" class="row align-items-center solution-item">
                <div class="col-md-6" data-aos="fade-right"><img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?q=80&w=1920&auto=format&fit=crop" alt="Servidores e segurança de dados" class="solution-image"></div>
                <div class="col-md-6 ps-md-5" data-aos="fade-left">
                    <div class="solution-content">
                        <div class="solution-icon"><i class="bi bi-shield-shaded"></i></div>
                        <h3>Segurança e Continuidade</h3>
                        <p class="text-muted">Proteja os dados da sua empresa e garanta que sua operação nunca pare, mesmo em caso de falha no link principal.</p>
                        <div class="mt-4">
                            <div class="feature-card"><i class="bi bi-check-circle-fill feature-icon"></i><div><strong>Firewall e Antivírus Kaspersky</strong><br><small class="text-muted">Proteção avançada contra ameaças digitais para seus servidores e estações.</small></div></div>
                            <div class="feature-card"><i class="bi bi-check-circle-fill feature-icon"></i><div><strong>Sistema de Failover automático</strong><br><small class="text-muted">Sua conexão muda para um link de backup instantaneamente em caso de falha.</small></div></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- NOVA Solução 4: Dark Fiber e Colocation -->
            <div id="solucao-infra" class="row align-items-center solution-item">
                <div class="col-md-6 order-md-2" data-aos="fade-left"><img src="https://images.unsplash.com/photo-1580894732444-8ec5321f766b?q=80&w=2070&auto=format&fit=crop" alt="Infraestrutura de Data Center" class="solution-image"></div>
                <div class="col-md-6 pe-md-5 order-md-1" data-aos="fade-right">
                    <div class="solution-content">
                        <div class="solution-icon"><i class="bi bi-hdd-network-fill"></i></div>
                        <h3>Infraestrutura como Serviço</h3>
                        <p class="text-muted">Para empresas que necessitam de controle total e da máxima segurança. Oferecemos infraestrutura de ponta para hospedar seus equipamentos e expandir sua rede.</p>
                        <div class="mt-4">
                            <div class="feature-card"><i class="bi bi-check-circle-fill feature-icon"></i><div><strong>Dark Fiber</strong><br><small class="text-muted">Alugue nossa fibra óptica "apagada" e crie sua própria rede privada de altíssima velocidade e baixa latência.</small></div></div>
                            <div class="feature-card"><i class="bi bi-check-circle-fill feature-icon"></i><div><strong>Colocation</strong><br><small class="text-muted">Hospede seus servidores em nosso Data Center com segurança, climatização e energia redundante.</small></div></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA FINAL DA SEÇÃO DE SOLUÇÕES -->
            <div class="row mt-5">
                <div class="col-12" data-aos="fade-up">
                    <div class="cta-banner">
                        <div class="cta-icon d-none d-lg-block">
                            <i class="bi bi-headset"></i>
                        </div>
                        <div class="cta-text flex-grow-1">
                            <h4 class="mb-1">Sua Empresa é Única. Sua Solução Também Deveria Ser.</h4>
                            <p class="mb-0">Nossos especialistas estão prontos para desenhar um projeto de conectividade sob medida, que atenda exatamente às suas necessidades e ao seu orçamento.</p>
                        </div>
                        <a href="#contato-empresas" class="btn btn-primary-tuxnet ms-lg-auto">Fale com um Especialista</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
<!-- ======================================= -->
<!-- SEÇÃO DE CONTATO -->
<!-- ======================================= -->
<section id="contato-empresas" class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="section-title">Pronto para Elevar a Conectividade da sua Empresa?</h2>
                <p class="lead-corporate mt-3">Preencha o formulário ao lado e um de nossos consultores especializados entrará em contato para entender sua necessidade e desenhar a solução ideal para o seu negócio.</p>
                <p class="mt-4"><i class="bi bi-telephone-fill me-2 text-primary"></i> Ou, se preferir, ligue para nosso canal de vendas corporativas: <strong>0800 722 6662</strong></p>
            </div>
            <div class="col-lg-6">
                <div class="contact-form p-4 p-md-5 bg-light" style="border-radius: 12px;">
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="empresa-nome" class="form-label">Nome da Empresa</label>
                            <input type="text" class="form-control" id="empresa-nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="empresa-contato" class="form-label">Seu Nome</label>
                            <input type="text" class="form-control" id="empresa-contato" required>
                        </div>
                        <div class="mb-3">
                            <label for="empresa-email" class="form-label">E-mail Corporativo</label>
                            <input type="email" class="form-control" id="empresa-email" required>
                        </div>
                        <div class="mb-3">
                            <label for="empresa-telefone" class="form-label">Telefone / WhatsApp</label>
                            <input type="tel" class="form-control" id="empresa-telefone" required>
                        </div>
                        <div class="mb-3">
                            <label for="empresa-mensagem" class="form-label">Qual serviço você tem interesse?</label>
                            <textarea class="form-control" id="empresa-mensagem" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-submit w-100">Enviar Solicitação</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

  

@endsection
@push('scripts')
   <script> 
      window.addEventListener('load', function() {
            AOS.init({
                duration: 800, // Duração da animação em ms
                once: true, // A animação acontece apenas uma vez
            });
        });

   </script>

    @endpush