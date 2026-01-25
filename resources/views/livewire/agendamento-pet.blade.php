<div class="bg-white p-6 md:p-8 rounded-[2rem] md:rounded-[2.5rem] shadow-xl border border-gray-100 relative overflow-hidden transition-all duration-500">
    
    
    <div wire:loading.flex class="absolute inset-0 bg-white/60 backdrop-blur-[3px] z-20 items-center justify-center">
        <div class="flex flex-col items-center animate__animated animate__fadeIn">
            <div class="relative flex items-center justify-center">
                <i class="fa-solid fa-circle-notch animate-spin text-orange-600 text-4xl"></i>
                <i class="fa-solid fa-paw text-orange-600/20 text-sm absolute"></i>
            </div>
            <span class="text-[10px] md:text-xs font-black text-gray-800 mt-4 uppercase tracking-[0.2em]">Processando...</span>
        </div>
    </div>

    @if($sucesso)
        
        <div x-data="{ show: true }" 
             x-show="show" 
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 scale-95"
             class="bg-green-50 border-2 border-green-100 p-6 md:p-8 rounded-[2rem] text-center my-4">
            <div class="bg-green-500 w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-5 shadow-lg shadow-green-200 animate__animated animate__bounceIn">
                <i class="fa-solid fa-check text-white text-2xl"></i>
            </div>
            <h3 class="text-green-900 font-black text-xl md:text-2xl mb-3 tracking-tight">Solicitação Enviada!</h3>
            <p class="text-green-700 text-sm md:text-base leading-relaxed">
                Recebemos o pedido para o <span class="font-bold text-green-900">{{ $nome_pet }}</span>. <br class="hidden sm:block">
                Fique atento ao seu e-mail, respondemos em até 15 min.
            </p>
            <button @click="show = false; $wire.set('sucesso', false)" class="mt-6 text-xs font-bold text-green-800 uppercase tracking-widest hover:underline underline-offset-8 transition-all">
                Nova solicitação
            </button>
        </div>
    @else
        <form wire:submit.prevent="enviar" class="space-y-5 md:space-y-6">
            <div class="text-center mb-6 md:mb-8">
                <h3 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight">Agende uma Experiência</h3>
                <p class="text-gray-500 text-sm mt-2">Entraremos em contato rapidamente.</p>
            </div>

            <div class="space-y-4 md:space-y-5">
                
                
                <div class="group">
                    <div class="relative">
                        <x-text-input wire:model="nome_pet" type="text" placeholder="Nome do Pet" 
                                     class="w-full p-4 md:p-5 rounded-2xl bg-[#F9F5F0] border-transparent focus:bg-white transition-all shadow-sm" />
                    </div>
                    @error('nome_pet') <span class="text-red-500 text-[10px] md:text-xs mt-1.5 ml-2 font-bold flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span> @enderror
                </div>

                
                <div>
                    <x-text-input wire:model="email" type="email" placeholder="Seu melhor e-mail" 
                                 class="w-full p-4 md:p-5 rounded-2xl bg-[#F9F5F0] border-transparent focus:bg-white transition-all shadow-sm" />
                    @error('email') <span class="text-red-500 text-[10px] md:text-xs mt-1.5 ml-2 font-bold flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span> @enderror
                </div>

                
                <div class="relative group">
                    <select wire:model="servico" 
                            class="w-full bg-[#F9F5F0] border-none rounded-2xl py-4 md:py-5 px-5 text-gray-700 focus:ring-2 focus:ring-orange-600 transition-all appearance-none cursor-pointer shadow-sm text-sm md:text-base">
                        <option value="">Selecione o Serviço</option>
                        <option value="banho">Banho e Tosa SPA</option>
                        <option value="daycare">Daycare Divertido</option>
                        <option value="clinica">Clínica & Check-up</option>
                    </select>
                    <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 group-focus-within:text-orange-600 transition-colors">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                    @error('servico') <span class="text-red-500 text-[10px] md:text-xs mt-1.5 ml-2 font-bold flex items-center gap-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</span> @enderror
                </div>
            </div>

            
            <button type="submit" 
                    wire:loading.attr="disabled"
                    class="w-full bg-orange-600 text-white py-4 md:py-5 rounded-2xl font-black text-sm md:text-base uppercase tracking-widest hover:bg-orange-700 transition-all duration-300 shadow-xl shadow-orange-600/20 active:scale-95 disabled:opacity-50 disabled:scale-100 flex items-center justify-center gap-3">
                
                <span wire:loading.remove class="flex items-center gap-2">
                    Enviar Solicitação <i class="fa-solid fa-paper-plane text-xs"></i>
                </span>
                
                <span wire:loading class="flex items-center gap-2">
                    Enviando... <i class="fa-solid fa-circle-notch animate-spin text-xs"></i>
                </span>
            </button>
        </form>
    @endif
</div>