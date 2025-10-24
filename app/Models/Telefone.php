<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Telefone extends Model
{
    use HasFactory;
    protected $table = 'telefone';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'ddd',
        'telefone'
    ];

    public function clientes()
    {
        return $this->belongsToMany(
            Cliente::class,
            'cliente_telefone',
            'id_telefone',
            'id_cliente'
        );
    }

    // public function clientes()
    // {
    //     return $this->belongsToMany(Cliente::class);
    // }
}
