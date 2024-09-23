const thumbnails = document.querySelectorAll('.thumbnail');

thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => {
        thumbnails.forEach(t => t.classList.remove('active')); // Remove a classe ativa de todas as miniaturas
        thumbnail.classList.add('active'); // Adiciona a classe ativa à miniatura clicada
    });
});

// Adiciona evento para atualizar a miniatura ativa ao mudar o slide
const carouselElement = document.getElementById('carouselExample');
carouselElement.addEventListener('slide.bs.carousel', function (event) {
    const activeIndex = event.to; // O índice do slide que está prestes a ser exibido
    thumbnails.forEach(t => t.classList.remove('active')); // Remove a classe ativa de todas as miniaturas
    thumbnails[activeIndex].classList.add('active'); // Adiciona a classe ativa à miniatura correspondente
});
