<header class="w-full fixed lg:sticky top-0 left-0 bg-white lg:bg-[#F9F5F0]/90 backdrop-blur-md z-[9999] border-b border-gray-100 shadow-sm h-16 md:h-24" 
        x-data="{ mobileMenu: false }">
    
    <div class="max-w-7xl mx-auto px-4 md:px-6 h-full flex items-center justify-between">
        
        <div class="flex lg:hidden relative z-[10001]">
            <button @click="mobileMenu = true" class="p-2 text-gray-900 active:text-orange-600 transition-colors">
                <i class="fa-solid fa-bars-staggered text-xl md:text-2xl"></i>
            </button>
        </div>

        <a href="{{ route('home') }}" class="flex items-center gap-2 relative z-[10001] group transform scale-90 md:scale-100">
            <div class="bg-orange-600 p-1.5 rounded-lg group-hover:rotate-12 transition-transform">
                <i class="fa-solid fa-paw text-white text-base md:text-lg"></i>
            </div>
            <span class="text-lg md:text-xl font-bold text-gray-900 tracking-tight">Pet<span class="text-orange-600">Pro.</span></span>
        </a>

        <nav class="hidden lg:flex items-center gap-8 text-gray-700 font-semibold text-sm uppercase tracking-wider">
            <a href="{{ route('home') }}" class="hover:text-orange-600 transition">Início</a>
            <a href="/#servicos" class="hover:text-orange-600 transition">Serviços</a>
            <a href="{{ route('products.index') }}" class="hover:text-orange-600 transition">Produtos</a>
        </nav>

        <div class="flex items-center relative z-[10001]">
            <a href="{{ route('cart') }}" class="relative p-2 bg-white border border-gray-100 rounded-full text-gray-900 shadow-sm hover:text-orange-600 transition">
                <i class="fa-solid fa-cart-shopping text-lg md:text-xl"></i>
                <template x-if="$store.cart.totalItems > 0">
                    <span x-text="$store.cart.totalItems" 
                          class="absolute -top-1 -right-1 bg-orange-600 text-white text-[9px] md:text-[10px] font-bold w-4 h-4 md:w-5 md:h-5 flex items-center justify-center rounded-full border-2 border-white">
                    </span>
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
             x-transition:leave="transition opacity ease-in duration-200"
             @click="mobileMenu = false" 
             class="absolute inset-0 bg-gray-900/80 backdrop-blur-sm"></div>
        
        <div x-show="mobileMenu" 
             x-transition:enter="transition transform ease-out duration-300"
             x-transition:enter-start="-translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition transform ease-in duration-200"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full"
             class="absolute left-0 top-0 h-full w-[300px] bg-white shadow-2xl flex flex-col z-[10006]">
            
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-white sticky top-0 shrink-0">
                <span class="font-black uppercase tracking-widest text-[10px] text-orange-600">Menu PetPro</span>
                <button @click="mobileMenu = false" class="text-gray-900 p-2 hover:bg-gray-100 rounded-full transition-colors">
                    <i class="fa-solid fa-xmark text-2xl"></i>
                </button>
            </div>

            <nav class="flex-1 bg-white p-6 space-y-2 overflow-y-auto">
                <a href="{{ route('home') }}" class="flex items-center gap-3 p-4 text-lg font-bold text-gray-900 hover:bg-orange-50 hover:text-orange-600 rounded-2xl transition-all">
                    <i class="fa-solid fa-house text-sm opacity-40"></i> Início
                </a>
                <a href="{{ route('products.index') }}" class="flex items-center gap-3 p-4 text-lg font-bold text-gray-900 hover:bg-orange-50 hover:text-orange-600 rounded-2xl transition-all">
                    <i class="fa-solid fa-bag-shopping text-sm opacity-40"></i> Produtos
                </a>
                
                <div class="pt-6 mt-6 border-t border-gray-100">
                    <p class="px-3 text-[10px] font-black uppercase tracking-widest text-gray-400 mb-4">Finalizar</p>
                    
                    <a href="{{ route('cart') }}" class="flex items-center justify-between p-5 bg-orange-600 text-white rounded-2xl font-bold shadow-lg shadow-orange-200 active:scale-95 transition-all">
                        <div class="flex items-center gap-3 relative">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span>Meu Carrinho</span>
                            <template x-if="$store.cart.totalItems > 0">
                                <span x-text="$store.cart.totalItems" 
                                      class="ml-1 bg-white text-orange-600 text-[10px] w-5 h-5 flex items-center justify-center rounded-full">
                                </span>
                            </template>
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

<div class="h-16 lg:hidden"></div>