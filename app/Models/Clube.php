<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clube extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'categoria', 'descricao', 'preco', 'periodicidade', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public function assinaturas()
    {
        return $this->hasMany(Assinatura::class);
    }
}
