<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Spatie\Activitylog\Models\Activity;

class ActivityLog extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'Auditoria';
    protected static ?string $title = 'Log de Atividades';
    protected static string $view = 'filament.pages.activity-log';

    public function table(Table $table): Table
    {
        return $table
            ->query(Activity::query()->latest()) // Pega os logs mais recentes
            ->columns([
                TextColumn::make('created_at')
                    ->label('Data/Hora')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                
                TextColumn::make('description')
                    ->label('Evento')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'O produto foi created' => 'success',
                        'O produto foi updated' => 'warning',
                        'O produto foi deleted' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('subject.title')
                    ->label('Produto')
                    ->placeholder('Produto excluído'),

                TextColumn::make('causer.name')
                    ->label('Usuário')
                    ->default('Sistema'),
                
                TextColumn::make('properties')
                    ->label('Alterações')
                    ->limit(50)
                    ->tooltip(fn ($state) => json_encode($state)),
            ]);
    }
}