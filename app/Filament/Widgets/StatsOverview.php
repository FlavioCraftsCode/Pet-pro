<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    // Atualiza os dados automaticamente a cada 15 segundos (Efeito "Uau" para o Upwork)
    protected static ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        // Calcula Preço * Estoque de todos os produtos
        $totalInventoryValue = Product::query()->sum(DB::raw('price * stock')) / 100;

        // Itens com menos de 5 unidades
        $lowStockCount = Product::query()->where('stock', '<', 5)->count();

        // Total de produtos cadastrados
        $totalProducts = Product::count();

        return [
            Stat::make('Valor do Inventário', 'R$ ' . number_format($totalInventoryValue, 2, ',', '.'))
                ->description('Patrimônio total em produtos')
                ->descriptionIcon('heroicon-m-banknotes', IconPosition::Before)
                ->color('success'),

            Stat::make('Estoque Crítico', $lowStockCount)
                ->description('Itens com menos de 5 unidades')
                ->descriptionIcon('heroicon-m-exclamation-triangle', IconPosition::Before)
                ->color($lowStockCount > 0 ? 'danger' : 'gray'),

            Stat::make('Variedade de Itens', $totalProducts)
                ->description('Produtos ativos no catálogo')
                ->descriptionIcon('heroicon-m-shopping-bag', IconPosition::Before),
        ];
    }
}
