<!DOCTYPE html>
<html lang="pt-br" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $title ?? 'PetPro - Cuidado Premium para seu Pet' }}</title>
    
    
    <meta name="description" content="Serviços premium de banho, tosa e saúde para o seu pet.">
    <meta name="theme-color" content="#ea580c">

    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        [x-cloak] { display: none !important; }
        
        body { 
            font-family: 'Outfit', sans-serif;
            overflow-x: hidden; 
            width: 100%;
            -webkit-tap-highlight-color: transparent; 
        }

        
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        .custom-scrollbar::-webkit-scrollbar { width: 5px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #ea580c; border-radius: 10px; }

        
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        
        img { max-width: 100%; height: auto; }
    </style>
</head>

<body class="bg-[#F9F5F0] text-gray-900 selection:bg-orange-100 selection:text-orange-600">

    
    <div class="relative min-h-screen flex flex-col">
        
        
        <main class="flex-grow">
            {{ $slot }}
        </main>

    </div>

    
    @stack('scripts')
    
    
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('urlChange', () => {
                window.scrollTo(0, 0);
            });
        });
    </script>
</body>
</html>