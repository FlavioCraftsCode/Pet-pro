@props(['product'])

<div class="bg-white p-4 rounded-[2.5rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 group">
    
    <div class="relative overflow-hidden rounded-[2rem] mb-6 aspect-square">
        <img src="{{ $product->image }}" alt="{{ $product->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
        
        <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-1 rounded-full text-[10px] font-bold uppercase tracking-tighter text-gray-700">
            {{ $product->category }}
        </span>
    </div>

    <div class="px-2">
        <h3 class="font-bold text-gray-900 text-lg mb-1">{{ $product->title }}</h3>
        
        <div class="flex items-center justify-between mt-4">
            <span class="text-2xl font-black text-gray-900">
                
                @php
                    $valorReal = is_numeric($product->price) && $product->price > 500 
                                 ? $product->price / 100 
                                 : $product->price;
                @endphp
                <small class="text-sm font-normal mr-1">R$</small>{{ number_format($valorReal, 2, ',', '.') }}
            </span>
            
            <button 
                @click="$store.cart.add({ 
                    id: {{ $product->id }},
                    title: '{{ addslashes($product->title) }}', 
                    price: {{ $valorReal }}, 
                    image: '{{ $product->image }}' 
                })"
                class="w-12 h-12 bg-gray-900 text-white rounded-2xl flex items-center justify-center hover:bg-orange-600 transition-all shadow-lg active:scale-90"
            >
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>
</div>