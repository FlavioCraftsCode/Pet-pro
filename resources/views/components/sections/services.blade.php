<section id="servicos" 
         class="bg-orange-600 py-12 md:py-20 overflow-hidden" 
         x-data="sliderHandler()">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 text-white">
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
                        class="w-12 h-12 md:w-14 md:h-14 rounded-full border-2 border-white/30 flex items-center justify-center transition shadow-lg bg-orange-600 lg:bg-transparent">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <button @click="scrollTo('next')" 
                        :disabled="atEnd" 
                        aria-label="Próximo"
                        :class="atEnd ? 'opacity-30 cursor-not-allowed' : 'hover:bg-white hover:text-orange-600 active:scale-90'" 
                        class="w-12 h-12 md:w-14 md:h-14 rounded-full border-2 border-white/30 flex items-center justify-center transition shadow-lg bg-orange-600 lg:bg-transparent">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div x-ref="slider" 
             @scroll.debounce.50ms="checkScroll()" 
             class="flex gap-4 md:gap-8 overflow-x-auto snap-x snap-mandatory pb-8 scroll-smooth no-scrollbar select-none -mx-4 px-4 sm:mx-0 sm:px-0">
            
            <div class="snap-start shrink-0 w-[85%] sm:w-[45%] lg:w-[30%]">
                <x-service-card title="Banho & Tosa SPA" desc="Produtos orgânicos e especializados." image="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?q=80&w=800" />
            </div>

            <div class="snap-start shrink-0 w-[85%] sm:w-[45%] lg:w-[30%]">
                <x-service-card title="Daycare Divertido" desc="Socialização e atividades monitoradas." image="https://images.unsplash.com/photo-1548199973-03cce0bbc87b?q=80&w=800" />
            </div>

            <div class="snap-start shrink-0 w-[85%] sm:w-[45%] lg:w-[30%]">
                <x-service-card title="Clínica & Check-up" desc="Saúde preventiva para seu melhor amigo." image="https://images.unsplash.com/photo-1628009368231-7bb7cfcb0def?q=80&w=800" />
            </div>

            <div class="snap-start shrink-0 w-[85%] sm:w-[45%] lg:w-[30%]">
                <x-service-card title="Treinamento" desc="Adestramento focado em psicologia canina." image="https://images.unsplash.com/photo-1587300003388-59208cc962cb?q=80&w=800" />
            </div>

            <div class="snap-start shrink-0 w-[85%] sm:w-[45%] lg:w-[30%]">
                <x-service-card title="Spa Felino" desc="Ambiente exclusivo e calmo para gatos." image="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?q=80&w=800" />
            </div>
        </div>

        <div class="flex justify-center gap-2 mt-4 sm:hidden">
             <div class="h-1.5 w-8 bg-white/40 rounded-full overflow-hidden">
                <div class="h-full bg-white transition-all duration-300" :style="`width: ${scrollPercent}%` "></div>
             </div>
        </div>
    </div>
</section>