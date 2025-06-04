<footer class="bg-primary-tuxnet text-white pt-5 pb-4">
    <div class="container text-center text-md-start">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold mb-4 font-montserrat text-secondary-tuxnet">
                    <i class="bi bi-gem me-2"></i>Tuxnet </h6>
                <p>
                    Conectando você ao futuro com a melhor tecnologia em internet e telecomunicações.
                </p>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold mb-4 font-montserrat text-secondary-tuxnet">
                    <i class="bi bi-headset me-2"></i>Contato
                </h6>
                <p class="mb-2">
                    <i class="bi bi-telephone-fill me-2"></i> <a href="tel:08007226662" class="text-white" style="text-decoration: none;">0800 722 6662</a>
                </p>
                <p>
                    <i class="bi bi-whatsapp me-2"></i> <a href="https://wa.me/5508007226662" target="_blank" class="text-white" style="text-decoration: none;">WhatsApp</a>
                </p>
              
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold mb-4 font-montserrat text-secondary-tuxnet">
                    <i class="bi bi-share-fill me-2"></i>Siga-nos
                </h6>
                <p class="mb-2">
                    <a href="https://www.facebook.com/redetuxnet" target="_blank" class="text-white d-inline-block me-3">
                        <i class="bi bi-facebook me-2"></i> Facebook
                    </a>
                </p>
                <p class="mb-2">
                    <a href="https://www.instagram.com/redetuxnet" target="_blank" class="text-white d-inline-block me-3">
                        <i class="bi bi-instagram me-2"></i> Instagram
                    </a>
                </p>
                <p>
                    <a href="https://www.tiktok.com/@redetuxnet" target="_blank" class="text-white d-inline-block me-3">
                        <i class="bi bi-tiktok me-2"></i> TikTok
                    </a>
                </p>
            </div>

            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <h6 class="text-uppercase fw-bold mb-4 font-montserrat text-secondary-tuxnet">
                    <i class="bi bi-link-45deg me-2"></i>Links Úteis
                </h6>
                <p><a href="{{ url('/') }}" class="text-white"><i class="bi bi-house-door-fill me-2"></i>Início</a></p>
                <p><a href="{{ url('/planos') }}" class="text-white"><i class="bi bi-wifi me-2"></i>Nossos Planos</a></p> 
                <p><a href="{{ url('/sobre') }}" class="text-white"><i class="bi bi-info-circle-fill me-2"></i>Sobre Nós</a></p>
                
            </div>
        </div>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © {{ date('Y') }} Copyright:
        <a class="text-white fw-bold" href="{{ url('/') }}">Tuxnet</a>. Todos os direitos reservados.
    </div>
</footer>
