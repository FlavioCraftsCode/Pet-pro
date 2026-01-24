<div class="bg-white/5 p-8 rounded-[2.5rem] ...">
    <form wire:submit.prevent="save" class="space-y-4">
        
        <x-text-input 
            wire:model="pet_name" 
            placeholder="Nome do Pet" 
            :error="$errors->first('pet_name')" 
        />

        <x-text-input 
            type="email" 
            wire:model="email" 
            placeholder="Seu E-mail" 
            :error="$errors->first('email')" 
        />

        
        <x-primary-button class="w-full bg-orange-600 py-5">
            
        </x-primary-button>
        
    </form>
</div>