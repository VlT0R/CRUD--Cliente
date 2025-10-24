<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $table = 'endereco';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'CEP',
        'observacao',
    ];


    public function clientes()
    {
    return $this->belongsToMany(
         Cliente::class,
         'cliente_endereco',
         'id_endereco',
         'id_cliente'
        );
    }

}
