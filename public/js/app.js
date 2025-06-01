// Este evento garante que o script só roda depois que todo o HTML foi carregado.
document.addEventListener('DOMContentLoaded', function () {

    // Inicializa o Carrossel do Bootstrap
    const myCarouselElement = document.querySelector('#carouselExampleCaptions');
    if (myCarouselElement) {
        // Certifica-se de que a biblioteca Bootstrap está carregada e o construtor Carousel existe
        if (typeof bootstrap !== 'undefined' && bootstrap.Carousel) {
            const carousel = new bootstrap.Carousel(myCarouselElement, {
                interval: 5000, // Muda de slide a cada 5 segundos
                wrap: true     // Permite que o carrossel volte ao primeiro slide após o último
            });
        } else {
            console.error('Bootstrap Carousel component not found. Make sure Bootstrap JS is loaded before this script.');
        }
    }

    // Animação ao rolar para elementos com a classe .animate-on-scroll
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    if (animatedElements.length > 0) {
        // Verifica se IntersectionObserver é suportado
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target); // Opcional: para animar apenas uma vez
                    }
                });
            }, {
                threshold: 0.1 // Porcentagem do elemento que precisa estar visível (0.1 = 10%)
            });

            animatedElements.forEach(element => {
                observer.observe(element);
            });
        } else {
            // Fallback para navegadores que não suportam IntersectionObserver: torna os elementos visíveis imediatamente.
            console.warn('IntersectionObserver not supported. Animations on scroll will not be as smooth.');
            animatedElements.forEach(element => {
                element.classList.add('is-visible');
            });
        }
    }

});
// Inicializa o Carrossel do Bootstrap para a seção "Planos para você"
        document.addEventListener('DOMContentLoaded', function () {
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
        });
    