const slider = document.getElementById('cardSlider');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
let scrollPosition = -320; // Ajuste inicial para considerar os clones
const cardWidth = 320; // Largura do card + margem (300px + 20px)
let totalCards = slider.children.length;

// Função para clonar os primeiros e últimos cartões
function cloneCards() {
    const firstCards = [...slider.children].slice(0, 2); // Pega os primeiros 2 cards
    const lastCards = [...slider.children].slice(-2); // Pega os últimos 2 cards

    // Clonando os primeiros 2 cards e adicionando ao final
    firstCards.forEach(card => {
        const clone = card.cloneNode(true);
        slider.appendChild(clone); // Clona e adiciona ao final
    });

    // Clonando os últimos 2 cards e adicionando ao início
    lastCards.forEach(card => {
        const clone = card.cloneNode(true);
        slider.insertBefore(clone, slider.firstChild); // Clona e adiciona ao início
    });

    totalCards = slider.children.length; // Atualiza o total de cards após clonar
}

// Função para ajustar o scroll ao clicar em próximo
function nextSlide() {
    scrollPosition -= cardWidth;
    slider.style.transition = 'transform 0.5s ease';
    slider.style.transform = `translateX(${scrollPosition}px)`;

    // Se atingir o final, faz o "loop" para o começo
    setTimeout(() => {
        if (scrollPosition <= -(cardWidth * (totalCards - 2))) {
            scrollPosition = -320; // Volta para o começo real (considerando os clones)
            slider.style.transition = 'none';
            slider.style.transform = `translateX(${scrollPosition}px)`;
        }
    }, 500);
}

// Função para ajustar o scroll ao clicar em anterior
function prevSlide() {
    scrollPosition += cardWidth;
    slider.style.transition = 'transform 0.5s ease';
    slider.style.transform = `translateX(${scrollPosition}px)`;

    // Se atingir o começo, faz o "loop" para o final
    setTimeout(() => {
        if (scrollPosition >= 0) {
            scrollPosition = -(cardWidth * (totalCards - 4)); // Volta para o final real (considerando os clones)
            slider.style.transition = 'none';
            slider.style.transform = `translateX(${scrollPosition}px)`;
        }
    }, 500);
}

// Clona os cartões ao carregar a página
cloneCards();

// Ajusta a posição inicial para os clones (pulando os clones do começo)
slider.style.transform = `translateX(${scrollPosition}px)`;

// Adiciona eventos de clique para os botões
nextBtn.addEventListener('click', nextSlide);
prevBtn.addEventListener('click', prevSlide);
