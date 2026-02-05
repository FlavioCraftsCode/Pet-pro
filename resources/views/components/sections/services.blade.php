<section id="servicos" 
         class="bg-orange-600 pb-12 md:pb-20 relative overflow-visible" 
         x-data="sliderHandler()">
    
    <div class="absolute top-0 left-0 w-full overflow-hidden line-height-0">
        <svg class="relative block w-full h-[50px] md:h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5,73.84-4.36,147.54,16.88,218.2,35.26,69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="#F9F5F0"></path>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 text-white pt-24 md:pt-32">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-8 md:mb-12 gap-6 text-center lg:text-left">
            <div>
                <span class="text-white/80 font-bold uppercase tracking-widest text-[10px] md:text-sm">Experiências PetPro</span>
                <h2 class="text-3xl md:text-5xl font-bold mt-2 drop-shadow-md leading-tight">Serviços Especializados</h2>
            </div>
            
            <div class="hidden sm:flex gap-4 self-center lg:self-end">
                <button @click="scrollTo('prev')" 
                        :disabled="atBeginning" 
                        aria-label="Anterior"
                        :class="atBeginning ? 'opacity-30 cursor-not-allowed' : 'hover:bg-white hover:text-orange-600 active:scale-90'" 
                        class="w-12 h-12 md:w-14 md:h-14 rounded-full border-2 border-white/30 flex items-center justify-center transition shadow-lg bg-orange-600 lg:bg-transparent text-white">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <button @click="scrollTo('next')" 
                        :disabled="atEnd" 
                        aria-label="Próximo"
                        :class="atEnd ? 'opacity-30 cursor-not-allowed' : 'hover:bg-white hover:text-orange-600 active:scale-90'" 
                        class="w-12 h-12 md:w-14 md:h-14 rounded-full border-2 border-white/30 flex items-center justify-center transition shadow-lg bg-orange-600 lg:bg-transparent text-white">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div x-ref="slider" 
             @scroll.debounce.50ms="checkScroll()" 
             class="flex gap-4 md:gap-8 overflow-x-auto snap-x snap-mandatory pb-8 scroll-smooth no-scrollbar select-none -mx-4 px-4 sm:mx-0 sm:px-0">
            
            <div class="snap-start shrink-0 w-[85%] sm:w-[45%] lg:w-[30%]">
                <x-service-card 
                    title="Banho & Tosa SPA" 
                    price="A partir de R$ 89"
                    desc="Estética pet com produtos orgânicos e massagem relaxante inclusa." 
                    image="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?q=80&w=800"
                    link="#agendar" />
            </div>

            <div class="snap-start shrink-0 w-[85%] sm:w-[45%] lg:w-[30%]">
                <x-service-card 
                    title="Daycare Divertido" 
                    price="Diárias de R$ 65"
                    desc="Socialização e atividades monitoradas em ambiente seguro e amplo." 
                    image="https://images.unsplash.com/photo-1548199973-03cce0bbc87b?q=80&w=800"
                    link="#saiba-mais" />
            </div>

            <div class="snap-start shrink-0 w-[85%] sm:w-[45%] lg:w-[30%]">
                <x-service-card 
                    title="Clínica & Check-up" 
                    price="Consulta R$ 120"
                    desc="Saúde preventiva e exames laboratoriais para seu melhor amigo." 
                    image="https://images.unsplash.com/photo-1628009368231-7bb7cfcb0def?q=80&w=800"
                    link="#agendar" />
            </div>

            <div class="snap-start shrink-0 w-[85%] sm:w-[45%] lg:w-[30%]">
                <x-service-card 
                    title="Treinamento" 
                    price="Planos Mensais"
                    desc="Adestramento comportamental focado em psicologia canina." 
                    image="https://images.unsplash.com/photo-1587300003388-59208cc962cb?q=80&w=800"
                    link="#contato" />
            </div>
        </div>

        <div class="flex justify-center gap-2 mt-4 sm:hidden">
             <div class="h-1.5 w-8 bg-white/40 rounded-full overflow-hidden">
                <div class="h-full bg-white transition-all duration-300" :style="`width: ${scrollPercent}%` "></div>
             </div>
        </div>
    </div>
</section>