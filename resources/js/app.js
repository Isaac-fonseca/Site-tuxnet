document.addEventListener('DOMContentLoaded', function () {
  // ===================================================================
    // SEÇÃO 1: FUNÇÕES REUTILIZÁVEIS
    // ===================================================================

    /**
     * Função genérica para criar um carrossel Swiper com filtros.
     * Ela destrói e recria o carrossel a cada filtro para garantir a estabilidade.
     */
    function createFilterableCarousel(carouselSelector, filterSelector) {
        const carouselElement = document.querySelector(carouselSelector);
        if (!carouselElement) return; // Se o carrossel não existir na página, não faz nada

        let swiperInstance = null;
        const allSlides = Array.from(carouselElement.querySelectorAll('.swiper-slide')).map(slide => slide.cloneNode(true));
        const swiperWrapper = carouselElement.querySelector('.swiper-wrapper');
        const filterButtons = document.querySelectorAll(filterSelector);
        const navigationWrapper = carouselElement.parentElement.querySelector('.swiper-navigation-wrapper');

        function initializeSwiper(slidesToDisplay) {
            if (swiperInstance) {
                swiperInstance.destroy(true, true);
            }
            swiperWrapper.innerHTML = '';
            slidesToDisplay.forEach(slide => {
                swiperWrapper.appendChild(slide);
            });

            const slideCount = slidesToDisplay.length;
            const minSlidesForLoop = 3;
            const enableLoop = slideCount > minSlidesForLoop;

            swiperInstance = new Swiper(carouselSelector, {
                slidesPerView: 1.25,
                spaceBetween: 15,
                loop: enableLoop,
                centeredSlides: enableLoop,
                centerInsufficientSlides: true,
                navigation: {
                    nextEl: navigationWrapper.querySelector('.swiper-button-next'),
                    prevEl: navigationWrapper.querySelector('.swiper-button-prev'),
                },
                breakpoints: {
                    768: { slidesPerView: 2, spaceBetween: 30 },
                    992: { slidesPerView: 3, spaceBetween: 30 }
                }
            });
        }

        filterButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const filter = this.dataset.filter;
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                const slidesToShow = allSlides.filter(slide => {
                    const cardCategory = slide.dataset.category;
                    return filter === 'all' || cardCategory === filter;
                });
                initializeSwiper(slidesToShow);
            });
        });

        initializeSwiper(allSlides);
    }

    // ===================================================================
    // SEÇÃO 2: LÓGICAS GLOBAIS (Nav, Modais, Animações)
    // ===================================================================

    // --- Lógica da Navbar ---
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

    // --- Lógica do Modal de Endereços (Home) ---
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
const modalComboElement = document.getElementById('modal-combo');
if (modalComboElement) {
    const modalCombo = new bootstrap.Modal(modalComboElement);
    
    // Elementos do Modal
    const step1 = document.getElementById('modal-step-1');
    const step2 = document.getElementById('modal-step-2');
    const planosBaseContainer = document.getElementById('planos-base-container');
    const listaAdicionaisDiv = document.getElementById('lista-adicionais');
    const valorTotalEl = document.getElementById('valor-total');
    const nomeClienteEl = document.getElementById('cliente-nome');
    const btnVoltar = document.getElementById('btn-voltar-passo1');
    const btnNext = document.getElementById('btn-next-step');
    const btnContratar = document.getElementById('btn-contratar-whatsapp');

    let planoBaseSelecionado = null;

    // Função para calcular o total
    function calcularTotal() {
        let precoBase = planoBaseSelecionado ? parseFloat(planoBaseSelecionado.preco) : 0;
        let totalAdicionais = 0;
        document.querySelectorAll('#lista-adicionais input[type="checkbox"]:checked').forEach(checkbox => {
            totalAdicionais += parseFloat(checkbox.dataset.preco);
        });
        const totalFinal = precoBase + totalAdicionais;
        valorTotalEl.textContent = `R$ ${totalFinal.toFixed(2).replace('.', ',')}`;
    }

    // Função para mudar de passo
    function goToStep(stepNumber) {
        if (stepNumber === 1) {
            step1.classList.remove('d-none'); step2.classList.add('d-none');
            btnVoltar.classList.add('d-none'); btnNext.classList.remove('d-none');
            btnContratar.classList.add('d-none');
        } else if (stepNumber === 2) {
            if (!planoBaseSelecionado) {
                alert('Por favor, selecione um plano principal para avançar.'); return;
            }
            step1.classList.add('d-none'); step2.classList.remove('d-none');
            btnVoltar.classList.remove('d-none'); btnNext.classList.add('d-none');
            btnContratar.classList.remove('d-none');
        }
    }

    // Abre e popula o modal
    function abrirModalCombo(planoClicadoId) {
        planoBaseSelecionado = null;
        planosBaseContainer.innerHTML = '';

        const planoClicado = planosData.find(p => p.id == planoClicadoId);
        if (!planoClicado) return;

        // Determina o plano base e os adicionais pré-selecionados
        const idDoPlanoBase = planoClicado.base_plan_id || planoClicado.id;
        const adicionaisInclusos = planoClicado.includes_addons || [];

        // Popula o Passo 1 apenas com os planos de internet "puros"
        const planosDeInternet = planosData.filter(p => !p.base_plan_id);
        planosDeInternet.forEach(plano => {
            const preco = parseFloat(`${plano.preco_inteiro}.${plano.preco_centavos}`);
            const isSelected = plano.id == idDoPlanoBase ? 'selected' : '';
            if (isSelected) {
                planoBaseSelecionado = { id: plano.id, nome: plano.nome, preco: preco };
            }
            planosBaseContainer.innerHTML += `
                <div class="col-md-6 mb-3"><div class="modal-plan-card ${isSelected}" data-id="${plano.id}" data-nome="${plano.nome}" data-preco="${preco}">
                <div class="modal-plan-card-body"><h6 class="modal-plan-title">${plano.nome}</h6><p class="modal-plan-price">R$ ${preco.toFixed(2).replace('.', ',')}</p></div>
                </div></div>`;
        });
        
        // Popula o Passo 2 com os adicionais
        listaAdicionaisDiv.innerHTML = '';
        adicionaisData.forEach(item => {
            const isChecked = adicionaisInclusos.includes(item.id) ? 'checked' : '';
            listaAdicionaisDiv.innerHTML += `<label class="list-group-item d-flex justify-content-between align-items-center"><div><strong>${item.nome}</strong><small class="d-block text-muted">${item.descricao}</small></div><div class="d-flex align-items-center"><strong class="me-3">+ R$ ${parseFloat(item.preco).toFixed(2).replace('.', ',')}</strong><input class="form-check-input" type="checkbox" data-preco="${item.preco}" data-nome="${item.nome}" data-id="${item.id}" ${isChecked}></div></label>`;
        });

        calcularTotal();
        goToStep(1);
        modalCombo.show();
    }
    
    // --- EVENT LISTENERS ---
    document.body.addEventListener('click', function(event) {
        const targetPlano = event.target.closest('.btn-abrir-combo');
        if (targetPlano) {
            event.preventDefault();
            abrirModalCombo(targetPlano.dataset.planoId);
        }
    });
    
    planosBaseContainer.addEventListener('click', function(event) {
        const targetCard = event.target.closest('.modal-plan-card');
        if (targetCard) {
            document.querySelectorAll('.modal-plan-card').forEach(c => c.classList.remove('selected'));
            targetCard.classList.add('selected');
            planoBaseSelecionado = { id: targetCard.dataset.id, nome: targetCard.dataset.nome, preco: targetCard.dataset.preco };
            calcularTotal();
        }
    });
    // Listener para checkboxes no Passo 2
    listaAdicionaisDiv.addEventListener('change', calcularTotal);
    
    // Listeners dos botões de navegação do modal
    btnNext.addEventListener('click', () => goToStep(2));
    btnVoltar.addEventListener('click', () => goToStep(1));

    // Listener do botão do WhatsApp (lógica da mensagem atualizada)
    btnContratar.addEventListener('click', function(event) {
        event.preventDefault();
        const nomeCliente = nomeClienteEl.value.trim();
        if (nomeCliente === '') {
            alert('Por favor, preencha seu nome completo.'); return;
        }
        if (!planoBaseSelecionado) {
            alert('Ocorreu um erro. Por favor, volte e selecione um plano.'); return;
        }
        
        let resumoPedido = `*Plano Principal:*\n- ${planoBaseSelecionado.nome}\n\n`;
        let totalFinal = parseFloat(planoBaseSelecionado.preco);
        const adicionaisSelecionados = document.querySelectorAll('#lista-adicionais input[type="checkbox"]:checked');
        if (adicionaisSelecionados.length > 0) {
            resumoPedido += `*Pacotes Adicionais:*\n`;
            adicionaisSelecionados.forEach(checkbox => {
                resumoPedido += `- ${checkbox.dataset.nome}\n`;
                totalFinal += parseFloat(checkbox.dataset.preco);
            });
        }
        const valorTotalTexto = `*Total Mensal:* R$ ${totalFinal.toFixed(2).replace('.', ',')}`;
        const mensagem = `Olá! Gostaria de contratar o seguinte combo:\n\n*Nome:* ${nomeCliente}\n\n${resumoPedido}\n${valorTotalTexto}`;
        const numeroWhatsapp = "5508007226662";
        const urlWhatsapp = `https://wa.me/${numeroWhatsapp}?text=${encodeURIComponent(mensagem)}`;
        window.open(urlWhatsapp, '_blank');
    });
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

 if (document.querySelector('#planos-destaque .plans-carousel')) {
    const swiper = new Swiper('#planos-destaque .plans-carousel', {
        loop: true,
        loopedSlides: 5,
        centeredSlides: true,
        grabCursor: true,
        navigation: {
            nextEl: '#planos-destaque .swiper-button-next', // Seletor específico
            prevEl: '#planos-destaque .swiper-button-prev', // Seletor específico
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
 createFilterableCarousel('.main-plans-carousel', '#main-plans-filter .nav-link');
    createFilterableCarousel('.special-plans-carousel', '#special-plans-filter .nav-link');

    // --- Carrossel de Pacotes Adicionais da PÁGINA DE PLANOS ---
    if (document.querySelector('.additional-packages-carousel')) {
        new Swiper('.additional-packages-carousel', {
            slidesPerView: 1, spaceBetween: 30, loop: true,
            autoplay: { delay: 5000, disableOnInteraction: false },
            navigation: {
                nextEl: '#pacotes-adicionais .swiper-button-next',
                prevEl: '#pacotes-adicionais .swiper-button-prev',
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

