<footer class="bg-gray-900 text-white pt-20 pb-10 border-t border-white/5">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            
            <div class="space-y-6">
                <div class="flex items-center gap-2">
                    <div class="bg-orange-600 p-2 rounded-lg">
                        <i class="fa-solid fa-paw text-white"></i>
                    </div>
                    <span class="text-2xl font-bold">Pet<span class="text-orange-600">Pro.</span></span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Referência em cuidado premium para pets. Tecnologia e carinho em um só lugar.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-400 hover:text-orange-600 text-xl"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-orange-600 text-xl"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-6 border-l-4 border-orange-600 pl-3">Links Rápidos</h4>
                <nav>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li><a href="{{ url('/') }}" class="hover:text-orange-600 transition">Início</a></li>
                        <li><a href="#servicos" class="hover:text-orange-600 transition">Serviços</a></li>
                        <li><a href="#loja" class="hover:text-orange-600 transition">Produtos</a></li>
                    </ul>
                </nav>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-6 border-l-4 border-orange-600 pl-3">Contato</h4>
                <ul class="space-y-4 text-gray-400 text-sm">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-location-dot text-orange-600 mt-1"></i>
                        <span>São Paulo, SP<br>Brasil</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope text-orange-600"></i>
                        <span>contato@petpro.com</span>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-6 border-l-4 border-orange-600 pl-3">Newsletter</h4>
                <div class="space-y-3">
                    <input type="email" placeholder="Seu e-mail" class="w-full bg-white/5 border border-white/10 rounded-lg p-3 text-sm text-white focus:border-orange-600 outline-none">
                    <button class="w-full bg-orange-600 hover:bg-orange-700 text-white py-3 rounded-lg font-bold transition">Inscrever</button>
                </div>
            </div>
        </div>

        <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4 text-[10px] uppercase tracking-widest text-gray-500 text-center">
            <p>&copy; {{ date('Y') }} PetPro. Criado com TALL Stack.</p>
            <p class="flex items-center gap-2">
                Desenvolvido por <span class="text-white font-bold">Flávio</span>
            </p>
        </div>
    </div>
</footer>