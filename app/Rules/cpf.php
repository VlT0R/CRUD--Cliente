<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class cpf implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    
    public function validate(string $attribute, mixed $value, Closure $fail): void
{
    if (!$this->cpf($value)) {
        $fail('O CPF atribuido não é valido.');
    }
}

public function cpf($value): bool
{
    // Remove tudo que não for número
    $c = preg_replace('/\D/', '', $value);

    // Verifica tamanho e CPFs repetidos
    if (strlen($c) != 11 || preg_match('/^(\d)\1{10}$/', $c)) {
        return false;
    }

    // Calcula 1º dígito verificador
    for ($t = 9; $t < 11; $t++) {
        $d = 0;
        for ($i = 0; $i < $t; $i++) {
            $d += $c[$i] * (($t + 1) - $i);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($c[$t] != $d) {
            return false;
        }
    }

    return true;
}



}
