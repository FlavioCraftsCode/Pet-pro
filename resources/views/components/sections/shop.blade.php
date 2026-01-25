@php
    $todosProdutos = \App\Models\Product::all();
    $produtos = $todosProdutos->take(4);
    $produtosExtras = $todosProdutos->slice(4);
@endphp

<section id="loja" class="max-w-7xl mx-auto px-4 sm:px-6 py-12 md:py-24" x-data="{ showMore: false }">
    <div class="text-center mb-10 md:mb-16">
        <span class="text-orange-600 font-bold uppercase tracking-widest text-xs">Coleção Exclusiva</span>
        <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 mt-2">Loja Premium</h2>
        <div class="h-1.5 w-16 md:w-20 bg-orange-600 mx-auto mt-4 rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
        @foreach($produtos as $prod)
            <div class="animate__animated animate__fadeInUp">
                <x-product-card :product="$prod" />
            </div>
        @endforeach
    </div>

    @if($produtosExtras->count() > 0)
        <div x-show="showMore" 
             x-collapse 
             x-cloak 
             class="mt-6 md:mt-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                @foreach($produtosExtras as $prod)
                    <x-product-card :product="$prod" />
                @endforeach
            </div>
        </div>

        <div class="mt-12 md:mt-20 text-center px-4">
            <button @click="showMore = !showMore" 
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-3 bg-white border-2 border-gray-900 px-10 py-4 rounded-2xl md:rounded-full font-extrabold hover:bg-gray-900 hover:text-white transition-all duration-300 shadow-xl active:scale-95 group">
                
                <span x-text="showMore ? 'Mostrar Menos' : 'Ver Coleção Completa'"></span>
                
                <i class="fa-solid fa-chevron-down transition-transform duration-500 group-hover:translate-y-1" 
                   :class="showMore ? 'rotate-180 -translate-y-1' : ''"></i>
            </button>
        </div>
    @endif
</section>

<div class="relative w-full overflow-hidden leading-[0]">
    <x-divider-wave class="rotate-180 w-[200%] md:w-full h-12 md:h-24" />
</div>