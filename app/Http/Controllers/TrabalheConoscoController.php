<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrabalheConoscoController extends Controller
{
    /**
     * Mostra o formulário de candidatura.
     */
    public function create()
    {
        // POR ENQUANTO, SEM BANCO DE DADOS:
        // Criamos uma lista de vagas "na mão".
        // O `collect` cria uma coleção, que se comporta de forma parecida
        // com o que você receberia do banco de dados.
        $vagas = collect([
            (object)['id' => 'suporte_tecnico', 'titulo' => 'Técnico(a) de Suporte'],
            (object)['id' => 'analista_redes', 'titulo' => 'Analista de Redes'],
            (object)['id' => 'vendedor_externo', 'titulo' => 'Vendedor(a) Externo'],
            (object)['id' => 'administrativo', 'titulo' => 'Auxiliar Administrativo'],
        ]);

        // A view é a mesma, e ela recebe a nossa lista de vagas.
        return view('trabalhe-conosco', ['vagas' => $vagas]);
    }

    /**
     * Armazena os dados do formulário (você vai implementar isso depois).
     */
    public function store(Request $request)
    {
        // No futuro, aqui você salvará os dados no banco.
        // Por agora, podemos apenas mostrar os dados na tela para testar.
        return $request->all();
    }
}
