const botoes = document.querySelectorAll('.butao');

botoes.forEach(botao => {
    botao.addEventListener('click', function() {
        const expandido = this.getAttribute('aria-expanded')

        if (expandido === 'true') {
            this.innerHTML = "-"
            this.classList.remove('bntPlus')
            this.classList.add('bntMinus')

            
        }else {
            this.innerHTML = "+"
            this.classList.remove('bntMinus')
            this.classList.add('bntPlus')
        }
    });
});
