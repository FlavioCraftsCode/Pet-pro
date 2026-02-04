// resources/js/shop-logic.js

document.addEventListener('alpine:init', () => {
    
    // 1. REGISTRO DA STORE DO CARRINHO
    Alpine.store('cart', {
        isOpen: false,
        items: [],
        
        get itemCount() { 
            return this.items.reduce((sum, item) => sum + item.quantity, 0); 
        },
        
        get isEmpty() { 
            return this.items.length === 0; 
        },
        
        get total() { 
            return this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0); 
        },
        
        get shipping() { 
            return this.total >= 200 || this.isEmpty ? 0 : 19.90; 
        },
        
        get finalTotal() { 
            return this.total + this.shipping; 
        },

        add(product) {
            const existing = this.items.find(i => i.id === product.id);
            if (existing) {
                if (existing.quantity < (product.maxStock || 99)) {
                    existing.quantity++;
                }
            } else {
                this.items.push({ ...product, quantity: 1 });
            }
            this.isOpen = true;
            showNotification('Produto adicionado ao carrinho!');
        },

        remove(index) { 
            this.items.splice(index, 1); 
        },

        updateQuantity(index, qty) {
            const item = this.items[index];
            if (!item) return;
            
            const newQty = Math.max(1, qty);
            if (newQty <= (item.maxStock || 99)) {
                item.quantity = newQty;
            }
        },

        clear() { 
            this.items = []; 
        }
    });

    // 2. REGISTRO DO COMPONENTE DE PRODUTOS E FILTROS
    Alpine.data('app', () => ({
        sections: {
            petType: true,
            category: true,
            sizes: false,
            color: false,
            collections: false,
            age: false,
        },

        activeFilters: {
            petType: [],
            category: [],
            sizes: [],
            color: [],
            collections: [],
            age: [],
        },

        favorites: [],

        products: [
            { id:1, name:'Ração Premium Grain Free Adulto', price:189.90, image:'https://images.unsplash.com/photo-1589924691995-400dc9ecc119?w=400', category:'Alimentação', petType: 'Cães', size: 'Médio', color: 'Marrom', collection: 'Premium', age: 'Adulto', maxStock:50 },
            { id:2, name:'Arranhador Vertical Premium 120cm', price:289.90, image:'https://images.unsplash.com/photo-1545249390-6bdfa2859295?w=400', category:'Arranhadores', petType: 'Gatos', size: 'Grande', color: 'Marrom', collection: 'Ecológico', age: 'Adulto', maxStock:20 },
            { id:3, name:'Cama Ortopédica Memory Foam G', price:349.90, image:'https://images.unsplash.com/photo-1541599540903-216a46ca1ad0?w=400', category:'Camas', petType: 'Cães', size: 'Grande', color: 'Cinza', collection: 'Premium', age: 'Sênior', maxStock:15 },
            { id:4, name:'Coleira Antipuxão Ergonômica M', price:129.90, image:'https://images.unsplash.com/photo-1544568100-847a948585b9?w=400', category:'Coleiras', petType: 'Cães', size: 'Médio', color: 'Azul', collection: 'Orgânico', age: 'Adulto', maxStock:40 },
            { id:5, name:'Comedouro Elevado Inox Antiderrapante', price:119.90, image:'https://images.unsplash.com/photo-1553736026-ff14d158d222?w=400', category:'Acessórios', petType: 'Todos', size: 'Médio', color: 'Prata', collection: 'Premium', age: 'Adulto', maxStock:30 },
            { id:6, name:'Brinquedo Interativo Dispenser de Petiscos', price:79.90, image:'https://images.unsplash.com/photo-1576201836106-db1758fd1c97?w=400', category:'Brinquedos', petType: 'Cães', size: 'Pequeno', color: 'Verde', collection: 'Ecológico', age: 'Filhote', maxStock:60 },
            { id:7, name:'Peitoral Ergonômico com Refletivo G', price:159.90, image:'https://images.unsplash.com/photo-1598133894008-61f7fdb8cc3a?w=400', category:'Peitorais', petType: 'Cães', size: 'Grande', color: 'Preto', collection: 'Premium', age: 'Adulto', maxStock:25 },
            { id:8, name:'Guia Retrátil Premium 5m', price:89.90, image:'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=400', category:'Guias', petType: 'Cães', size: 'Médio', color: 'Vermelho', collection: 'Orgânico', age: 'Adulto', maxStock:35 },
            { id:9, name:'Mordedor Corda Natural 30cm', price:49.90, image:'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?w=400', category:'Brinquedos', petType: 'Cães', size: 'Médio', color: 'Marrom', collection: 'Ecológico', age: 'Filhote', maxStock:80 },
            { id:10, name:'Tapete Higiênico 50un – Super Absorvente', price:89.90, image:'https://images.unsplash.com/photo-1583512603805-3cc6b41f3edb?w=400', category:'Higiene', petType: 'Cães', size: 'Pequeno', color: 'Branco', collection: 'Premium', age: 'Filhote', maxStock:100 }
        ],

        get activeFilterCount() {
            return Object.values(this.activeFilters).reduce((sum, arr) => sum + arr.length, 0);
        },

        get filteredProducts() {
            return this.products.filter(product => {
                const petTypeMatch = this.activeFilters.petType.length === 0 || 
                                    this.activeFilters.petType.includes(product.petType) ||
                                    (product.petType === 'Todos');
                
                const categoryMatch = this.activeFilters.category.length === 0 || 
                                     this.activeFilters.category.includes(product.category);
                
                const sizeMatch = this.activeFilters.sizes.length === 0 || 
                                 this.activeFilters.sizes.includes(product.size);
                
                const colorMatch = this.activeFilters.color.length === 0 || 
                                  this.activeFilters.color.includes(product.color);
                
                const collectionMatch = this.activeFilters.collections.length === 0 || 
                                      this.activeFilters.collections.includes(product.collection);
                
                const ageMatch = this.activeFilters.age.length === 0 || 
                                this.activeFilters.age.includes(product.age);
                
                return petTypeMatch && categoryMatch && sizeMatch && colorMatch && collectionMatch && ageMatch;
            });
        },

        init() {
            const savedFavorites = localStorage.getItem('petproFavorites');
            if (savedFavorites) {
                this.favorites = JSON.parse(savedFavorites);
            }
        },

        toggleSection(key) {
            this.sections[key] = !this.sections[key];
        },

        toggleFilter(type, value) {
            const index = this.activeFilters[type].indexOf(value);
            if (index === -1) {
                this.activeFilters[type].push(value);
            } else {
                this.activeFilters[type].splice(index, 1);
            }
        },

        clearAllFilters() {
            Object.keys(this.activeFilters).forEach(key => this.activeFilters[key] = []);
        },

        toggleFavorite(productId) {
            const index = this.favorites.indexOf(productId);
            if (index === -1) {
                this.favorites.push(productId);
                showNotification('Adicionado aos favoritos!');
            } else {
                this.favorites.splice(index, 1);
                showNotification('Removido dos favoritos!');
            }
            localStorage.setItem('petproFavorites', JSON.stringify(this.favorites));
        },

        isFavorite(productId) {
            return this.favorites.includes(productId);
        }
    }));
});

// 3. UTILITÁRIOS GLOBAIS
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'fixed top-6 right-6 bg-orange-600 text-white px-6 py-3 rounded-xl shadow-lg z-[1000] flex items-center gap-3 animate-slide-in';
    notification.innerHTML = `
        <i class="fa-solid fa-check-circle"></i>
        <span class="font-medium text-sm">${message}</span>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slide-out 0.3s forwards';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Injeção de Estilos de Animação
const style = document.createElement('style');
style.textContent = `
    @keyframes slide-in { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
    @keyframes slide-out { from { transform: translateX(0); opacity: 1; } to { transform: translateX(100%); opacity: 0; } }
    .animate-slide-in { animation: slide-in 0.3s ease-out; }
    [x-cloak] { display: none !important; }
`;
document.head.appendChild(style);