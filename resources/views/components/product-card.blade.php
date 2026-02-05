@props(['product'])

@php
    $valorReal = is_numeric($product->price) && $product->price > 500 
                 ? $product->price / 100 
                 : $product->price;
    $precoClube = $valorReal * 0.9;
@endphp

<div class="group bg-white p-3 md:p-5 rounded-[2rem] border border-gray-100 hover:border-orange-200 hover:shadow-[0_20px_50px_rgba(255,107,0,0.08)] transition-all duration-500 flex flex-col h-full relative">
    
    
    <div class="absolute top-5 left-5 z-10 flex items-center gap-1 bg-white/90 backdrop-blur-sm px-2.5 py-1 rounded-full shadow-sm">
        <i class="fa-solid fa-star text-yellow-400 text-[10px]"></i>
        <span class="text-[11px] font-bold text-gray-700">4.8</span>
    </div>

    
    <div class="relative overflow-hidden rounded-[1.5rem] mb-4 aspect-square bg-[#FBFBFB]">
        <img src="{{ $product->image }}" alt="{{ $product->title }}" class="w-full h-full object-contain mix-blend-multiply group-hover:scale-110 transition-transform duration-700">
    </div>

    <div class="flex flex-col flex-1 px-1">
        <span class="text-[10px] font-bold text-orange-600 uppercase tracking-widest mb-1.5">
            {{ $product->category ?? 'Premium' }}
        </span>
        
        <h3 class="font-bold text-gray-800 text-sm md:text-base leading-tight mb-3 line-clamp-2 h-10">
            {{ $product->title }}
        </h3>

        <div class="mt-auto pt-4 border-t border-gray-100">
            <div class="flex flex-col">
                <span class="text-xl md:text-2xl font-black text-gray-900 leading-none">
                    <small class="text-xs font-bold mr-0.5">R$</small>{{ number_format($valorReal, 2, ',', '.') }}
                </span>
                <div class="mt-3 bg-orange-50 p-2 rounded-xl border border-orange-100/50">
                    <p class="text-[10px] text-gray-600 font-medium">
                        <span class="text-orange-600 font-extrabold text-xs">R$ {{ number_format($precoClube, 2, ',', '.') }}</span> no Clube
                    </p>
                </div>
            </div>
            
            <button 
                type="button"
                @click="
                    if (window.Alpine && $store.cart) {
                        const itemData = {
                            id: '{{ $product->id }}',
                            name: @js($product->title),
                            price: {{ (float)$valorReal }},
                            image: @js($product->image)
                        };
                        
                        $store.cart.addItem(itemData);
                        
                        $el.innerHTML = '<i class=\'fa-solid fa-check text-lg animate-bounce\'></i>';
                        $el.classList.add('bg-orange-600');
                        
                        setTimeout(() => {
                            window.location.href = '{{ route('cart') }}';
                        }, 400);
                    } else {
                        console.error('Erro: Alpine ou Cart Store não carregados!');
                    }
                "
                class="w-full mt-4 h-12 bg-gray-900 text-white rounded-2xl flex items-center justify-center gap-2 hover:bg-orange-600 transition-all font-bold text-xs uppercase tracking-widest active:scale-95"
            >
                <i class="fa-solid fa-cart-plus text-base"></i>
                <span>Comprar</span>
            </button>
        </div>
    </div>
</div>