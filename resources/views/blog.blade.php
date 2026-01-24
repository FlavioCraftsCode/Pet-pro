<x-layout>
    <x-slot:title>Blog PetPro - Dicas e Notícias</x-slot:title>

    <x-header />

    <div class="bg-orange-600 pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6">Mundo <span class="text-gray-900">Pet</span></h1>
            <p class="text-white/90 text-xl max-w-2xl mx-auto italic">
                Sua dose diária de amor, cuidado e informação para o seu melhor amigo.
            </p>
        </div>
    </div>

    <div class="w-full leading-[0]">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-20 fill-orange-600">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
    </div>

    <main class="max-w-7xl mx-auto px-6 py-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            
            {{-- Post 1: Alimentação (Ainda com Unsplash ou use a de Mix Frutas se quiser) --}}
            <article class="group cursor-pointer">
                <div class="relative h-72 overflow-hidden rounded-[3rem] mb-6 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1544568100-847a948585b9?q=80&w=800" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute top-6 left-6 bg-white px-4 py-1 rounded-full text-xs font-bold text-orange-600 uppercase shadow-md">Saúde</div>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-orange-600 transition">Alimentação no Verão: O que evitar?</h2>
                <p class="text-gray-500 leading-relaxed mb-6">Mantenha seu pet hidratado e conheça as frutas que podem ser tóxicas durante o calor...</p>
                <span class="text-orange-600 font-bold flex items-center gap-2">Ler mais <i class="fa-solid fa-arrow-right"></i></span>
            </article>

            {{-- Post 2: O Segredo dos Cães Felizes --}}
            <article class="group cursor-pointer">
                <div class="relative h-72 overflow-hidden rounded-[3rem] mb-6 shadow-2xl">
                    <img src="/img/blog/segredo.png" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute top-6 left-6 bg-white px-4 py-1 rounded-full text-xs font-bold text-orange-600 uppercase shadow-md">Comportamento</div>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-orange-600 transition">O segredo dos cães felizes</h2>
                <p class="text-gray-500 leading-relaxed mb-6">Dicas de adestramento positivo para fortalecer o vínculo entre você e seu cachorro...</p>
                <span class="text-orange-600 font-bold flex items-center gap-2">Ler mais <i class="fa-solid fa-arrow-right"></i></span>
            </article>

            {{-- Post 3: Viajando com seu Melhor Amigo --}}
            <article class="group cursor-pointer">
                <div class="relative h-72 overflow-hidden rounded-[3rem] mb-6 shadow-2xl">
                    <img src="/img/blog/viajando.png" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute top-6 left-6 bg-white px-4 py-1 rounded-full text-xs font-bold text-orange-600 uppercase shadow-md">Estilo de Vida</div>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-orange-600 transition">Viajando com seu melhor amigo</h2>
                <p class="text-gray-500 leading-relaxed mb-6">Tudo o que você precisa levar na mala para garantir uma viagem segura e divertida...</p>
                <span class="text-orange-600 font-bold flex items-center gap-2">Ler mais <i class="fa-solid fa-arrow-right"></i></span>
            </article>

        </div>
    </main>

    <footer class="bg-white border-t border-gray-100 py-12 text-center text-gray-400">
        <p>&copy; 2026 PetPro - Especialistas em Felicidade Pet.</p>
    </footer>
</x-layout>