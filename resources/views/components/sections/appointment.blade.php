<section id="agendamento" class="max-w-5xl mx-auto px-6 py-24 bg-white">
    <div class="bg-gray-900 rounded-[4rem] p-12 text-white grid md:grid-cols-2 gap-12 items-center border border-white/10 shadow-2xl relative overflow-hidden">
        
        <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-64 h-64 bg-orange-600/10 rounded-full blur-3xl"></div>

        <div>
            <span class="text-orange-500 font-semibold tracking-widest uppercase text-sm">Contato Direto</span>
            <h2 class="text-4xl font-bold mb-6 mt-2">Agende uma Visita</h2>
            <p class="text-gray-400 leading-relaxed">
                Nossa equipe de especialistas entrará em contato em menos de 15 minutos para confirmar o melhor horário.
            </p>
            
            <div class="mt-10 space-y-6">
                <div class="flex items-center gap-5 group">
                    <div class="w-14 h-14 bg-orange-600/10 border border-orange-600/20 rounded-2xl flex items-center justify-center group-hover:bg-orange-600 group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-phone text-xl text-orange-600 group-hover:text-white"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-bold tracking-wider">Ligue para nós</p>
                        <span class="text-xl font-bold">(11) 99999-9999</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white/5 p-8 rounded-[2.5rem] border border-white/5 backdrop-blur-sm">
            {{-- Mensagem de Sucesso --}}
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-500/20 border border-green-500 text-green-500 rounded-2xl text-center font-bold">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('appointments.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="space-y-1">
                    <input type="text" name="pet_name" placeholder="Nome do Pet" required
                           class="w-full p-4 rounded-2xl bg-white/10 border border-white/10 focus:border-orange-600 focus:ring-1 focus:ring-orange-600 outline-none text-white transition-all">
                </div>

                <div class="space-y-1">
                    <input type="email" name="email" placeholder="Seu E-mail" required
                           class="w-full p-4 rounded-2xl bg-white/10 border border-white/10 focus:border-orange-600 focus:ring-1 focus:ring-orange-600 outline-none text-white transition-all">
                </div>

                <div class="space-y-1 relative">
                    <select name="service" required
                            class="w-full p-4 rounded-2xl bg-white/10 border border-white/10 focus:border-orange-600 focus:ring-1 focus:ring-orange-600 outline-none text-gray-400 appearance-none cursor-pointer transition-all">
                        <option value="" disabled selected class="bg-gray-900">Selecione o Serviço</option>
                        <option value="Banho e Tosa" class="bg-gray-900">Banho e Tosa</option>
                        <option value="Daycare" class="bg-gray-900">Daycare</option>
                        <option value="Veterinário" class="bg-gray-900">Veterinário</option>
                    </select>
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-500">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                </div>

                <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-5 rounded-2xl flex items-center justify-center gap-3 transition-all duration-300 shadow-lg shadow-orange-600/20">
                    <span>Enviar Solicitação</span>
                    <i class="fa-solid fa-paper-plane text-sm"></i>
                </button>
            </form>
        </div>
    </div>
</section>