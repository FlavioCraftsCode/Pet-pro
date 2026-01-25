import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Store do Carrinho - Mantida e otimizada
Alpine.store('cart', {
    items: [],
    add(product) {
        this.items.push(product);
        this.save();
    },
    remove(index) {
        this.items.splice(index, 1);
        this.save();
    },
    save() {
        localStorage.setItem('petpro_cart', JSON.stringify(this.items));
    },
    total() {
        return this.items.reduce((sum, item) => sum + parseFloat(item.price), 0).toFixed(2);
    },
    init() {
        const saved = localStorage.getItem('petpro_cart');
        if (saved) this.items = JSON.parse(saved);
    }
});

// Slider Handler Profissional e Responsivo
window.sliderHandler = function() {
    return {
        atBeginning: true,
        atEnd: false,
        scrollPercent: 0, // Necessário para a barra de progresso mobile

        checkScroll() {
            const slider = this.$refs.slider;
            if (!slider) return;

            // Detecta se está no início ou fim com margem de erro de 5px
            this.atBeginning = slider.scrollLeft <= 5;
            this.atEnd = slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 5;

            // Calcula a porcentagem do scroll para o indicador visual
            const maxScroll = slider.scrollWidth - slider.clientWidth;
            this.scrollPercent = maxScroll > 0 ? (slider.scrollLeft / maxScroll) * 100 : 0;
        },

        scrollTo(direction) {
            const slider = this.$refs.slider;
            if (!slider) return;
            
            // Em mobile, movemos 80% da tela. Em desktop, movemos 1 card inteiro.
            const isMobile = window.innerWidth < 768;
            const scrollAmount = isMobile ? slider.clientWidth * 0.8 : slider.clientWidth / 2;
            
            slider.scrollBy({
                left: direction === 'next' ? scrollAmount : -scrollAmount,
                behavior: 'smooth'
            });

            // O timeout garante que a verificação ocorra após a animação do smooth scroll
            setTimeout(() => this.checkScroll(), 400);
        },

        init() {
            // Inicializa o estado do scroll
            this.$nextTick(() => {
                this.checkScroll();
            });

            // Listener para redimensionamento de janela (responsividade dinâmica)
            window.addEventListener('resize', () => this.checkScroll());
        }
    }
}

Alpine.start();