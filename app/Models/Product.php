<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Product extends Model
{
    use LogsActivity; // Habilita o rastreio automático de mudanças

    protected $fillable = ['title', 'price', 'image', 'category', 'stock'];

    /**
     * Configuração do Log de Auditoria (O que será gravado)
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'price', 'stock', 'category']) // Monitora esses campos
            ->logOnlyDirty() // Só grava no log se o valor mudar de fato
            ->dontSubmitEmptyLogs() // Evita logs inúteis
            ->setDescriptionForEvent(fn(string $eventName) => "O produto foi {$eventName}");
    }

    /**
     * Técnica Final: Accessor Manual
     * Mantemos sua lógica de exibição para o Frontend.
     */
    public function getPriceAttribute($value)
    {
        // Se o valor no banco for centavos (ex: 9000), dividimos por 100 para mostrar 90.00
        return $value > 500 ? $value / 100 : $value;
    }

    /**
     * Formatação para a View (Ex: R$ 90,00)
     */
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', '.');
    }
}