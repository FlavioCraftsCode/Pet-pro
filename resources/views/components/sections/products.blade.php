<!DOCTYPE html>
<html lang="pt-BR" x-data="app()" x-cloak>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos | PetPro Boutique</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        petpro: {
                            primary: '#f97316',
                            primaryDark: '#ea580c',
                            primaryLight: '#fdba74',
                            accent: '#10b981',
                            dark: '#1f2937',
                            light: '#f9fafb',
                        }
                    },
                    fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] },
                    boxShadow: {
                        'card': '0 10px 25px -5px rgba(0,0,0,0.05), 0 8px 10px -6px rgba(0,0,0,0.01)',
                        'card-hover': '0 20px 40px -10px rgba(249,115,22,0.15)',
                    },
                }
            }
        }
    </script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-white min-h-screen antialiased">

<header class="max-w-7xl mx-auto px-4 md:px-6 py-4 md:py-5 flex items-center justify-between sticky top-0 bg-[#F9F5F0]/90 backdrop-blur-md z-50 border-b border-gray-100 md:border-none" 
        x-data="{ mobileMenu: false }">
    
    <a href="/" class="flex items-center gap-2 group z-50">
        <div class="bg-orange-600 p-1.5 md:p-2 rounded-lg group-hover:rotate-12 transition-transform duration-300">
            <i class="fa-solid fa-paw text-white text-lg md:text-xl"></i>
        </div>
        <span class="text-xl md:text-2xl font-bold text-gray-900 tracking-tight">Pet<span class="text-orange-600">Pro.</span></span>
    </a>

    <nav class="hidden lg:flex items-center gap-8 text-gray-700 font-semibold text-sm uppercase tracking-wider">
        <a href="/" class="hover:text-orange-600 transition {{ request()->routeIs('home') ? 'text-orange-600' : '' }}">Início</a>
        <a href="/#servicos" class="hover:text-orange-600 transition">Serviços</a>
        <a href="/produtos" class="flex items-center gap-1 hover:text-orange-600 transition {{ request()->routeIs('products.index') ? 'text-orange-600' : '' }}">
            <i class="fa-solid fa-bag-shopping text-[10px] mb-0.5"></i> Produtos
        </a>
        <a href="/blog" class="hover:text-orange-600 transition {{ request()->routeIs('blog') ? 'text-orange-600' : '' }}">Blog</a>
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
        </div>
    </div>
</header>

<div x-show="$store.cart.isOpen"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     class="fixed inset-0 z-50 bg-black/40 backdrop-blur-sm"
     @click="$store.cart.isOpen = false">
    <div @click.stop
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         class="absolute right-0 top-0 h-full w-full max-w-md bg-white shadow-2xl flex flex-col">

        <div class="p-6 border-b flex items-center justify-between bg-gradient-to-r from-petpro-primary/5 to-transparent">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-petpro-primary/10 flex items-center justify-center">
                    <i class="fa-solid fa-bag-shopping text-petpro-primary text-xl"></i>
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
                    <button @click="$store.cart.isOpen = false" class="px-8 py-3 bg-petpro-primary text-white rounded-xl hover:bg-petpro-primaryDark transition">
                        Explorar produtos
                    </button>
                </div>
            </template>

            <template x-for="(item, index) in $store.cart.items" :key="index">
                <div class="flex gap-4 bg-white rounded-xl border border-gray-100 p-4 hover:border-petpro-primary/30 transition-all">
                    <img :src="item.image" class="w-20 h-20 object-cover rounded-lg" :alt="item.name">
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900 line-clamp-2" x-text="item.name"></h4>
                        <p class="text-sm text-gray-600 mt-1" x-text="item.category"></p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="font-bold text-petpro-primary text-base"
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
                    <span :class="$store.cart.shipping === 0 ? 'text-petpro-accent font-semibold' : ''"
                          x-text="$store.cart.shipping === 0 ? 'Grátis' : 'R$ ' + $store.cart.shipping.toLocaleString('pt-BR', {minimumFractionDigits:2})"></span>
                </div>
                <div class="pt-4 border-t flex justify-between text-lg font-bold">
                    <span>Total</span>
                    <span class="text-petpro-primary text-xl" x-text="'R$ ' + $store.cart.finalTotal.toLocaleString('pt-BR', {minimumFractionDigits:2})"></span>
                </div>
            </div>
            <button class="mt-6 w-full py-4 bg-petpro-primary text-white rounded-xl font-semibold hover:bg-petpro-primaryDark transition shadow-lg">
                Finalizar compra
            </button>
        </div>
    </div>
</div>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Produtos Premium para Pets</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Seleção curada para o bem-estar do seu pet</p>
    </div>

    <div class="flex flex-col lg:flex-row gap-12">
        <aside class="lg:w-64 flex-shrink-0">
            <div class="bg-white rounded-xl p-6 lg:sticky lg:top-24 border border-gray-100 shadow-sm">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Filtros</h2>
                    <button @click="clearAllFilters()" class="text-xs text-petpro-primary hover:text-petpro-primaryDark font-medium">
                        Limpar tudo
                    </button>
                </div>

                <div class="mb-6">
                    <button @click="toggleSection('petType')" class="w-full flex justify-between items-center text-sm font-medium text-gray-900 mb-2">
                        <span>Tipo de Pet</span>
                        <i :class="sections.petType ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'" class="text-xs text-gray-500 transition-transform"></i>
                    </button>
                    <div x-show="sections.petType" x-collapse class="space-y-2 mt-3">
                        <template x-for="petType in ['Cães', 'Gatos', 'Outros']" :key="petType">
                            <label class="block text-sm cursor-pointer hover:text-petpro-primary transition flex items-center">
                                <input type="checkbox" :value="petType" @change="toggleFilter('petType', petType)" 
                                       class="mr-2 accent-petpro-primary rounded border-gray-300">
                                <span x-text="petType"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <div class="mb-6">
                    <button @click="toggleSection('category')" class="w-full flex justify-between items-center text-sm font-medium text-gray-900 mb-2">
                        <span>Categoria</span>
                        <i :class="sections.category ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'" class="text-xs text-gray-500 transition-transform"></i>
                    </button>
                    <div x-show="sections.category" x-collapse class="space-y-2 mt-3">
                        <template x-for="category in ['Alimentação', 'Brinquedos', 'Camas', 'Acessórios', 'Higiene', 'Arranhadores', 'Coleiras', 'Peitorais', 'Guias']" :key="category">
                            <label class="block text-sm cursor-pointer hover:text-petpro-primary transition flex items-center">
                                <input type="checkbox" :value="category" @change="toggleFilter('category', category)" 
                                       class="mr-2 accent-petpro-primary rounded border-gray-300">
                                <span x-text="category"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <div class="mb-6">
                    <button @click="toggleSection('sizes')" class="w-full flex justify-between items-center text-sm font-medium text-gray-900 mb-2">
                        <span>Tamanhos</span>
                        <i :class="sections.sizes ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'" class="text-xs text-gray-500 transition-transform"></i>
                    </button>
                    <div x-show="sections.sizes" x-collapse class="space-y-2 mt-3">
                        <template x-for="size in ['Pequeno', 'Médio', 'Grande']" :key="size">
                            <label class="block text-sm cursor-pointer hover:text-petpro-primary transition flex items-center">
                                <input type="checkbox" :value="size" @change="toggleFilter('sizes', size)" 
                                       class="mr-2 accent-petpro-primary rounded border-gray-300">
                                <span x-text="size"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <div class="mb-6">
                    <button @click="toggleSection('collections')" class="w-full flex justify-between items-center text-sm font-medium text-gray-900 mb-2">
                        <span>Coleções</span>
                        <i :class="sections.collections ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'" class="text-xs text-gray-500 transition-transform"></i>
                    </button>
                    <div x-show="sections.collections" x-collapse class="space-y-2 mt-3">
                        <template x-for="collection in ['Premium', 'Orgânico', 'Ecológico', 'Natural']" :key="collection">
                            <label class="block text-sm cursor-pointer hover:text-petpro-primary transition flex items-center">
                                <input type="checkbox" :value="collection" @change="toggleFilter('collections', collection)" 
                                       class="mr-2 accent-petpro-primary rounded border-gray-300">
                                <span x-text="collection"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <div>
                    <button @click="toggleSection('age')" class="w-full flex justify-between items-center text-sm font-medium text-gray-900 mb-2">
                        <span>Idade do Pet</span>
                        <i :class="sections.age ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'" class="text-xs text-gray-500 transition-transform"></i>
                    </button>
                    <div x-show="sections.age" x-collapse class="space-y-2 mt-3">
                        <template x-for="age in ['Filhote', 'Adulto', 'Sênior']" :key="age">
                            <label class="block text-sm cursor-pointer hover:text-petpro-primary transition flex items-center">
                                <input type="checkbox" :value="age" @change="toggleFilter('age', age)" 
                                       class="mr-2 accent-petpro-primary rounded border-gray-300">
                                <span x-text="age"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 text-center">
                    <p class="text-sm text-gray-600 font-medium" 
                       :class="activeFilterCount > 0 ? 'text-petpro-primary' : 'text-gray-400'"
                       x-text="activeFilterCount > 0 ? activeFilterCount + ' filtro(s) ativo(s)' : 'Nenhum filtro aplicado'"></p>
                </div>
            </div>
        </aside>

        <div class="flex-1">
            <div class="mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <p class="text-gray-600">
                    Mostrando <span class="font-semibold text-gray-900" x-text="filteredProducts.length"></span> produtos
                    <span x-show="activeFilterCount > 0" class="text-sm">
                        (filtrados de <span x-text="products.length"></span>)
                    </span>
                </p>
                <div class="flex items-center gap-4 w-full sm:w-auto">
                    <select class="w-full sm:w-auto text-sm border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-petpro-primary focus:border-transparent bg-white">
                        <option>Ordenar por: Mais Vendidos</option>
                        <option>Ordenar por: Menor Preço</option>
                        <option>Ordenar por: Maior Preço</option>
                        <option>Ordenar por: Mais Recentes</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <template x-for="product in filteredProducts" :key="product.id">
                    <div class="group bg-white rounded-xl border border-gray-100 hover:border-petpro-primary/30 p-5 hover:shadow-card-hover transition-all duration-300 transform hover:-translate-y-1 flex flex-col h-full">
                        
                        <div class="relative mb-4 flex-grow-0 overflow-hidden rounded-lg">
                            <img :src="product.image" :alt="product.name" 
                                 class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute top-3 left-3">
                                <span class="px-2.5 py-1 bg-petpro-primary text-white text-[10px] font-bold rounded-lg uppercase tracking-wider" 
                                      x-text="product.collection"></span>
                            </div>
                            <button @click="toggleFavorite(product.id)" 
                                    class="absolute top-3 right-3 w-9 h-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition group/fav">
                                <i class="far fa-heart text-gray-600 text-sm transition-colors" :class="{'fas text-red-500': isFavorite(product.id)}"></i>
                            </button>
                        </div>
                        
                        <div class="flex flex-col flex-grow">
                            <h3 class="text-sm font-semibold text-gray-900 mb-3 line-clamp-2 min-h-[2.5rem] group-hover:text-petpro-primary transition-colors" 
                                x-text="product.name"></h3>
                            
                            <div class="flex flex-wrap gap-1.5 mb-4">
                                <span class="text-[10px] px-2 py-0.5 rounded-full bg-gray-100 text-gray-600 font-medium" x-text="product.petType"></span>
                                <span class="text-[10px] px-2 py-0.5 rounded-full bg-gray-100 text-gray-600 font-medium" x-text="product.size"></span>
                            </div>
                            
                            <div class="mt-auto mb-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-2xl font-bold text-petpro-primary" 
                                          x-text="'R$ ' + product.price.toFixed(2).replace('.', ',')"></span>
                                    <span class="text-xs text-gray-400 line-through hidden sm:inline" 
                                          x-text="'R$ ' + (product.price * 1.2).toFixed(2).replace('.', ',')"></span>
                                </div>
                                <p class="text-[10px] text-gray-500 mt-1 uppercase tracking-tight">Até 12x sem juros</p>
                            </div>
                            
                            <button @click="$store.cart.add(product)" 
                                    class="relative w-full bg-petpro-primary text-white py-3 px-4 rounded-lg hover:bg-petpro-primaryDark active:scale-[0.98] transition-all duration-200 font-bold text-xs flex items-center justify-center gap-2 shadow-sm hover:shadow-orange-200 hover:shadow-lg">
                                <i class="fas fa-shopping-cart text-xs"></i>
                                <span>ADICIONAR AO CARRINHO</span>
                            </button>
                        </div>
                    </div>
                </template>
                
                <template x-if="filteredProducts.length === 0">
                    <div class="col-span-full text-center py-20 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                        <div class="bg-white w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
                            <i class="fa-solid fa-magnifying-glass text-3xl text-gray-300"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Nenhum pet-produto por aqui...</h3>
                        <p class="text-gray-500 mb-8 max-w-xs mx-auto text-sm">Tente mudar os filtros ou procure por algo menos específico.</p>
                        <button @click="clearAllFilters()" class="px-8 py-3 bg-petpro-primary text-white rounded-xl hover:bg-petpro-primaryDark transition-all font-semibold shadow-md">
                            Ver tudo novamente
                        </button>
                    </div>
                </template>
            </div>

            <div class="flex justify-center mt-16 gap-2">
                <button class="w-12 h-12 flex items-center justify-center border border-gray-200 rounded-xl hover:bg-gray-50 disabled:opacity-30 transition-colors">
                    <i class="fa-solid fa-chevron-left text-xs"></i>
                </button>
                <button class="w-12 h-12 flex items-center justify-center bg-petpro-primary text-white rounded-xl font-bold shadow-sm">1</button>
                <button class="w-12 h-12 flex items-center justify-center border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">2</button>
                <button class="w-12 h-12 flex items-center justify-center border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </button>
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
                        <li><a href="/" class="hover:text-orange-600 transition-colors">Início</a></li>
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
                Desenvolvido por <span class="text-white font-bold hover:text-orange-500 transition-colors cursor-pointer">Flávio</span>
            </p>
        </div>
    </div>
</footer>

</body>
</html>