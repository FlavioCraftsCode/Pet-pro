@php
    if (!isset($produtos)) {
        $produtos = \App\Models\Product::take(8)->get();
    }
@endphp


<section id="loja" class="max-w-7xl mx-auto px-4 sm:px-6 py-12 md:py-20" x-data="{}">
    
    <div class="text-center mb-12 md:mb-16">
        <h2 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight">
            Recomendações <span class="text-orange-600">PetPro</span>
        </h2>
        <div class="h-1.5 w-24 bg-orange-600 mx-auto mt-4 rounded-full"></div>
        <p class="text-gray-500 mt-4 text-sm md:text-base font-medium">
            Produtos selecionados com carinho para o seu pet
        </p>
    </div>

    
    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-8 justify-center">
        @forelse($produtos as $prod)
            <div class="flex justify-center h-full">
                <x-product-card :product="$prod" />
            </div>
        @empty
            <div class="col-span-full py-20 text-center text-gray-400">
                <p>Nenhum produto encontrado no momento.</p>
            </div>
        @endforelse
    </div>

</section>