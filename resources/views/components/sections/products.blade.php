<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos | PetPro Boutique</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        [x-cloak] { display: none !important; }
        
        @media (max-width: 640px) {
            .product-grid { 
                grid-template-columns: repeat(2, 1fr) !important; 
                gap: 1px !important; 
                background-color: #f3f4f6; 
            }
            .product-item { background-color: white; border: none !important; border-radius: 0 !important; }
        }
    </style>
</head>

<body class="bg-white min-h-screen antialiased flex flex-col" 
      x-data="{ ...shopLogic(), mobileMenu: false }" 
      x-cloak>

    <header class="w-full fixed lg:sticky top-0 left-0 bg-white lg:bg-[#F9F5F0]/90 backdrop-blur-md z-[9999] border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 md:px-6 py-3 md:py-5 flex items-center justify-between">
            
            <div class="flex lg:hidden relative z-[10001]">
                <button @click="mobileMenu = true" class="p-2 text-gray-900 active:text-orange-600 transition-colors">
                    <i class="fa-solid fa-bars-staggered text-2xl"></i>
                </button>
            </div>

            <a href="{{ route('home') }}" class="flex items-center gap-2 relative z-[10001] group">
                <div class="bg-orange-600 p-1.5 rounded-lg group-hover:rotate-12 transition-transform">
                    <i class="fa-solid fa-paw text-white text-lg"></i>
                </div>
                <span class="text-xl font-bold text-gray-900 tracking-tight">Pet<span class="text-orange-600">Pro.</span></span>
            </a>

            <nav class="hidden lg:flex items-center gap-8 text-gray-700 font-semibold text-sm uppercase tracking-wider">
                <a href="{{ route('home') }}" class="hover:text-orange-600 transition">Início</a>
                <a href="/#servicos" class="hover:text-orange-600 transition">Serviços</a>
                <a href="{{ route('products.index') }}" class="text-orange-600 transition">Produtos</a>
            </nav>

            <div class="flex items-center relative z-[10001]">
                <a href="{{ route('cart') }}" class="p-2 bg-white border border-gray-100 rounded-full text-gray-900 shadow-sm hover:text-orange-600 transition">
                    <i class="fa-solid fa-cart-shopping text-xl"></i>
                    <template x-if="$store.cart && $store.cart.totalItems > 0">
                        <span x-text="$store.cart.totalItems" class="absolute -top-1 -right-1 bg-orange-600 text-white text-[10px] font-bold w-4 h-4 flex items-center justify-center rounded-full border border-white"></span>
                    </template>
                </a>
            </div>
        </div>

        <div x-show="mobileMenu" 
             x-cloak 
             class="fixed inset-0 z-[10005] lg:hidden h-screen w-screen overflow-hidden"
             @keydown.escape.window="mobileMenu = false">
            
            <div x-show="mobileMenu" 
                 x-transition:enter="transition opacity ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 @click="mobileMenu = false" 
                 class="absolute inset-0 bg-gray-900/80 backdrop-blur-sm"></div>
            
            <div x-show="mobileMenu" 
                 x-transition:enter="transition transform ease-out duration-300"
                 x-transition:enter-start="-translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 class="absolute left-0 top-0 h-full w-[300px] bg-white shadow-2xl flex flex-col z-[10006]">
                
                <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-white sticky top-0 shrink-0">
                    <span class="font-black uppercase tracking-widest text-[10px] text-orange-600">Menu PetPro</span>
                    <button @click="mobileMenu = false" class="text-gray-900 p-2 hover:bg-gray-100 rounded-full">
                        <i class="fa-solid fa-xmark text-2xl"></i>
                    </button>
                </div>

                <nav class="flex-1 bg-white p-6 space-y-2 overflow-y-auto">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 p-4 text-lg font-bold text-gray-900 hover:bg-orange-50 hover:text-orange-600 rounded-2xl transition-all">
                        <i class="fa-solid fa-house text-sm opacity-40"></i> Início
                    </a>
                    <a href="{{ route('products.index') }}" class="flex items-center gap-3 p-4 text-lg font-bold text-gray-900 bg-orange-50 text-orange-600 rounded-2xl transition-all">
                        <i class="fa-solid fa-bag-shopping text-sm"></i> Produtos
                    </a>
                    
                    <div class="pt-6 mt-6 border-t border-gray-100">
                        <p class="px-3 text-[10px] font-black uppercase tracking-widest text-gray-400 mb-4">Finalizar</p>
                        <a href="{{ route('cart') }}" class="flex items-center justify-between p-5 bg-orange-600 text-white rounded-2xl font-bold shadow-lg shadow-orange-200">
                            <div class="flex items-center gap-3">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span>Meu Carrinho</span>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs"></i>
                        </a>
                    </div>
                </nav>

                <div class="p-6 bg-gray-50 border-t border-gray-100 shrink-0">
                    <p class="text-[10px] text-gray-400 text-center font-medium uppercase tracking-tight">© 2026 PetPro - Cuidado Premium</p>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow max-w-7xl mx-auto w-full pt-[70px] lg:pt-0">
        <div class="lg:hidden flex items-center justify-between px-4 py-4 border-b border-gray-100 sticky top-[65px] bg-white z-40">
            <button @click="mobileFilters = !mobileFilters" class="flex items-center gap-2 font-bold text-sm uppercase tracking-widest">
                <i class="fa-solid fa-bars-staggered"></i> <span x-text="mobileFilters ? 'Ocultar Filtros' : 'Mostrar Filtros'"></span>
            </button>
            <div class="text-xs text-gray-400 font-medium" x-text="filteredProducts.length + ' Itens'"></div>
        </div>

        <div class="flex flex-col lg:flex-row">
            <aside :class="mobileFilters ? 'block' : 'hidden'" class="lg:block lg:w-72 p-6 lg:p-10 border-r border-gray-100 min-h-screen bg-white">
                <div class="sticky top-28">
                    <h2 class="hidden lg:block font-black text-2xl mb-8 tracking-tighter">Filtros</h2>
                    <div class="space-y-8">
                        <div>
                            <p class="text-[11px] font-black text-gray-900 uppercase tracking-[0.2em] mb-5">Categoria</p>
                            <div class="space-y-4">
                                <template x-for="type in filterOptions.petType" :key="type">
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="checkbox" @change="toggleFilter('petType', type)" 
                                               class="w-4 h-4 border-gray-300 rounded text-orange-600 focus:ring-orange-600">
                                        <span class="text-sm font-medium text-gray-600 group-hover:text-black transition" x-text="type"></span>
                                    </label>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="flex-1">
                <div class="product-grid grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
                    <template x-for="product in filteredProducts" :key="product.id">
                        <div class="product-item group flex flex-col p-4 md:p-8 border-b border-r border-gray-100 hover:bg-gray-50/50 transition-colors relative">
                            <div class="absolute top-4 left-4 z-10 text-[10px] font-bold text-gray-400">
                                <i class="fa-solid fa-star text-orange-400"></i> 4.8
                            </div>
                            <div class="aspect-square mb-6 overflow-hidden bg-white">
                                <img :src="product.image" class="w-full h-full object-contain group-hover:scale-105 transition duration-700">
                            </div>
                            <div class="flex flex-col text-center md:text-left h-full">
                                <h3 class="font-bold text-gray-900 text-sm md:text-base mb-1 uppercase tracking-tight" x-text="product.name"></h3>
                                <div class="text-orange-600 font-black text-sm md:text-lg mb-4" x-text="formatPrice(product.price)"></div>
                                <button @click="$store.cart.addItem(product)" 
                                        class="mt-auto py-3 px-6 bg-gray-900 text-white text-[10px] font-black uppercase tracking-[0.2em] hover:bg-orange-600 transition-all active:scale-95">
                                    Adicionar à Cesta
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-900 text-white pt-16 md:pt-20 pb-8 md:pb-10 border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 md:gap-12 mb-12 md:mb-16">
            
            <div class="space-y-6 flex flex-col items-center md:items-start text-center md:text-left">
                <div class="flex items-center gap-2">
                    <div class="bg-orange-600 p-2 rounded-lg shadow-lg shadow-orange-600/20">
                        <i class="fa-solid fa-paw text-white"></i>
                    </div>
                    <span class="text-2xl font-bold">Pet<span class="text-orange-600">Pro.</span></span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed max-w-xs">
                    Referência em cuidado premium para pets. Tecnologia e carinho em um só lugar.
                </p>
                <div class="flex gap-5">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-orange-600 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-orange-600 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <h4 class="text-lg font-bold mb-5 md:mb-6 border-b-2 md:border-b-0 md:border-l-4 border-orange-600 pb-2 md:pb-0 md:pl-3 w-fit">Links Rápidos</h4>
                <nav>
                    <ul class="space-y-3 md:space-y-4 text-gray-400 text-sm">
                        <li><a href="{{ url('/') }}" class="hover:text-orange-600 transition-colors">Início</a></li>
                        <li><a href="#servicos" class="hover:text-orange-600 transition-colors">Serviços</a></li>
                        <li><a href="#loja" class="hover:text-orange-600 transition-colors">Produtos</a></li>
                    </ul>
                </nav>
            </div>

            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <h4 class="text-lg font-bold mb-5 md:mb-6 border-b-2 md:border-b-0 md:border-l-4 border-orange-600 pb-2 md:pb-0 md:pl-3 w-fit">Contato</h4>
                <ul class="space-y-3 md:space-y-4 text-gray-400 text-sm">
                    <li class="flex flex-col md:flex-row items-center md:items-start gap-2 md:gap-3">
                        <i class="fa-solid fa-location-dot text-orange-600 md:mt-1"></i>
                        <span>São Paulo, SP - Brasil</span>
                    </li>
                    <li class="flex flex-col md:flex-row items-center md:items-start gap-2 md:gap-3">
                        <i class="fa-solid fa-envelope text-orange-600"></i>
                        <span>contato@petpro.com</span>
                    </li>
                </ul>
            </div>

            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <h4 class="text-lg font-bold mb-5 md:mb-6 border-b-2 md:border-b-0 md:border-l-4 border-orange-600 pb-2 md:pb-0 md:pl-3 w-fit">Newsletter</h4>
                <div class="w-full space-y-3">
                    <input type="email" placeholder="Seu e-mail" 
                           class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-sm text-white focus:border-orange-600 focus:ring-1 focus:ring-orange-600 outline-none transition-all placeholder:text-gray-600">
                    <button class="w-full bg-orange-600 hover:bg-orange-700 active:scale-95 text-white py-4 rounded-xl font-bold transition-all shadow-lg shadow-orange-600/10">
                        Inscrever
                    </button>
                </div>
            </div>
        </div>

        <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6 text-[10px] uppercase tracking-[0.2em] text-gray-500 text-center">
            <p>&copy; {{ date('Y') }} PetPro. Criado com TALL Stack.</p>
            <p class="flex items-center gap-2">
                Desenvolvido por <span class="text-white font-bold hover:text-orange-500 transition-colors cursor-pointer"></span>
            </p>
        </div>
    </div>
</footer>

    <script>
        function shopLogic() {
            return {
                mobileFilters: false,
                filterOptions: { petType: ['Cães', 'Gatos', 'Aves'] },
                activeFilters: { petType: [] },
                products: [
                    { id: 1, name: 'Ração Grain Free Adulto', price: 189.90, image: 'https://images.unsplash.com/photo-1589924691995-400dc9ecc119?w=400', petType: 'Cães' },
                    { id: 2, name: 'Arranhador Premium 120cm', price: 289.90, image: 'https://images.unsplash.com/photo-1545249390-6bdfa2859295?w=400', petType: 'Gatos' },
                    { id: 3, name: 'Cama Memory Foam G', price: 349.90, image: 'https://images.unsplash.com/photo-1541599540903-216a46ca1ad0?w=400', petType: 'Cães' },
                    { id: 4, name: 'Coleira Ergonômica M', price: 129.90, image: 'https://images.unsplash.com/photo-1544568100-847a948585b9?w=400', petType: 'Cães' },
                    { id: 5, name: 'Comedouro Inox Luxo', price: 119.90, image: 'https://images.unsplash.com/photo-1553736026-ff14d158d222?w=400', petType: 'Cães' },
                    { id: 6, name: 'Brinquedo de Corda', price: 45.90, image: 'https://images.unsplash.com/photo-1576201836106-db1758fd1c97?q=80&w=400', petType: 'Cães' }
                ],
                get filteredProducts() {
                    if (this.activeFilters.petType.length === 0) return this.products;
                    return this.products.filter(p => this.activeFilters.petType.includes(p.petType));
                },
                toggleFilter(type, value) {
                    const idx = this.activeFilters[type].indexOf(value);
                    idx > -1 ? this.activeFilters[type].splice(idx, 1) : this.activeFilters[type].push(value);
                },
                formatPrice(price) {
                    return new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(price);
                }
            }
        }
    </script>
</body>
</html>