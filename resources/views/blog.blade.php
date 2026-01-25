<x-layout>
    <x-slot:title>Blog PetPro - Dicas e Notícias</x-slot:title>

    <x-header />

    
    <div class="bg-orange-600 pt-12 md:pt-20 pb-8 md:pb-12">
        <div class="max-w-7xl mx-auto px-4 md:px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 md:mb-6 leading-tight">
                Mundo <span class="text-gray-900">Pet</span>
            </h1>
            <p class="text-white/90 text-lg md:text-xl max-w-2xl mx-auto italic leading-relaxed">
                Sua dose diária de amor, cuidado e informação para o seu melhor amigo.
            </p>
        </div>
    </div>

    
    <div class="w-full leading-[0] overflow-hidden">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-[200%] md:w-full h-12 md:h-20 fill-orange-600">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
    </div>

    
    <main class="max-w-7xl mx-auto px-4 md:px-6 py-12 md:py-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
            
            
            <article class="group cursor-pointer flex flex-col">
                <div class="relative h-60 md:h-72 overflow-hidden rounded-[2rem] md:rounded-[3rem] mb-6 shadow-xl group-hover:shadow-2xl transition-all duration-500">
                    <img src="https://images.unsplash.com/photo-1544568100-847a948585b9?q=80&w=800" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute top-4 left-4 md:top-6 md:left-6 bg-white px-4 py-1.5 rounded-full text-[10px] md:text-xs font-black text-orange-600 uppercase shadow-md tracking-widest">Saúde</div>
                </div>
                <div class="flex-1">
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 md:mb-4 group-hover:text-orange-600 transition-colors leading-tight">Alimentação no Verão: O que evitar?</h2>
                    <p class="text-gray-500 text-sm md:text-base leading-relaxed mb-6 line-clamp-3">Mantenha seu pet hidratado e conheça as frutas que podem ser tóxicas durante o calor...</p>
                </div>
                <span class="text-orange-600 font-black text-sm flex items-center gap-2 group-hover:gap-4 transition-all uppercase tracking-tighter">
                    Ler mais <i class="fa-solid fa-arrow-right"></i>
                </span>
            </article>

            
            <article class="group cursor-pointer flex flex-col">
                <div class="relative h-60 md:h-72 overflow-hidden rounded-[2rem] md:rounded-[3rem] mb-6 shadow-xl group-hover:shadow-2xl transition-all duration-500">
                    <img src="/img/blog/segredo.png" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute top-4 left-4 md:top-6 md:left-6 bg-white px-4 py-1.5 rounded-full text-[10px] md:text-xs font-black text-orange-600 uppercase shadow-md tracking-widest">Comportamento</div>
                </div>
                <div class="flex-1">
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 md:mb-4 group-hover:text-orange-600 transition-colors leading-tight">O segredo dos cães felizes</h2>
                    <p class="text-gray-500 text-sm md:text-base leading-relaxed mb-6 line-clamp-3">Dicas de adestramento positivo para fortalecer o vínculo entre você e seu cachorro...</p>
                </div>
                <span class="text-orange-600 font-black text-sm flex items-center gap-2 group-hover:gap-4 transition-all uppercase tracking-tighter">
                    Ler mais <i class="fa-solid fa-arrow-right"></i>
                </span>
            </article>

            
            <article class="group cursor-pointer flex flex-col">
                <div class="relative h-60 md:h-72 overflow-hidden rounded-[2rem] md:rounded-[3rem] mb-6 shadow-xl group-hover:shadow-2xl transition-all duration-500">
                    <img src="/img/blog/viajando.png" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute top-4 left-4 md:top-6 md:left-6 bg-white px-4 py-1.5 rounded-full text-[10px] md:text-xs font-black text-orange-600 uppercase shadow-md tracking-widest">Estilo de Vida</div>
                </div>
                <div class="flex-1">
                    <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 md:mb-4 group-hover:text-orange-600 transition-colors leading-tight">Viajando com seu melhor amigo</h2>
                    <p class="text-gray-500 text-sm md:text-base leading-relaxed mb-6 line-clamp-3">Tudo o que você precisa levar na mala para garantir uma viagem segura e divertida...</p>
                </div>
                <span class="text-orange-600 font-black text-sm flex items-center gap-2 group-hover:gap-4 transition-all uppercase tracking-tighter">
                    Ler mais <i class="fa-solid fa-arrow-right"></i>
                </span>
            </article>

        </div>
    </main>

    <footer class="bg-white border-t border-gray-100 py-12 text-center text-gray-400 px-6">
        <p class="text-sm">&copy; 2026 PetPro - Especialistas em Felicidade Pet.</p>
    </footer>
</x-layout>