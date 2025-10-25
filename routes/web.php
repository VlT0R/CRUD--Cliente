<?php

use App\Models\Cliente;
use App\Models\Endereco;
use Illuminate\Support\Facades\Route;

// primeira versão : 1.0 // 24/10/2025
// primeira versão : 1.0 // 25/10/2025 (ajuste telefone)

Route::get('/', function () {
    return view('welcome');
});


Route::get('/teste-relacionamento', function () {
    $cliente = Cliente::with(['telefones', 'enderecos'])->find(1);

    if (!$cliente) {
        return 'Cliente não encontrado.';
    }

    return response()->json([
        'cliente' => $cliente,
        'telefones' => $cliente->telefones,
        'enderecos' => $cliente->enderecos,
    ]);
});
