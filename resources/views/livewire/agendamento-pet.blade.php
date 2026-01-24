<div class="bg-white p-8 rounded-[2.5rem] shadow-xl border border-gray-100 relative overflow-hidden">
    {{-- Efeito de brilho quando carrega --}}
    <div wire:loading.flex class="absolute inset-0 bg-white/50 backdrop-blur-[2px] z-10 items-center justify-center">
        <div class="flex flex-col items-center">
            <i class="fa-solid fa-circle-notch animate-spin text-orange-600 text-3xl"></i>
            <span class="text-xs font-bold text-gray-600 mt-2 uppercase tracking-widest">Processando...</span>
        </div>
    </div>

    @if($sucesso)
        <div x-data="{ show: true }" 
             x-show="show" 
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 scale-90"
             class="bg-green-50 border-2 border-green-200 p-6 rounded-3xl text-center">
            <div class="bg-green-500 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-green-200">
                <i class="fa-solid fa-check text-white text-xl"></i>
            </div>
            <h3 class="text-green-900 font-black text-xl mb-2">Solicitação Enviada!</h3>
            <p class="text-green-700 text-sm leading-relaxed">
                Recebemos o pedido para o <span class="font-bold">{{ $nome_pet }}</span>. <br>
                Fique atento ao seu e-mail, respondemos em até 15 min.
            </p>
            <button @click="show = false; $wire.set('sucesso', false)" class="mt-4 text-xs font-bold text-green-800 underline underline-offset-4">
                Nova solicitação
            </button>
        </div>
    @else
        <form wire:submit.prevent="enviar" class="space-y-5">
            <div class="text-center mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Agende uma Experiência</h3>
                <p class="text-gray-500 text-sm">Preencha os dados abaixo e entraremos em contato.</p>
            </div>

            <div class="space-y-4">
                {{-- Nome do Pet --}}
                <div>
                    <x-text-input wire:model="nome_pet" type="text" placeholder="Nome do Pet" class="w-full" />
                    @error('nome_pet') <span class="text-red-500 text-xs mt-1 ml-2 font-medium">{{ $message }}</span> @enderror
                </div>

                {{-- E-mail --}}
                <div>
                    <x-text-input wire:model="email" type="email" placeholder="Seu melhor e-mail" class="w-full" />
                    @error('email') <span class="text-red-500 text-xs mt-1 ml-2 font-medium">{{ $message }}</span> @enderror
                </div>

                {{-- Serviço --}}
                <div class="relative">
                    <select wire:model="servico" 
                            class="w-full bg-[#F9F5F0] border-none rounded-2xl py-4 px-5 text-gray-700 focus:ring-2 focus:ring-orange-600 transition-all appearance-none cursor-pointer">
                        <option value="">Selecione o Serviço</option>
                        <option value="banho">Banho e Tosa SPA</option>
                        <option value="daycare">Daycare Divertido</option>
                        <option value="clinica">Clínica & Check-up</option>
                    </select>
                    <div class="absolute right-5 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                    @error('servico') <span class="text-red-500 text-xs mt-1 ml-2 font-medium">{{ $message }}</span> @enderror
                </div>
            </div>

            <button type="submit" 
                    wire:loading.attr="disabled"
                    class="w-full bg-orange-600 text-white py-4 rounded-2xl font-bold hover:bg-orange-700 transition-all duration-300 shadow-xl shadow-orange-200 active:scale-95 disabled:opacity-50 disabled:scale-100">
                <span wire:loading.remove>Enviar Solicitação</span>
                <span wire:loading>Enviando...</span>
            </button>
        </form>
    @endif
</div>