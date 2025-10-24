<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LengthException;
 use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class Cliente extends Model
{
    use HasFactory;

    protected $table = "cliente";
    protected $primaryKey = 'id'; 
    public $timestamps = false;

    
    protected $fillable = [
        'nome',
        'sexo',
        'data_nascimento',
        'RG',
        'CPF',
    ];

 
    

    public function enderecos()
    {
        return $this->belongsToMany(
            Endereco::class,
            'cliente_endereco',
            'id_cliente',
            'id_endereco'
        );
    }


    public function telefones()
    {
        return $this->belongsToMany(
            Telefone::class,
            'cliente_telefone',
            'id_cliente',
            'id_telefone'
        );
    }

    

}
