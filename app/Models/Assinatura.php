<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assinatura extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'clube_id', 'status', 'data_inicio', 'data_fim'];

    // Cast para que os campos sejam tratados como instâncias de Carbon
    protected $casts = [
        'data_inicio' => 'datetime',
        'data_fim' => 'datetime',
    ];

    // Relacionamento com o modelo Clube
    public function clube()
    {
        return $this->belongsTo(Clube::class);
    }

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
