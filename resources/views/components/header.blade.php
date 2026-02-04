<header class="max-w-7xl mx-auto px-4 md:px-6 py-4 md:py-5 flex items-center justify-between sticky top-0 bg-[#F9F5F0]/90 backdrop-blur-md z-50 border-b border-gray-100 md:border-none" 
        x-data="{ mobileMenu: false }">
    
    <a href="{{ route('home') }}" class="flex items-center gap-2 group z-50">
        <div class="bg-orange-600 p-1.5 md:p-2 rounded-lg group-hover:rotate-12 transition-transform duration-300">
            <i class="fa-solid fa-paw text-white text-lg md:text-xl"></i>
        </div>
        <span class="text-xl md:text-2xl font-bold text-gray-900 tracking-tight">Pet<span class="text-orange-600">Pro.</span></span>
    </a>

    <nav class="hidden lg:flex items-center gap-8 text-gray-700 font-semibold text-sm uppercase tracking-wider">
        <a href="{{ route('home') }}" class="hover:text-orange-600 transition {{ request()->routeIs('home') ? 'text-orange-600' : '' }}">Início</a>
        <a href="/#servicos" class="hover:text-orange-600 transition">Serviços</a>
        <a href="{{ route('products.index') }}" class="flex items-center gap-1 hover:text-orange-600 transition {{ request()->routeIs('products.index') ? 'text-orange-600' : '' }}">
            <i class="fa-solid fa-bag-shopping text-[10px] mb-0.5"></i> Produtos
        </a>
        <a href="{{ route('blog') }}" class="hover:text-orange-600 transition {{ request()->routeIs('blog') ? 'text-orange-600' : '' }}">Blog</a>
        <a href="/#agendamento" class="bg-orange-100 text-orange-600 px-4 py-2 rounded-full hover:bg-orange-600 hover:text-white transition-all duration-300 flex items-center gap-2 shadow-sm">
            <i class="fa-regular fa-calendar-check"></i> Agendamento
        </a>
    </nav>

    <div class="flex items-center gap-2 md:gap-4 z-50">
        <div class="relative">
            <button @click="$store.cart.isOpen = true" 
                    class="relative p-2 md:p-2.5 bg-white border border-gray-100 rounded-full text-gray-900 hover:text-orange-600 hover:shadow-md transition-all duration-300">
                <i class="fa-solid fa-cart-shopping text-lg md:text-xl"></i>
                <template x-if="$store.cart.itemCount > 0">
                    <span x-text="$store.cart.itemCount" 
                          class="absolute -top-1 -right-1 bg-orange-600 text-white text-[9px] md:text-[10px] font-bold w-4 h-4 md:w-5 md:h-5 flex items-center justify-center rounded-full border-2 border-[#F9F5F0]">
                    </span>
                </template>
            </button>

            <div x-show="$store.cart.isOpen" 
                 x-cloak
                 x-transition:opacity
                 @click="$store.cart.isOpen = false"
                 class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[100]"></div>

            <div x-show="$store.cart.isOpen" 
                 x-cloak
                 x-transition:enter="transition transform duration-300"
                 x-transition:enter-start="translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition transform duration-300"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="translate-x-full"
                 class="fixed top-0 right-0 h-screen w-full max-w-[420px] bg-white shadow-2xl z-[101] flex flex-col"
                 @click.stop>
                
                <div class="p-6 border-b flex items-center justify-between bg-gradient-to-r from-orange-500/5 to-transparent">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-orange-500/10 flex items-center justify-center">
                            <i class="fa-solid fa-bag-shopping text-orange-600 text-xl"></i>
                        </div>
                        <div>
                            <h2 class="font-semibold text-lg text-gray-900">Seu Carrinho</h2>
                            <p class="text-sm text-gray-600" x-text="$store.cart.itemCount + ' itens'"></p>
                        </div>
                    </div>
                    <button @click="$store.cart.isOpen = false" class="p-2 hover:bg-gray-100 rounded-full">
                        <i class="fa-solid fa-xmark text-xl text-gray-600"></i>
                    </button>
                </div>

                <div class="flex-1 overflow-y-auto p-6 space-y-6">
                    <template x-if="$store.cart.isEmpty">
                        <div class="text-center py-16">
                            <i class="fa-solid fa-cart-shopping text-6xl text-gray-200 mb-6"></i>
                            <h3 class="text-xl font-medium text-gray-800 mb-3">Carrinho vazio</h3>
                            <p class="text-gray-600 mb-8">Adicione produtos incríveis para o seu pet!</p>
                            <button @click="$store.cart.isOpen = false" class="px-8 py-3 bg-orange-600 text-white rounded-xl hover:bg-orange-700 transition">
                                Explorar produtos
                            </button>
                        </div>
                    </template>

                    <template x-for="(item, index) in $store.cart.items" :key="index">
                        <div class="flex gap-4 bg-white rounded-xl border border-gray-100 p-4 hover:border-orange-500/30 transition-all">
                            <img :src="item.image" class="w-20 h-20 object-cover rounded-lg" :alt="item.name">
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900 line-clamp-2" x-text="item.name"></h4>
                                <p class="text-xs text-gray-500 mt-1" x-text="item.category"></p>
                                <div class="mt-3 flex items-center justify-between">
                                    <span class="font-bold text-orange-600 text-base"
                                          x-text="'R$ ' + (item.price * item.quantity).toLocaleString('pt-BR', {minimumFractionDigits:2})"></span>
                                    <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                        <button @click="$store.cart.updateQuantity(index, item.quantity - 1)" class="px-3 py-1.5 hover:bg-gray-100 text-gray-700">-</button>
                                        <span class="px-4 font-medium text-sm" x-text="item.quantity"></span>
                                        <button @click="$store.cart.updateQuantity(index, item.quantity + 1)" class="px-3 py-1.5 hover:bg-gray-100 text-gray-700">+</button>
                                    </div>
                                </div>
                                <button @click="$store.cart.remove(index)" class="mt-3 text-sm text-red-600 hover:text-red-800 flex items-center gap-1.5">
                                    <i class="fa-regular fa-trash-can"></i> Remover
                                </button>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="p-6 border-t bg-gray-50">
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span x-text="'R$ ' + $store.cart.total.toLocaleString('pt-BR', {minimumFractionDigits:2})"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Frete</span>
                            <span :class="$store.cart.shipping === 0 ? 'text-emerald-600 font-semibold' : ''"
                                  x-text="$store.cart.shipping === 0 ? 'Grátis' : 'R$ ' + $store.cart.shipping.toLocaleString('pt-BR', {minimumFractionDigits:2})"></span>
                        </div>
                        <div class="pt-4 border-t flex justify-between text-lg font-bold">
                            <span>Total</span>
                            <span class="text-orange-600 text-xl" x-text="'R$ ' + $store.cart.finalTotal.toLocaleString('pt-BR', {minimumFractionDigits:2})"></span>
                        </div>
                    </div>
                    <button class="mt-6 w-full py-4 bg-orange-600 text-white rounded-xl font-semibold hover:bg-orange-700 transition shadow-lg">
                        Finalizar compra
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>