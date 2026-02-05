@php
    
    $todosProdutos = \App\Models\Product::all();
    $produtos = $todosProdutos->take(4);
    $produtosExtras = $todosProdutos->slice(4);
@endphp

<x-layout>
    <x-slot:title>PetPro - Cuidado Premium & E-commerce</x-slot:title>

    <x-header />
    
    <x-sections.hero />

   
    <x-sections.shop 
        :produtos="$produtos" 
        :produtosExtras="$produtosExtras" 
    />

    <x-sections.services />

    <x-sections.appointment />

    <x-footer />
</x-layout>