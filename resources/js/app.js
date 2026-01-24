import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// --- STORE GLOBAL DO CARRINHO ---
Alpine.store('cart', {
    items: [],
    add(product) {
        this.items.push(product);
        localStorage.setItem('petpro_cart', JSON.stringify(this.items));
    },
    remove(index) {
        this.items.splice(index, 1);
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

// --- LÓGICA DO SLIDER DE SERVIÇOS (sliderHandler) ---
// Esta função faz as setas controlarem o scroll horizontal do seu HTML
window.sliderHandler = function() {
    return {
        atBeginning: true,
        atEnd: false,

        // Verifica se o scroll está no início ou no fim para desativar as setas
        checkScroll() {
            const slider = this.$refs.slider;
            if (!slider) return;
            this.atBeginning = slider.scrollLeft <= 5;
            this.atEnd = slider.scrollLeft + slider.offsetWidth >= slider.scrollWidth - 5;
        },

        // Faz o movimento de deslizar
        scrollTo(direction) {
            const slider = this.$refs.slider;
            if (!slider) return;
            
            // Calcula o tamanho de um card (aproximadamente 350px a 400px dependendo do gap)
            const scrollAmount = slider.offsetWidth / 2; 
            
            slider.scrollBy({
                left: direction === 'next' ? scrollAmount : -scrollAmount,
                behavior: 'smooth'
            });

            // Atualiza o estado das setas após o movimento
            setTimeout(() => this.checkScroll(), 350);
        },

        // Inicializa a verificação ao carregar
        init() {
            this.$nextTick(() => this.checkScroll());
        }
    }
}

Alpine.start();