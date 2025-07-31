
document.addEventListener('DOMContentLoaded', function () {

   
   const navMenu = document.getElementById('navbarNavDropdown');
    const closeNavButton = document.querySelector('.btn-close-nav');

    // A única coisa que nosso JS precisa fazer é fechar o menu
    // ao clicar no nosso botão "X" personalizado.
    if (navMenu && closeNavButton) {
        closeNavButton.addEventListener('click', function () {
            // Usamos o objeto Collapse do Bootstrap para fechar o menu programaticamente
            const bsCollapse = new bootstrap.Collapse(navMenu, {
                toggle: false // importante para não re-abrir se já estiver fechando
            });
            bsCollapse.hide();
        });
    }

    // ===============================================
    // Scripts Anteriores (Carrossel, Animação, etc.)
    // ===============================================

    // Inicializa o Carrossel do Bootstrap para a página inicial (se existir)
    const heroCarouselElement = document.querySelector('#carouselExampleCaptions');
    if (heroCarouselElement) {
        if (typeof bootstrap !== 'undefined' && bootstrap.Carousel) {
            const heroCarousel = new bootstrap.Carousel(heroCarouselElement, {
                interval: 5000, // Muda de slide a cada 5 segundos
                wrap: true      // Permite que o carrossel volte ao primeiro slide após o último
            });
        } else {
            console.error('Bootstrap Carousel component not found for #carouselExampleCaptions.');
        }
    }

    // Inicializa o Carrossel do Bootstrap para a página de planos (se existir)
    const carouselPlanosElement = document.querySelector('#carouselPlanosParaVoce');
    if (carouselPlanosElement) {
        if (typeof bootstrap !== 'undefined' && bootstrap.Carousel) {
            const carouselPlanos = new bootstrap.Carousel(carouselPlanosElement, {
                interval: 5000, // Muda de slide a cada 5 segundos
                wrap: true
            });
        } else {
            console.error('Bootstrap Carousel component not found for #carouselPlanosParaVoce.');
        }
    }

    // Animação ao rolar para elementos com a classe .animate-on-scroll
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    if (animatedElements.length > 0) {
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target); // Animar apenas uma vez
                    }
                });
            }, {
                threshold: 0.1 // 10% visível
            });

            animatedElements.forEach(element => {
                observer.observe(element);
            });
        } else {
            // Fallback para navegadores sem IntersectionObserver
            console.warn('IntersectionObserver not supported. Animations on scroll will not be as smooth.');
            animatedElements.forEach(element => {
                element.classList.add('is-visible');
            });
        }
    }

    // Script para Rolagem Suave para links âncora
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            // Verifica se o link é para uma âncora na MESMA página
            // e se o href não é apenas "#" (usado por alguns componentes do Bootstrap)
            if (this.hash !== "" && this.pathname === window.location.pathname) {
                e.preventDefault(); // Previne o comportamento padrão do link

                const hash = this.hash;
                const targetElement = document.querySelector(hash);

                if (targetElement) {
                    // Calcula a posição do elemento de destino
                    // Leva em consideração a altura da navbar se ela for fixa no topo (opcional)
                    let navbarHeight = 0;
                    const navbar = document.querySelector('.navbar.fixed-top'); // Ajuste o seletor se sua navbar não for .fixed-top ou não tiver essa classe
                    if (navbar) {
                        navbarHeight = navbar.offsetHeight;
                    }

                    const elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
                    const offsetPosition = elementPosition - navbarHeight;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "smooth" // Efeito de rolagem suave
                    });
                }
            }
        });
    });

});


document.addEventListener('DOMContentLoaded', function () {
    const modalEnderecos = document.getElementById('modalEnderecos');

    modalEnderecos.addEventListener('show.bs.modal', function (event) {
        const cardClicado = event.relatedTarget;
        const nomeCidade = cardClicado.getAttribute('data-cidade');
        const lojas = JSON.parse(cardClicado.getAttribute('data-enderecos'));

        const modalTitulo = modalEnderecos.querySelector('#modal-cidade-nome');
        const modalLista = modalEnderecos.querySelector('#modal-lista-enderecos');

        modalTitulo.textContent = nomeCidade;
        modalLista.innerHTML = ''; // Limpa o conteúdo anterior

        if (lojas && lojas.length > 0) {
            // Loop para criar um card para cada loja
            lojas.forEach(function(loja) {
                // Cria o HTML do card para cada loja
                const cardHtml = `
                    <div class="card loja-card-modal shadow-sm mb-3">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 font-montserrat fw-semibold">${loja.nome_local}</h6>
                            <p class="card-text small mb-2">
                                <i class="bi bi-geo-alt-fill me-2 text-secondary-tuxnet"></i>
                                ${loja.endereco_completo}
                            </p>
                            <a href="${loja.link_mapa}" target="_blank" class="btn btn-sm btn-outline-primary-tuxnet mt-2">Ver no Mapa</a>
                        </div>
                    </div>
                `;
                // Adiciona o HTML do card ao corpo do modal
                modalLista.insertAdjacentHTML('beforeend', cardHtml);
            });
        } else {
            // Mensagem para cidades sem lojas cadastradas
            modalLista.innerHTML = '<p class="text-center text-muted">Nenhuma loja física cadastrada nesta cidade.</p>';
        }
    });
});
 const swiper = new Swiper('.plans-carousel', {
    // Quantidade de slides visíveis por padrão (mobile)
    slidesPerView: 1,
    // Espaço entre os slides
    spaceBetween: 30,
    // Habilita o loop infinito
    loop: true,

    // Configurações para diferentes tamanhos de tela (responsividade)
    breakpoints: {
      // Quando a largura da tela for >= 768px
      768: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      // Quando a largura da tela for >= 992px
      992: {
        slidesPerView: 3,
        spaceBetween: 30
      },
       // Quando a largura da tela for >= 1200px (opcional, para telas maiores)
      1200: {
          slidesPerView: 3,
          spaceBetween: 40,
          // centraliza o slide em destaque
          centeredSlides: true,
      }
    },


    // Navegação (setas)
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });