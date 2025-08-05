document.addEventListener('DOMContentLoaded', function () {

    // ===================================================================
    // SEÇÃO 1: COMPONENTES GLOBAIS (Navbar e Modais)
    // ===================================================================


    const navMenu = document.getElementById('navbarNavDropdown');
    if (navMenu) {
        navMenu.addEventListener('show.bs.collapse', () => document.body.classList.add('body-no-scroll'));
        navMenu.addEventListener('hidden.bs.collapse', () => document.body.classList.remove('body-no-scroll'));

        const closeNavButton = document.querySelector('.btn-close-nav');
        if (closeNavButton) {
            closeNavButton.addEventListener('click', () => {
                const bsCollapse = new bootstrap.Collapse(navMenu, { toggle: false });
                bsCollapse.hide();
            });
        }
    }


    const modalEnderecos = document.getElementById('modalEnderecos');
    const mainContent = document.getElementById('page-wrapper');
    if (modalEnderecos && mainContent) {
        modalEnderecos.addEventListener('show.bs.modal', function (event) {
            mainContent.classList.add('content-ofuscado');


            const cardClicado = event.relatedTarget;
            const nomeCidade = cardClicado.getAttribute('data-cidade');
            const lojas = JSON.parse(cardClicado.getAttribute('data-enderecos'));
            const modalTitulo = modalEnderecos.querySelector('#modal-cidade-nome');
            const modalLista = modalEnderecos.querySelector('#modal-lista-enderecos');

            modalTitulo.textContent = nomeCidade;
            modalLista.innerHTML = '';

            if (lojas && lojas.length > 0) {
                lojas.forEach(loja => {
                    const cardHtml = `
                        <div class="card loja-card-modal shadow-sm mb-3">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 font-montserrat fw-semibold">${loja.nome_local}</h6>
                                <p class="card-text small mb-2">
                                    <i class="bi bi-geo-alt-fill me-2 text-secondary-tuxnet"></i>
                                    ${loja.endereco_completo}
                                </p>
                              <a href="${loja.link_mapa}" target="_blank" class="btn btn-sm btn-mapa-amarelo mt-2">Ver no Mapa</a>
                            </div>
                        </div>`;
                    modalLista.insertAdjacentHTML('beforeend', cardHtml);
                });
            } else {
                modalLista.innerHTML = '<p class="text-center text-muted">Nenhuma loja física cadastrada nesta cidade.</p>';
            }
        });

        modalEnderecos.addEventListener('hidden.bs.modal', () => mainContent.classList.remove('content-ofuscado'));
    }

    // ===================================================================
    // SEÇÃO 2: ANIMAÇÕES E INTERATIVIDADE
    // ===================================================================
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    if (animatedElements.length > 0 && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        animatedElements.forEach(element => observer.observe(element));
    }


    const cidadeCards = document.querySelectorAll('.cidade-card');
    if (cidadeCards.length > 0 && 'IntersectionObserver' in window) {
        const cardObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('is-visible'), index * 100);
                    cardObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        cidadeCards.forEach(card => cardObserver.observe(card));
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            if (this.hash !== "" && this.pathname === window.location.pathname) {
                e.preventDefault();
                const targetElement = document.querySelector(this.hash);
                if (targetElement) {
                    const navbar = document.querySelector('.navbar.fixed-top');
                    const navbarHeight = navbar ? navbar.offsetHeight : 0;
                    const elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
                    const offsetPosition = elementPosition - navbarHeight;
                    window.scrollTo({ top: offsetPosition, behavior: "smooth" });
                }
            }
        });
    });

    // ===================================================================
    // SEÇÃO 3: INICIALIZAÇÃO DE CARROSSÉIS
    // ===================================================================

    const plansCarouselElement = document.querySelector('.plans-carousel');
if (plansCarouselElement) {
    // 1. Contamos quantos slides existem dentro do carrossel
    const slideCount = plansCarouselElement.querySelectorAll('.swiper-slide').length;

    // 2. Definimos um número mínimo de slides para ativar o loop (geralmente o número de slides visíveis + 1)
    const minSlidesForLoop = 4;

    // 3. A mágica acontece aqui: ativamos o loop e a centralização APENAS se tivermos slides suficientes
    const enableLoop = slideCount >= minSlidesForLoop;

    const swiper = new Swiper(plansCarouselElement, {
        // Opções condicionais
        loop: enableLoop,
        centeredSlides: enableLoop, // A centralização só faz sentido com o loop

        // Suas outras opções permanecem as mesmas
        grabCursor: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        slidesPerView: 1.4,
        spaceBetween: 20,
        breakpoints: {
            768: { slidesPerView: 2.4, spaceBetween: 30 },
            992: { slidesPerView: 3.1, spaceBetween: 30 },
            1200: { slidesPerView: 3.0, spaceBetween: 40 }
        }
    });
}


    const heroCarouselElement = document.querySelector('#carouselExampleCaptions');
    if (heroCarouselElement) {
        new bootstrap.Carousel(heroCarouselElement, { interval: 5000, wrap: true });
    }

    const carouselPlanosElement = document.querySelector('#carouselPlanosParaVoce');
    if (carouselPlanosElement) {
        new bootstrap.Carousel(carouselPlanosElement, { interval: 5000, wrap: true });
    }

    // ===================================================================
    // SEÇÃO 4: "TRABALHE CONOSCO"
    // ===================================================================


    const cidadeSelect = document.getElementById('cidade');
    if (cidadeSelect) {
        const apiUrl = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/BA/municipios';
        fetch(apiUrl)
            .then(response => {
                if (!response.ok) throw new Error('Falha na resposta da rede');
                return response.json();
            })
            .then(data => {
                data.sort((a, b) => a.nome.localeCompare(b.nome));
                cidadeSelect.innerHTML = '<option value="" disabled selected>Selecione sua cidade...</option>';
                data.forEach(municipio => {
                    const option = document.createElement('option');
                    option.value = municipio.nome;
                    option.textContent = municipio.nome;
                    cidadeSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Erro ao buscar municípios:', error);
                cidadeSelect.innerHTML = '<option value="" disabled selected>Erro ao carregar cidades</option>';
            });
    }

});

