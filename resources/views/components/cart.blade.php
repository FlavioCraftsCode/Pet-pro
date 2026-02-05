<x-layout>
    <x-slot:title>Meu Carrinho - PetPro</x-slot:title>

    <x-header />

    <div class="min-h-screen bg-[#F9F5F0] py-12" x-data>
        <div class="max-w-7xl mx-auto px-4">
            
            <div class="flex items-center gap-4 mb-10">
                <div class="bg-orange-600 p-3 rounded-2xl shadow-lg shadow-orange-200">
                    <i class="fa-solid fa-basket-shopping text-white text-2xl"></i>
                </div>
                <h1 class="text-4xl font-black text-gray-900 tracking-tight">Cesta de Compras</h1>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2 space-y-6">
                    <template x-for="item in $store.cart.items" :key="item.id">
    <div class="bg-white p-5 md:p-6 rounded-[2.5rem] shadow-sm border border-gray-100 flex flex-col sm:flex-row items-center gap-4 sm:gap-6">
        
        <div class="flex items-center gap-4 w-full sm:w-auto flex-1">
            <img :src="item.image" class="w-20 h-20 sm:w-24 sm:h-24 object-cover rounded-3xl bg-gray-50 shrink-0">
            
            <div class="flex-1">
                <h3 class="font-bold text-lg sm:text-xl text-gray-900 leading-tight" x-text="item.name"></h3>
                <p class="text-orange-600 font-black mt-1">R$ <span x-text="parseFloat(item.price).toFixed(2)"></span></p>
            </div>
        </div>

        <div class="flex items-center justify-between sm:justify-end w-full sm:w-auto gap-4 pt-4 sm:pt-0 border-t sm:border-0 border-gray-50">
            
            <div class="flex items-center bg-gray-50 p-1 rounded-2xl border">
                <button @click="$store.cart.updateQuantity(item.id, item.quantity - 1)" class="w-8 h-8 bg-white rounded-xl shadow-sm hover:bg-orange-600 hover:text-white transition-all text-xs">
                    <i class="fa-solid fa-minus"></i>
                </button>
                <span class="px-4 font-bold text-sm" x-text="item.quantity"></span>
                <button @click="$store.cart.updateQuantity(item.id, item.quantity + 1)" class="w-8 h-8 bg-white rounded-xl shadow-sm hover:bg-orange-600 hover:text-white transition-all text-xs">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>

            <button @click="$store.cart.removeItem(item.id)" class="text-gray-300 hover:text-red-500 p-2 transition-colors">
                <i class="fa-solid fa-trash-can text-lg"></i>
            </button>
        </div>
    </div>
</template>
                    
                    <div x-show="$store.cart.items.length === 0" class="text-center py-20 bg-white rounded-[3rem] border-4 border-dashed border-gray-50">
                        <p class="text-gray-400 text-xl font-medium mb-6">Sua cesta está vazia</p>
                        <a href="{{ route('home') }}" class="inline-block bg-gray-900 text-white px-8 py-4 rounded-full font-bold hover:bg-orange-600 transition-all">
                            Explorar Produtos
                        </a>
                    </div>
                </div>

                <div class="bg-gray-900 p-8 rounded-[3rem] shadow-2xl text-white h-fit sticky top-24">
                    <h2 class="text-2xl font-bold mb-8">Resumo</h2>
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between opacity-70">
                            <span>Subtotal</span>
                            <span class="font-bold" x-text="'R$ ' + $store.cart.totalPrice.toFixed(2)"></span>
                        </div>
                        <div class="flex justify-between text-orange-400">
                            <span class="font-bold">Entrega PetPro</span>
                            <span class="font-black text-xs uppercase bg-orange-400/10 px-2 py-1 rounded">Grátis</span>
                        </div>
                    </div>
                    <div class="border-t border-white/10 pt-6">
                        <div class="flex justify-between items-end mb-8">
                            <span class="text-4xl font-black" x-text="'R$ ' + $store.cart.totalPrice.toFixed(2)"></span>
                        </div>
                        <button class="w-full bg-orange-600 py-5 rounded-2xl font-black text-lg hover:bg-white hover:text-gray-900 transition-all active:scale-95 shadow-lg">
                            Finalizar Pedido
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</x-layout>