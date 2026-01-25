<section id="agendamento" class="max-w-7xl mx-auto px-4 sm:px-6 py-12 md:py-24 bg-white">
    <div class="bg-gray-900 rounded-[2.5rem] md:rounded-[4rem] p-6 sm:p-10 md:p-16 text-white grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center border border-white/10 shadow-2xl relative overflow-hidden">
        
        <div class="hidden md:block absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-64 h-64 bg-orange-600/10 rounded-full blur-3xl"></div>

        <div class="text-center lg:text-left">
            <span class="text-orange-500 font-semibold tracking-widest uppercase text-xs md:text-sm">Contato Direto</span>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 md:mb-6 mt-2 leading-tight">
                Agende uma <span class="text-orange-500">Visita</span>
            </h2>
            <p class="text-gray-400 leading-relaxed text-sm md:text-base max-w-md mx-auto lg:mx-0">
                Nossa equipe de especialistas entrará em contato em menos de 15 minutos para confirmar o melhor horário.
            </p>
            
            <div class="mt-8 md:mt-10 flex justify-center lg:justify-start">
                <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-5 group">
                    <div class="w-14 h-14 bg-orange-600/10 border border-orange-600/20 rounded-2xl flex items-center justify-center group-hover:bg-orange-600 group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-phone text-xl text-orange-600 group-hover:text-white"></i>
                    </div>
                    <div class="text-center sm:text-left">
                        <p class="text-[10px] text-gray-500 uppercase font-bold tracking-wider">Ligue para nós</p>
                        <span class="text-lg md:text-xl font-bold">(11) 99999-9999</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white/5 p-6 md:p-8 rounded-[2rem] border border-white/10 backdrop-blur-sm shadow-inner">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 text-green-400 rounded-2xl text-center text-sm font-bold">
                    <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('appointments.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <input type="text" name="pet_name" placeholder="Nome do Pet" required
                           class="w-full p-4 rounded-xl md:rounded-2xl bg-white/10 border border-white/10 focus:border-orange-600 focus:ring-1 focus:ring-orange-600 outline-none text-white transition-all placeholder:text-gray-500 text-sm md:text-base">
                </div>

                <div>
                    <input type="email" name="email" placeholder="Seu E-mail" required
                           class="w-full p-4 rounded-xl md:rounded-2xl bg-white/10 border border-white/10 focus:border-orange-600 focus:ring-1 focus:ring-orange-600 outline-none text-white transition-all placeholder:text-gray-500 text-sm md:text-base">
                </div>

                <div class="relative">
                    <select name="service" required
                            class="w-full p-4 rounded-xl md:rounded-2xl bg-white/10 border border-white/10 focus:border-orange-600 focus:ring-1 focus:ring-orange-600 outline-none text-gray-400 appearance-none cursor-pointer transition-all text-sm md:text-base">
                        <option value="" disabled selected class="bg-gray-900">Selecione o Serviço</option>
                        <option value="Banho e Tosa" class="bg-gray-900">Banho e Tosa</option>
                        <option value="Daycare" class="bg-gray-900">Daycare</option>
                        <option value="Veterinário" class="bg-gray-900">Veterinário</option>
                    </select>
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-500">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                </div>

                <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 active:scale-[0.98] text-white font-bold py-4 md:py-5 rounded-xl md:rounded-2xl flex items-center justify-center gap-3 transition-all duration-300 shadow-lg shadow-orange-600/20 text-sm md:text-base">
                    <span>Enviar Solicitação</span>
                    <i class="fa-solid fa-paper-plane text-xs md:text-sm"></i>
                </button>
            </form>
        </div>
    </div>
</section>