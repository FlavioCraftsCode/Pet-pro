window.shopLogic = () => ({
    
    activeFilters: {
        petType: [],
        priceRange: { min: 0, max: 2000 }
    },
    
    filterOptions: {
        petType: ['Cães', 'Gatos', 'Aves'],
    },

    
    products: [
        { id: 1, name: 'Ração Premium Grain Free Adulto', price: 189.90, image: 'https://images.unsplash.com/photo-1589924691995-400dc9ecc119?w=400', petType: 'Cães', category: 'Alimentação' },
        { id: 2, name: 'Arranhador Vertical Premium 120cm', price: 289.90, image: 'https://images.unsplash.com/photo-1545249390-6bdfa2859295?w=400', petType: 'Gatos', category: 'Arranhadores' },
        { id: 3, name: 'Cama Ortopédica Memory Foam G', price: 349.90, image: 'https://images.unsplash.com/photo-1541599540903-216a46ca1ad0?w=400', petType: 'Cães', category: 'Camas' },
        { id: 4, name: 'Coleira Antipuxão Ergonômica M', price: 129.90, image: 'https://images.unsplash.com/photo-1544568100-847a948585b9?w=400', petType: 'Cães', category: 'Acessórios' },
        { id: 5, name: 'Comedouro Elevado Inox', price: 119.90, image: 'https://images.unsplash.com/photo-1553736026-ff14d158d222?w=400', petType: 'Todos', category: 'Acessórios' },
        { id: 6, name: 'Brinquedo Interativo de Corda', price: 45.90, image: 'https://images.unsplash.com/photo-1576201836106-db1758fd1c97?q=80&w=400', petType: 'Cães', category: 'Brinquedos' }
    ],

    
    get filteredProducts() {
        return this.products.filter(product => {
            const petMatch = this.activeFilters.petType.length === 0 || 
                             this.activeFilters.petType.includes(product.petType) || 
                             product.petType === 'Todos';
            return petMatch && product.price <= this.activeFilters.priceRange.max;
        });
    },

    
    addToCart(product) {
        
        Alpine.store('cart').addItem(product);
        
        
        if (this.cart) this.cart.isOpen = true;
    },

    toggleFilter(type, value) {
        const index = this.activeFilters[type].indexOf(value);
        index > -1 ? this.activeFilters[type].splice(index, 1) : this.activeFilters[type].push(value);
    },

    formatPrice(price) {
        return new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(price);
    }
});