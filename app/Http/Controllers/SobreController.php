<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 1. Importe a facade 'File'
use Illuminate\Support\Facades\File;

class SobreController extends Controller
{
    public function sobre()
    {
        // 2. Defina o caminho completo usando storage_path() para a sua pasta customizada
        $path = storage_path('app/data/sobre.json');

        // 3. Use a facade 'File' que trabalha bem com caminhos completos
        if (!File::exists($path)) {
            abort(404, "O arquivo de dados (sobre.json) não foi encontrado no caminho esperado.");
        }

        // 4. Use File::get() para ler o conteúdo do caminho completo
        $jsonContent = File::get($path);

        // Decodifica o JSON para um objeto PHP
        $sobreData = json_decode($jsonContent);
        
        // Se o JSON estiver mal formatado, json_decode pode retornar null
        if (is_null($sobreData)) {
            abort(500, "Erro ao decodificar o arquivo JSON. Verifique a formatação.");
        }

        // Retorna a view 'sobre', passando o objeto com os dados
        return view('sobre', ['sobre' => $sobreData]);
    }
}