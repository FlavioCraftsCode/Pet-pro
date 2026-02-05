import './bootstrap';
import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';

window.Alpine = Alpine;
Alpine.plugin(persist);


Alpine.store('cart', {
    items: Alpine.$persist([]).as('petpro_cart'),
    
    addItem(product) {
        const id = product.id.toString();
        const existing = this.items.find(item => item.id.toString() === id);
        
        if (existing) {
            existing.quantity++;
        } else {
            this.items.push({
                id: id,
                name: product.name || product.title,
                price: parseFloat(product.price),
                image: product.image,
                quantity: 1
            });
        }
        this.items = [...this.items];
    },

    removeItem(id) {
        this.items = this.items.filter(item => item.id.toString() !== id.toString());
        this.items = [...this.items];
    },

    updateQuantity(id, quantity) {
        const item = this.items.find(item => item.id.toString() === id.toString());
        if (item) {
            item.quantity = Math.max(0, quantity);
            if (item.quantity === 0) {
                this.removeItem(id);
            }
        }
        this.items = [...this.items];
    },

    get totalPrice() {
        return this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    },

    get totalItems() {
        return this.items.reduce((sum, item) => sum + item.quantity, 0);
    }
});


Alpine.data('sliderHandler', () => ({
    atBeginning: true,
    atEnd: false,
    scrollPercent: 0,

    checkScroll() {
        const slider = this.$refs.slider;
        if (!slider) return;

        this.atBeginning = slider.scrollLeft <= 5; 
        this.atEnd = slider.scrollLeft + slider.offsetWidth >= slider.scrollWidth - 5;
        
        const maxScroll = slider.scrollWidth - slider.offsetWidth;
        this.scrollPercent = maxScroll > 0 ? (slider.scrollLeft / maxScroll) * 100 : 0;
    },

    scrollTo(direction) {
        const slider = this.$refs.slider;
        if (!slider) return;

        
        const firstCard = slider.firstElementChild;
        const cardWidth = firstCard ? firstCard.offsetWidth + 16 : 300; 
        const scrollAmount = direction === 'next' ? cardWidth : -cardWidth;

        slider.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    },

    init() {
        this.$nextTick(() => {
            this.checkScroll();
        });
    }
}));

Alpine.start();
console.log('✅ Carrinho PetPro: Motor Rodando!');
console.log('✅ Slider PetPro: Carregado!');