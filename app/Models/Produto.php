<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produto extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'produtos';

    // Apenas o estoque poderá ser editável
    protected $fillable = [
        'nome', 'preco', 'estoque', 'external_id'
    ];
}
