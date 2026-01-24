@props(['title', 'desc', 'image'])

<div {{ $attributes->merge(['class' => 'snap-start shrink-0 w-[85vw] md:w-[400px] group cursor-pointer bg-white rounded-[3.5rem] overflow-hidden shadow-2xl transition-all duration-500 hover:-translate-y-2']) }}>
    <div class="overflow-hidden h-64">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-1000">
    </div>
    <div class="p-8 text-gray-900">
        <h3 class="text-2xl font-bold mb-3 group-hover:text-orange-600 transition">{{ $title }}</h3>
        <p class="text-gray-500 leading-relaxed">{{ $desc }}</p>
        <div class="mt-6 flex items-center text-orange-600 font-bold text-sm uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-opacity">
            Saber Mais <i class="fa-solid fa-arrow-right ml-2"></i>
        </div>
    </div>
</div>