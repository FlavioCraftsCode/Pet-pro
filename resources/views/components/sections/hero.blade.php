<main class="max-w-7xl mx-auto px-4 sm:px-6 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center mt-6 md:mt-10 lg:mt-16">
    
    <div class="animate__animated animate__fadeInLeft text-center lg:text-left order-2 lg:order-1">
        <span class="inline-block bg-white px-4 py-1.5 rounded-full text-xs md:text-sm font-semibold text-gray-500 shadow-sm border border-gray-100">
            🐶 O Melhor Cuidado para seu Pet
        </span>
        
        <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-gray-900 mt-6 leading-[1.1] tracking-tight">
            Amor e <span class="text-orange-600">Cuidado</span> <br class="hidden lg:block"> em Cada Detalhe.
        </h1>
        
        <p class="text-gray-600 mt-6 text-base md:text-lg max-w-xl mx-auto lg:mx-0 leading-relaxed">
            <span class="font-semibold text-gray-800">Banho & Tosa Premium, Daycare, Clínica Veterinária e Produtos Exclusivos</span> – Tudo para o seu melhor amigo se sentir em casa.
        </p>

        <div class="mt-8 md:mt-10 flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
            <x-primary-button 
                href="#agendamento" 
                class="w-full sm:w-auto px-8 py-4 shadow-lg shadow-orange-200 text-center justify-center text-lg"
            >
                Agendar Agora
            </x-primary-button>
            
            <a href="#servicos" class="flex items-center justify-center px-8 py-4 text-gray-700 font-semibold hover:text-orange-600 transition-colors">
                Conhecer Serviços
            </a>
        </div>
    </div>

    <div class="relative animate__animated animate__fadeInRight order-1 lg:order-2 px-4 md:px-0">
        <div class="bg-orange-200 rounded-full w-64 h-64 md:w-[450px] md:h-[450px] absolute -z-10 top-0 left-0 md:-top-10 md:-left-10 opacity-40 blur-3xl"></div>
        
        <img src="https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&q=80&w=800" 
             alt="Cachorro Pug Feliz" 
             class="rounded-[2rem] md:rounded-[3rem] shadow-2xl w-full max-w-lg mx-auto lg:max-w-none transform rotate-0 lg:-rotate-2 hover:rotate-0 transition duration-500 object-cover aspect-[4/5] md:aspect-[4/3] lg:aspect-auto">
        
        <div class="hidden md:flex absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl items-center gap-3 animate__animated animate__bounceIn animate__delay-1s">
            <div class="bg-green-100 p-2 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-bold text-gray-900">+500 Pets Felizes</p>
                <p class="text-xs text-gray-500">Atendidos com excelência</p>
            </div>
        </div>
    </div>
</main>