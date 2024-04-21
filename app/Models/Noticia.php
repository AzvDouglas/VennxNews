<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Noticia extends Model
{
    use HasFactory;
    
    protected $table = 'noticias';

    protected $fillable = [
        'titulo',
        'descricao',
        'imagem',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImagemUrlAttribute()
    {
        // Se a imagem for armazenada localmente
        if (strpos($this->imagem, 'http') !== 0) {
            return Storage::url($this->imagem);
        }
        // Se a imagem for uma URL externa
        return $this->imagem;
    }

    
}
