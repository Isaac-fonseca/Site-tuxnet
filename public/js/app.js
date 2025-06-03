// Evento que garante que o script só roda depois que todo o HTML foi carregado.
document.addEventListener('DOMContentLoaded', function () {

    // Inicializa o Carrossel do Bootstrap para a página inicial (se existir)
    const heroCarouselElement = document.querySelector('#carouselExampleCaptions');
    if (heroCarouselElement) {
        if (typeof bootstrap !== 'undefined' && bootstrap.Carousel) {
            const heroCarousel = new bootstrap.Carousel(heroCarouselElement, {
                interval: 5000, // Muda de slide a cada 5 segundos
                wrap: true     // Permite que o carrossel volte ao primeiro slide após o último
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
