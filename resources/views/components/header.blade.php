<header class="max-w-7xl mx-auto px-4 md:px-6 py-4 md:py-5 flex items-center justify-between sticky top-0 bg-[#F9F5F0]/90 backdrop-blur-md z-50 border-b border-gray-100 md:border-none" x-data="{ mobileMenu: false }">
    
    
    <a href="{{ route('home') }}" class="flex items-center gap-2 group z-50">
        <div class="bg-orange-600 p-1.5 md:p-2 rounded-lg group-hover:rotate-12 transition-transform duration-300">
            <i class="fa-solid fa-paw text-white text-lg md:text-xl"></i>
        </div>
        <span class="text-xl md:text-2xl font-bold text-gray-900 tracking-tight">Pet<span class="text-orange-600">Pro.</span></span>
    </a>

    
    <nav class="hidden lg:flex items-center gap-8 text-gray-700 font-semibold text-sm uppercase tracking-wider">
        <a href="{{ route('home') }}" class="hover:text-orange-600 transition {{ request()->routeIs('home') ? 'text-orange-600' : '' }}">Início</a>
        <a href="/#servicos" class="hover:text-orange-600 transition">Serviços</a>
        <a href="/#loja" class="hover:text-orange-600 transition">Produtos</a>
        <a href="{{ route('blog') }}" class="hover:text-orange-600 transition {{ request()->routeIs('blog') ? 'text-orange-600' : '' }}">Blog</a>
    </nav>

    
    <div class="flex items-center gap-2 md:gap-4 z-50">
        
        
        <div class="relative" x-data="{ cartOpen: false }">
            <button @click="cartOpen = !cartOpen" 
                    class="relative p-2 md:p-2.5 bg-white border border-gray-100 rounded-full text-gray-900 hover:text-orange-600 hover:shadow-md transition-all duration-300">
                <i class="fa-solid fa-cart-shopping text-lg md:text-xl"></i>
                
                <template x-if="$store.cart.items.length > 0">
                    <span x-text="$store.cart.items.length" 
                          class="absolute -top-1 -right-1 bg-orange-600 text-white text-[9px] md:text-[10px] font-bold w-4 h-4 md:w-5 md:h-5 flex items-center justify-center rounded-full border-2 border-[#F9F5F0] animate-bounce">
                    </span>
                </template>
            </button>

            
            <div x-show="cartOpen" x-cloak @click.outside="cartOpen = false" 
                 x-transition
                 class="absolute right-[-50px] md:right-0 mt-4 w-[280px] md:w-80 bg-white rounded-[2rem] shadow-2xl border border-gray-100 p-5 md:p-6 z-[60]">
                
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-gray-900">Meu Carrinho 🛒</h3>
                    <button @click="cartOpen = false"><i class="fa-solid fa-xmark text-gray-400"></i></button>
                </div>
                
                <div class="space-y-4 max-h-60 overflow-y-auto pr-2 custom-scrollbar">
                    <template x-if="$store.cart.items.length === 0">
                        <div class="text-center py-6 italic text-gray-400 text-xs">Vazio.</div>
                    </template>
                    
                    <template x-for="(item, index) in $store.cart.items" :key="index">
                        <div class="flex items-center gap-3 p-2 rounded-xl hover:bg-gray-50">
                            <img :src="item.image" class="w-10 h-10 rounded-lg object-cover">
                            <div class="flex-1">
                                <h4 x-text="item.title" class="text-[11px] font-bold text-gray-900 line-clamp-1"></h4>
                                <p class="text-orange-600 text-[10px] font-bold" x-text="'R$ ' + item.price"></p>
                            </div>
                            <button @click="$store.cart.remove(index)" class="text-gray-300 hover:text-red-500"><i class="fa-solid fa-trash-can text-[10px]"></i></button>
                        </div>
                    </template>
                </div>

                <template x-if="$store.cart.items.length > 0">
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex justify-between mb-4">
                            <span class="text-xs font-medium text-gray-500">Total:</span>
                            <span class="font-bold text-gray-900">R$ <span x-text="$store.cart.total()"></span></span>
                        </div>
                        <a href="/checkout" class="block w-full bg-gray-900 text-white py-3 rounded-xl text-center text-sm font-bold hover:bg-orange-600 transition-all">Finalizar</a>
                    </div>
                </template>
            </div>
        </div>

        {{-- Perfil / Login (Ajustado: Esconde texto no mobile) --}}
        <div class="relative" x-data="{ userMenu: false }">
            @auth
                <button @click="userMenu = !userMenu" class="flex items-center gap-2 bg-white border border-gray-200 p-1 md:p-1.5 md:pr-4 rounded-full">
                    <div class="bg-orange-600 w-8 h-8 rounded-full flex items-center justify-center text-white text-xs font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                    <i class="fa-solid fa-chevron-down text-[10px] text-gray-400 mr-1 md:hidden"></i>
                    <div class="text-left hidden lg:block">
                        <p class="text-[9px] text-gray-400 font-bold uppercase leading-none">Olá,</p>
                        <p class="text-xs font-bold text-gray-900 truncate max-w-[80px]">{{ explode(' ', Auth::user()->name)[0] }}</p>
                    </div>
                </button>
                {{-- Dropdown do Usuário --}}
                <div x-show="userMenu" x-cloak @click.outside="userMenu = false" class="absolute right-0 mt-4 w-56 bg-white rounded-2xl shadow-2xl border border-gray-100 p-2 z-[60]">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-orange-50 rounded-xl transition">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">@csrf
                        <button class="w-full text-left px-4 py-2.5 text-sm font-bold text-red-500 hover:bg-red-50 rounded-xl">Sair</button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="p-2.5 bg-gray-100 rounded-full text-gray-600 lg:hidden">
                    <i class="fa-solid fa-user"></i>
                </a>
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600">Entrar</a>
                    <a href="{{ route('register') }}" class="bg-gray-900 text-white px-5 py-2.5 rounded-xl text-xs font-bold">Criar Conta</a>
                </div>
            @endauth
        </div>

        {{-- Botão Menu Hamburguer (Apenas Mobile) --}}
        <button @click="mobileMenu = true" class="lg:hidden p-2.5 bg-gray-900 text-white rounded-full">
            <i class="fa-solid fa-bars-staggered"></i>
        </button>
    </div>

    {{-- Menu Lateral Mobile (Drawer) --}}
    <div x-show="mobileMenu" x-cloak class="fixed inset-0 z-[100] lg:hidden">
        {{-- Overlay Escuro --}}
        <div x-show="mobileMenu" x-transition:enter="transition opacity-0 duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" @click="mobileMenu = false" class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm"></div>
        
        {{-- Conteúdo do Menu --}}
        <div x-show="mobileMenu" x-transition:enter="transition translate-x-full duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" class="absolute right-0 top-0 bottom-0 w-[280px] bg-white p-8 shadow-2xl">
            <div class="flex justify-between items-center mb-10">
                <span class="text-xl font-bold">Menu</span>
                <button @click="mobileMenu = false" class="text-gray-400 text-2xl">&times;</button>
            </div>
            <nav class="flex flex-col gap-6 font-bold text-lg text-gray-800">
                <a href="{{ route('home') }}" @click="mobileMenu = false" class="hover:text-orange-600 transition">Início</a>
                <a href="/#servicos" @click="mobileMenu = false" class="hover:text-orange-600 transition">Serviços</a>
                <a href="/#loja" @click="mobileMenu = false" class="hover:text-orange-600 transition">Produtos</a>
                <a href="{{ route('blog') }}" @click="mobileMenu = false" class="hover:text-orange-600 transition">Blog</a>
            </nav>
            <div class="mt-10 pt-10 border-t border-gray-100">
                @guest
                    <a href="{{ route('register') }}" class="block w-full bg-orange-600 text-white py-4 rounded-2xl text-center font-bold shadow-lg">Começar Agora</a>
                @endguest
            </div>
        </div>
    </div>
</header>