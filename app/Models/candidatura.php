<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'candidaturas';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_completo',
        'cidade',
        'data_nascimento',
        'escolaridade',
        'vaga_id',
        'email',
        'telefone',
        'possui_cnh',
        'vinculo_empregaticio',
        'pretensao_salarial',
        'disponibilidade',
        'motivo',
        'caminho_curriculo',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'disponibilidade' => 'array', // Converte o JSON para array e vice-versa
        'possui_cnh' => 'boolean',      // Converte 1/0 para true/false
        'vinculo_empregaticio' => 'boolean',
        'data_nascimento' => 'date',
    ];
}
