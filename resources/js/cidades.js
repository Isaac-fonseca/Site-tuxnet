document.addEventListener('DOMContentLoaded', () => {

    // Seleciona todos os cards que queremos animar
    const cards = document.querySelectorAll('.cidade-card');

    // Configura o Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            // Se o elemento estiver na tela (intersecting)
            if (entry.isIntersecting) {
                // Adiciona um pequeno atraso para cada card, criando um efeito cascata
                setTimeout(() => {
                    entry.target.classList.add('is-visible');
                }, index * 100); // 100ms de atraso entre cada card

                // Para de observar o elemento para a animação não repetir
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1 // Aciona quando 10% do card estiver visível
    });

    // Inicia a observação para cada card
    cards.forEach(card => {
        observer.observe(card);
    });

});
