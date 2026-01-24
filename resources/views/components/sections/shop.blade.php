@php
    /* | No Upwork, isso mostra que você domina o Eloquent ORM. 
    | Em vez de arrays manuais, buscamos todos os produtos do banco.
    */
    $todosProdutos = \App\Models\Product::all();

    // Dividimos a coleção: os 4 primeiros no grid principal, o restante no "Ver Mais"
    $produtos = $todosProdutos->take(4);
    $produtosExtras = $todosProdutos->slice(4);
@endphp

<section id="loja" class="max-w-7xl mx-auto px-6 py-24" x-data="{ showMore: false }">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-900">Loja Premium</h2>
        <div class="h-1.5 w-20 bg-orange-600 mx-auto mt-4 rounded-full"></div>
    </div>

    {{-- Grid Principal --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($produtos as $prod)
            {{-- Usamos o objeto real vindo do banco de dados --}}
            <x-product-card :product="$prod" />
        @endforeach
    </div>

    {{-- Grid Extra com Animação --}}
    @if($produtosExtras->count() > 0)
        <div x-show="showMore" x-collapse x-cloak>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-8">
                @foreach($produtosExtras as $prod)
                    <x-product-card :product="$prod" />
                @endforeach
            </div>
        </div>

        <div class="mt-16 text-center">
            <button @click="showMore = !showMore" 
                    class="inline-flex items-center gap-3 bg-white border-2 border-gray-900 px-10 py-4 rounded-full font-bold hover:bg-gray-900 hover:text-white transition-all duration-300 shadow-xl active:scale-95">
                <span x-text="showMore ? 'Mostrar Menos' : 'Ver Mais Produtos'"></span>
                <i class="fa-solid fa-chevron-down transition-transform duration-500" :class="showMore ? 'rotate-180' : ''"></i>
            </button>
        </div>
    @endif
</section>

{{-- Onda Laranja do PetPro --}}
<x-divider-wave class="rotate-180" />