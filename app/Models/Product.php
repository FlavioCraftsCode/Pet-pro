<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Product extends Model
{
    use LogsActivity; 

    protected $fillable = ['title', 'price', 'image', 'category', 'stock'];

    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title', 'price', 'stock', 'category']) 
            ->logOnlyDirty() 
            ->dontSubmitEmptyLogs() 
            ->setDescriptionForEvent(fn(string $eventName) => "O produto foi {$eventName}");
    }

    
    public function getPriceAttribute($value)
    {
        
        return $value > 500 ? $value / 100 : $value;
    }

    
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', '.');
    }
}