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
                    // CORREÇÃO: A lógica de filtro agora usa a chave 'filtro_categoria' se existir
                    const cardCategory = slide.dataset.category;
                    return filter === 'all' || cardCategory === filter;
                });
                initializeSwiper(slidesToShow);
            });
        });


        const initialActiveButton = document.querySelector(filterSelector + '.active');
        if (initialActiveButton) {

            initialActiveButton.click();
        } else {

            if (filterButtons.length > 0) {
                filterButtons[0].click();
            }
        }
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

    // Em /resources/js/app.js
    const modalComboElement = document.getElementById('modal-combo');
    if (modalComboElement) {
        const modalCombo = new bootstrap.Modal(modalComboElement);
        let planoBaseSelecionado = null;

        const tipoPlanoToggles = document.getElementById('tipo-plano-toggles');
        const planoSelect = document.getElementById('plano-internet-select');
        const planoEspecificoContainer = document.getElementById('plano-especifico-container');
        const listaStreamingDiv = document.getElementById('lista-streaming');
        const listaAdicionaisDiv = document.getElementById('lista-adicionais');
        const secaoAdicionais = document.getElementById('secao-adicionais');
        const valorTotalEl = document.getElementById('valor-total');
        const btnContratar = document.getElementById('btn-contratar-whatsapp');
        const resumoPlanoBaseDiv = document.getElementById('resumo-plano-base');
        const resumoAdicionaisDiv = document.getElementById('resumo-adicionais');
        const progressStep1 = document.getElementById('progress-step-1');
        const progressStep2 = document.getElementById('progress-step-2');
        const progressStep3 = document.getElementById('progress-step-3');
        const dropdownContainer = document.getElementById('dropdown-container');
        const comboSelectorContainer = document.getElementById('combo-selector-container');
        const comboSubCategoryTabs = document.getElementById('combo-sub-category-tabs');
        const comboPlanCardsGrid = document.getElementById('combo-plan-cards-grid');
        const resumoMetodoPagamento = document.getElementById('resumo-metodo-pagamento');
        const nomeClienteEl = document.getElementById('cliente-nome');
        const planoVelocidadeDisplay = document.getElementById('plano-velocidade-display');

        const nomesTipos = {
            'base': 'Combos Banda Larga',
            'combo': 'Combos+',
            'fixo': 'Combo Fixo',
            'cartao': 'Combos Cartão',
            'movel': 'Plano Móvel'
        };
        const nomesCombos = {
            'max': { nome: 'MAX', icone: 'bi bi-film' },
            'globoplay': { nome: 'Globoplay', icone: 'bi bi-tv' },
            'playkids': { nome: 'Playkids', icone: 'bi bi-joystick' }
        };

        const mainPageWrapper = document.getElementById('page-wrapper');
        if (mainPageWrapper) {
            modalComboElement.addEventListener('show.bs.modal', function () {
                mainPageWrapper.classList.add('is-blurred');
            });
            modalComboElement.addEventListener('hidden.bs.modal', function () {
                mainPageWrapper.classList.remove('is-blurred');
            });
        }

        function updateProgress(stepNumber) {
            if (progressStep1) progressStep1.classList.toggle('active', stepNumber >= 1);
            if (progressStep2) progressStep2.classList.toggle('active', stepNumber >= 2);
            if (progressStep3) progressStep3.classList.toggle('active', stepNumber >= 3);
        }

        function popularComboSelector(subCategoriaAtiva, planoParaSelecionarId) {
            comboSubCategoryTabs.innerHTML = '';
            Object.keys(nomesCombos).forEach(catId => {
                const temPlanos = planosData.some(p => p.categoria === catId);
                if (temPlanos) {
                    const isChecked = subCategoriaAtiva === catId ? 'active' : '';
                    comboSubCategoryTabs.innerHTML += `<button class="tab-button ${isChecked}" data-category="${catId}"><i class="${nomesCombos[catId].icone}"></i> ${nomesCombos[catId].nome}</button>`;
                }
            });

            popularComboCards(subCategoriaAtiva, planoParaSelecionarId);
        }
        function popularComboCards(subCategoria, planoParaSelecionarId = null) {
            comboPlanCardsGrid.innerHTML = '';
            const planosDaCategoria = planosData.filter(p => p.categoria === subCategoria);

            planosDaCategoria.forEach(plano => {
                const preco = parseFloat(`${plano.preco_inteiro}.${plano.preco_centavos}`);

                const isSelected = plano.id == planoParaSelecionarId ? 'selected' : '';
                comboPlanCardsGrid.innerHTML += `
            <div class="plan-card-small ${isSelected}" data-id="${plano.id}">
                <p class="plan-name">${plano.nome}</p>
                <p class="plan-price">R$ ${preco.toFixed(2).replace('.', ',')}</p>
            </div>`;
            });

            // Se um plano veio pré-selecionado, atualizamos os adicionais e o total
            if (planoParaSelecionarId) {
                planoBaseSelecionado = planosData.find(p => p.id == planoParaSelecionarId);
                if (planoBaseSelecionado) {
                    popularAdicionais(planoBaseSelecionado.includes_addons || []);
                    calcularTotal();
                    atualizarDisplayVelocidade(planoBaseSelecionado);
                }
            } else {
                // Se nenhum plano veio pré-selecionado (clique na aba), limpamos a seleção
                planoBaseSelecionado = null;
                popularAdicionais([]);
                calcularTotal();
                atualizarDisplayVelocidade(null);
            }
        }

        function updatePlanSelectorUI(tipoSelecionado, planoParaSelecionarId) {
            if (tipoSelecionado === 'combo') {
                dropdownContainer.classList.add('d-none');
                comboSelectorContainer.classList.remove('d-none');
                const planoClicado = planosData.find(p => p.id == planoParaSelecionarId) || planosData.find(p => p.tipo_modal === 'combo');
                popularComboSelector(planoClicado.categoria, planoClicado.id);
            } else {
                dropdownContainer.classList.remove('d-none');
                comboSelectorContainer.classList.add('d-none');
                popularPlanosDropdown(tipoSelecionado, planoParaSelecionarId);
            }
        }

        // Em /resources/js/app.js, substitua APENAS esta função

        function atualizarResumo() {
            if (!planoBaseSelecionado) {
                resumoPlanoBaseDiv.innerHTML = '<p class="text-muted small">Selecione um plano para começar</p>';
                resumoAdicionaisDiv.innerHTML = '';
                if (resumoMetodoPagamento) resumoMetodoPagamento.innerHTML = '';
                return;
            }

            // 1. Exibe o plano principal (sem alterações)
            const precoBase = parseFloat(`${planoBaseSelecionado.preco_inteiro}.${planoBaseSelecionado.preco_centavos}`);
            resumoPlanoBaseDiv.innerHTML = `
        <div class="d-flex justify-content-between">
            <span class="fw-bold">${planoBaseSelecionado.nome}</span>
            <span class="fw-bold">R$ ${precoBase.toFixed(2).replace('.', ',')}</span>
        </div>
        <small class="text-muted">${planoBaseSelecionado.velocidade_num} ${planoBaseSelecionado.velocidade_unidade}</small>
    `;

            // 2. Exibe o método de pagamento (sem alterações)
            if (resumoMetodoPagamento) {
                resumoMetodoPagamento.textContent = planoBaseSelecionado.metodo_pagamento || 'Boleto / PIX';
            }

            // 3. Prepara a lista de adicionais
            resumoAdicionaisDiv.innerHTML = '';
            let temAdicionais = false;

            // 4. Exibe os APPS GRATUITOS (Skeelo, Deezer)
            if (planoBaseSelecionado.apps_gratuitos && planoBaseSelecionado.apps_gratuitos.length > 0) {
                temAdicionais = true;
                planoBaseSelecionado.apps_gratuitos.forEach(appName => {
                    resumoAdicionaisDiv.innerHTML += `
                <div class="d-flex justify-content-between text-muted small">
                    <span>+ ${appName}</span>
                    <span class="fw-bold text-success">Já incluso</span>
                </div>
            `;
                });
            }

            // 5. LÓGICA FINAL E CORRIGIDA: Exibe os PACOTES ADICIONAIS

            // Usamos um Set para garantir que cada pacote apareça apenas uma vez.
            const addonsParaExibir = new Set();
            const addonsInclusosNoCombo = planoBaseSelecionado.includes_addons || [];

            // Adiciona os pacotes que já vêm no combo
            addonsInclusosNoCombo.forEach(addonId => addonsParaExibir.add(addonId));

            // Adiciona os pacotes que o cliente marcou manualmente (e que não estão desabilitados)
            document.querySelectorAll('#lista-adicionais input:checked, #lista-streaming input:checked').forEach(checkbox => {
                if (!checkbox.disabled) {
                    addonsParaExibir.add(checkbox.dataset.id);
                }
            });

            if (addonsParaExibir.size > 0) {
                temAdicionais = true;
                addonsParaExibir.forEach(addonId => {
                    const addonData = adicionaisData.find(a => a.id === addonId);
                    if (addonData) {
                        // Verifica se o pacote já estava incluso no combo para decidir o que mostrar
                        const isIncluded = addonsInclusosNoCombo.includes(addonId);
                        const precoTexto = isIncluded
                            ? `<span class="fw-bold text-success">Incluso no Combo</span>`
                            : `R$ ${parseFloat(addonData.preco).toFixed(2).replace('.', ',')}`;

                        resumoAdicionaisDiv.innerHTML += `
                    <div class="d-flex justify-content-between text-muted small">
                        <span>+ ${addonData.nome}</span>
                        <span>${precoTexto}</span>
                    </div>
                `;
                    }
                });
            }
            document.querySelectorAll('.addon-select').forEach(select => {
                if (parseFloat(select.value) > 0) { // Mostra apenas se uma opção paga for selecionada
                    temAdicionais = true;
                    const nomeBase = select.dataset.nomeBase;
                    const nomeOpcao = select.options[select.selectedIndex].dataset.nome;
                    const preco = parseFloat(select.value);
                    resumoAdicionaisDiv.innerHTML += `
                <div class="d-flex justify-content-between text-muted small">
                    <span>+ ${nomeBase} (${nomeOpcao.split(' - ')[0]})</span>
                    <span>R$ ${preco.toFixed(2).replace('.', ',')}</span>
                </div>
            `;
                }
            });

            // Mostra ou esconde a seção de resumo de adicionais
            resumoAdicionaisDiv.style.display = temAdicionais ? 'block' : 'none';
        }

        function atualizarDisplayVelocidade(plano) {
            if (plano && plano.velocidade_num && planoVelocidadeDisplay) {
                planoVelocidadeDisplay.innerHTML = `
                <span class="badge bg-primary-soft text-primary-dark">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Velocidade: <strong>${plano.velocidade_num} ${plano.velocidade_unidade}</strong>
                </span>
            `;
            } else if (planoVelocidadeDisplay) {
                planoVelocidadeDisplay.innerHTML = ''; // Limpa se não houver plano
            }
        }

        function calcularTotal() {
            if (!planoBaseSelecionado) {
                valorTotalEl.textContent = 'R$ 0,00';
                atualizarResumo();
                return;
            }

            let precoBase = parseFloat(`${planoBaseSelecionado.preco_inteiro}.${planoBaseSelecionado.preco_centavos}`);
            let totalAdicionais = 0;

            // Soma os checkboxes que não estão desabilitados
            document.querySelectorAll('#lista-adicionais input:checked, #lista-streaming input:checked').forEach(checkbox => {
                if (!checkbox.disabled) {
                    totalAdicionais += parseFloat(checkbox.dataset.preco);
                }
            });

            // Soma o valor do SELECT do plano móvel (se for maior que zero)
            document.querySelectorAll('.addon-select').forEach(select => {
                const precoSelecionado = parseFloat(select.value);
                if (precoSelecionado > 0) {
                    totalAdicionais += precoSelecionado;
                }
            });

            const totalFinal = precoBase + totalAdicionais;
            valorTotalEl.textContent = `R$ ${totalFinal.toFixed(2).replace('.', ',')}`;

            valorTotalEl.classList.add('price-flash');
            setTimeout(() => valorTotalEl.classList.remove('price-flash'), 600);
            atualizarResumo();
        }


        // Em /resources/js/app.js

        function popularAdicionais(adicionaisInclusos = []) {
            listaStreamingDiv.innerHTML = '';
            listaAdicionaisDiv.innerHTML = '';

            if (typeof adicionaisData !== 'undefined' && adicionaisData.length > 0) {
                adicionaisData.forEach(item => {
                    let itemHtml = '';

                    // Lógica para decidir se cria um CHECKBOX ou um SELECT
                    if (item.tipo === 'select') {
                        // Se for do tipo 'select', cria o item com um dropdown
                        let optionsHtml = '';
                        item.opcoes.forEach(opt => {
                            optionsHtml += `<option value="${opt.preco}" data-nome="${opt.nome}">${opt.nome}</option>`;
                        });

                        itemHtml = `
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="addon-icon-wrapper"><i class="${item.icone}"></i></div>
                            <div>
                                <strong>${item.nome}</strong>
                                <small class="d-block text-muted">${item.descricao}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <select class="form-select addon-select" data-id="${item.id}" data-nome-base="${item.nome}">
                                ${optionsHtml}
                            </select>
                        </div>
                    </div>`;
                    } else {
                        // Senão, cria o item com um checkbox (lógica que já tínhamos)
                        const isChecked = adicionaisInclusos.includes(item.id);
                        const isDisabled = isChecked ? 'disabled' : '';
                        if (planoBaseSelecionado && planoBaseSelecionado.categoria === 'fixo' && item.id === 'fixo') return;

                        let iconHtml = '';
                        if (item.imagem) {
                            iconHtml = `<div class="addon-icon-wrapper"><img src="${asset(item.imagem)}" alt="${item.nome}"></div>`;
                        } else if (item.icone) {
                            iconHtml = `<div class="addon-icon-wrapper"><i class="${item.icone}"></i></div>`;
                        }

                        itemHtml = `
                    <label class="list-group-item d-flex justify-content-between align-items-center ${isDisabled ? 'disabled' : ''}">
                        <div class="d-flex align-items-center">
                            ${iconHtml}
                            <div>
                                <strong>${item.nome}</strong>
                                <small class="d-block text-muted">${item.descricao}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <strong class="me-3">+ R$ ${parseFloat(item.preco).toFixed(2).replace('.', ',')}</strong>
                            <input class="form-check-input" type="checkbox" data-preco="${item.preco}" data-nome="${item.nome}" data-id="${item.id}" ${isChecked} ${isDisabled}>
                        </div>
                    </label>`;
                    }

                    // Separa em "Streaming" ou "Outros Serviços"
                    if (item.categoria === 'streaming') {
                        listaStreamingDiv.innerHTML += itemHtml;
                    } else {
                        listaAdicionaisDiv.innerHTML += itemHtml;
                    }
                });
            }

            // Adiciona o listener de eventos para TODOS os inputs e selects
            document.querySelectorAll('#lista-adicionais input, #lista-streaming input, #lista-adicionais select, #lista-streaming select').forEach(el => el.addEventListener('change', calcularTotal));
        }



        // Função de ajuda para simular o 'asset()' do Laravel no JavaScript
        function asset(path) {
            // Substitua 'http://seu-site.test' pela URL base do seu site em produção
            const base_url = window.location.origin;
            return `${base_url}/${path}`;
        }
        function popularPlanosDropdown(tipo, planoParaSelecionarId = null) {
            planoSelect.innerHTML = '';
            const planosDoTipo = planosData.filter(p => p.tipo_modal === tipo);
            if (planosDoTipo.length > 0) {
                planoEspecificoContainer.classList.remove('d-none');
                planosDoTipo.forEach(plano => {
                    const option = new Option(plano.nome, plano.id);
                    planoSelect.add(option);
                });
                planoSelect.value = planoParaSelecionarId || planosDoTipo[0].id;
            } else {
                planoEspecificoContainer.classList.add('d-none');
            }
            const planoAtual = planosData.find(p => p.id == planoSelect.value);
            planoBaseSelecionado = planoAtual;
            if (planoAtual && planoAtual.permite_adicionais === false) {
                secaoAdicionais.classList.add('d-none');
                popularAdicionais([]);
                atualizarDisplayVelocidade(planoAtual);
            } else {
                secaoAdicionais.classList.remove('d-none');
                popularAdicionais(planoAtual.includes_addons || []);
            }
            calcularTotal();
            atualizarDisplayVelocidade(planoAtual);
        }

        function abrirModalCombo(planoClicado) {
            const tipoDoPlanoClicado = planoClicado.tipo_modal || 'base';

            tipoPlanoToggles.innerHTML = '';
            Object.keys(nomesTipos).forEach(tipoId => {
                const temPlanos = planosData.some(p => p.tipo_modal === tipoId);
                if (temPlanos) {
                    const isChecked = tipoDoPlanoClicado === tipoId ? 'checked' : '';
                    tipoPlanoToggles.innerHTML += `<input type="radio" class="btn-check" name="tipo-plano" id="tipo-${tipoId}" value="${tipoId}" autocomplete="off" ${isChecked}><label class="btn btn-outline-primary" for="tipo-${tipoId}">${nomesTipos[tipoId]}</label>`;
                }
            });


            updatePlanSelectorUI(tipoDoPlanoClicado, planoClicado.id);

            updateProgress(1);
            modalCombo.show();
        }


        // --- EVENT LISTENERS ---

        document.body.addEventListener('click', function (event) {
            const targetButton = event.target.closest('.btn-abrir-combo');
            if (targetButton) {
                event.preventDefault();
                const planoId = targetButton.dataset.planoId;
                const planoClicado = planosData.find(p => p.id == planoId);
                if (planoClicado) {

                    abrirModalCombo(planoClicado);
                }
            }
        });


        tipoPlanoToggles.addEventListener('change', function (event) {
            if (event.target.name === 'tipo-plano') {
                updatePlanSelectorUI(event.target.value, null);
                updateProgress(2);
            }
        });
        comboSubCategoryTabs.addEventListener('click', function (event) {
            const targetTab = event.target.closest('.tab-button');
            if (targetTab) {
                document.querySelectorAll('.tab-button').forEach(t => t.classList.remove('active'));
                targetTab.classList.add('active');


                popularComboCards(targetTab.dataset.category, null);
            }
        });



        comboPlanCardsGrid.addEventListener('click', function (event) {
            const targetCard = event.target.closest('.plan-card-small');
            if (targetCard) {
                document.querySelectorAll('.plan-card-small').forEach(c => c.classList.remove('selected'));
                targetCard.classList.add('selected');
                planoBaseSelecionado = planosData.find(p => p.id == targetCard.dataset.id);
                if (planoBaseSelecionado) {

                    atualizarDisplayVelocidade(planoBaseSelecionado);

                    popularAdicionais(planoBaseSelecionado.includes_addons || []);
                    calcularTotal();
                }
            }
        });
        planoSelect.addEventListener('change', function (event) {
            const planoSelecionado = planosData.find(p => p.id == event.target.value);
            planoBaseSelecionado = planoSelecionado;
            atualizarDisplayVelocidade(planoSelecionado);
            popularAdicionais(planoSelecionado.includes_addons || []);
            calcularTotal();
            updateProgress(3);

        });

        if (btnContratar) {
            btnContratar.addEventListener('click', function (event) {
                event.preventDefault();

                // Garante que temos um plano selecionado antes de continuar
                if (!planoBaseSelecionado) {
                    alert('Por favor, selecione um plano antes de continuar.');
                    return;
                }

                const nomeCliente = nomeClienteEl.value.trim();
                if (nomeCliente === '') {
                    alert('Por favor, preencha seu nome completo.');
                    return;
                }

                // --- LÓGICA DA MENSAGEM ATUALIZADA ---

                let resumoPedido = `*Plano Principal:*\n- ${planoBaseSelecionado.nome}\n\n`;
                let totalFinal = parseFloat(`${planoBaseSelecionado.preco_inteiro}.${planoBaseSelecionado.preco_centavos}`);

                // Pega o método de pagamento do plano selecionado
                const metodoPagamento = planoBaseSelecionado.metodo_pagamento || 'Boleto / PIX';

                const adicionaisSelecionados = document.querySelectorAll('#lista-adicionais input:checked, #lista-streaming input:checked');
                if (adicionaisSelecionados.length > 0) {
                    resumoPedido += `*Pacotes Adicionais:*\n`;
                    adicionaisSelecionados.forEach(checkbox => {
                        if (!checkbox.disabled) {
                            resumoPedido += `- ${checkbox.dataset.nome}\n`;
                            totalFinal += parseFloat(checkbox.dataset.preco);
                        }
                    });
                }

                const valorTotalTexto = `*Total Mensal:* R$ ${totalFinal.toFixed(2).replace('.', ',')}`;

                // ADICIONADO: A linha do método de pagamento na mensagem final
                const mensagem = `Olá! Gostaria de contratar o seguinte combo:\n\n*Nome:* ${nomeCliente}\n\n${resumoPedido}\n*Método de Pagamento:* ${metodoPagamento}\n\n${valorTotalTexto}`;

                const numeroWhatsapp = "5508007226662"; // Seu número
                const urlWhatsapp = `https://wa.me/${numeroWhatsapp}?text=${encodeURIComponent(mensagem)}`;
                window.open(urlWhatsapp, '_blank');
            });
        }
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
            slidesPerView: 1.25,
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

