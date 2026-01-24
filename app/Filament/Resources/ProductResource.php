<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações do Produto')
                    ->description('Gerencie os detalhes principais e estoque.')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Nome do Produto')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('category')
                            ->label('Categoria')
                            ->required(),
                        
                        Forms\Components\TextInput::make('price')
                            ->label('Preço (R$)')
                            ->numeric()
                            ->prefix('R$')
                            ->required()
                            ->minValue(0.50)
                            ->maxValue(10000)
                            ->dehydrateStateUsing(fn ($state) => (int) ($state * 100))
                            ->formatStateUsing(fn ($state) => $state / 100),

                        Forms\Components\TextInput::make('stock')
                            ->label('Estoque Disponível')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->default(0),
                        
                        // CAMPO DE IMAGEM CORRIGIDO ABAIXO
                        Forms\Components\TextInput::make('image')
                            ->label('Caminho ou URL da Imagem')
                            ->placeholder('/img/produtos/nome-da-foto.png')
                            ->required()
                            ->maxLength(255)
                            ->hint('Aceita links externos ou caminhos locais (ex: /img/...)')
                            ->live(onBlur: true), // Atualiza o preview assim que você sai do campo

                        // Preview visual para se destacar no Upwork
                        Forms\Components\Placeholder::make('image_preview')
                            ->label('Prévia da Imagem')
                            ->content(fn ($get) => $get('image') ? 
                                new \Illuminate\Support\HtmlString("<img src='{$get('image')}' class='w-full max-h-[200px] object-contain rounded-lg shadow-md' />") 
                                : 'Nenhuma imagem selecionada'),

                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Adicionamos um preview da imagem na tabela
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->circular(), 

                Tables\Columns\TextColumn::make('title')
                    ->label('Produto')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('category')
                    ->label('Categoria')
                    ->badge() // Estiliza a categoria como um selo
                    ->color('gray'),
                
                Tables\Columns\TextColumn::make('price')
                    ->label('Preço')
                    ->money('BRL', divideBy: 100)
                    ->sortable()
                    ->color('success') // Preço em verde
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('stock')
                    ->label('Estoque')
                    ->numeric()
                    ->sortable()
                    // Muda a cor se o estoque estiver baixo (Exemplo avançado)
                    ->color(fn (int $state): string => $state < 5 ? 'danger' : 'success'),
            ])
            ->filters([
                // Adiciona filtro por categoria para facilitar a gestão
                Tables\Filters\SelectFilter::make('category')
                    ->label('Filtrar Categoria')
                    ->options([
                        'Alimentação' => 'Alimentação',
                        'Acessórios' => 'Acessórios',
                        'Saúde' => 'Saúde',
                        'Brinquedos' => 'Brinquedos',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Adicionada ação de excluir individual
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}