<footer class="bg-gray-900 text-white pt-16 md:pt-20 pb-8 md:pb-10 border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 md:gap-12 mb-12 md:mb-16">
            
            <div class="space-y-6 flex flex-col items-center md:items-start text-center md:text-left">
                <div class="flex items-center gap-2">
                    <div class="bg-orange-600 p-2 rounded-lg shadow-lg shadow-orange-600/20">
                        <i class="fa-solid fa-paw text-white"></i>
                    </div>
                    <span class="text-2xl font-bold">Pet<span class="text-orange-600">Pro.</span></span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed max-w-xs">
                    Referência em cuidado premium para pets. Tecnologia e carinho em um só lugar.
                </p>
                <div class="flex gap-5">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-orange-600 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-gray-400 hover:bg-orange-600 hover:text-white transition-all duration-300">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <h4 class="text-lg font-bold mb-5 md:mb-6 border-b-2 md:border-b-0 md:border-l-4 border-orange-600 pb-2 md:pb-0 md:pl-3 w-fit">Links Rápidos</h4>
                <nav>
                    <ul class="space-y-3 md:space-y-4 text-gray-400 text-sm">
                        <li><a href="{{ url('/') }}" class="hover:text-orange-600 transition-colors">Início</a></li>
                        <li><a href="#servicos" class="hover:text-orange-600 transition-colors">Serviços</a></li>
                        <li><a href="#loja" class="hover:text-orange-600 transition-colors">Produtos</a></li>
                    </ul>
                </nav>
            </div>

            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <h4 class="text-lg font-bold mb-5 md:mb-6 border-b-2 md:border-b-0 md:border-l-4 border-orange-600 pb-2 md:pb-0 md:pl-3 w-fit">Contato</h4>
                <ul class="space-y-3 md:space-y-4 text-gray-400 text-sm">
                    <li class="flex flex-col md:flex-row items-center md:items-start gap-2 md:gap-3">
                        <i class="fa-solid fa-location-dot text-orange-600 md:mt-1"></i>
                        <span>São Paulo, SP - Brasil</span>
                    </li>
                    <li class="flex flex-col md:flex-row items-center md:items-start gap-2 md:gap-3">
                        <i class="fa-solid fa-envelope text-orange-600"></i>
                        <span>contato@petpro.com</span>
                    </li>
                </ul>
            </div>

            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <h4 class="text-lg font-bold mb-5 md:mb-6 border-b-2 md:border-b-0 md:border-l-4 border-orange-600 pb-2 md:pb-0 md:pl-3 w-fit">Newsletter</h4>
                <div class="w-full space-y-3">
                    <input type="email" placeholder="Seu e-mail" 
                           class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-sm text-white focus:border-orange-600 focus:ring-1 focus:ring-orange-600 outline-none transition-all placeholder:text-gray-600">
                    <button class="w-full bg-orange-600 hover:bg-orange-700 active:scale-95 text-white py-4 rounded-xl font-bold transition-all shadow-lg shadow-orange-600/10">
                        Inscrever
                    </button>
                </div>
            </div>
        </div>

        <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6 text-[10px] uppercase tracking-[0.2em] text-gray-500 text-center">
            <p>&copy; {{ date('Y') }} PetPro. Criado com TALL Stack.</p>
            <p class="flex items-center gap-2">
                Desenvolvido por <span class="text-white font-bold hover:text-orange-500 transition-colors cursor-pointer"></span>
            </p>
        </div>
    </div>
</footer>