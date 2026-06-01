<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    // Indicamos la tabla si es necesario (recuerda que en Supabase se llama properties)
    protected $table = 'properties';

    // EL TRUCO: Permitir la asignación masiva de los campos del formulario
    protected $fillable = [
        'title',
        'type',
        'price',
        'status',
        'location',
        'dimensions',
        'rooms_detail',
        'image_fachada',
        'image_comedor',
        'image_recamara'
    ];
}