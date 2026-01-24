<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa.
     * Estes campos correspondem exatamente ao que o formulário PetPro envia.
     */
    protected $fillable = [
        'pet_name',
        'email',
        'service',
    ];

    /**
     * Opcional: Se você quiser que o Laravel trate as datas 
     * de forma específica ou adicione algum comportamento extra.
     */
}