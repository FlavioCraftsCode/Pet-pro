import './bootstrap';
import Alpine from 'alpinejs';

// Importa a lógica do carrinho. 
// Certifique-se de que dentro do shop-logic.js você usa: 
// document.addEventListener('alpine:init', () => { Alpine.store('cart', { ... }) })
import './shop-logic';

window.Alpine = Alpine;

/**
 * Componentes Globais (Ex: Slider de Produtos)
 */
window.sliderHandler = function() {
    return {
        atBeginning: true,
        atEnd: false,
        
        init() {
            // Espera o DOM estar pronto para checar o scroll inicial
            this.$nextTick(() => this.checkScroll());
            window.addEventListener('resize', () => this.checkScroll());
        },

        checkScroll() {
            const slider = this.$refs.slider;
            if (!slider) return;
            this.atBeginning = slider.scrollLeft <= 5;
            this.atEnd = slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 5;
        },

        scrollTo(direction) {
            const slider = this.$refs.slider;
            if (!slider) return;
            // Define o quanto vai rolar: 80% da tela no mobile ou metade no desktop
            const scrollAmount = window.innerWidth < 768 ? slider.clientWidth * 0.8 : slider.clientWidth / 2;
            
            slider.scrollBy({
                left: direction === 'next' ? scrollAmount : -scrollAmount,
                behavior: 'smooth'
            });
            
            // Recheca a posição após a animação de scroll terminar
            setTimeout(() => this.checkScroll(), 400);
        }
    }
}


Alpine.start();