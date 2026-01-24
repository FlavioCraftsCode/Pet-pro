<header class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between sticky top-0 bg-[#F9F5F0]/80 backdrop-blur-md z-50">
    {{-- Logo --}}
    <a href="{{ route('home') }}" class="flex items-center gap-2 group">
        <div class="bg-orange-600 p-2 rounded-lg group-hover:rotate-12 transition-transform duration-300">
            <i class="fa-solid fa-paw text-white text-xl"></i>
        </div>
        <span class="text-2xl font-bold text-gray-900 tracking-tight">Pet<span class="text-orange-600">Pro.</span></span>
    </a>

    {{-- Navegação Centralizada --}}
    <nav class="hidden md:flex items-center gap-8 text-gray-700 font-semibold text-sm uppercase tracking-wider">
        <a href="{{ route('home') }}" class="hover:text-orange-600 transition {{ request()->routeIs('home') ? 'text-orange-600' : '' }}">Início</a>
        <a href="/#servicos" class="hover:text-orange-600 transition">Serviços</a>
        <a href="/#loja" class="hover:text-orange-600 transition">Produtos</a>
        <a href="{{ route('blog') }}" class="hover:text-orange-600 transition {{ request()->routeIs('blog') ? 'text-orange-600' : '' }}">Blog</a>
    </nav>

    <div class="flex items-center gap-4">
        {{-- Carrinho Reativo --}}
        <div class="relative" x-data="{ cartOpen: false }">
            <button @click="cartOpen = !cartOpen" 
                    class="relative p-2.5 bg-white border border-gray-100 rounded-full text-gray-900 hover:text-orange-600 hover:shadow-md transition-all duration-300">
                <i class="fa-solid fa-cart-shopping text-xl"></i>
                
                <template x-if="$store.cart.items.length > 0">
                    <span x-text="$store.cart.items.length" 
                          class="absolute -top-1 -right-1 bg-orange-600 text-white text-[10px] font-bold w-5 h-5 flex items-center justify-center rounded-full border-2 border-[#F9F5F0] animate-bounce">
                    </span>
                </template>
            </button>

            {{-- Dropdown Carrinho --}}
            <div x-show="cartOpen" x-cloak @click.outside="cartOpen = false" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 class="absolute right-0 mt-4 w-80 bg-white rounded-[2rem] shadow-2xl border border-gray-100 p-6 z-[60]">
                
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-xl font-bold text-gray-900">Meu Carrinho 🛒</h3>
                    <button @click="cartOpen = false" class="text-gray-400 hover:text-gray-600"><i class="fa-solid fa-xmark"></i></button>
                </div>
                
                <div class="space-y-4 max-h-72 overflow-y-auto custom-scrollbar pr-2">
                    <template x-if="$store.cart.items.length === 0">
                        <div class="text-center py-8 italic text-gray-400 text-sm">Seu carrinho está vazio.</div>
                    </template>
                    
                    <template x-for="(item, index) in $store.cart.items" :key="index">
                        <div class="flex items-center gap-4 p-2 rounded-2xl hover:bg-gray-50 transition">
                            <img :src="item.image" class="w-12 h-12 rounded-xl object-cover shadow-sm">
                            <div class="flex-1">
                                <h4 x-text="item.title" class="text-xs font-bold text-gray-900 line-clamp-1"></h4>
                                <p class="text-orange-600 text-[11px] font-bold" x-text="'R$ ' + item.price"></p>
                            </div>
                            <button @click="$store.cart.remove(index)" class="text-gray-300 hover:text-red-500"><i class="fa-solid fa-trash-can text-xs"></i></button>
                        </div>
                    </template>
                </div>

                <template x-if="$store.cart.items.length > 0">
                    <div class="mt-6 pt-5 border-t border-gray-100 text-center">
                        <div class="flex justify-between items-center mb-4 px-2">
                            <span class="text-gray-500 text-sm font-medium">Total:</span>
                            <span class="text-xl font-bold text-gray-900">R$ <span x-text="$store.cart.total()"></span></span>
                        </div>
                        <a href="/checkout" class="block bg-gray-900 text-white py-3.5 rounded-2xl font-bold hover:bg-orange-600 transition-all shadow-lg">Finalizar Compra</a>
                    </div>
                </template>
            </div>
        </div>

        {{-- Autenticação / Perfil do Usuário --}}
        <div class="relative" x-data="{ userMenu: false }">
            @auth
                {{-- Botão Usuário Logado (Perfil Estilo E-commerce) --}}
                <button @click="userMenu = !userMenu" class="flex items-center gap-3 bg-white border border-gray-200 p-1.5 pr-4 rounded-full hover:shadow-md transition-all duration-300">
                    <div class="bg-orange-600 w-8 h-8 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-sm">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                    <div class="text-left hidden lg:block">
                        <p class="text-[9px] text-gray-400 font-bold uppercase leading-none">Olá,</p>
                        <p class="text-xs font-bold text-gray-900 truncate max-w-[80px]">{{ explode(' ', Auth::user()->name)[0] }}</p>
                    </div>
                </button>

                {{-- Menu Dropdown --}}
                <div x-show="userMenu" x-cloak @click.outside="userMenu = false" 
                     x-transition class="absolute right-0 mt-4 w-60 bg-white rounded-[1.5rem] shadow-2xl border border-gray-100 p-3 z-[60]">
                    
                    <div class="px-4 py-3 mb-2 bg-gray-50 rounded-xl">
                        <p class="text-[10px] text-gray-400 font-bold uppercase">E-mail</p>
                        <p class="text-xs font-bold text-gray-800 truncate">{{ Auth::user()->email }}</p>
                    </div>

                    <nav class="space-y-1">
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition">
                            <i class="fa-solid fa-gauge-high opacity-50"></i> Dashboard
                        </a>
                        @if(Auth::user()->isAdmin())
                            <a href="/admin" class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-xl transition">
                                <i class="fa-solid fa-shield-dog opacity-50"></i> Admin Painel
                            </a>
                        @endif
                        <hr class="border-gray-50 my-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center gap-3 w-full px-4 py-2.5 text-sm font-bold text-red-500 hover:bg-red-50 rounded-xl transition">
                                <i class="fa-solid fa-power-off opacity-50"></i> Sair com segurança
                            </button>
                        </form>
                    </nav>
                </div>
            @else
                {{-- Botão para Visitantes --}}
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-orange-600 transition">Entrar</a>
                    <a href="{{ route('register') }}" class="bg-gray-900 text-white px-5 py-2.5 rounded-xl text-xs font-bold hover:bg-orange-600 transition-all shadow-lg shadow-gray-200">
                        Criar Conta
                    </a>
                </div>
            @endauth
        </div>
    </div>
</header>